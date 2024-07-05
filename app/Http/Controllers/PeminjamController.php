<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\DetailPeminjam;
use App\Models\Peminjam;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Peminjam::with('anggota')->get();
        return view('peminjam.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kode_transaksi = Peminjam::orderBy('id', 'desc')->first();
        if(isset($kode_transaksi)){
            $urutan = $kode_transaksi->id;
        } else {
            $urutan = 0;
        }
        $huruf = "TR";
        // $urutan = $kode_transaksi->id;
        $urutan++;
        $kode_transaksi = $huruf . date('dmY') . sprintf("%03s", $urutan);
        // $nextTransactionNumber = $kode_transaksi ? $kode_transaksi + 1 : 1;
        // $formattedTransactionNumber = sprintf('%06d', $nextTransactionNumber);

        $bukus = Buku::get();
        $datas = Anggota::orderBy('id', 'desc')->get();
        return view('peminjam.create', compact('datas', 'kode_transaksi', 'bukus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $peminjam = Peminjam::create([
            'id_anggota' => $request->id_anggota,
            'no_transaksi' => $request->no_transaksi,

        ]);
        foreach ($request->id_buku as $index => $id_buku) {
            DetailPeminjam::create([
                'id_peminjam' => $peminjam->id,
                'id_buku' => $id_buku,
                'tanggal_pinjam' => $request->tanggal_pinjam[$index],
                'tanggal_pengembalian' => $request->tanggal_pengembalian[$index],
                'keterangan' => $request->keterangan[$index],
            ]);
        };

        toast('Data Peminjam Berhasil Ditambah', 'success');
        return redirect()->to('peminjam');

        // Peminjam::create($request->all());
        // Alert::success('Success', 'Data Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $details = DB::table('detail_peminjams')
        ->select('detail_peminjams.*', 'anggotas.nama_anggota', 'bukus.nama_buku')
        ->join('anggotas', 'detail_peminjams.id_peminjam', '=', 'anggotas.id')
        ->join('bukus', 'detail_peminjams.id_buku', '=', 'bukus.id')
        ->where('detail_peminjams.id_peminjam', '=', $id)
        ->get();

        $bukus = Buku::orderBy('id', 'desc')->get();
        $anggotas = Anggota::orderBy('id', 'desc')->get();
        return view ('print.print-page', compact('details', 'bukus', 'anggotas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Peminjam::where('id', $id)->delete();
        // Alert::success('Success', 'Data Deleted Successfully');
        return redirect()->to('peminjam');
    }
}
