@extends('header')

<div class="container ">
    <div class="container text-center my-3">
        <h1 class="h2">Edit Kategori</h1>
    </div>
    <div class="container">
        <form action="{{ route('buku.proses-edit') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="oldid" id="oldid" value="{{ $data->id_post }}">
            <input type="hidden" name="cover_old" id="cover_old" value="{{ $data->cover }}">
            <input type="hidden" name="file_old" id="file_old" value="{{ $data->file }}">


            <label>Judul</label><br>
            <input name="judul" class="form-control" type="text" required value="{{ $data->Judul }}"><br>

            <label>Deskripsi</label><br>
            <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" required>{{ $data->Deskripsi }}</textarea><br>

            <label>Jumlah</label><br>
            <input name="jumlah" id="jumlah" type="number" class="form-control" required value="{{ $data->Jumlah }}"><br>

            <label>Cover</label><br>
            <input name="cover" id="cover" type="file" class="form-control"><br>

            <label>File</label><br>
            <input name="file" id="file" type="file" class="form-control"><br>

            <label>Kategori Buku</label><br>
            <select name="id_kategori" id="id_kategori" class="form-control">
                @foreach ($dataKategori as $nomor => $value)
                <option @if ($data->id_kategori == $value->id_kategori) selected @endif
                    value="{{ $value->id_kategori }}">{{ $value->nama }}</option>
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