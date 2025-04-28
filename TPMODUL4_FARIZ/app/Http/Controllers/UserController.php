<?php

namespace App\Http\Controllers;

// 1. Import model User
use App\Models\User; 
use Illuminate\Http\Request;


class UserController extends Controller
{
    // 2. tampilkan daftar semua pengguna dari tabel users menggunakan compact
    public function index() {
        $users = User::all(); // Get all users
        return view('users.index', compact('users'));
    }

    // 3. tampilkan form untuk menambah pengguna baru
    public function create() {
        return view('users.create');
    }

    // 4. simpan pengguna baru ke dalam tabel users
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6' // Tambahkan validasi password
        ]);

        $userData = $request->all();
        $userData['password'] = Hash::make($request->password);

        User::create($userData);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // 5. tampilkan form untuk mengedit pengguna yang sudah ada
    public function edit($id) {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // 6. simpan perubahan pengguna ke dalam tabel users
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'required'
        ]);

        $userData = $request->all();
        $user->update($userData);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // 7. hapus pengguna dari tabel users
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}