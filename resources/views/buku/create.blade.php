@extends('header')

<div class="container ">
    <div class="container text-center my-3">
        <h1 class="h2">Tambah Buku</h1>
    </div>
    <div class="container">
        <form action="{{ route('buku.proses-create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="oldid" id="oldid" value="">

            <label>Judul</label><br>
            <input name="judul" class="form-control" type="text" required><br>

            <label>Deskripsi</label><br>
            <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" required></textarea><br>

            <label>Jumlah</label><br>
            <input name="jumlah" id="jumlah" type="number" class="form-control" required><br>

            <label>Cover</label><br>
            <input name="cover" id="cover" type="file" class="form-control" required><br>

            <label>File</label><br>
            <input name="file" id="file" type="file" class="form-control" required><br>

            <label>Kategori Buku</label><br>
            <select name="id_kategori" id="id_kategori" class="form-control">
                <option value="" disabled selected>Pilih Kategori Buku</option>
                @foreach ($data as $nomor => $value)
                <option value="{{ $value->id_kategori }}">{{ $value->nama }}</option>
                @endforeach
            </select>

            <div class="row my-5">
                <div class="col">
                    <a class="btn btn-outline-danger" href="{{route('buku.index')}}">Back</a>
                    <input class="btn btn-outline-primary" type="submit" value="Save">
                </div>
            </div>
        </form>
    </div>

</div>

@extends('footer')