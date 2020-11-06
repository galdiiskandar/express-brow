@foreach ($dataTransaksi as $transaksi)
    <table class="table" name="detailTransaksi">
        <tr>
            <th>Kode Transaksi</th>
            <td>:</td>
            <td>{{ $transaksi->kode_transaksi }}</td>
        </tr>
        <tr>
            <th>Kode Proyek</th>
            <td>:</td>
            <td>{{ $transaksi->kode_proyek}}</td>
        </tr>
        <tr>
            <th>Kode Pelanggan</th>
            <td>:</td>
            <td>{{ $transaksi->kode_pelanggan}}</td>
        </tr>
        <tr>
            <th>Kode User</th>
            <td>:</td>
            <td>{{ $transaksi->kode_user}}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>:</td>
            <td>{{ $transaksi->tanggal}}</td>
        </tr>
        <tr>
            <th>Total</th>
            <td>:</td>
            <td>{{ $transaksi->total}}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>:</td>
            <td>{{ $transaksi->keterangan_transaksi}}</td>
        </tr>
    </table>
@endforeach
