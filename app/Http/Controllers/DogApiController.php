<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;

class DogApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dogs = Dog::all();
        return response()->json($dogs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dog = new Dog();
        $dog-> name = $request -> name; 
        $dog-> breed = $request -> breed; 
        $dog-> img = $request -> img; 

        $dog->save();

        return response()->json($dog, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dog = Dog::findOrFail($id);

        return response()->json($dog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dog = Dog::findOrFail($id);
        $dog-> name = $request -> name; 
        $dog-> breed = $request -> breed; 
        $dog-> img = $request -> img; 
        
        $dog->save();

        return response()->json(["message"=>"Updated", "dog"=>$dog], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $dog = Dog::destroy($request->id);
        return response()->json($dog);
    }
}
