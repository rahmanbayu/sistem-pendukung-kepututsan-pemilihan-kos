@extends('layouts.admin')

@section('title')
    Subcriteria
@endsection

@section('content')

<div class="card">
  <div class="card-body">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Subcriteria {{$titleandtable[5] }}</h1>
    </div>
    @include('includes.alert')
        
  <section class="subcriteria-table-form">
    <div class="d-flex justify-content-end">
      <p>Edit Oleh: {{ $subcriteria->admin->name }}</p>
    </div>
    <table class="table table-bordered table-inverse table-responsive-md">
      <thead class="thead-inverse">
        <tr>
          <th width="16.66%"></th>
          <th width="16.66%">{{ $titleandtable[0] }}</th>
          <th width="16.66%">{{ $titleandtable[1] }}</th>
          <th width="16.66%">{{ $titleandtable[2] }}</th>
          <th width="16.66%">{{ $titleandtable[3] }}</th>
          <th width="16.66%">{{ $titleandtable[4] }}</th>
        </tr>
        </thead>
        <tbody>
          <form action="{{ route('subcriteria.update', $subcriteria) }}" id="formSubcriteriaUpdate" method="post">
            @csrf
            @method('PUT')
            <tr>
              <th>{{ $titleandtable[0] }}</th>
              <td>1</td>
              <td>
                <div class="form-group">
                  <select class="form-control" name="sbaik_baik" id="sbaik_baik">
                    <option {{ $subcriteria->sbaik_baik == '1' ? 'selected' : '' }}>1</option>
                    <option {{ $subcriteria->sbaik_baik == '2' ? 'selected' : '' }}>2</option>
                    <option {{ $subcriteria->sbaik_baik == '3' ? 'selected' : '' }}>3</option>
                    <option {{ $subcriteria->sbaik_baik == '4' ? 'selected' : '' }}>4</option>
                    <option {{ $subcriteria->sbaik_baik == '5' ? 'selected' : '' }}>5</option>
                    <option {{ $subcriteria->sbaik_baik == '6' ? 'selected' : '' }}>6</option>
                    <option {{ $subcriteria->sbaik_baik == '7' ? 'selected' : '' }}>7</option>
                    <option {{ $subcriteria->sbaik_baik == '8' ? 'selected' : '' }}>8</option>
                    <option {{ $subcriteria->sbaik_baik == '9' ? 'selected' : '' }}>9</option>
                  </select>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <select class="form-control" name="sbaik_sedang" id="sbaik_sedang">
                    <option {{ $subcriteria->sbaik_sedang == '1' ? 'selected' : '' }}>1</option>
                    <option {{ $subcriteria->sbaik_sedang == '2' ? 'selected' : '' }}>2</option>
                    <option {{ $subcriteria->sbaik_sedang == '3' ? 'selected' : '' }}>3</option>
                    <option {{ $subcriteria->sbaik_sedang == '4' ? 'selected' : '' }}>4</option>
                    <option {{ $subcriteria->sbaik_sedang == '5' ? 'selected' : '' }}>5</option>
                    <option {{ $subcriteria->sbaik_sedang == '6' ? 'selected' : '' }}>6</option>
                    <option {{ $subcriteria->sbaik_sedang == '7' ? 'selected' : '' }}>7</option>
                    <option {{ $subcriteria->sbaik_sedang == '8' ? 'selected' : '' }}>8</option>
                    <option {{ $subcriteria->sbaik_sedang == '9' ? 'selected' : '' }}>9</option>
                  </select>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <select class="form-control" name="sbaik_kurang" id="sbaik_kurang">
                    <option {{ $subcriteria->sbaik_kurang == '1' ? 'selected' : '' }}>1</option>
                    <option {{ $subcriteria->sbaik_kurang == '2' ? 'selected' : '' }}>2</option>
                    <option {{ $subcriteria->sbaik_kurang == '3' ? 'selected' : '' }}>3</option>
                    <option {{ $subcriteria->sbaik_kurang == '4' ? 'selected' : '' }}>4</option>
                    <option {{ $subcriteria->sbaik_kurang == '5' ? 'selected' : '' }}>5</option>
                    <option {{ $subcriteria->sbaik_kurang == '6' ? 'selected' : '' }}>6</option>
                    <option {{ $subcriteria->sbaik_kurang == '7' ? 'selected' : '' }}>7</option>
                    <option {{ $subcriteria->sbaik_kurang == '8' ? 'selected' : '' }}>8</option>
                    <option {{ $subcriteria->sbaik_kurang == '9' ? 'selected' : '' }}>9</option>
                  </select>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <select class="form-control" name="sbaik_skurang" id="sbaik_skurang">
                    <option {{ $subcriteria->sbaik_skurang == '1' ? 'selected' : '' }}>1</option>
                    <option {{ $subcriteria->sbaik_skurang == '2' ? 'selected' : '' }}>2</option>
                    <option {{ $subcriteria->sbaik_skurang == '3' ? 'selected' : '' }}>3</option>
                    <option {{ $subcriteria->sbaik_skurang == '4' ? 'selected' : '' }}>4</option>
                    <option {{ $subcriteria->sbaik_skurang == '5' ? 'selected' : '' }}>5</option>
                    <option {{ $subcriteria->sbaik_skurang == '6' ? 'selected' : '' }}>6</option>
                    <option {{ $subcriteria->sbaik_skurang == '7' ? 'selected' : '' }}>7</option>
                    <option {{ $subcriteria->sbaik_skurang == '8' ? 'selected' : '' }}>8</option>
                    <option {{ $subcriteria->sbaik_skurang == '9' ? 'selected' : '' }}>9</option>
                  </select>
                </div>
              </td>
            </tr>
            <tr>
              <th>{{ $titleandtable[1] }}</th>
              <td>{{ $oposite['baik_sbaik'] }}</td>
              <td>1</td>
              <td>
                <div class="form-group">
                  <select class="form-control" name="baik_sedang" id="baik_sedang">
                    <option {{ $subcriteria->baik_sedang == '1' ? 'selected' : '' }}>1</option>
                    <option {{ $subcriteria->baik_sedang == '2' ? 'selected' : '' }}>2</option>
                    <option {{ $subcriteria->baik_sedang == '3' ? 'selected' : '' }}>3</option>
                    <option {{ $subcriteria->baik_sedang == '4' ? 'selected' : '' }}>4</option>
                    <option {{ $subcriteria->baik_sedang == '5' ? 'selected' : '' }}>5</option>
                    <option {{ $subcriteria->baik_sedang == '6' ? 'selected' : '' }}>6</option>
                    <option {{ $subcriteria->baik_sedang == '7' ? 'selected' : '' }}>7</option>
                    <option {{ $subcriteria->baik_sedang == '8' ? 'selected' : '' }}>8</option>
                    <option {{ $subcriteria->baik_sedang == '9' ? 'selected' : '' }}>9</option>
                  </select>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <select class="form-control" name="baik_kurang" id="baik_kurang">
                    <option {{ $subcriteria->baik_kurang == '1' ? 'selected' : '' }}>1</option>
                    <option {{ $subcriteria->baik_kurang == '2' ? 'selected' : '' }}>2</option>
                    <option {{ $subcriteria->baik_kurang == '3' ? 'selected' : '' }}>3</option>
                    <option {{ $subcriteria->baik_kurang == '4' ? 'selected' : '' }}>4</option>
                    <option {{ $subcriteria->baik_kurang == '5' ? 'selected' : '' }}>5</option>
                    <option {{ $subcriteria->baik_kurang == '6' ? 'selected' : '' }}>6</option>
                    <option {{ $subcriteria->baik_kurang == '7' ? 'selected' : '' }}>7</option>
                    <option {{ $subcriteria->baik_kurang == '8' ? 'selected' : '' }}>8</option>
                    <option {{ $subcriteria->baik_kurang == '9' ? 'selected' : '' }}>9</option>
                  </select>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <select class="form-control" name="baik_skurang" id="baik_skurang">
                    <option {{ $subcriteria->baik_skurang == '1' ? 'selected' : '' }}>1</option>
                    <option {{ $subcriteria->baik_skurang == '2' ? 'selected' : '' }}>2</option>
                    <option {{ $subcriteria->baik_skurang == '3' ? 'selected' : '' }}>3</option>
                    <option {{ $subcriteria->baik_skurang == '4' ? 'selected' : '' }}>4</option>
                    <option {{ $subcriteria->baik_skurang == '5' ? 'selected' : '' }}>5</option>
                    <option {{ $subcriteria->baik_skurang == '6' ? 'selected' : '' }}>6</option>
                    <option {{ $subcriteria->baik_skurang == '7' ? 'selected' : '' }}>7</option>
                    <option {{ $subcriteria->baik_skurang == '8' ? 'selected' : '' }}>8</option>
                    <option {{ $subcriteria->baik_skurang == '9' ? 'selected' : '' }}>9</option>
                  </select>
                </div>
              </td>
            </tr>
            <tr>
              <th>{{ $titleandtable[2] }}</th>
              <td>{{ $oposite['sedang_sbaik'] }}</td>
              <td>{{ $oposite['sedang_sbaik'] }}</td>
              <td>1</td>
              <td>
                <div class="form-group">
                  <select class="form-control" name="sedang_kurang" id="sedang_kurang">
                    <option {{ $subcriteria->sedang_kurang == '1' ? 'selected' : '' }}>1</option>
                    <option {{ $subcriteria->sedang_kurang == '2' ? 'selected' : '' }}>2</option>
                    <option {{ $subcriteria->sedang_kurang == '3' ? 'selected' : '' }}>3</option>
                    <option {{ $subcriteria->sedang_kurang == '4' ? 'selected' : '' }}>4</option>
                    <option {{ $subcriteria->sedang_kurang == '5' ? 'selected' : '' }}>5</option>
                    <option {{ $subcriteria->sedang_kurang == '6' ? 'selected' : '' }}>6</option>
                    <option {{ $subcriteria->sedang_kurang == '7' ? 'selected' : '' }}>7</option>
                    <option {{ $subcriteria->sedang_kurang == '8' ? 'selected' : '' }}>8</option>
                    <option {{ $subcriteria->sedang_kurang == '9' ? 'selected' : '' }}>9</option>
                  </select>
                </div>
              </td>
              <td>
                <div class="form-group">
                  <select class="form-control" name="sedang_skurang" id="sedang_skurang">
                    <option {{ $subcriteria->sedang_skurang == '1' ? 'selected' : '' }}>1</option>
                    <option {{ $subcriteria->sedang_skurang == '2' ? 'selected' : '' }}>2</option>
                    <option {{ $subcriteria->sedang_skurang == '3' ? 'selected' : '' }}>3</option>
                    <option {{ $subcriteria->sedang_skurang == '4' ? 'selected' : '' }}>4</option>
                    <option {{ $subcriteria->sedang_skurang == '5' ? 'selected' : '' }}>5</option>
                    <option {{ $subcriteria->sedang_skurang == '6' ? 'selected' : '' }}>6</option>
                    <option {{ $subcriteria->sedang_skurang == '7' ? 'selected' : '' }}>7</option>
                    <option {{ $subcriteria->sedang_skurang == '8' ? 'selected' : '' }}>8</option>
                    <option {{ $subcriteria->sedang_skurang == '9' ? 'selected' : '' }}>9</option>
                  </select>
                </div>
              </td>
            </tr>
            <tr>
              <th>{{ $titleandtable[3] }}</th>
              <td>{{ $oposite['kurang_sbaik'] }}</td>
              <td>{{ $oposite['kurang_sbaik'] }}</td>
              <td>{{ $oposite['kurang_sbaik'] }}</td>
              <td>1</td>
              <td>
                <div class="form-group">
                  <select class="form-control" name="kurang_skurang" id="kurang_skurang">
                    <option {{ $subcriteria->kurang_skurang == '1' ? 'selected' : '' }}>1</option>
                    <option {{ $subcriteria->kurang_skurang == '2' ? 'selected' : '' }}>2</option>
                    <option {{ $subcriteria->kurang_skurang == '3' ? 'selected' : '' }}>3</option>
                    <option {{ $subcriteria->kurang_skurang == '4' ? 'selected' : '' }}>4</option>
                    <option {{ $subcriteria->kurang_skurang == '5' ? 'selected' : '' }}>5</option>
                    <option {{ $subcriteria->kurang_skurang == '6' ? 'selected' : '' }}>6</option>
                    <option {{ $subcriteria->kurang_skurang == '7' ? 'selected' : '' }}>7</option>
                    <option {{ $subcriteria->kurang_skurang == '8' ? 'selected' : '' }}>8</option>
                    <option {{ $subcriteria->kurang_skurang == '9' ? 'selected' : '' }}>9</option>
                  </select>
                </div>
              </td>
            </tr>
            <tr>
              <th>{{ $titleandtable[4] }}</th>
              <td>{{ $oposite['skurang_sbaik'] }}</td>
              <td>{{ $oposite['skurang_baik'] }}</td>
              <td>{{ $oposite['skurang_sedang'] }}</td>
              <td>{{ $oposite['skurang_kurang'] }}</td>
              <td>1</td>
            </tr>
            <tr>
              <th>Jumlah</th>
              <th>{{ $jumlahkolom['sbaik'] }}</th>
              <th>{{ $jumlahkolom['baik'] }}</th>
              <th>{{ $jumlahkolom['sedang'] }}</th>
              <th>{{ $jumlahkolom['kurang'] }}</th>
              <th>{{ $jumlahkolom['skurang'] }}</th>
            </tr>
        </form>
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
          <th width="12.5%"></th>
          <th width="12.5%">{{ $titleandtable[0] }}</th>
          <th width="12.5%">{{ $titleandtable[1] }}</th>
          <th width="12.5%">{{ $titleandtable[2] }}</th>
          <th width="12.5%">{{ $titleandtable[3] }}</th>
          <th width="12.5%">{{ $titleandtable[4] }}</th>
          <th width="12.5%">Jumlah</th>
          <th width="12.5%">Prioritas</th>
        </tr>
        </thead>
        <tbody>
          <tr>
            <th>{{ $titleandtable[0] }}</th>
            <td>{{ $normalisasi['sbaik_sbaik'] }}</td>
            <td>{{ $normalisasi['sbaik_baik'] }}</td>
            <td>{{ $normalisasi['sbaik_sedang'] }}</td>
            <td>{{ $normalisasi['sbaik_kurang'] }}</td>
            <td>{{ $normalisasi['sbaik_skurang'] }}</td>
            <th>{{ $jumlahbaris['sbaik'] }}</th>
            <th>{{ $prioritas['sbaik'] }}</th>
          </tr>
          <tr>
            <th>{{ $titleandtable[1] }}</th>
            <td>{{ $normalisasi['baik_sbaik'] }}</td>
            <td>{{ $normalisasi['baik_baik'] }}</td>
            <td>{{ $normalisasi['baik_sedang'] }}</td>
            <td>{{ $normalisasi['baik_kurang'] }}</td>
            <td>{{ $normalisasi['baik_skurang'] }}</td>
            <th>{{ $jumlahbaris['baik'] }}</th>
            <th>{{ $prioritas['baik'] }}</th>

          </tr>
          <tr>
            <th>{{ $titleandtable[2] }}</th>
            <td>{{ $normalisasi['sedang_sbaik'] }}</td>
            <td>{{ $normalisasi['sedang_baik'] }}</td>
            <td>{{ $normalisasi['sedang_sedang'] }}</td>
            <td>{{ $normalisasi['sedang_kurang'] }}</td>
            <td>{{ $normalisasi['sedang_skurang'] }}</td>
            <th>{{ $jumlahbaris['sedang'] }}</th>
            <th>{{ $prioritas['sedang'] }}</th>
          </tr>
          <tr>
            <th>{{ $titleandtable[3] }}</th>
            <td>{{ $normalisasi['kurang_sbaik'] }}</td>
            <td>{{ $normalisasi['kurang_baik'] }}</td>
            <td>{{ $normalisasi['kurang_sedang'] }}</td>
            <td>{{ $normalisasi['kurang_kurang'] }}</td>
            <td>{{ $normalisasi['kurang_skurang'] }}</td>
            <th>{{ $jumlahbaris['kurang'] }}</th>
            <th>{{ $prioritas['kurang'] }}</th>
          </tr>
          <tr>
            <th>{{ $titleandtable[4] }}</th>
            <td>{{ $normalisasi['skurang_sbaik'] }}</td>
            <td>{{ $normalisasi['skurang_baik'] }}</td>
            <td>{{ $normalisasi['skurang_sedang'] }}</td>
            <td>{{ $normalisasi['skurang_kurang'] }}</td>
            <td>{{ $normalisasi['skurang_skurang'] }}</td>
            <th>{{ $jumlahbaris['skurang'] }}</th>
            <th>{{ $prioritas['skurang'] }}</th>
          </tr>

        </tbody>
    </table>
  </section>

  <section class="table-reports">
    <div class="text-center">
      <p class="font-weight-bold">Keterangan</p>
    </div>
    <table class="table table-bordered">
        <tbody>
          <tr>
            <th>Lambda Max</th>
            <td>{{ $reports['lambdamax'] }}</td>
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

@push('custom-css')
    <style>
      .form-group{
        margin: 0 !important;
        min-width: 100px;
      }
    </style>
@endpush

@push('custom-script')
    <script>
      let form = document.querySelector('#formSubcriteriaUpdate');
      let select = document.getElementsByTagName('select');

      for(let i = 0; i <= select.length; i++){
        select[i].addEventListener('change', function(){
          form.submit();
        });
      }
    </script>
@endpush