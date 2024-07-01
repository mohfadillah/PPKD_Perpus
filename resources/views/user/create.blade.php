@extends('layouts.app')
@section('title', 'Add User')
@section('titlecate', 'User')
@section('content')
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Input Level">
        </div>
        <div class="form-group mb-3">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Input Keterangan">
        </div>
        <div class="form-group mb-3">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Input Password">
        </div>
        <div class="form-group mb-3">
            <label for="inputLevel" class="col-form-label">Level</label>
            <select id="inputLevel" name="id_level" class="form-control">
                <option disabled selected hidden>--Pilih Level--</option>
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}">
                        {{ $level->nama_level }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <input type="submit" class="btn btn-primary" value="Save">
            <input type="reset" class="btn btn-danger" value="Cancel">
            <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
        </div>
    </form>
@endsection
