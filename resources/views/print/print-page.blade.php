@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Peminjaman</title>
</head>
<body>
    <div id="printable" align="center">
        <h1 class="printable mb-2">Data Peminjaman</h1>
        <h3>Book's Corner</h3><hr>
    </div><div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    {{-- <th>No.</th> --}}
                    <th>Nama Anggota</th>
                    <th>Nama Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $key => $detail)
                    <tr>
                        <td>{{$detail->nama_anggota}}</td>
                        <td>{{$detail->nama_buku}}</td>
                        <td>{{$detail->tanggal_pinjam}}</td>
                        <td>{{$detail->tanggal_pengembalian}}</td>
                        <td>{{$detail->keterangan}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <button onclick="window.print()">Print</button>
</body>
</html>
@endsection
