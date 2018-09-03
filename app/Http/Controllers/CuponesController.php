<?php

namespace App\Http\Controllers;

use App\Cupones;
use Illuminate\Http\Request;

class CuponesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cupones = Cupones::paginate(50);

        return view('cupones.index', compact('cupones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cupon = new Cupones;
        $cupon->string = md5(uniqid(rand(), true));

        return view('cupones.new', compact('cupon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'string' => 'required|unique:cupones',
            'points' => 'required|numeric'
        ]);

        Cupones::create(request(['string', 'points']));

        return back()->with('message', ['success', 'Cupón creado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cupones  $cupones
     * @return \Illuminate\Http\Response
     */
    public function show(Cupones $cupones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cupones  $cupones
     * @return \Illuminate\Http\Response
     */
    public function edit(Cupones $cupones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cupones  $cupones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cupones $cupones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cupones  $cupones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cupones $cupones)
    {
        //
    }
}
