@extends('layouts.template')

@section('content')
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header">
                <h3>Data Point</h3>
            </div>
            <div class="card-body">
                <table class ="table table-bordered table-striped" id="example">
                    <thead>
                        <tr style="align-content: center">
                            <th style="align-content: center">No</th>
                            <th style="align-content: center">Nama</th>
                            <th style="align-content: center">Deskripsi</th>
                            <th style="align-content: center">Alamat</th>
                            <th style="align-content: center">Rate</th>
                            <th style="align-content: center">Jam Buka</th>
                            <th style="align-content: center">No Telpon</th>
                            <th style="align-content: center">Social Media</th>
                            <th style="align-content: center">Gambar</th>
                            <th style="align-content: center">Geometry</th>
                            <th style="align-content: center">Created at</th>
                        </tr>


                    </thead>
                </div>
                    <tbody>
                        @php
                        $no = 1 @endphp
                        @foreach ($points as $p)
                            @php
                                $geometry = json_decode($p->geom);
                            @endphp
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->deskripsi }}</td>
                                <td>{{ $p->Description }}</td>
                                <td>{{ $p->rating }}</td>
                                <td>{{ $p->jambuka }}</td>
                                <td>{{ $p->notelpon }}</td>
                                <td>{{ $p->socialmedia }}</td>
                                <td>
                                    <img src = "{{ asset('storage/images/' . $p->image) }}" alt="" width="200">
                                </td>
                                <td>{{ $geometry->coordinates[1] . ', ' . $geometry->coordinates[0] }}
                                </td>
                                <td>{{ date_format($p->created_at, 'D, d M Y, Y, H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection
@section('script')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#example');
    </script>
@endsection
