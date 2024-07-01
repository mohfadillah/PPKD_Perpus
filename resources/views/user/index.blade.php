
@extends('layouts.app')
@section('content')
@section('cardtitle', 'Pengguna')
<div class="table-responsive">
    <div align="right" class="mb-3">
        <a href="{{route('user.create')}}" class="btn btn-primary btn-sm"><i
                class="fas fa-plus mr-1"></i><strong>Add</strong></a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $key => $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->nama_level }}</td>
                    <td>
                        <a href="{{ route('user.edit', $d->id) }}" class="btn btn-sm bg-success">
                            <i class="fas fa-edit"> Edit</i>
                        </a>

                        <form method="POST" action="{{ route('level.destroy', $d->id) }}" class="d-inline">
                            @csrf
                            <input type="hidden" value="DELETE" name="_method">
                            <button class="btn btn-danger btn-sm show_confirm" type="submit">
                                <i class="fas fa-trash"> Delete</i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
