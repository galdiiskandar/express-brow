<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class ChartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $bulan_a = \Carbon\Carbon::now()->month;
        $year = \Carbon\Carbon::now()->year;
        $bulan = \Carbon\Carbon::now()->format('M');

        $produk = DB::table('detail_transaksis')
            ->join('transaksis', 'detail_transaksis.kode_transaksi', '=', 'transaksis.kode_transaksi')
            ->join('barangs', 'detail_transaksis.kode_produk', '=', 'barangs.kode_produk')
            ->select('barangs.nama_produk as nama_produk')
            ->selectRaw('cast(sum(detail_transaksis.qty)as UNSIGNED) as y')
            ->whereMonth('transaksis.tanggal', $bulan_a)
            ->whereYear('transaksis.tanggal', $year)
            ->groupBy('barangs.nama_produk')
            ->orderBy('y','desc')
            ->limit(3)
            ->get();

        $transaksi = [];
        $tanggal_a = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
        $transaksi_search = DB::table('transaksis')->orderBy('kode_transaksi', 'asc')->get();

        $transaksi[0]['label'] = "Transaksi";

        foreach ($tanggal_a as $key => $tanggal) {
            $transaksis = DB::table('transaksis')
                ->selectRaw('cast(sum(total)as UNSIGNED) as y')
                ->whereDay('tanggal', $tanggal)
                ->whereMonth('tanggal', $bulan_a)
                ->whereYear('tanggal', $year)
                ->groupBy('tanggal')
                ->get();

                if (@$transaksis[0]->y != null) {
                    $transaksi[0]['data'][$key] = $transaksis[0]->y;
                } else {
                    $transaksi[0]['data'][$key]  = 0;
                }
        }

        $transaksi[0]['backgroundColor'] = "rgba(255,255,255,0)";
        $transaksi[0]['borderColor'] = "#2ac021";
        $transaksi[0]['pointBorderColor'] = "#ffffff";
        $transaksi[0]['pointBackgroundColor'] = "#2ac021";
        $transaksi[0]['pointBorderWidth'] = "2";

        $countTransaksi = DB::table('transaksis')->count();
        $countPelanggan = DB::table('pelanggans')->count();
        $countBarang = DB::table('barangs')->count();
        $countProyek = DB::table('proyeks')->count();

        return view('admin/chart.index',[
            'chartBarData' => $produk,
            'bulan' => $bulan,
            'chartLineData' => $transaksi,
            'countTransaksi' => $countTransaksi,
            'countPelanggan' => $countPelanggan,
            'countBarang' => $countBarang,
            'countProyek' => $countProyek
        ]);
    }
}
