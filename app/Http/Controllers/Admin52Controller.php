<?php

namespace App\Http\Controllers;

use App\Models\Agama52;
use App\Models\User;
use Illuminate\Http\Request;

class Admin52Controller extends Controller
{

    public function dashboardPage52()
    {
        $user = User::where('role', 'user')->get();
        $agama = Agama52::all();

        return view('dashboard', ['data' => $user, 'agama' => $agama]);
    }

    public function detailPage52(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);

        if (!$user) {
            return redirect('/dashboard52')->with('error', 'User tidak ditemukan');
        }

        $agama = Agama52::all();

        $detail = $user->detail;
        $data = array_merge($user->toArray(), $detail->toArray());

        return view('profile', ['user' => $data, 'agama' => $agama, 'is_preview' => true]);
    }

    public function updateUserStatus52(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);

        if (!$user) {
            return redirect('/dashboard52')->with('error', 'User tidak ditemukan');
        }

        $updateStatus = $user->update([
            'is_active' => $user->is_active == 1 ? 0 : 1
        ]);

        if ($updateStatus) {
            return redirect('/dashboard52')->with('success', 'Status berhasil diubah');
        } else {
            return redirect('/dashboard52')->with('error', 'Status gagal diubah');
        }
    }

    public function deleteUser52(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);

        if (!$user) {
            return redirect('/dashboard52')->with('error', 'User tidak ditemukan');
        }

        $deleteUser = $user->delete();

        if ($deleteUser) {
            return redirect('/dashboard52')->with('success', 'User berhasil dihapus');
        } else {
            return redirect('/dashboard52')->with('error', 'User gagal dihapus');
        }
    }

    public function agamaPage52()
    {
        $agama = Agama52::all();

        return view('agama', ['all_agama' => $agama]);
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
            return redirect('/agama52')->with('success', 'Agama berhasil ditambahkan');
        } else {
            return redirect('/agama52')->with('error', 'Agama gagal ditambahkan');
        }
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


    public function updateUserAgama52(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);

        if (!$user) {
            return redirect('/dashboard52')->with('error', 'User tidak ditemukan');
        }

        $request->validate([
            'agama' => 'required|exists:agama52,id'
        ]);

        $user->detail->id_agama = $request->agama;
        $updateAgama = $user->detail->save();

        if ($updateAgama) {
            return redirect('/dashboard52')->with('success', 'Agama berhasil diubah');
        } else {
            return redirect('/dashboard52')->with('error', 'Agama gagal diubah');
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

}
