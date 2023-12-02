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
                        <th>No</th>
                        <th>ALTERNATIF</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alt as $no => $a)
                    <tr>
                        <td>{{$no+=1}}</td>
                        <td>{{$a->nama}}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{url('/alternatif/'.$a->id.'/edit')}}" class="btn btn-sm btn-warning">Edit</a>
                            <form method="POST"action="{{url('/alternatif/'.$a->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger ml-2">
                                       Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                <tbody>
            </table>
        </div>
    </div>
</section>
@endsection
