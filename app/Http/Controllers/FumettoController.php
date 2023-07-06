<?php

namespace App\Http\Controllers;

use App\Models\Fumetto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FumettoController extends Controller
{
    private function validateFumetto($data){
        $validator = Validator::make($data,[

            "title" => "required|min:5|max:100",
            "description" => "required|min:5|max:1000",
            "thumb" => "max:1000",
            "price" => "required|min:4|max:10",
            "series" => "min:4|max:50",
            "type" => "required",
            "sale_date" => "min:4|max:50",
        ], [
            "title.required"=> "il titolo è obbligatorio",
            "title.min"=> "il titolo deve avere almeno :min caratteri",

            "description.required"=> "La descrizione è obbligatoria",
            "description.min"=> "Descrizione di almeno :min caratteri",
            "description.max"=> "Descrizione di massimi :max caratteri",

            "price.required"=> "L'inserimentio del prezzo è obbligatorio",
            "price.min" => "inserire minimo :min cifre",

            "type.required" => "obbligatorio inserire il tipo"

        ])->validate();

        return $validator;
    }

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
        // $data = $request->all();
        $data = $this->validateFumetto($request->all());

        $newFumetto = new Fumetto;

        $newFumetto->title = $data["title"];
        $newFumetto->thumb = $data["thumb"];
        $newFumetto->description = $data["description"];
        $newFumetto->type = $data["type"];
        $newFumetto->price = $data["price"];
        $newFumetto->sale_date = $data["sale_date"];

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
        // $data = $request->all();
        $data = $this->validateFumetto( $request->all() );

        $fumetti->title = $data["title"];
        $fumetti->thumb = $data["thumb"];
        $fumetti->description = $data["description"];
        $fumetti->type = $data["type"];
        $fumetti->price = $data["price"];
        $fumetti->sale_date = $data["sale_date"];

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
