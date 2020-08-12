@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <!-- Page Heading -->
    
    <div class="card">
      <div class="card-body">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Criteria</h1>
        </div>
        @include('includes.alert')
        
        <section class="form-input-criteria">
          <form action="{{ route('criteria.update') }}" method="post">
            @csrf
            <div class="container">
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <select class="form-control" name="baris" id="baris">
                      <option value="harga">Baris Harga</option>
                      <option value="jarak">Baris Jarak</option>
                      <option value="fasilitas">Baris Fasilitas</option>
                      <option value="luas">Baris Luas</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <select class="form-control" name="nilai" id="nilai">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <select class="form-control" name="kolom" id="kolom">
                      <option value="harga">Kolom Harga</option>
                      <option value="jarak">Kolom Jarak</option>
                      <option value="fasilitas">Kolom Fasilitas</option>
                      <option value="luas">Kolom Luas</option>
                    </select>
                  </div>
                </div>
              </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
            </div>
          </form>
        </section>

        <section class="table-criteria mt-3">
          <div class="d-flex justify-content-end">
            <p>Edit Oleh: {{ ucwords($criteria->admin->name) }}</p>
          </div>
          <table class="table table-bordered table-inverse table-responsive-md">
            <thead class="thead-inverse">
              <tr>
                <th width="20%"></th>
                <th width="20%">Harga</th>
                <th width="20%">Jarak</th>
                <th width="20%">Fasilitas</th>
                <th width="20%">Luas</th>
              </tr>
              </thead>
              <tbody>
                <tr>
                  <th>Harga</th>
                  <td>1</td>
                  <td>{{ $criteria->harga_jarak }}</td>
                  <td>{{ $criteria->harga_fasilitas }}</td>
                  <td>{{ $criteria->harga_luas }}</td>
                </tr>
                <tr>
                  <th>Jarak</th>
                  <td>{{ $criteria->jarak_harga }}</td>
                  <td>1</td>
                  <td>{{ $criteria->jarak_fasilitas }}</td>
                  <td>{{ $criteria->jarak_luas }}</td>
                </tr>
                <tr>
                  <th>Fasilitas</th>
                  <td>{{ $criteria->fasilitas_harga }}</td>
                  <td>{{ $criteria->fasilitas_jarak }}</td>
                  <td>1</td>
                  <td>{{ $criteria->fasilitas_luas }}</td>
                </tr>
                <tr>
                  <th>Luas</th>
                  <td>{{ $criteria->luas_harga }}</td>
                  <td>{{ $criteria->luas_jarak }}</td>
                  <td>{{ $criteria->luas_fasilitas }}</td>
                  <td>1</td>
                </tr>
                <tr>
                  <th>Jumlah</th>
                  <th>{{ $jumlahkolom['harga'] }}</th>
                  <th>{{ $jumlahkolom['jarak'] }}</th>
                  <th>{{ $jumlahkolom['fasilitas'] }}</th>
                  <th>{{ $jumlahkolom['luas'] }}</th>
                </tr>
              </tbody>
          </table>
        </section>

        <section class="table-normalisasi">
          <div class="text-center">
            <p class="font-weight-bold">Normalisasi Matrix</p>
          </div>

          <table class="table table-bordered table-inverse table-responsive-md">
            <thead class="thead-inverse">
              <tr>
                <th width="14.28%"></th>
                <th width="14.28%">Harga</th>
                <th width="14.28%">Jarak</th>
                <th width="14.28%">Fasilitas</th>
                <th width="14.28%">Luas</th>
                <th width="14.28%">Jumlah</th>
                <th width="14.28%">Prioritas</th>
              </tr>
              </thead>
              <tbody>

                <tr>
                  <th>Harga</th>
                  <td>{{ $normalisasi['harga_harga'] }}</td>
                  <td>{{ $normalisasi['harga_jarak'] }}</td>
                  <td>{{ $normalisasi['harga_fasilitas'] }}</td>
                  <td>{{ $normalisasi['harga_luas'] }}</td>
                  <th>{{ $jumlahbaris['harga'] }}</th>
                  <th>{{ $prioritas['harga'] }}</th>
                </tr>

                <tr>
                  <th>Jarak</th>
                  <td>{{ $normalisasi['jarak_harga'] }}</td>
                  <td>{{ $normalisasi['jarak_jarak'] }}</td>
                  <td>{{ $normalisasi['jarak_fasilitas'] }}</td>
                  <td>{{ $normalisasi['jarak_luas'] }}</td>
                  <th>{{ $jumlahbaris['jarak'] }}</th>
                  <th>{{ $prioritas['jarak'] }}</th>
                </tr>

                <tr>
                  <th>Fasilitas</th>
                  <td>{{ $normalisasi['fasilitas_harga'] }}</td>
                  <td>{{ $normalisasi['fasilitas_jarak'] }}</td>
                  <td>{{ $normalisasi['fasilitas_fasilitas'] }}</td>
                  <td>{{ $normalisasi['fasilitas_luas'] }}</td>
                  <th>{{ $jumlahbaris['fasilitas'] }}</th>
                  <th>{{ $prioritas['fasilitas'] }}</th>
                </tr>

                <tr>
                  <th>Luas</th>
                  <td>{{ $normalisasi['luas_harga'] }}</td>
                  <td>{{ $normalisasi['luas_jarak'] }}</td>
                  <td>{{ $normalisasi['luas_fasilitas'] }}</td>
                  <td>{{ $normalisasi['luas_luas'] }}</td>
                  <th>{{ $jumlahbaris['luas'] }}</th>
                  <th>{{ $prioritas['luas'] }}</th>
                </tr>
              </tbody>
          </table>

        </section>

        <section class="reports">
          <div class="text-center">
            <p class="font-weight-bold">Keterangan</p>
          </div>
          <table class="table table-bordered table-inverse">
              <tbody>
                <tr>
                  <th>Lamda Max</th>
                  <td>{{ $reports['lamda'] }}</td>
                </tr>
                <tr>
                  <th>Consistency Index</th>
                  <td>{{ $reports['ci'] }}</td>
                </tr>
                <tr>
                  <th>Consistency Ratio</th>
                  <td class="{{ $reports['cr'] < 0.1 ? 'text-success' : 'text-danger' }}">{{ $reports['cr'] }}</td>
                </tr>
              </tbody>
          </table>
        </section>

      </div>
    </div>
@endsection