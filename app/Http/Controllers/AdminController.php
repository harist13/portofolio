<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengguna;
use App\Models\proyek;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Halaman Dashboard
    public function home()
    {

        return view('admin.home');
    }

    // ===================== PENGGUNA =====================
    public function pengguna()
    {
        $pengguna = pengguna::all();
        return view('admin.pengguna', compact('pengguna'));
    }

    public function storePengguna(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:pengguna,username',
            'password' => 'required|string|min:6',
        ]);

        pengguna::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function updatePengguna(Request $request, $id)
    {
        $pengguna = pengguna::findOrFail($id);
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:pengguna,username,' . $id,
            'password' => 'nullable|string|min:6',
        ]);

        $data = [
            'nama' => $request->nama,
            'username' => $request->username,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $pengguna->update($data);

        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil diupdate!');
    }

    public function deletePengguna($id)
    {
        $pengguna = pengguna::findOrFail($id);
        $pengguna->delete();

        return redirect()->route('admin.pengguna')->with('success', 'Pengguna berhasil dihapus!');
    }


    public function proyek()
    {
        $proyek = proyek::all();
        return view('admin.proyek', compact('proyek'));
    }

    public function storeProyek(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tech' => 'required|string|max:255',
            'deskripsi' => 'required|string|min:20',
            'link' => 'required|url',
        ]);

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('assets/proyek'), $namaGambar);
            $gambarPath = 'assets/proyek/' . $namaGambar;
        }

        proyek::create([
            'nama' => $request->nama,
            'gambar' => $gambarPath,
            'tech' => $request->tech,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
        ]);

        return redirect()->route('admin.proyek')->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function updateProyek(Request $request, $id)
    {
        $proyek = proyek::findOrFail($id);
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tech' => 'required|string|max:255',
            'deskripsi' => 'required|string|min:20',
            'link' => 'required|url',
        ]);

        $data = [
            'nama' => $request->nama,
            'tech' => $request->tech,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
        ];

        // Upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($proyek->gambar && file_exists(public_path($proyek->gambar))) {
                unlink(public_path($proyek->gambar));
            }
            
            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('assets/proyek'), $namaGambar);
            $data['gambar'] = 'assets/proyek/' . $namaGambar;
        }

        $proyek->update($data);

        return redirect()->route('admin.proyek')->with('success', 'Proyek berhasil diupdate!');
    }

    public function deleteProyek($id)
    {
        $proyek = proyek::findOrFail($id);
        
        // Hapus file gambar
        if ($proyek->gambar && file_exists(public_path($proyek->gambar))) {
            unlink(public_path($proyek->gambar));
        }
        
        $proyek->delete();

        return redirect()->route('admin.proyek')->with('success', 'Proyek berhasil dihapus!');
    }

}
