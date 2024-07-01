@extends('layouts.app')
@section('title', 'Change User')
@section('titlecate', 'User')
@section('content')
    <form action="{{ route('user.update', $edit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="">Level Name</label>
            <input value="{{ $edit->nama }}" type="text" class="form-control" name="nama" placeholder="Input Name Level">
        </div>
        <div class="form-group mb-3">
            <label for="">Change Email</label>
            <input value="{{ $edit->email }}" type="text" class="form-control" name="email" placeholder="Input Email">
        </div>
        <div class="form-group mb-3">
            <label for="inputLevel" class="form-label ">Level</label>
            <select id="inputLevel" name="id_level" class="form-control">
                <option disabled selected hidden>--Pilih Level--</option>
                @foreach ($levels as $level)
                    <option value="{{ $level->id }}" {{ $level->id == $edit->level_id ? 'selected' : '' }}>
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
