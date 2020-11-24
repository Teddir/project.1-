<?php

namespace App\Http\Controllers\Kategori\Api;

use App\Http\Controllers\Controller;
use App\hubungis;
use App\kategoris;
use App\produks;
use Illuminate\Http\Request;
use Kategori;

class KategoriController extends Controller
{
        //-------------------------------------------------------------->API
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = kategoris::get();
        if (! $kategori) {
            # code...
            return response()->json([
                'status' => 'Error',
                'Message' => 'Data Gagal Di Tampilkan',
                'data' => NULL, 402,
            ]);
        }
        return response()->json([
            'status' => 'Succes',
            'Message' => 'Data Berhasil Di Tampilkan',
            'data' => $kategori, 200,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategoris::get();
        // return view('Tampilan.Kategori.create', compact('kategori'));
        if (!$kategori) {
            # code...
            return response()->json([
                'data' => NULL, 402
            ]);
        } 
        return response()->json([
            'data' => $kategori, 200
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_kategori' => 'required',
        ]);
            try {
            $kategori = new kategoris();
            $kategori->name_kategori = $request->name_kategori;
            $kategori->save();
            // return redirect('/dashbord')->with(['success' => 'Kategori Diperbaharui!']);
        } catch (\Throwable $th) {

            return response([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => NULL, 404
            ]);
            ;
        }
        return response([
            'status' => 'succes',
            'message' => 'Berhasil Di Tambah',
            'data' => $kategori, 200
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kategoris  $kategoris
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = kategoris::find($id);
        // return view('Tampilan.Kategori.create', compact('kategori'));
        if (!$kategori) {
            # code...
            return response()->json([
                'data' => NULL, 402
            ]);
        } 
        return response()->json([
            'data' => $kategori, 200
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kategoris  $kategoris
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = kategoris::find($id);
        if (!$kategori) {
            # code...
            return response()->json([
                'data' => NULL, 402
            ]);
        } 
        return response()->json([
            'data' => $kategori, 200
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kategoris  $kategoris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        //code...
        $kategori = kategoris::find($id);
        $kategori->name_kategori = $request->name_kategori;
        try {
            $kategori->save();
        } catch (\Throwable $th) {

            return response([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => NULL, 404
            ]);
            ;
        }
        return response([
            'status' => 'succes',
            'message' => 'Berhasil Di Update',
            'data' => $kategori, 200
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kategoris  $kategoris
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = kategoris::destroy($id);
        if (! $kategori) {
            # code...
            return response()->json([
                'status' => 'Error',
                'Message' => 'Data Gagal Di Hapus',
                'data' => NULL, 402,
            ]);
        }
        return response()->json([
            'status' => 'Succes',
            'Message' => 'Data Berhasil Di Hapus',
            'data' => $kategori, 200,
        ]);
    }

}