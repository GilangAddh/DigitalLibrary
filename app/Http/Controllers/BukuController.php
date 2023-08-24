<?php

namespace App\Http\Controllers;

use App\Models\MBuku;
use App\Models\MKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{
    public function bukuShow(Request $request)
    {
        $data = MBuku::all();
        return view('buku.index', ['data' => $data]);
    }

    public function bukuTambah(Request $request)
    {
        $data = MKategori::all();
        return view('buku.create', ['data' => $data]);
    }

    public function bukuTambahProses(Request $request)
    {
        $oldid = $request->post('oldid');

        // -- ambil dari form
        $form_judul = $request->post('judul');
        $form_deskripsi = $request->post('deskripsi');
        $form_jumlah = $request->post('jumlah');
        $form_id_kategori = $request->post('id_kategori');
        $form_picture = $request->file('cover');

        $covername = '';
        if ($form_picture && $form_picture->getSize() > 0) {
            //$covername = $form_judul;
            $covername = $form_picture->hashName();
            $form_picture->move(public_path('cover'), $covername);
        }

        $form_file = $request->file('file');
        $filename = '';
        if ($form_file && $form_file->getSize() > 0) {
            $filename = $form_judul . ".pdf";
            $form_file->move(public_path('file'), $filename);
        }

        // -- set ke table
        $tblBuku = new MBuku();
        $tblBuku->judul = $form_judul;
        $tblBuku->deskripsi = $form_deskripsi;
        $tblBuku->jumlah = $form_jumlah;
        $tblBuku->id_kategori = $form_id_kategori;
        $tblBuku->cover = $covername;
        $tblBuku->file = $filename;
        $tblBuku->save(); // doing save here..

        Session::flash('alert-success', 'Success Add Data'); // kasih pesan success
        return redirect()->route('buku.index');
    }

    public function bukuEdit(Request $request)
    {
        $oldid = $request->query('oldid');

        $data = MBuku::findOrFail($oldid);
        $dataKategori = MKategori::all();
        return view('buku.edit', ['data' => $data, 'dataKategori' => $dataKategori]);
    }

    public function bukuEditProses(Request $request)
    {
        $oldid = $request->post('oldid');

        // -- ambil dari form
        $form_judul = $request->post('judul');
        $form_deskripsi = $request->post('deskripsi');
        $form_jumlah = $request->post('jumlah');
        $form_id_kategori = $request->post('id_kategori');
        $form_picture = $request->file('cover');
        $form_pictureold = $request->post('cover_old');
        $form_fileold = $request->post('file_old');

        $covername = '';
        if ($form_picture && $form_picture->getSize() > 0) {
            //$covername = $form_judul;
            unlink(public_path('cover/') . $form_pictureold);
            $covername = $form_picture->hashName();
            $form_picture->move(public_path('cover'), $covername);
        } else {
            $covername = $form_pictureold;
        }

        $form_file = $request->file('file');
        $filename = '';
        if ($form_file && $form_file->getSize() > 0) {
            unlink(public_path('file/') . $form_fileold);
            $filename = $form_judul . ".pdf";
            $form_file->move(public_path('file'), $filename);
        } else {
            $filename = $form_fileold;
        }

        // -- set ke table
        $tblBuku = MBuku::findOrFail($oldid);
        $tblBuku->judul = $form_judul;
        $tblBuku->deskripsi = $form_deskripsi;
        $tblBuku->jumlah = $form_jumlah;
        $tblBuku->id_kategori = $form_id_kategori;
        $tblBuku->cover = $covername;
        $tblBuku->file = $filename;
        $tblBuku->save(); // doing save here..

        Session::flash('alert-success', 'Success Edit Data'); // kasih pesan success
        return redirect()->route('buku.index');
    }


    public function bukuProsesDelete(Request $request)
    {
        $oldid = $request->query('oldid');
        $tblBuku = MBuku::findOrFail($oldid);
        $cover = $tblBuku->cover;
        $file = $tblBuku->file;
        unlink(public_path('cover/') . $cover);
        unlink(public_path('file/') . $file);
        $tblBuku->delete();

        Session::flash('alert-success', 'Success Delete Data'); // kasih pesan success
        return redirect()->route('buku.index');
    }
}
