<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\DetailPeminjam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = DetailPeminjam::with('anggota', 'buku')->get();
        $buku = Buku::orderBy('id', 'desc')->get();
        $anggota = Anggota::orderBy('id', 'desc')->get();

        return view('detail-pinjaman.index', compact('details', 'buku', 'anggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $details = DB::table('detail_peminjams')
        // ->select('detail_peminjams.*', 'anggotas.nama_anggota', 'bukus.nama_buku')
        // ->join('anggotas', 'detail_peminjams.id_peminjam', '=', 'anggotas.id')
        // ->join('bukus', 'detail_peminjams.id_buku', '=', 'bukus.id')
        // ->where('detail_peminjams.id_peminjam', '=', $id)
        // ->get();
        $details = DB::table('detail_peminjams')
            ->join('peminjams', 'detail_peminjams.id_peminjam', '=', 'peminjams.id')
            ->join('bukus', 'detail_peminjams.id_buku', '=', 'bukus.id')
            ->join('anggotas', 'peminjams.id_anggota', '=', 'anggotas.id')
            ->where('peminjams.id', $id)
            ->select('detail_peminjams.*', 'bukus.*', 'anggotas.*')
            ->get();;

        $bukus = Buku::orderBy('id', 'desc')->get();
        $anggotas = Anggota::orderBy('id', 'desc')->get();
        return view('detail-pinjaman.index', compact('details', 'bukus', 'anggotas'));
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
        //
    }
}
