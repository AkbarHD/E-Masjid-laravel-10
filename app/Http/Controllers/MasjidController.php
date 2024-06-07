<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMasjidRequest;
use App\Http\Requests\UpdateMasjidRequest;
use App\Models\Masjid;
use Illuminate\Http\Request;

class MasjidController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $masjid = auth()->user()->Masjid;
        $masjid = $masjid ?? new Masjid(); // jika masjid ada maka diambil, jika tidak ada maka buat baru
        return view('admin.masjid_form', [
            'masjid' => $masjid,
            'title' => 'Form Masjid',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'email' => 'required|email|lowercase',
        ]);

        $masjid = auth()->user()->Masjid; // ngambil masjid_id
        if ($masjid == null) {
            $masjid = new Masjid();
        }

        $masjid->nama = $data['nama'];
        $masjid->alamat = $data['alamat'];
        $masjid->telp = $data['telp'];
        $masjid->email = $data['email'];
        $masjid->save();

        $user = auth()->user();
        $user->masjid_id = $masjid->id;
        $user->save();
        flash('Data masjid berhasil disimpan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Masjid $masjid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Masjid $masjid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMasjidRequest $request, Masjid $masjid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Masjid $masjid)
    {
        //
    }
}
