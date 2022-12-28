<?php

namespace App\Http\Controllers;

use App\Models\Agama52;
use Illuminate\Http\Request;

class Agama52Controller extends Controller
{
    public function agamaPage52()
    {
        $agama = Agama52::all();

        return view('agama', ['all_agama' => $agama]);
    }

    public function editAgamaPage52(Request $request)
    {
        $id = $request->id;

        $agama = Agama52::find($id);

        if (!$agama) {
            return back()->with('error', 'Agama tidak ditemukan');
        }

        $all_agama = Agama52::all();

        return view('agama', ['all_agama' => $all_agama, 'agama' => $agama]);
    }

    public function updateAgama52(Request $request)
    {
        $id = $request->id;
        $agama = Agama52::find($id);

        if (!$agama) {
            return redirect('/agama52')->with('error', 'Agama tidak ditemukan');
        }

        $request->validate([
            'nama_agama' => 'required'
        ]);

        $updateAgama = $agama->update([
            'nama_agama' => $request->nama_agama
        ]);

        if ($updateAgama) {
            return redirect('/agama52')->with('success', 'Agama berhasil diubah');
        } else {
            return redirect('/agama52')->with('error', 'Agama gagal diubah');
        }
    }

    public function createAgama52(Request $request)
    {
        $request->validate([
            'nama_agama' => 'required'
        ]);

        $createAgama = Agama52::create([
            'nama_agama' => $request->nama_agama
        ]);

        if ($createAgama) {
            return back()->with('success', 'Agama berhasil ditambahkan');
        } else {
            return back()->with('error', 'Agama gagal ditambahkan');
        }
    }

    public function deleteAgama52(Request $request)
    {
        $id = $request->id;
        $agama = Agama52::find($id);

        if (!$agama) {
            return redirect('/agama52')->with('error', 'Agama tidak ditemukan');
        }

        $deleteAgama = $agama->delete();


        if ($deleteAgama) {
            return redirect('/agama52')->with('success', 'Agama berhasil dihapus');
        } else {
            return redirect('/agama52')->with('error', 'Agama gagal dihapus');
        }
    }
}
