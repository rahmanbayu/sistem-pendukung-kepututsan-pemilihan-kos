@extends('layouts.app')

@section('title')
    Data
@endsection

@section('content')
<section class="input-data">
  <div class="container mt-3">
    <div class="text-center">
      <h4>Masukan Data Kos</h4>
    </div>

    <form action="{{ route('cookies.set') }}" method="post">
      @csrf

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
        @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{ old('harga') }}">
            @error('harga') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="jarak">Jarak</label>
            <input type="number" class="form-control @error('jarak') is-invalid @enderror" name="jarak" id="jarak" value="{{ old('jarak') }}">
            @error('jarak') <span class="invalid-feedback">{{ $message }}</span> @enderror
          </div>
        </div>
      </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="fasilitas">Fasilitas</label>
          <select class="form-control @error('fasilitas') is-invalid @enderror" name="fasilitas" id="fasilitas">
            <option></option>
            <option value="0" {{ old('fasilitas') == '0' ? 'selected' : '' }}>0 Fasilitas</option>
            <option value="1-2" {{ old('fasilitas') == '1-2' ? 'selected' : '' }}>1-2 Fasilitas</option>
            <option value="3-4" {{ old('fasilitas') == '3-4' ? 'selected' : '' }}>3-4 Fasilitas</option>
            <option value="5-6" {{ old('fasilitas') == '5-6' ? 'selected': '' }}>5-6 Fasilitas</option>
            <option value=">6" {{ old('fasilitas') == '>6' ? 'selected' : '' }}>>6 Fasilitas</option>
          </select>
          @error('fasilitas') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="luas">luas</label>
          <select class="form-control @error('luas') is-invalid @enderror" name="luas" id="luas">
            <option></option>
            <option value="3x3" {{ old('luas') == '3x3' ? 'selected' : '' }}>3x3</option>
            <option value="4x4" {{ old('luas') == '4x4' ? 'selected' : '' }}>4x4</option>
            <option value="5x5" {{ old('luas') == '5x5' ? 'selected' : '' }}>5x5</option>
            <option value="6x6" {{ old('luas') == '6x6' ? 'selected' : '' }}>6x6</option>
            <option value="7x7" {{ old('luas') == '7x7' ? 'selected' : '' }}>7x7</option>
          </select>
          @error('luas') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </div>

    </form>

  </div>
  <hr>
</section>


<section class="data-kos mt-4">
  <div class="container">
    <div class="text-center mb-4">
      <h4>Data Kos</h4>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Harga</th>
          <th>Jarak</th>
          <th>Fasilitas</th>
          <th>Luas</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($datakos as $key => $kos)
        <tr>
          <td>{{ $kos->name }}</td>
          <td>Rp {{ number_format($kos->harga) }}</td>
          <td>{{ $kos->jarak }} m</td>
          <td>{{ $kos->fasilitas }} Fasilitas</td>
          <td>{{ $kos->luas }}</td>
          <td width="25%">
            <ul class="list-niline">
              <li class="list-inline-item">
                <a href="{{ route('data.edit', $key) }}" class="btn btn-success btn-sm">Edit</a>
              </li>
              <li class="list-inline-item">
                <form action="{{ route('cookies.delete', $key) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </li>
            </ul>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <hr>
</section>


<section class="ranking-kos mt-4">
  <div class="container">
    <div class="text-center mb-4">
      <h4>Ranking Kos</h4>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Nilai</th>
          <th>Peringkat</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td width="33%">Kaswari</td>
          <td width="33%">0.3434534634</td>
          <td width="33%">Peringkat 1</td>
        </tr>
      </tbody>
    </table>
  </div>
</section>
@endsection

@push('custom-css')
<style>
  .mt-70 {
    margin-top: 70px;
  }

  .footer {

    width: 100%;
    color: white;
    margin-top: 100px;
  }
</style>
@endpush