<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Book;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transaksi = Transaksi::all();
        $book = Book::all();
        return view('transaksi.create', compact('transaksi','book'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        // 'id_buku' => 'required',
        //     'harga' => 'required',
        //     'jumlah' => 'required',
        //     'total_harga' => 'required',
        //     'cover' => 'required',
        //     'bayar' => 'required',
        //     'kembalian' => 'required',
        // ]);

        $transaksi = new Transaksi;
        $transaksi->id_buku = $request->id_buku;
        $transaksi->harga = $request->harga;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->total_harga = $transaksi->jumlah * $transaksi->harga;
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/book/', $name);
            $transaksi->cover = $name;
        }
        $transaksi->bayar = $request->bayar;
        $transaksi->kembalian = $transaksi->bayar - $transaksi->total_harga;
        $transaksi->save();
        $book = new Book;
        $book->stok - $request->jumlah;
        $book->save();
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->deleteImage();
        $transaksi->delete();
        return redirect()->route('transaksi.index');
    }
}
