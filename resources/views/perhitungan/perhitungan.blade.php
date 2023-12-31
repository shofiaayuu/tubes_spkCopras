@extends('layouts.template')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Perhitungan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <style type="text/css">
        .satu {
        font-size: 12px;
        }
        .dua {
        font-size: 20px;
        }
        .tiga {
        font-size: 8px;
        }
     </style>
    <!-- Menampilkan Bobot -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Bobot Kriteria</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kriteria</th>
                            <th>Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kriteria as $k)
                            <tr>
                                <td>{{ $k->nama }}</td>
                                <td>{{ $k->bobot }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="content">
        <!-- Tabel Normalisasi Matriks -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Normalisasi Matriks</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach($kriteria as $k)
                                <th>{{ $k->nama }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alternatif as $a)
                            <tr>
                                <td>{{ $a->nama }}</td>
                                @foreach($kriteria as $k)
                                    <td>{{ number_format($nm[$a->id][$k->id], 3) }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="content">
        <!-- Tabel Normalisasi Matriks Terbobot -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Normalisasi Matriks Terbobot</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            @foreach($kriteria as $k)
                                <th>{{ $k->nama }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alternatif as $a)
                            <tr>
                                <td>{{ $a->nama }}</td>
                                @foreach($kriteria as $k)
                                    <td>{{ number_format($nmt[$a->id][$k->id], 3) }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="content">
        <!-- Tabel Aggregated Values -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hitung Nilai Maksimal dan Minimal Indeks</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            <th>Positive Aggregated Value</th>
                            <th>Negative Aggregated Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alternatif as $a)
                            <tr>
                                <td>{{ $a->nama }}</td>
                                <td>{{ number_format($sumBenefit[$a->id], 3) }}</td>
                                <td>{{ number_format($sumCost[$a->id], 3) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>


    <section class="content">
        <!-- Tabel Hitung Bobot Alternatif -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hitung Bobot Alternatif</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered custom-table">
                    <thead>
                        <tr>
                            <th>Alternatif</th>
                            <th> 1 / S-i (Atribut Cost) </th>
                            <th> S-i * Total Atribut Cost</th>
                            <th> Qi </th>
                            <th> Ui </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alternatif as $a)
                            <tr>
                                <td>{{ $a->nama }}</td>
                                <td>{{ number_format($sumCostInverse[$a->id], 3) }}</td>
                                <td>{{ number_format($v[$a->id], 3) }}</td>
                                <td>{{ number_format($v2[$a->id], 3) }}</td>
                                <td>{{ number_format($utilitas[$a->id], 3) }}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <style>
        .card {
            margin-top: 20px;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-table th, .custom-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
    </style>

    <script></script>
@endsection

@push('css')
@endpush

@push('scripts')
@endpush
