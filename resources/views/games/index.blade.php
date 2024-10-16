@extends('layouts.administrator.app')

@push('page-css')
@endpush

@section('content')
    <div class="app-academy">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between flex-wrap gap-3">
                <div class="card-title mb-0 me-1">
                    <h5 class="mb-1">Daftar Game</h5>
                    <p class="text-muted mb-0">Berikut Daftar Game Dan Status Server API.</p>
                </div>
                @role('admin')
                    <div class="d-flex justify-content-md-end align-items-center flex-wrap gap-3">
                        <a href="{{ route('games.create') }}" class="btn btn-success"><i class="fa-solid fa-plus me-2"></i>
                            Tambah
                            game</a>
                    </div>
                @endrole
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    @foreach ($games as $item)
                        <div class="col-sm-6 col-lg-3 mb-3">
                            <div class="card h-100 border shadow-none">
                                <div class="rounded-2 mb-3 text-center">
                                    <a href="#"><img class="img-thumbnail"
                                            src="{{ asset('assets/img/games/' . $item->picture) }}"
                                            alt="{{ $item->name }}" style="width: 100%; height: 250px;" /></a>
                                </div>
                                <div class="card-body pt-2" style="padding-left: 10px; padding-right: 10px;">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span
                                            class="badge {{ $item->status === 'Normal' ? 'bg-success' : ($item->status === 'Gangguan' ? 'bg-warning' : 'bg-danger') }}">{{ $item->status }}</span>
                                        <span class="text-muted">({{ $item->histories_count }}x Digunakan)</span>
                                    </div>
                                    <a href="#" class="h5">{{ $item->name }}</a>
                                    <p class="mt-2">{{ $item->description }}
                                    </p>
                                    <p class="d-flex align-items-center"><i class="ti ti-clock mt-n1 me-2"></i>Updated
                                        {{ $item->updated_at->diffForHumans() }}</p>
                                    @role('admin')
                                        <div class="row">
                                            <div class="col-6">
                                                <button class="w-100 btn btn-warning">Edit</button>
                                            </div>
                                            <div class="col-6">
                                                <button class="w-100 btn btn-danger">Hapus</button>
                                            </div>
                                        </div>
                                    @endrole
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-center">
                    <ul class="pagination">
                        <li class="page-item prev">
                            <a class="page-link" href="javascript:void(0);"><i
                                    class="ti ti-chevron-left ti-xs scaleX-n1-rtl"></i></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="javascript:void(0);">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">5</a>
                        </li>
                        <li class="page-item next">
                            <a class="page-link" href="javascript:void(0);"><i
                                    class="ti ti-chevron-right ti-xs scaleX-n1-rtl"></i></a>
                        </li>
                    </ul>
                </nav> --}}
            </div>
        </div>
    </div>
@endsection

@push('page-js')
@endpush
