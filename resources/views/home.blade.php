@extends('layouts.administrator.app')

@section('content')
    <!-- Statistics -->
    <div class="col-12 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <div class="d-flex justify-content-between mb-3">
                    <h5 class="card-title mb-0">Statistik Penggunaan</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row gy-3">
                    @foreach ($games as $item)
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="badge rounded-pill bg-label-primary me-3 p-2">
                                    <i class="ti ti-device-gamepad-2 ti-sm"></i>
                                </div>
                                <div class="card-info">
                                    <h5 class="mb-0">{{ $item->histories_count }}x</h5>
                                    <small>{{ $item->name }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--/ Statistics -->
@endsection
