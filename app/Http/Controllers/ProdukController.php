<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("pages.produk.list",[
            "produk"=>produk::all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.produk.form");
        
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
            "nama" => "required"
            "kelompok_id" =>"required"
            "satuan"=>"required"
            "harga"=>"required"
        ]);

        Produk::create([
            "nama" => $request->nama
            "kelompok_id" =>$request->kelompok_id
            "satuan"=>$request->satuan
            "harga"=>$request->harga
        ]);

        return redirect()
            ->route("produk.index")
            ->with("info","Berhasil Tambah Produk");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
          return view('pages.kelompok.form',[
            "produk" => $produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
         $produk->update([
            "nama" => $request->nama
             "kelompok_id" =>$request->kelompok_id
            "satuan"=>$request->satuan
            "harga"=>$request->harga
        ]);

        return redirect()
                ->route("produk.index")
                ->with("info","Berhasil Update Produk");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
}
