<?php

namespace App\Http\Controllers\ManagemenBarang;

use App\Http\Controllers\Controller;
use App\Models\ManagemenBarang;
use Illuminate\Http\Request;


class ManagemenBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $max_data = 5;

        $sortBy = 'name';
        $sortDirection = 'asc';

        if ($request->has('sort_by') && $request->has('sort_direction')) {
            $sortBy = $request->sort_by;
            $sortDirection = $request->sort_direction;
        }

        $query = ManagemenBarang::orderBy($sortBy, $sortDirection);

        if ($request->has('first_character')) {
            $query->where('name', 'like', $request->first_character . '%');
        }

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $data = $query->paginate($max_data)->withQueryString();

        $groupedLetters = ManagemenBarang::selectRaw("LEFT(name, 1) AS first_character")
            ->groupBy('first_character')
            ->orderByRaw("CASE WHEN first_character REGEXP '^[0-9]' THEN 1 ELSE 0 END, first_character")
            ->get();

        return view("Dashboard.app", compact('data', 'sortBy', 'sortDirection', 'groupedLetters'));
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
        $request->validate([
            'name' => 'required|min:1|max:25',
            'quantity' => 'required|numeric|min:1|max:99999999999', 
            'price' => 'required|numeric|min:1|max:99999999999' 
        ],[
            'name.required' => 'Nama barang wajib diisikan',
            'name.min' => 'Nama barang tidak boleh kosong',
            'name.max' => 'Maximal nama barang adalah 25 karakter',
            'quantity.required' => 'Jumlah barang wajib diisikan',
            'quantity.numeric' => 'Jumlah barang harus berupa angka',
            'quantity.min' => 'Jumlah barang tidak boleh kosong',
            'quantity.max' => 'Maximal jumlah barang adalah 11 karakter',
            'price.required' => 'Harga barang wajib diisikan',
            'price.numeric' => 'Harga barang harus berupa angka',
            'price.min' => 'Harga barang tidak boleh kosong',
            'price.max' => 'Maximal harga barang adalah 11 karakter',
        ]);

        $data = [
            'name'=>$request->input('name'),
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price')
        ]; 

        ManagemenBarang::create($data);
        return redirect()->route('managemen_barang')->with('success', 'Berhasil Menyimpan Data');
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
        $request->validate([
            'name' => 'required|min:1|max:25',
            'quantity' => 'required|numeric|min:1|max:99999999999', 
            'price' => 'required|numeric|min:1|max:99999999999' 
        ],[
            'name.required' => 'Nama barang wajib diisikan',
            'name.min' => 'Nama barang tidak boleh kosong',
            'name.max' => 'Maximal nama barang adalah 25 karakter',
            'quantity.required' => 'Jumlah barang wajib diisikan',
            'quantity.numeric' => 'Jumlah barang harus berupa angka',
            'quantity.min' => 'Jumlah barang tidak boleh kosong',
            'quantity.max' => 'Maximal jumlah barang adalah 11 karakter',
            'price.required' => 'Harga barang wajib diisikan',
            'price.numeric' => 'Harga barang harus berupa angka',
            'price.min' => 'Harga barang tidak boleh kosong',
            'price.max' => 'Maximal harga barang adalah 11 karakter',
        ]);

        $data = [
            'name'=>$request->input('name'),
            'quantity'=>$request->input('quantity'),
            'price'=>$request->input('price')
        ];
        ManagemenBarang::where('id', $id)->update($data);
        return redirect()->route('managemen_barang')->with('success','Berhasil Mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ManagemenBarang::where('id',$id)->delete();
        return redirect()->route('managemen_barang')->with('success','Berhasil Menghapus Data');
    }
}
