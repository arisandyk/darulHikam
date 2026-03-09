<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\Yayasan;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sekolah = Sekolah::with('yayasan')->get();
        return view('sekolah.index', compact('sekolah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $yayasan = Yayasan::all();
        return view('sekolah.create', compact('yayasan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'yayasan_id' => 'required|exists:yayasans,id',
            'nama_sekolah' => 'required|string|max:255',
            'jenjang_pendidikan' => 'required|string|max:100',
            'alamat' => 'required|string',
        ], [
            'yayasan_id.required' => 'Yayasan tidak boleh kosong',
            'nama_sekolah.required' => 'Nama sekolah tidak boleh kosong',
        ]);

        Sekolah::create($validasi);
        return redirect()->route('sekolah.index')->with('success', 'Data sekolah berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sekolah $sekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sekolah $sekolah)
    {
        $yayasan = Yayasan::all();
        return view('sekolah.edit', compact('sekolah', 'yayasan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sekolah $sekolah)
    {
        $validasi = $request->validate([
            'yayasan_id' => 'required|exists:yayasans,id',
            'nama_sekolah' => 'required|string|max:255',
            'jenjang_pendidikan' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $sekolah->update($validasi);

        return redirect()->route('sekolah.index')->with('success', 'Data sekolah berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sekolah $sekolah)
    {
        $sekolah->delete();
        return redirect()->route('sekolah.index')->with('success', 'Data sekolah berhasil dihapus!');
    }
}
