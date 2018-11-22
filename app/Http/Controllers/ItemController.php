<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Item;
use App;
use Auth;
use Validator;

class ItemController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::get();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        APP::setLocale('zh_tw');
        //dd(APP::getLocale());
        $cgys = \App\Cgy::get()->pluck('name', 'id');
        return view('items.create', compact('cgys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $inputs = $request->all();
        $cgy_ids = $inputs['cgy_id'];
        //將cgy_ids陣列轉換為用逗號隔開的字串
        $inputs['cgy_id'] = implode(',', $cgy_ids);

        Item::create($inputs);
        return redirect('backend/item');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $cgys = \App\Cgy::pluck('name', 'id');
        return view('items.edit', compact('item', 'cgys'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:items|max:255',
            'price' => 'required',
            'publish_at' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return redirect("backend/item/$id/edit")->withErrors($validator)->withInput();
        }

        $inputs = $request->all();
        $item = Item::findOrFail($id);
        $cgy_ids = $inputs['cgy_id'];
        //將cgy_ids陣列轉換為用逗號隔開的字串
        $inputs['cgy_id'] = implode(',', $cgy_ids);
        $item->update($inputs);
        return redirect('backend/item');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect('backend/item');
    }
}
