@extends('layouts.app')
@section('content')
@section('cardtitle', 'Anggota')

<div class="table-responsive">
    <div align="right" class="mb-3">
        <a href="{{ route('anggota.create')}}" class="btn btn-primary btn-sm"><i
                class="fas fa-plus mr-1"></i><strong>Add</strong></a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Anggota</th>
                <th>Email</th>
                <th>No Telp</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $key => $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->nama_anggota }}</td>
                    <td>{{ $d->email }}</td>
                    <td>{{ $d->no_tlp }}</td>
                    <td>
                        <a href="{{ route('anggota.edit', $d->id) }}" class="btn btn-sm bg-success">
                            <i class="fas fa-edit"> Edit</i>
                        </a>
                        {{-- <a href="" class="btn btn-sm bg-danger">
                            <i class="fas fa-trash"> Hapus</i>
                        </a> --}}
                        <form method="POST" action="{{ route('anggota.destroy', $d->id) }}" class="d-inline">
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
{{--  }}
{{ route('anggota.edit', $d->id) }} --}}
{{-- {{ route('anggota.destroy', $d->id) }} --}}
