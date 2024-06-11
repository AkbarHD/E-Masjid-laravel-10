<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;

class KasController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $kas = Kas::all();
        return view('admin.kas_index', [
            'kas' => $kas,
            'title' => 'Kas'
        ]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $kas = new Kas();
        return view('admin.kas_form', [
            'kas' => $kas,
            'title' => 'Form Kas'
        ]);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'masjid_id' => 'required|exists:masjid,id',
            'tanggal' => 'required|date',
            'kategori' => 'nullable|string',
            'keterangan' => 'required|string',
            'jenis' => 'required|in:masuk,keluar',
            'jumlah' => 'required|integer',
            'created_by' => 'required|exists:users,id'
        ]);

        $data = $request->all();
        $kas = new Kas($data);
        $kas->saldo_akhir = $kas->calculateSaldoAkhir();
        $kas->save();

        return redirect()->route('kas.index')
            ->with('success', 'Kas berhasil ditambahkan.');
    }

    // Display the specified resource.
    public function show(Kas $ka)
    {
        return view('kas.show', compact('ka'));
    }

    // Show the form for editing the specified resource.
    public function edit(Kas $ka)
    {
        return view('kas.edit', compact('ka'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Kas $ka)
    {
        $request->validate([
            'masjid_id' => 'required|exists:masjid,id',
            'tanggal' => 'required|date',
            'kategori' => 'nullable|string',
            'keterangan' => 'required|string',
            'jenis' => 'required|in:masuk,keluar',
            'jumlah' => 'required|integer',
            'created_by' => 'required|exists:users,id'
        ]);

        $data = $request->all();
        $ka->fill($data);
        $ka->saldo_akhir = $ka->calculateSaldoAkhir();
        $ka->save();

        return redirect()->route('kas.index')
            ->with('success', 'Kas berhasil diupdate.');
    }

    // Remove the specified resource from storage.
    public function destroy(Kas $ka)
    {
        $ka->delete();

        return redirect()->route('kas.index')
            ->with('success', 'Kas berhasil dihapus.');
    }
}
