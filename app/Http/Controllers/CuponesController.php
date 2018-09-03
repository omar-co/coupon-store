<?php

namespace App\Http\Controllers;

use App\Cupones;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $cupon         = new Cupones;
        $cupon->string = md5(uniqid(rand(), true));

        return view('cupones.new', compact('cupon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
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
     * @param  \App\Cupones $cupones
     * @return \Illuminate\Http\Response
     */
    public function show(Cupones $cupones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cupones $cupones
     * @return \Illuminate\Http\Response
     */
    public function edit(Cupones $cupones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Cupones $cupones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cupones $cupones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cupones $cupones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cupones $cupones)
    {
        //
    }

    /**
     * Find and pay off cupon based in the string.
     *
     * @param  string $string
     * @return \Illuminate\Http\Response
     */
    public function redimir()
    {
        $cupon = Cupones::byString(request('string'));

        if ($cupon) {
            try {
                $cupon->used    = true;
                $cupon->user_id = auth()->user()->id;

                auth()->user()->points += $cupon->points;

                $cupon->save();
                auth()->user()->save();

                $message = ['success', 'Cupón redimido correctamente'];

            } catch (Exception $e) {
                Log::notice($e->getMessage());
                $message = ['error', 'Error al redimir el cupón'];
            }
        } else {
            $message = ['danger', 'El cupón no existe o ya fue redimido'];
        }
        return back()->with('message', $message);
    }
}
