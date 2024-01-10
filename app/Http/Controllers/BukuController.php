<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('bukus.index', compact('bukus'));
    }

    public function create()
    {
        return view('bukus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
        ]);

        Buku::create($request->all());

        return redirect()->route('bukus.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function destroy($bukuID)
    {
        $buku = Buku::find($bukuID);

        if (!$buku) {
            return redirect()->route('bukus.index')->with('error', 'Buku not found!');
        }

        $buku->delete();

        return redirect()->route('bukus.index')->with('success', 'Buku successfully deleted!');
    }
}
