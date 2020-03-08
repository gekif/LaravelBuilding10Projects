<?php

namespace App\Http\Controllers;

use App\Item;
use Validator;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        return response()->json($items, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required',
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            $response = [
                'response' => $validator->messages(),
                'success' => false
            ];

            return $response;

        } else {
            // Create Item
            $item = new Item;

            $item->text = $request->input('text');
            $item->body = $request->input('body');

            $item->save();

            return response()->json($item, 201);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);

        return response()->json($item, 200);
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
            'text' => 'required',
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            $response = [
                'response' => $validator->messages(),
                'success' => false
            ];

            return $response;

        } else {
            // Find An Item
            $item = Item::find($id);

            $item->text = $request->input('text');
            $item->body = $request->input('body');

            $item->save();

            return response()->json($item, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        $item->delete();

        $response = [
            'response' => 'Item deleted',
            'success' => true
        ];

        return $response;
    }
}
