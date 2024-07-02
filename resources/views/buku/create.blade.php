@extends('layouts.app')
@section('title', 'Add Buku')
@section('titlecate', 'Buku')
@section('content')
    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="">Name Buku</label>
            <input type="text" class="form-control" name="nama_buku" placeholder="Input Buku" required>
        </div>
        <div class="form-group mb-3">
            <label for="">Penulis</label>
            <input type="text" class="form-control" name="penulis" placeholder="Input Penulis Buku" required>
        </div>
        <div class="form-group mb-3">
            <label for="">Penerbit</label>
            <input type="text" class="form-control" name="penerbit" placeholder="Input Penerbit Buku" required>
        </div>
        <div class="form-group mb-3">
            <label for="">Genre</label>
            <input type="text" class="form-control" name="genre" placeholder="Input Genre Buku" required>
        </div>
        <div class="form-group mb-3">
            <label for="">Deskripsi</label>
            <input type="text" class="form-control" name="deskripsi" placeholder="Input Deskripsi Buku" required>
        </div>
        <div class="form-group mb-3">
            <label for="">Quantity</label>
            <input type="number" class="form-control" name="qty" placeholder="Input Quantity Buku" required>
        </div>
        <div class="form-group mb-3">
            <input type="submit" class="btn btn-primary" value="Save">
            <input type="reset" class="btn btn-danger" value="Cancel">
            <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
        </div>
    </form>
@endsection
