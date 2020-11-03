@foreach ($dataAdmin as $admin)
    <table class="table" name="detailAdmin">
        <tr>
            <th>Nama</th>
            <td>:</td>
            <td>{{ $admin->nama_user}}</td>
        </tr>
        <tr>
            <th>No Telp</th>
            <td>:</td>
            <td>{{ $admin->no_telp_user}}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>:</td>
            <td>{{ $admin->alamat}}</td>
        </tr>
        <tr>
            <th>Foto</th>
            <td>:</td>
            <td>
                <img style="width: 40%;" src="{{ url('/images/'.$admin->foto_user) }}">
            </td>
        </tr>
    </table>
@endforeach
