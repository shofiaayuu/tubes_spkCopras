@extends('layouts.template')

@section('content')
    <section class="content">

        <!-- Default Box-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Data Alternatif </h3>
                <br>
            </div>
            <div class="card-body">
                <a href="{{url('/alternatif/create')}}" class="btn btn-sm btn-success my-2">
                    Tambah Data
                </a>
                <table class="table table-bordered table-striped text-center mx-auto">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>KODE ALTERNATIF</th>
                            <th>NAMA</th>
                            @foreach ($kriteria as $krt)
                            <th>C{{ $loop->iteration }}</th>
                            @endforeach
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alt as $no => $item)
                                <tr>
                                    <td>{{$no+=1}}</td>
                                    <td>{{$item->kode}}</td>
                                    <td>{{ $item->nama}}</td>
                                    @foreach ($kriteria as $krt)
                                        <td>
                                            @php
                                                $ak = $alternatifKriteriaGrouped[$item->id][$krt->id] ?? null;
                                            @endphp

                                            @if ($ak)
                                                {{ $ak[0]->value }}
                                            @endif
                                        </td>
                                    @endforeach

                                    <td>
                                        <button data-toggle="modal" data-target="#inputNilai"
                                            onclick='setAlternatif(@json($item))' class="btn btn-warning">Input
                                            Nilai</button>
                                    </td>
                                </tr>
                            @endforeach
                    <tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="inputNilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="namaAlternatif"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('alternatif_kriteria') }}" method="POST">
                            @csrf
                            <input name="id_alternatif" id="idAlternatif" type="hidden">
                            @foreach ($kriteria as $krt)
                                <div class="form-group">
                                    <label for="nama">{{ $krt->nama }}</label>
                                    <select name="value[]" id="idKriteria" class="form-control">
                                        @foreach ($subKriteria as $sk)
                                            @if ($sk->id_kriteria == $krt->id)
                                                <option value="{{ $sk->value }}">{{ $sk->range_kriteria }}</option>
                                            @endif
                                        @endforeach
                                        <input name="id[]" id="idKriteria" type="hidden"
                                            value="{{ $krt->id }}">
                                        {{-- <input type="text" class="form-control" id="nama"
                                        placeholder="Masukkan nama alternatif" name="value[]"> --}}
                                </div>
                            @endforeach
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let alternatif;

        function setAlternatif(newAlternatif) {
            alternatif = newAlternatif;
            console.log(alternatif);
            document.getElementById('namaAlternatif').innerHTML = alternatif.nama;
            document.getElementById('idAlternatif').value = alternatif.id;
        }
    </script>

    <style>
        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-table th,
        .custom-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
    </style>



@endsection
