<?php

namespace App\Http\Controllers;

use App\Models\Yayasan;
use Illuminate\Http\Request;

class YayasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $yayasan = Yayasan::all();
        return view('yayasan.index', compact('yayasan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('yayasan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_yayasan' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        Yayasan::create($validasi);
        return redirect()->route('yayasan.index')->with('success', 'Data yayasan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Yayasan $yayasan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Yayasan $yayasan)
    {
        return view('yayasan.edit', compact('yayasan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Yayasan $yayasan)
    {
        $validasi = $request->validate([
            'nama_yayasan' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        $yayasan->update($validasi);

        return redirect()->route('yayasan.index')->with('success', 'Data yayasan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Yayasan $yayasan)
    {
        $yayasan->delete();
        return redirect()->route('yayasan.index')->with('success', 'Data yayasan berhasil dihapus!');
    }
}
