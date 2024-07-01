<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $datas =  DB::table('user')
            ->join('level', 'user.id_level', '=', 'level.id')
            ->select('user.*', 'level.nama_level')
            ->get()->where('id_level');

        return view('user.index', compact('datas'));
    }
    //
    public function create()
    {
        $levels = Level::all();
        return view('user.create', compact('levels'));
    }
    //
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user',
            'password' => 'required',
            'id_level' => 'required',

        ]);
        $userData = $request->all();
        $userData['password'] = bcrypt($request->password); // Enkripsi password

        User::create($userData);
        return redirect()->to('user')->with('success', 'User created successfully.');
    }
    //
    public function edit(string $id)
    {
        $edit = User::findOrFail($id);
        $levels = Level::all();
        return view('user.edit', compact('edit', 'levels'));
    }
    //
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user,email,' . $id,
            'id_level' => 'required',

        ]);

        $user = User::findOrFail($id);
        $userData = $request->all();

        if ($request->filled('password')) {
            $userData['password'] = bcrypt($request->password); // Enkripsi password
        } else {
            unset($userData['password']); // Jangan update password jika tidak diisi
        }

        $user->update($userData);
        return redirect()->to('user')->with('success', 'User updated successfully.');
    }
    //
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->to('user')->with('success', 'User deleted successfully.');
    }
}
