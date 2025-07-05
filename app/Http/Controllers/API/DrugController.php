<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Drug;
use Illuminate\Support\Facades\Validator;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drugs = Drug::all();

        return Response()->json([
            'code' => 200,
            'message' => 'Berhasil mengambil Obat',
            'data' => $drugs
        ],200 );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|string',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'is_active' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 422,
                'message' => 'Gagal validasi',
                'errors' => $validator->errors()
            ], 422);
        }

        $drug = Drug::create($request->all());

        return response()->json([
            'code' => 201,
            'message' => 'Berhasil menambahkan data obat',
            'data' => $drug
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $drug = Drug::find($id);

        if (!$drug) {
            return response()->json([
                'code' => 404,
                'message' => 'Data obat tidak ditemukan',
                'data' => null
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Berhasil mengambil detail obat',
            'data' => $drug
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $drug = Drug::find($id);

        if (!$drug) {
            return response()->json([
                'code' => 404,
                'message' => 'Data obat tidak ditemukan',
                'data' => null
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|string',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'is_active' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 422,
                'message' => 'Gagal validasi',
                'errors' => $validator->errors()
            ], 422);
        }

        $drug->update($request->all());

        return response()->json([
            'code' => 200,
            'message' => 'Berhasil mengupdate data obat',
            'data' => $drug
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drug = Drug::find($id);

        if (!$drug) {
            return response()->json([
                'code' => 404,
                'message' => 'Data obat tidak ditemukan',
                'data' => null
            ], 404);
        }

        $drug->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Berhasil menghapus data obat',
            'data' => $drug
        ], 200);
    }
}
