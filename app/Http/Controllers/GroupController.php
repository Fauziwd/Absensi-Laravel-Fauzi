<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GroupController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get groups

        // $groups = Group::latest()->paginate(5);
        // $groups = Group::with('users')->get();


        $groups = DB::table('groups')
            ->join('users', 'users.id', '=', 'groups.user_id')
            ->select('groups.*', 'users.name as user_name')
            ->get();

        //render view with groups
        return view('groups.index', compact('groups'));
    }

    public function show($id)
    {
        // $group_id = $request->query('group_id');
        $members = DB::table('members')->where('group_id', $id)->get();

        // Render View with member
        return view('groups.show', compact('members'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $group = User::all();
        return view('groups.create', compact('group'));
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'user_id'     => 'required',
            'name'     => 'required',
        ]);

        //create post
        Group::create([
            'user_id'   => $request->user_id,
            'name'      => $request->name
        ]);

        //redirect to index
        return redirect()->route('groups.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     * 
     * @param  mixed $group
     * @return void
     */
    public function edit(Group $group)
    {
        // Autentikasi Edit dan Delete Data
        if (auth()->user()->id != $group->user_id) {
            return redirect()->back()->withErrors(['Anda tidak memiliki hak akses untuk mengedit data ini. Silahkan Menghubungi Admin']);
        }
        return view('groups.edit', compact('group'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $group
     * @return void
     */
    public function update(Request $request, Group $group)
    {
        //validate form
        $request->validate([
            'name'      => 'required|min:5',
        ]);

        //update Group
        $group->update([
            'name'      => $request->name
        ]);


        //redirect to index
        return redirect()->route('groups.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Group $group)
    {
        // Autentikasi Edit dan Delete Data
        if (auth()->user()->id != $group->user_id) {
            return redirect()->back()->withErrors(['Anda tidak memiliki hak akses untuk mengedit data ini. Silahkan Menghubungi Admin']);
        }
        // Delete Data
        $group->delete();

        //redirect to index
        return redirect()->route('groups.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
