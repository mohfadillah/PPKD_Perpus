@extends('layouts.app')
@section('title', 'Add Anggota')
@section('titlecate', 'Anggota')
@section('content')
    <form action="{{ route('anggota.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="">Name Anggota</label>
            <input type="text" class="form-control" name="nama_anggota" placeholder="Input Anggota">
        </div>
        <div class="form-group mb-3">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Input Email">
        </div>
        <div class="form-group mb-3">
            <label for="">No. Telp</label>
            <input type="text" class="form-control" name="no_tlp" placeholder="Input No. Telp">
        </div>
        <div class="form-group mb-3">
            <input type="submit" class="btn btn-primary" value="Save">
            <input type="reset" class="btn btn-danger" value="Cancel">
            <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
        </div>
    </form>
@endsection
