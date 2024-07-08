@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detail Peminjaman</title>

        <style>
            /* CSS untuk menyembunyikan tombol saat dicetak */
            @media print {
                #print {
                    display: none !important;
                }

                #back {
                    display: none !important;
                }
            }
        </style>
    </head>

    <body>
        <div id="printable" align="center">
            <h1 class="printable mb-2">Data Peminjaman</h1>
            <h3>Book's Corner</h3>
            <hr>
        </div>
        <div class="table-responsive">
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
                    @foreach ($details as $detail)
                        {{-- @dd($details) --}}
                        <tr>
                            <td>{{ $detail->nama_anggota }}</td>
                            <td>{{ $detail->nama_buku }}</td>
                            <td>{{ $detail->tanggal_pinjam }}</td>
                            <td>{{ $detail->tanggal_pengembalian }}</td>
                            <td>{{ $detail->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <button class="btn btn-primary btn-sm" id="print" onclick="printData()">Print</button>
        <a class="btn btn-danger btn-sm" id="back" href="{{ url()->previous() }}">Back</a>
        <script>
            function printData() {
                // Menyembunyikan tombol cetak
                var printButton = document.getElementById('print');
                var backButton = document.getElementById('back');
                printButton.style.display = 'none';
                backButton.style.display = 'none';
                // Memanggil window.print() untuk menampilkan dialog pencetakan
                window.print();
            }
        </script>
    </body>

    </html>
@endsection
