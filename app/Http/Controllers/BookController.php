<?php

namespace App\Http\Controllers;

use App\Models\Book; 
use App\Models\Suplier;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();
        return view('book.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suplier = Suplier::all();
        $transaksi = Transaksi::all();
        return view('book.create', compact('suplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_suplier' => 'required',
            'nama_buku' => 'required',
            'pengarang' => 'required',
            'harga' => 'required',
            'cover' => 'required',
            'stok' => 'required',
        ]);

        $book = new Book;
        $book->id_suplier = $request->id_suplier;
        $book->nama_buku = $request->nama_buku;
        $book->pengarang = $request->pengarang;
        $book->harga = $request->harga;
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/book/', $name);
            $book->cover = $name;
        }
        $book->stok = $request->stok;
        $book->save();
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $suplier = Suplier::all();
        return view('book.edit', compact('book', 'suplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->id_suplier = $request->id_suplier;
        $book->nama_buku = $request->nama_buku;
        $book->pengarang = $request->pengarang;
        
        // upload image / foto
        if ($request->hasFile('cover')) {
            $book->deleteImage();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/book/', $name);
            $book->cover = $name;
        }
        $book->harga = $request->harga;
        $book->stok = $request->stok;
        $book->save();

        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->deleteImage();
        $book->delete();
        return redirect()->route('book.index');
    }
}
