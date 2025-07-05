<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return Response()->json([
            'code' => 200,
            'message' => 'Berhasil Mengambil data user',
            'data' => $users
        ],200);
    }

   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:8'
        ]);
        if ($validator->fails()){
            return Response()->json([
                'code' => 422,
                'message' => 'Gagal melakukan validasi',
                'errors' => $validator->errors()
            ],422);
        }

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);
        
        return Response()->json([
            'code' => 201,
            'message' => 'berhasil menambahkan data user',
            'data' => $user
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->first();

        if(!$user){
            return Response()->json([
                'code' => 400,
                'message' => 'gagal mengambil detail user',
                'data' => $user
            ],400);
        }

        return Response()->json([
            'code' =>200,
            'message' => 'berhasil mengambil detail user',
            'data' => $user
        ],200);
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::where('id', $id)->first();

        if(!$user){
            return Response()->json([
                'code' => 422,
                'message' => 'Data tidak ditemukan',
                'data' => 'Data user tidak ditemukan'
            ],422);
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email',
            'name' => 'required',
            'password' => 'nullable|min:8'
        ]);
        
        if($validator->fails()){
            return Response()->json([
                'code' => 422,
                'message' => 'gagal melakukan validasi',
                'data' => $validator->errors()
            ],422);
        }


        $user->email = $request->email;
        $user->name = $request->name;

        if($request->password){
            $user->password = Hash::make($request->password);
        }

        $user->update();

        return Response()->json([
            'code' => 200,
            'message' => 'berhasil mengupdate user',
            'data' => $user
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->first();

        if(!$user){
            return Response()->json([
            'code' => 200,
            'message' => 'berhasil mengupdate user',
            'data' => $user
            ],200);
        }

        $user->delete();

        return Response()->json([
            'code' => 200,
            'message' => 'berhasil menghapus user',
            'data' => $user
        ],200);
    }
}
