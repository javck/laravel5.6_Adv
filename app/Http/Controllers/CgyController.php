<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cgy;

class CgyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Cgy::has('items')->get());
        //dd(Cgy::has('items','>=',5)->get());
        // $cgys = Cgy::whereHas('items', function ($query) {
        //     $query->where('price', '>', 8000);
        // })->get();
        //dd($cgys);

        $cgys = Cgy::get();

        return view('cgys.index', compact('cgys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cgys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->only(['pic', 'url', 'name', 'enabled']);
        $cgy = Cgy::create($inputs);
        return redirect('backend/cgy');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cgy = Cgy::findOrFail($id);
        //dd($cgy);

        dd($cgy->items);//取得該分類所有的商品
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cgy = Cgy::findOrFail($id);
        return view('cgys.edit', compact('cgy'));
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
        $cgy = Cgy::findOrFail($id);
        $cgy->update($request->only(['pic', 'url', 'name', 'enabled']));
        return redirect('backend/cgy');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('destroy');
        $cgy = Cgy::findOrFail($id);
        $cgy->delete();
        return redirect('/backend/cgy');
    }
}
