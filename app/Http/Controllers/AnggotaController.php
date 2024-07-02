<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Alert;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $datas = Anggota::get();
            return view ('anggota.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Anggota::create($request->all());
        toast('Data Anggota Berhasil Ditambah','success');
        return redirect()->to('anggota');
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
        $edit = Anggota::find($id);

        return view ('anggota.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Anggota::where('id', $id)->update([
            'nama_anggota' => $request->nama_anggota,
            'email' => $request->email,
            'no_tlp' => $request->no_tlp
        ]);
        toast('Data Anggota Berhasil Diubah','success');
        return redirect()->to('anggota');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Anggota::where('id', $id)->delete();
        return redirect()->to('anggota');
    }
}
