    @extends('layouts.app')

    @section('title')
        Welcome
    @endsection

    @section('content')
    <section class="content">
        <div class="container">
        <div class="text-center mt-70">
            <h3>Selamat Datang di Sistem Pendukung keputusan <br> Pemilihan kos</h3>
        </div>
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
