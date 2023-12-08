@extends('layouts.template')

@section('content')
    <!-- Default Box-->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Data Alternatif </h3>
                <br>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div>
                    <a href="{{route('alternatif.create')}}" class='btn btn-outline-success'>
                        <span class='fa fa-plus'></span> Tambah Alternatif
                    </a>
                </div>
                <br>
                <table id="mytable" class="display nowrap table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                                @foreach ($kriteriabobot as $c)
                                    <th>{{$c->nama}}</th>
                                @endforeach
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatif as $a)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$a->nama}}</td>
                                @foreach ($kriteriabobot as $k)
                                @php
                                // Menggunakan method first() untuk mendapatkan objek pertama yang cocok
                                    $s = $scores->where('ida', $a->id)->where('idk', $k->id)->first();
                                @endphp
                                <td>{{ $s ? $s->value : '' }}</td>
                                @endforeach
                            <td>
                                <form action="{{ route('alternatif.destroy',$a->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <span data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                    <a href="{{ route('alternatif.edit',$a->id) }}"
                                        class="btn btn-primary"><span class="fa fa-edit"></span>
                                    </a>
                                </span>
                                <span data-toggle="tooltip" data-placement="bottom" title="Hapus Data">
                                    <button type="submit" class="btn btn-danger">
                                        <span class="fa fa-trash-alt"></span>
                                    </button>
                                </span>
                                </form>
                        </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection