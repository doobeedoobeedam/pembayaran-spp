<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Siswa;
use PDF;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PembayaranController extends Controller
{
    public function index()
    {
        return view('admin/pembayaran/index', [
            'pembayarans' => Pembayaran::all(),
            'siswas' => Siswa::all(),
            'spps' => Spp::all()
        ]);
    }

    public function download()
    {
        $pembayarans = Pembayaran::all();

        $pdf = PDF::loadview('admin/pembayaran/dokumen', ['pembayarans' => $pembayarans]);
        return $pdf->stream();
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'bulan' => 'required',
            'spp_id' => 'required',
        ]);

        $pembayaran = new Pembayaran();
        $pembayaran->user_id = auth()->user()->id;
        $pembayaran->siswa_id = $request->siswa_id;
        $pembayaran->bulan = $request->bulan;
        $pembayaran->spp_id = $request->spp_id;
        $pembayaran->save();
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-pnNYVzQgjDZGzd74WtXijjEd';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        // https://app.sandbox.midtrans.com/snap/v2/vtweb/INI-SNAP-TOKEN
        // $siswa = Siswa::where('nisn', $pembayaran->siswa_id)->get('nama')->all();
        $amount = Spp::where('id', $pembayaran->spp_id)->get('nominal')->first();
        $params = array(
            'transaction_details' => array(
                'order_id' => $pembayaran->siswa_id,
                'gross_amount' => 1000,
            ),

            'customer_details' => array(
                'name' => Siswa::where('nisn', $pembayaran->siswa_id)->get('nama')->first(),
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => Siswa::where('nisn', $pembayaran->siswa_id)->get('no_telepon')->first(),
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        dd($snapToken);
        return response()->json($snapToken);
        return redirect('/pembayaran')->with('status', 'Transaksi berhasil!');
    }

    public function edit(Pembayaran $pembayaran)
    {
        return view('admin/pembayaran/edit', [
            'pembayaran' => $pembayaran
        ]);
    }

    public function destroy($id)
    {
        Pembayaran::destroy($id);
        return redirect('/pembayaran')->with('status', 'Data berhasil dihapus!');
    }
}
