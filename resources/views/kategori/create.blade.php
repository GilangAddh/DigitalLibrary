@extends('header')

<div class="container ">
    <div class="container text-center my-3">
        <h1 class="h2">Tambah Kategori</h1>
    </div>
    <div class="container">
        <form action="{{ route('kategori.proses-create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="oldid" id="oldid" value="">

            <label>Nama</label><br>
            <input name="nama" class="form-control" type="text" required><br>


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