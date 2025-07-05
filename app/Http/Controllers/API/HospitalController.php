<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hospital;
use Illuminate\Support\Facades\Validator;


class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospitals = Hospital::all();

        return Response()->json([
            'code' => 200,
            'message' => 'Berhasil mengambil data rumah sakit',
            'data' => $hospitals
        ],200);
    }

 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'location' => 'required',
            'is_open' => 'required',
            'thumbnail' => 'required',
            'phone' => 'required'
        ]);

        if($validator->fails()){
            return Response()->json([
                'code' => 400,
                'message' => 'Gagal Melakukan validasi',
                'data' => $validator->errors()
            ],422);
        }

        $hospital =Hospital::create([
            'name' => $request->name,
            'location' => $request->location,
            'is_open' => $request->is_open,
            'thumbnail' => $request->thumbnail,
            'phone' => $request->phone,
        ]);

        return Response()->json([
            'code' => 200,
            'message' => 'Berhasil menambahkan data rumah sakit',
            'data' => $hospital
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hospital = Hospital::where('id', $id)->first();

        if(!$hospital){
            return Response()->json([
                'code' => 422,
                'message' => 'Data tidak ditemukan',
                'data' => null
            ],222);
        }

        return Response()->json([
            'code' => 200,
            'message' => 'Data ditemukan',
            'data' => null
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $hospital = Hospital::find($id);

        if (!$hospital) {
            return response()->json([
                'code' => 404,
                'message' => 'Data rumah sakit tidak ditemukan',
                'data' => null
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'location' => 'required|string',
            'is_open' => 'required|boolean',
            'thumbnail' => 'nullable|string',
            'phone' => 'required|string|min:10'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 422,
                'message' => 'Gagal validasi',
                'errors' => $validator->errors()
            ], 422);
        }

        $hospital->update([
            'name' => $request->name,
            'location' => $request->location,
            'is_open' => $request->is_open,
            'thumbnail' => $request->thumbnail,
            'phone' => $request->phone,
        ]);

        return response()->json([
            'code' => 200,
            'message' => 'Berhasil memperbarui data rumah sakit',
            'data' => $hospital
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hospital = Hospital::find($id);

        if (!$hospital) {
            return response()->json([
                'code' => 404,
                'message' => 'Data rumah sakit tidak ditemukan',
                'data' => null
            ], 404);
        }

        $hospital->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Berhasil menghapus rumah sakit',
            'data' => $hospital
        ], 200);
    
    }
}
