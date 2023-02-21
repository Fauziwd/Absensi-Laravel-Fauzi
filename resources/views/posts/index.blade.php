@extends('layouts.admin')
@section('content')


<style>

    /* button hapus */
   
button {
  width: 100px;
  height: 30px;
  cursor: pointer;
  display: flex;
  float: right;
  margin-left: 10px;
  align-items: center;
  background: red;
  border: none;
  border-radius: 5px;
  box-shadow: 1px 1px 3px rgba(0,0,0,0.15);
  background: #e62222;
 }
 
 button, button span {
  transition: 200ms;
 }
 
 button .text {
  transform: translateX(15px);
  color: white;
  font-weight: bold;
 }
 
 button .icon {
  position: absolute;
  border-left: 1px solid #c41b1b;
  transform: translateX(90px);
  height: 30px;
  width: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
 }
 
 button svg {
  width: 15px;
  fill: #eee;
 }
 
 button:hover {
  background: #ff3636;
 }
 
 button:hover .text {
  color: transparent;
 }
 
 button:hover .icon {
  width: 90px;
  border-left: none;
  transform: translateX(0);
 }
 
 button:focus {
  outline: none;
 }
 
 button:active .icon svg {
  transform: scale(0.8);
 }
</style>
<div class="p-4 shadow-lg p-3 mb-5 rounded flex-container;" style="background: rgb(45,99,215);
background: linear-gradient(275deg, rgba(45,99,215,1) 0%, rgba(59,112,224,1) 50%, rgba(182,187,255,1) 100%);">
<h4>Posts Data</h4>
</div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body" style=" background-color:#FFFFE8;">
                        <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-3" style="background: rgb(45,99,215);
                        background: linear-gradient(275deg, rgba(45,99,215,1) 0%, rgba(59,112,224,1) 50%, rgba(182,187,255,1) 100%);">TAMBAH POST</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr style="background: rgb(45,99,215);
                              background: linear-gradient(275deg, rgba(45,99,215,1) 0%, rgba(59,112,224,1) 50%, rgba(182,187,255,1) 100%);">
                                <th scope="col">GAMBAR</th>
                                <th scope="col">JUDUL</th>
                                <th scope="col">CONTENT</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($posts as $post)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/posts/').$post->image }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{!! $post->content !!}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            
<button type="submit" class="noselect" id="delete-btn">
    <span class="text">Delete</span>
    <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"></path>
    </svg>
    </span>
</button>

                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
    @stop