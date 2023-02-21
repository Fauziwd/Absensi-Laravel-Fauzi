<form method="POST" action="{{ route('presences.store') }}">
    @csrf
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $s)
            <tr>
                <td>{{ $s->nama }}</td>
                <td>
                    <label for="status_{{ $s->id }}_hadir">
                        <input type="radio" id="status_{{ $s->id }}_hadir" name="absensi[{{ $s->id }}][status]" value="hadir" class="custom-control-input" checked>Hadir
                    </label>
                    <label for="status_{{ $s->id }}_izin">
                        <input type="radio" id="status_{{ $s->id }}_izin" name="absensi[{{ $s->id }}][status]" value="izin" class="custom-control-input">Izin
                    </label>
                </td>
                <td>
                    <input type="text" autocomplete="off" name="absensi[{{ $s->id }}][keterangan]" class="form-control ">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit">Simpan</button>
</form>