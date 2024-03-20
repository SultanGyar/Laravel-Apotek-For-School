<?php

namespace App\Http\Controllers;

use App\models\Distributor;
use App\models\User;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian = Pembelian::all();
            return view('pembelian.index', [
            'pembelian' => $pembelian
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'pembelian.create', [
            'distributor' => Distributor::all(),
            'user' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Menyimpan Data 
        $user = auth()->user();
        $request->validate([
            'nonota_beli' => 'required',
            'tgl_beli' => 'required',
            'total_beli' => 'required',
            'id_distributor' => 'required'
        ]);
            $array = $request->only([
            'nonota_beli',
            'tgl_beli',
            'total_beli',
            'id_distributor'
        ]);

        $array['id_user'] = $user->id;
        $pembelian = Pembelian::create($array);
        return redirect()->route('pembelian.index')->with('success_message', 'Berhasil menambah Pembelian');
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
        //Menampilkan Form edit
        $pembelian = Pembelian::find($id);
        if (!$pembelian) return redirect()->route('pembelian.index')->with('error_message', 'Pembelian dengan id'.$id.' tidak ditemukan');
        return view('pembelian.edit', [
        'pembelian' => $pembelian,
        'distributor' => Distributor::all(),
        'user' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        //Mengedit Data Pembelian
        $request->validate([
            'nonota_beli' => 'required',
            'tgl_beli' => 'required',
            'total_beli' => 'required',
            'id_distributor' => 'required',
            'id_user' => 'required'
        ]);
            $pembelian = Pembelian::find($id);
            $pembelian->nonota_beli = $request->nonota_beli;
            $pembelian->tgl_beli = $request->tgl_beli;
            $pembelian->total_beli = $request->total_beli;
            $pembelian->id_distributor = $request->id_distributor;
            $pembelian->id_user = $request->id_user;
            $pembelian->save();
        return redirect()->route('pembelian.index')->with('success_message', 'Berhasil mengubah Pembelian');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $pembelian = Pembelian::find($id);
        if ($pembelian) $pembelian->delete();
        return redirect()->route('pembelian.index')->with('success_message', 'Berhasil menghapus Pembelian');
    }

}
