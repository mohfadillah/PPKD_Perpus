<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Peminjam;


use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Peminjam::with('anggota')->get();
        return view ('peminjam.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kode_transaksi = Peminjam::orderBy('id', 'desc')->first();
        $huruf = "TR";
        $urutan = $kode_transaksi->id;
        $urutan++;
        $kode_transaksi = $huruf . date('dmY') . sprintf("%03s", $urutan);
        // $nextTransactionNumber = $kode_transaksi ? $kode_transaksi + 1 : 1;
        // $formattedTransactionNumber = sprintf('%06d', $nextTransactionNumber);

        $bukus = Buku::get();
        $datas = Anggota::orderBy('id', 'desc')->get();
        return view ('peminjam.create', compact('datas', 'kode_transaksi', 'bukus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Peminjam::create($request->all());
        // Alert::success('Success', 'Data Added Successfully');
        toast('Data Peminjam Berhasil Ditambah','success');
        return redirect()->to('peminjam');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        
    }
}
