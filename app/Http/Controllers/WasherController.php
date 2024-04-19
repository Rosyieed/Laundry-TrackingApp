<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class WasherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderTake = Item::where('status', 'Diinput')->get();
        $orderProcess = Item::where('status', 'Sedang Dicuci')->get();
        return view('washer.index', compact('orderTake', 'orderProcess'));
    }

    public function takeOrder(String $id)
    {
        $item = Item::findOrFail($id);

        if ($item->status === 'Diinput') {
            $item->update([
                'status' => 'Sedang Dicuci',
                'id_washer' => auth()->user()->id,
            ]);
            return redirect()->route('washer.index')->with('success', 'Pesanan berhasil diambil!');
        }
    }

    public function cancelTake (String $id)
    {
        $item = Item::findOrFail($id);

        if ($item->status === 'Sedang Dicuci') {
            $item->update([
                'status' => 'Diinput',
                'id_washer' => null,
            ]);
            return redirect()->route('washer.index')->with('success', 'Pesanan dibatalkan!');
        }
    }

    public function doneOrder(String $id)
    {
        $item = Item::findOrFail($id);

        if ($item->status === 'Sedang Dicuci') {
            $item->update([
                'status' => 'Selesai Dicuci',
            ]);
            return redirect()->route('washer.index')->with('success', 'Pesanan selesai dicuci!');
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
