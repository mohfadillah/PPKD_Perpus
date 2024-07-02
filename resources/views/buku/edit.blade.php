@extends('layouts.app')
@section('title', 'Change Data Buku')
@section('titlecate', 'Buku')
@section('content')
    <form action="{{ route('buku.update', $edit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for=""> Change Name Buku</label>
            <input value="{{ $edit->nama_buku }}" type="text" class="form-control" name="nama_buku"
                placeholder="Input Name Anggota">
        </div>
        <div class="form-group mb-3">
            <label for="">Change Penulis</label>
            <input value="{{ $edit->penulis }}" type="text" class="form-control" name="penulis" placeholder="Input Email">
        </div>
        <div class="form-group mb-3">
            <label for="">Change Penerbit</label>
            <input value="{{ $edit->penerbit }}" type="text" class="form-control" name="penerbit"
                placeholder="Input No. Telp">
        </div>
        <div class="form-group mb-3">
            <label for="">Change Genre</label>
            <input value="{{ $edit->genre }}" type="text" class="form-control" name="genre"
                placeholder="Input No. Telp">
        </div>
        <div class="form-group mb-3">
            <label for="">Change Deskripsi</label>
            <input value="{{ $edit->deskripsi }}" type="text" class="form-control" name="deskripsi"
                placeholder="Input No. Telp">
        </div>
        <div class="form-group mb-3">
            <label for="">Change Quantity</label>
            <input value="{{ $edit->qty }}" type="text" class="form-control" name="qty"
                placeholder="Input No. Telp">
        </div>
        <div class="form-group mb-3">
            <input type="submit" class="btn btn-primary" value="Save">
            <input type="reset" class="btn btn-danger" value="Cancel">
            <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
        </div>
    </form>
@endsection
