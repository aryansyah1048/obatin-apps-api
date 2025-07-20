<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DonaturController extends Controller
{
    public function index()
    {
        return response()->json([
            'code' => 200,
            'message' => 'List semua user',
            'data' => User::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'nullable|string',
            'proof_bpjs' => 'nullable|string',
            'proof_kis' => 'nullable|string',
            'proof_citizen_id' => 'nullable|string',
            'is_active' => 'boolean',
            'verify_code' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['code' => 422, 'errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return response()->json([
            'code' => 201,
            'message' => 'User berhasil dibuat',
            'data' => $user
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['code' => 404, 'message' => 'User tidak ditemukan'], 404);
        }

        return response()->json([
            'code' => 200,
            'data' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['code' => 404, 'message' => 'User tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'sometimes|min:6',
            'phone' => 'nullable|string',
            'proof_bpjs' => 'nullable|string',
            'proof_kis' => 'nullable|string',
            'proof_citizen_id' => 'nullable|string',
            'is_active' => 'boolean',
            'verify_code' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['code' => 422, 'errors' => $validator->errors()], 422);
        }

        $data = $request->all();

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return response()->json([
            'code' => 200,
            'message' => 'User berhasil diperbarui',
            'data' => $user
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['code' => 404, 'message' => 'User tidak ditemukan'], 404);
        }

        $user->delete();

        return response()->json([
            'code' => 200,
            'message' => 'User berhasil dihapus'
        ]);
    }
}
