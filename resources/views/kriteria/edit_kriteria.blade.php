@extends('layouts.template')

@section('content')
<section class="content">

    <!-- Default Box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> Edit Data Kriteria </h3>
            <br>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ $url_form }}">
            @csrf
            {!!(isset($kr))? method_field('PUT') : '' !!}

            <div class="form-group">
              <label>Kode</label>
              <input class="form-control @error('kode') is-invalid @enderror" value="{{ isset($kr)? $kr->kode : old('kode') }}" name="kode" type="text" readonly />
              @error('kode')
                <span class="error invalid-feedback">{{ $message }} </span>
              @enderror
            </div>

            <div class="form-group">
              <label>Nama</label>
              <input class="form-control @error('nama') is-invalid @enderror" value="{{ isset($kr)? $kr->nama :old('nama') }}" name="nama" type="text"/>
              @error('nama')
                <span class="error invalid-feedback">{{ $message }} </span>
              @enderror
            </div>

            <div class="form-group">
              <label>Bobot</label>
              <input class="form-control @error('bobot') is-invalid @enderror" value="{{ isset($kr)? $kr->bobot :old('bobot') }}" name="bobot" type="text"/>
              @error('bobot')
                <span class="error invalid-feedback">{{ $message }} </span>
              @enderror
            </div>

            <div class="form-group">
              <label>Jenis</label> </br>
                <select name="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror">
                    <option value="Benefit">Benefit</option>
                    <option value="Cost">Cost</option>
                </select>
              @error('bobot')
                <span class="error invalid-feedback">{{ $message }} </span>
              @enderror
            </div>

            <div class="form-group">
              <button class="btn btn-sm btn-primary">Simpan</button>
            </div>
          </form>
        </div>
    </div>
</section>
@endsection
