<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class DesaController extends Controller
{
    public function indexDesa()
    {
        $desa = Desa::all();

        return response()->json([
            'message' => 'Data desa berhasil dimuat.',
            'data' => $desa
        ]);
    }

    public function detailDesa($id)
    {
        $desa = Desa::find($id);

        if (!$desa) {
            return response()->json(['message' => 'Desa tidak ditemukan'], 404);
        }

        return response()->json([
            'message' => 'Data desa berhasil ditemukan',
            'data' => $desa
        ]);
    }

    public function createDesa(Request $request)
    {
        $validate = $request->validate([
            'code' => 'required',
            'district_code' => 'required',
            'name' => 'required',
            'meta' => 'required',
        ]);

        $desa = new Desa;
        $desa->code = $request->code;
        $desa->district_code = $request->district_code;
        $desa->name = $request->name;
        $desa->meta = $request->meta;
        $desa->save();

        return response()->json([
            'message' => 'Data Desa Berhasil Dibuat',
            'data' => $desa,
        ]);
    }

    public function editDesa(Request $request, $id)
    {
        $validate = $request->validate([
            'code' => 'required',
            'district_code' => 'required',
            'name' => 'required',
            'meta' => 'required',
        ]);

        $desa = Desa::find($id);

        if (!$desa) {
            return response()->json(['message' => 'Desa tidak ditemukan'], 404);
        }

        $desa->code = $request->code;
        $desa->district_code = $request->district_code;
        $desa->name = $request->name;
        $desa->meta = $request->meta;
        $desa->save();

        return response()->json([
            'message' => 'Data Desa Berhasil Diubah',
            'data' => $desa,
        ]);
    }

    public function deleteDesa($id)
    {
        $desa = Desa::find($id);

        if (!$desa) {
            return response()->json(['message' => 'Desa tidak ditemukan'], 404);
        }

        $desa->delete();

        return response()->json(['message' => 'Data Desa Berhasil Dihapus']);
    }
}
