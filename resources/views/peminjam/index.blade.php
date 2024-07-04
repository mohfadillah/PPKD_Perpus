@extends('layouts.app')
@section('content')
@section('cardtitle', 'Data Peminjam')

<div class="table-responsive">
    <div align="right" class="mb-3">
        <a href="{{ route('peminjam.create') }}" class="btn btn-primary btn-sm"><i
                class="fas fa-plus mr-1"></i><strong>Add Peminjam</strong></a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Anggota</th>
                <th>No Transaksi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $key => $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->anggota->nama_anggota }}</td>
                    <td>{{ $d->no_transaksi }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning text-darkblue">
                            <i class="far fa-eye"> Detail</i></a>
                        <a href="#" class="btn btn-sm bg-success">
                            <i class="fas fa-edit"> Edit</i>
                        </a>

                        <form method="POST" action="{{ route('peminjam.destroy', $d->id) }}" class="d-inline">
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
