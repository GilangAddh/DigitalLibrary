<?php

namespace App\Http\Controllers;

use App\Models\MKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    public function kategoriShow(Request $request)
    {
        $dataKategori = MKategori::all();
        return view('kategori.index', ['data' => $dataKategori]);
    }

    public function kategoriTambah(Request $request)
    {
        $data = MKategori::all();
        return view('kategori.create', ['data' => $data]);
    }

    public function kategoriTambahProses(Request $request)
    {
        $oldid = $request->post('oldid');

        // -- ambil dari form
        $form_nama = $request->post('nama');

        // -- set ke table
        $tblKategori = new MKategori();
        $tblKategori->nama = $form_nama;
        $tblKategori->save(); // doing save here..

        Session::flash('alert-success', 'Success Add Data'); // kasih pesan success
        return redirect()->route('kategori.index');
    }

    public function kategoriEdit(Request $request)
    {
        $oldid = $request->query('oldid');

        $data = MKategori::findOrFail($oldid);
        $dataKategori = MKategori::all();
        return view('kategori.edit', ['data' => $data, 'dataKategori' => $dataKategori]);
    }

    public function kategoriEditProses(Request $request)
    {
        $oldid = $request->post('oldid');

        // -- ambil dari form
        $form_nama = $request->post('nama');

        // -- set ke table
        $tblPost = MKategori::findOrFail($oldid);
        $tblPost->nama = $form_nama;
        $tblPost->save(); // doing save here..

        Session::flash('alert-success', 'Success Edit Data'); // kasih pesan success
        return redirect()->route('kategori.index');
    }

    public function kategoriProsesDelete(Request $request)
    {
        $oldid = $request->query('oldid');
        $tblPost = MKategori::findOrFail($oldid);
        $tblPost->delete();
        Session::flash('alert-success', 'Success Delete Data'); // kasih pesan success
        return redirect()->route('kategori.index');
    }
}
