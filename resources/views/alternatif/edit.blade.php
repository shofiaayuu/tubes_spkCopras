@extends('layouts.template')

@section('content')
<section class="content">

    <!-- Default Box-->
    <div class="card">
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
          <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h3> Identitas Alternatif </h3>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="nama">Kode</label>
                  <div class="input-group">
                    <input id="kode" type="text" class="form-control" name="kode" value="{{ $alternatif->kode }}" required readonly>
                  </div>
              </div>
              <div class="form-group col-md-3">
                <label for="nama">Nama</label>
                  <div class="input-group">
                    <input id="nama" type="text" class="form-control" name="nama" value="{{ $alternatif->nama }}" required>
                  </div>
              </div>
            </div>
            <h3> Form Penilaian </h3>
            <hr>
            <div class="form-row">
              @foreach ($kriteriabobot as $key => $k)
                <div class="form-group col-md-2 mr-4">
                  <label for="value[{{ $k->id }}]">{{ $k->nama }}</label>
                    <select class="form-control" id="value[{{ $k->id }}]" name="value[{{ $k->id }}]">
                      @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ isset($alternatifskor[$key]) && $i == $alternatifskor[$key]->value ? 'selected' : '' }}>{{ $i }}</option>
                      @endfor
                    </select>
                </div>
              @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
            <a href="{{ route('alternatif.index') }}" class="btn btn-secondary">Kembali</a>
          </form>
        </div>
    </div>
</section>
@endsection
