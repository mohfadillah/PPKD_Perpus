@extends('layouts.app')
@section('title', 'Change Level')
@section('titlecate', 'Level')
@section('content')
    <form action="{{ route('level.update', $edit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="">Level Name</label>
            <input value="{{ $edit->nama_level }}" type="text" class="form-control" name="nama_level"
                placeholder="Input Name Level">
        </div>
        <div class="form-group mb-3">
            <label for="">Change Keterangan</label>
            <input value="{{ $edit->keterangan}}" type="text" class="form-control" name="keterangan"
                placeholder="Input Keterangan">
        </div>
        <div class="form-group mb-3">
            <input type="submit" class="btn btn-primary" value="Save">
            <input type="reset" class="btn btn-danger" value="Cancel">
            <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
        </div>
    </form>
@endsection
