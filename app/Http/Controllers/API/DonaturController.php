<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;


class DonaturController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
            'ktp_image' => 'nullable', // 2 MB
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Upload foto KTP jika ada
        $ktpPath = null;
        if ($request->filled('ktp_image')) {
            $image = base64_decode($request->ktp_image);
            $fileName = uniqid() . '.jpg';

            // pastikan folder 'public/ktp' ada
            Storage::disk('public')->put('ktp/' . $fileName, $image);
            $ktpPath = 'ktp/' . $fileName;
        }

        $otp = rand(123456,999999);

        $donatur = User::create([
            'name' => $request->nama,
            'phone' => $request->telepon,
            'email' => $request->email,
            'password' => bcrypt('default123'), // password default
            'proof_citizen_id' => $ktpPath,
            'verify_code' => $otp,
            'is_active' => true,
        ]);

        // Kirim email OTP
        Mail::to($donatur->email)->send(new OtpMail($otp));

        return response()->json([
            'success' => true,
            'message' => 'Donatur berhasil disimpan, OTP terkirim ke email.',
            'data' => $donatur,
        ], 201);
    }
}
