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
          <form method="POST" action="{{ $url_form }}">
            @csrf
            {!!(isset($alt))? method_field('PUT') : '' !!}


            <div class="form-group">
              <label>Nama</label>
              <input class="form-control @error('nama') is-invalid @enderror" value="{{ isset($alt)? $alt->nama :old('nama') }}" name="nama" type="text"/>
              @error('nama')
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
