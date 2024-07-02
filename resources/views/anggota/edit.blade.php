@extends('layouts.app')
@section('title', 'Change Anggota')
@section('titlecate', 'Anggota')
@section('content')
    <form action="{{ route('anggota.update', $edit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for=""> Change Name Anggota</label>
            <input value="{{ $edit->nama_anggota }}" type="text" class="form-control" name="nama_anggota"
                placeholder="Input Name Anggota">
        </div>
        <div class="form-group mb-3">
            <label for="">Change Email</label>
            <input value="{{ $edit->email }}" type="email" class="form-control" name="email"
                placeholder="Input Email">
        </div>
        <div class="form-group mb-3">
            <label for="">Change No. Telp</label>
            <input value="{{ $edit->no_tlp }}" type="text" class="form-control" name="no_tlp"
                placeholder="Input No. Telp">
        </div>
        <div class="form-group mb-3">
            <input type="submit" class="btn btn-primary" value="Save">
            <input type="reset" class="btn btn-danger" value="Cancel">
            <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
        </div>
    </form>
@endsection
