<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('cashier.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cashier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'owner_name' => 'required',
            'weight' => 'required',
            'service' => 'required',
        ]);

        // Tentukan status berdasarkan layanan
        switch ($validatedData['service']) {
            case 'Cuci Saja':
                $validatedData['status'] = 'Diinput';
                break;
            case 'Setrika Saja':
                $validatedData['status'] = 'Selesai Dicuci';
                break;
            case 'Cuci dan Setrika':
                $validatedData['status'] = 'Diinput';
                break;
            default:
                $validatedData['status'] = 'Diinput';
        }

        // Membuat nomor faktur kustom
        $invoice_number = 'INV-' . date('Ymd') . '-' . mt_rand(1, 5000);

        // Tambahkan nomor faktur ke dalam data yang divalidasi
        $validatedData['invoice_number'] = $invoice_number;

        // Tambahkan data baru
        Item::create($validatedData);

        // Redirect
        return redirect('/cashier')->with('success', 'Data has been added');
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
        $item = Item::findOrFail($id);

        // return view
        return view('cashier.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validated data
        $validatedData = $request->validate([
            'invoice_number' => 'required',
            'owner_name' => 'required',
            'weight' => 'required',
            'service' => 'required',
            'status' => 'required',
        ]);

        // update data
        Item::whereId($id)->update($validatedData);

        // redirect
        return redirect('/cashier')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete data
        Item::destroy($id);

        // redirect
        return redirect('/cashier')->with('success', 'Data has been deleted');
    }
}
