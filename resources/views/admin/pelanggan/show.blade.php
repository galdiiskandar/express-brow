@foreach ($dataPelanggan as $pelanggan)
    <table class="table" name="detailPelanggan">
        <tr>
            <th>Kode Pelanggan</th>
            <td>:</td>
            <td>{{ $pelanggan->kode_pelanggan }}</td>
        </tr>
        <tr>
            <th>Nama Pelanggan</th>
            <td>:</td>
            <td>{{ $pelanggan->nama_pelanggan}}</td>
        </tr>
        <tr>
            <th>E-mail Pelanggan</th>
            <td>:</td>
            <td>{{ $pelanggan->alamat_email}}</td>
        </tr>
        <tr>
            <th>No Telp Pelanggan</th>
            <td>:</td>
            <td>{{ $pelanggan->no_telp_pelanggan}}</td>
        </tr>
        <tr>
            <th>Alamat Pelanggan </th>
            <td>:</td>
            <td>{{ $pelanggan->alamat_pelanggan}}</td>
        </tr>
        <tr>
            <th>Keterangan Pelanggan </th>
            <td>:</td>
            <td>{{ $pelanggan->keterangan_pelanggan}}</td>
        </tr>
    </table>
@endforeach
