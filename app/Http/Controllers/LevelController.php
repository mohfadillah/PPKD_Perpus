<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Alert;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Level::get();
        return view('level.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('level.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Level::create($request->all());
        // Alert::success('Success', 'Data Added Successfully');
        toast('Data Level Berhasil Ditambah','success');
        return redirect()->to('level');
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
        $edit = Level::find($id);
        return view('level.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Level::where('id', $id)->update([
            'nama_level' => $request->nama_level,
            'keterangan' => $request->keterangan,
        ]);
        // toast('Data has been successfully updated', 'success');
        toast('Data Level Berhasil Diubah','success');
        return redirect()->to('level');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Level::where('id', $id)->delete();
        // Alert::success('Success', 'Data Deleted Successfully');
        return redirect()->to('level');
    }
}
