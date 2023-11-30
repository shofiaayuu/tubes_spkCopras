@extends('layouts.template')

@section('content')
<section class="content">

    <!-- Default Box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Data Kriteria </h3>
            <br>
        </div> 
        <div class="card-body"> 
            <a href="{{url('/kriteria/create')}}" class="btn btn-sm btn-success my-2">
                Tambah Data
            </a>
            <?
                sumBobot;
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>KODE</th>
                        <th>KRITERIA</th>
                        <th>BOBOT</th>
                        <th>JENIS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sumBobot = 0; ?>
                    @foreach($kr as $no => $k)
                    <tr>
                        <td>{{$no+=1}}</td>
                        <td>{{$k->kode}}</td>
                        <td>{{$k->nama}}</td> 
                        <?php $sumBobot += $k->bobot; ?>
                        <td>{{$k->bobot}}</td>
                        <td>{{$k->jenis}}</td>
                        <td class="row">
                            <a href="{{url('/kriteria/'.$k->id.'/edit')}}" class="btn btn-sm btn-warning">Edit</a>
                            <form method="POST"action="{{url('/kriteria/'.$k->id)}}">
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
                <tfoot>
                    <tr>
                        <td colspan="3">Total Bobot</td>
                        <td>{{$sumBobot}}</td>
                        <td colspan="2"></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</section>
@endsection