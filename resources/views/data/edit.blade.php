@extends('layouts.app')

@section('title')
    Edit | {{ $datakos->name }}
@endsection

@section('content')
<section class="content">
  <div class="container">
    <div class="text-center mt-70">
      <h3>Edit Data Kos</h3>
    </div>

    <form action="{{ route('cookies.update', $index) }}" method="post">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $datakos->name }}">
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" name="harga" id="harga" value="{{ $datakos->harga }}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="jarak">Jarak</label>
            <input type="number" class="form-control" name="jarak" id="jarak" value="{{ $datakos->jarak }}">
          </div>
        </div>
      </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="fasilitas">Fasilitas</label>
          <select class="form-control" name="fasilitas" id="fasilitas">
            <option value="0" {{ $datakos->fasilitas == '0' ? 'selected' : '' }}>0 Fasilitas</option>
            <option value="1-2" {{ $datakos->fasilitas == '1-2' ? 'selected' : '' }}>1-2 Fasilitas</option>
            <option value="3-4" {{ $datakos->fasilitas == '3-4' ? 'selected' : '' }}>3-4 Fasilitas</option>
            <option value="5-6" {{ $datakos->fasilitas == '5-6' ? 'selected' : '' }}>5-6 Fasilitas</option>
            <option value=">6" {{ $datakos->fasilitas == '>6' ? 'selected' : '' }}>>6 Fasilitas</option>
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="luas">Luas</label>
          <select class="form-control" name="luas" id="luas">
            <option value="3x3"  {{ $datakos->luas == '3x3' ? 'selected' : '' }}>3x3</option>
            <option value="4x4"  {{ $datakos->luas == '4x4' ? 'selected' : '' }}>4x4</option>
            <option value="5x5"  {{ $datakos->luas == '5x5' ? 'selected' : '' }}>5x5</option>
            <option value="6x6"  {{ $datakos->luas == '6x6' ? 'selected' : '' }}>6x6</option>
            <option value="7x7"  {{ $datakos->luas == '7x7' ? 'selected' : '' }}>7x7</option>
          </select>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>

    </form>


  </div>
</section>
@endsection

@push('custom-css')
<style>
    .mt-70 {
    margin-top: 70px;
    }

    .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    color: white;
    }
</style>
@endpush