@extends('header')

<div class="container ">
    <div class="container text-center my-3">
        <h1 class="h2">Edit Kategori</h1>
    </div>
    <div class="container">
        <form action="{{ route('kategori.proses-edit') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="oldid" id="oldid" value="{{ $data->id_kategori }}">

            <label>Nama</label><br>
            <input name="nama" class="form-control" type="text" required value="{{ $data->nama }}"><br>


            <div class="row my-5">
                <div class="col">
                    <a class="btn btn-outline-danger" href="{{route('kategori.index')}}">Back</a>
                    <input class="btn btn-outline-primary" type="submit" value="Save">
                </div>
            </div>
        </form>
    </div>

</div>

@extends('footer')