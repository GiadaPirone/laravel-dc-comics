<?php

namespace App\Http\Controllers;

use App\Models\Fumetto;
use Illuminate\Http\Request;

class FumettoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fumetti = Fumetto::all();
        return view("fumetti.index", compact("fumetti"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("fumetti.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newFumetto = new Fumetto;

        $newFumetto->title = $data["title"];
        $newFumetto->description = $data["description"];
        $newFumetto->price = $data["price"];

        $newFumetto->save();

        return redirect()->route('fumetti.show', $newFumetto->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $fumetto = Fumetto::find($id);
       return view("fumetti.show", compact("fumetto"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fumetto $fumetti)
    {
        return view("fumetti.edit", compact("fumetti"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fumetto $fumetti)
    {
        $data = $request->all();

        $fumetti->title = $data["title"];
        $fumetti->description = $data["description"];
        $fumetti->price = $data["price"];

        $fumetti->update();

        return redirect()->route("fumetti.show", $fumetti->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fumetto $fumetti)
    {
        $fumetti ->delete();

        return redirect()->route('fumetti.index');
    }
}
