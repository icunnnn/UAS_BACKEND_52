<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FormatApi;
use App\Models\Agama52;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Agama52Controller extends Controller
{
    public function getAgama52(Request $request)
    {
        $agama = Agama52::all();

        return new FormatApi(true, 'Berhasil mendapatkan data agama', $agama);
    }

    public function getDetailAgama52(Request $request, $id)
    {
        $agama = Agama52::find($id);

        if (!$agama) {
            return new FormatApi(false, 'Agama tidak ditemukan', null);
        }

        return new FormatApi(true, 'Berhasil mendapatkan data agama', $agama);
    }

    public function postAgama52(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_agama' => 'required',
        ]);

        if ($validator->fails()) {
            return new FormatApi(false, 'Validasi gagal', $validator->errors()->all());
        }

        $createUser = Agama52::create([
            'nama_agama' => $request->nama_agama,
        ]);

        if ($createUser) {
            return new FormatApi(true, 'Berhasil menambahkan data agama', $createUser);
        } else {
            return new FormatApi(false, 'Gagal menambahkan data agama', null);
        }
    }

    public function putAgama52(Request $request, $id)
    {
        $agama = Agama52::find($id);

        if (!$agama) {
            return new FormatApi(false, 'Agama tidak ditemukan', null);
        }

        $validator = Validator::make($request->all(), [
            'nama_agama' => 'required',
        ]);

        if ($validator->fails()) {
            return new FormatApi(false, 'Validasi gagal', $validator->errors()->all());
        }

        $agama->update([
            'nama_agama' => $request->nama_agama,
        ]);

        return new FormatApi(true, 'Berhasil mengubah data agama', null);
    }

    public function deleteAgama52(Request $request, $id)
    {
        $agama = Agama52::find($id);

        if (!$agama) {
            return new FormatApi(false, 'Agama tidak ditemukan', null);
        }

        $agama->delete();

        return new FormatApi(true, 'Berhasil menghapus data agama', null);
    }
}
