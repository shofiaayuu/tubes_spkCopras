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
          @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Ups!</strong> Ada beberapa masalah dengan masukan Anda.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{route('alternatif.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Kode</label>
                                    <div class="input-group">
                                        <input id="kode" type="text" class="form-control" placeholder="Contoh: A01" name="kode" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <div class="input-group">
                                        <input id="nama" type="text" class="form-control" placeholder="Contoh: SV" name="nama" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                                <a href="{{ route('alternatif.index') }}" class="btn btn-secondary">Kembali</a>
                            </form>
        </div>
    </div>
</section>
@endsection
