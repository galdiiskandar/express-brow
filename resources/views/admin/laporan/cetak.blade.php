<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
        <h4>Laporan Transaksi Tiara Gypsum</h4>
    </center>
    <br>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No.</th>
                <th>Kode Transaksi</th>
                <th>Tanggal</th>
                <th>Total</th>
			</tr>
		</thead>
		<tbody>
            @php
                $sum = 0;
            @endphp
			@foreach ($getData as $dt => $data)
                <tr>
                    <td>{{ ++$dt }}</td>
                    <td>{{ $data->kode_transaksi }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ 'Rp.'.number_format($data->total) }}</td>
                    {{ $sum+=$data->total }}
                </tr>
            @endforeach
            <tr>
                <td colspan="3" style="text-align: center;">Grand Total</td>
                <td>{{ 'Rp.'.number_format($sum) }}</td>
            </tr>
		</tbody>
	</table>

</body>
</html>
