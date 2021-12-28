<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use App\Models\Book;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suplier = Suplier::All();
        return view('suplier.index', compact('suplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suplier = Suplier::all();
        return view('suplier.create', compact('suplier'));
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
            'suplier' => 'required',
            'alamat' => 'required',
        ]);

        $suplier = new Suplier;
        $suplier->suplier = $request->suplier;
        $suplier->alamat = $request->alamat;
        $suplier->save();
        return redirect()->route('suplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suplier = Suplier::findOrFail($id);
        return view('suplier.show', compact('suplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suplier = Suplier::findOrFail($id);
        return view('suplier.edit', compact('suplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $suplier = Suplier::findOrFail($id);
        $suplier->suplier = $request->suplier;
        $suplier->alamat = $request->alamat;
        $suplier->save();
        return redirect()->route('suplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suplier = Suplier::findOrFail($id);
        $suplier->delete();
        return redirect()->route('suplier.index');
    }
}
