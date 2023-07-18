<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Restoran;

class RestoranController extends Controller
{
    public function index()
    {
        $datafood = Restoran::with('food')->get();
        return view('restoran.index', compact('datafood'));
    }

    public function create()
    {
        $food = Food::all();
        return view('restoran.create', compact('food'));
    }

    public function store(Request $request)
    {
        $food = Food::where('kode_makanan', $request->kode_makanan)
            ->where('nama_makanan', $request->nama_makanan)
            ->firstOrFail();

        Restoran::create([
            'kode_restoran' => $request->kode_restoran,
            'nama_restoran' => $request->nama_restoran,
            'kode_makanan' => $food->kode_makanan,
            'nama_makanan' => $food->nama_makanan,
            'alamat' => $request->alamat,
        ]);

        return redirect('restoran')->with('toast_success', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $food = Food::all();
        $data = Restoran::find($id);
        return view('restoran.edit', compact('data', 'food'));
    }

    public function update(Request $request, $id)
    {
        $data = Restoran::find($id);
        $food = Food::where('kode_makanan', $request->kode_makanan)
            ->where('nama_makanan', $request->nama_makanan)
            ->firstOrFail();

        $data->update([
            'kode_restoran' => $request->kode_restoran,
            'nama_restoran' => $request->nama_restoran,
            'kode_makanan' => $food->kode_makanan,
            'nama_makanan' => $food->nama_makanan,
            'alamat' => $request->alamat,
        ]);

        return redirect('restoran')->with('toast_success', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $data = Restoran::find($id);
        $data->delete();
        return redirect('restoran')->with('info', 'Data Berhasil Dihapus');
    }
}
