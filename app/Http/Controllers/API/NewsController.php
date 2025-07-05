<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();

        return response()->json([
            'code' => 200,
            'message' => 'Berhasil mengambil semua data berita',
            'data' => $news
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'type' => strtoupper($request->input('type'))
        ]);


        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date_created' => 'required|date',
            'thumbnail' => 'required|string',
            'type' => 'required|in:NEWS,DONATION',
            'is_active' => 'required|boolean',
        ]);
    

        $news = News::create($validated);
    
        
        return response()->json([
            'code' => 200,
            'message' => 'Berhasil menambahkan data',
            'data' => $news
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::find($id);

        if (!$news) {
            return response()->json([
                'code' => 404,
                'message' => 'Data berita tidak ditemukan',
                'data' => null
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'message' => 'Berhasil mengambil detail berita',
            'data' => $news
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $request->merge([
        'type' => strtoupper($request->input('type'))
    ]);

    $validator = Validator::make($request->all(), [
        'title' => 'required|string',
        'description' => 'required|string',
        'date_created' => 'required|date',
        'thumbnail' => 'required|string',
        'type' => 'required|in:NEWS,DONATION',
        'is_active' => 'required|boolean',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'code' => 422,
            'message' => 'Gagal validasi',
            'errors' => $validator->errors()
        ]);
    }

    $news = News::find($id);

    if (!$news) {
        return response()->json([
            'code' => 404,
            'message' => 'Data tidak ditemukan',
        ]);
    }

    $news->update($request->all());

    return response()->json([
        'code' => 200,
        'message' => 'Data berhasil diperbarui',
        'data' => $news
    ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::find($id);

        if (!$news) {
            return response()->json([
                'code' => 404,
                'message' => 'Data berita tidak ditemukan',
                'data' => null
            ], 404);
        }

        $news->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Berhasil menghapus berita',
            'data' => $news
        ], 200);
    }
}
