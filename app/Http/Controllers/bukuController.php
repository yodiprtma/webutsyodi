<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class bukuController extends Controller
{

    public function index()
    {
        $buku = DB::table('buku')
        ->select("buku.id", "kodebk", "buku.nama", "buku.namapengarang","jenisbuku_id", "jenisbuku.nama AS jenisbuku_nama")
        ->join('jenisbuku', 'jenisbuku.id', '=', 'buku.jenisbuku_id')
        ->get();

        return view('buku.index', ['databuku' => $buku]);
    }

    public function create()
    {
        $jenisbuku = DB::table('jenisbuku')->get();
       
        return view('buku.create', ['jenisbuku' => $jenisbuku]);
    }

    public function store(Request $request)
    {
        DB::table('buku')->insert([
            'kodebk' => $request->kodebk,
            'nama' => $request->nama,
            'namapengarang' => $request->namapengarang,
            'jenisbuku_id' => $request->jenisbuku,
        ]);

        return redirect(url('/buku'));
    }

    public function update(Request $request, $id)
    {
        DB::table('buku')
        ->where('id', $id)
        ->update([
            'kodebk' => $request->kodebk,
            'nama' => $request->nama,
            'namapengarang' => $request->namapengarang,
            'jenisbuku_id' => $request->jenisbuku,
        ]);

        return redirect(url('/buku'));
    }

    public function edit($id)
    {
        $buku = DB::table('buku')
        ->select("buku.id", "kodebk", "buku.nama", "buku.nama","buku.namapengarang", "jenisbuku_id", "jenisbuku.nama AS jenisbuku_nama")
        ->join('jenisbuku', 'jenisbuku.id', '=', 'buku.jenisbuku_id')
        ->where('buku.id', $id)
        ->first();

        $jenisbuku = DB::table('jenisbuku')->get();

        return view('buku.edit', ['databuku' => $buku, 'id' => $id, 'jenisbuku' => $jenisbuku]);
    }

    public function show(String $id)
    {
        $buku = DB::table('buku')
        ->select("buku.id", "kodebk", "buku.nama", "buku.nama","buku.namapengarang", "jenisbuku_id", "jenisbuku.nama AS jenisbuku_nama")
        ->join('jenisbuku', 'jenisbuku.id', '=', 'buku.jenisbuku_id')
        ->where('buku.id', $id)
        ->first();

        $jenisbuku = DB::table('jenisbuku')->get();

        return view('buku.show', ['databuku' => $buku, 'id' => $id, 'jenisbuku' => $jenisbuku]);
    }
    public function destroy($id)
    {
        DB::table('buku')
        ->where('id', $id)
        ->delete();

        return redirect(url('/buku'));
}
}