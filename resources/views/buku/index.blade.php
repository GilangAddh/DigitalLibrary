@extends('header')
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<div class="alert alert-{{ $msg }} border-0 bg-{{ $msg }} alert-dismissible fade show m-5 my-2">
    <div class="text-white">{{ Session::get('alert-' . $msg) }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@endforeach
<div class="container-fluid ">
    <div class="container text-center my-3">
        <h1 class="h2">Buku</h1>
    </div>
    <div class="container">
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Logout</button>
        </form>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-1">
                <a href="{{route('buku.create')}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-plus-square-fill"></i>
                    Tambah</a>
            </div>
            <div class="col-1">
                <a href="{{route('kategori.index')}}" class="btn btn-sm btn-outline-success"><i class="bi bi-bookmark-check-fill"></i> Kategori</a>
            </div>
            <div class="col-1">
                <a href="/" class="btn btn-sm btn-outline-danger"><i class="bi bi-backspace-fill"></i> Kembali</a>
            </div>
        </div>

    </div>
    <div class="container-fluid my-3">
        <table class="table text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Cover</th>
                    <th>File</th>
                    <th>Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $no => $value)
                <tr valign="middle">
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $value->Judul }}</td>
                    <td>{{ $value->Deskripsi }}</td>
                    <td>{{ $value->Jumlah }}</td>
                    <td><img src="/cover/{{ $value->cover }}" style="width: 150px; height: auto;"></td>
                    <td><a href="#">Download {{ $value->file }}</a></td>
                    <td>{{ $value->kategori->nama }}</td>
                    <td>
                        <a class="btn btn-outline-success btn-sm" href="{{ route('buku.edit', ['oldid' => $value->id_post]) }}"><i class="bi bi-pencil-fill"></i> Edit</a>
                        <a class="btn btn-outline-danger btn-sm" href="{{ route('buku.proses-delete', ['oldid' => $value->id_post]) }}" onclick="return confirm(`Hapus buku {{ $value->Judul }}`)"><i class="bi bi-trash3-fill"></i>
                            Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@extends('footer')