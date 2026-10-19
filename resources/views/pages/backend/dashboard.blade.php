@extends('layouts.back')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Dashboard PPID</h1>

        <div class="row">
            @foreach ($stat as $label => $jumlah)
                <div class="col-md-4 col-lg-2 mb-3">
                    <div class="card shadow">
                        <div class="card-body">
                            <h6 class="text-muted">{{ $label }}</h6>
                            <h3 class="mb-0">{{ $jumlah }}</h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="text-muted">Pengunjung hari ini</h6>
                        <h3 class="mb-0">{{ $todayVisitors }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="text-muted">Total pengunjung</h6>
                        <h3 class="mb-0">{{ $totalVisitors }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
