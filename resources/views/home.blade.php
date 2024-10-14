@extends('layouts.administrator.app')

@section('content')
    <!-- Statistics -->
    <div class="card mb-4">
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
    <!--/ Statistics -->

    {{-- Contact Person --}}
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h5 class="mb-3">Informasi</h5>
                    <ul>
                        <li>Website ini masih tahap pengembangan.</li>
                        <li>Apabila terdapat bug bisa langsung hubungi admin.</li>
                        <li>Jika ada saran terkait fitur, game dll bisa langsung hubungi admin.</li>
                        <li>gunakan dengan bijak, dilarang spam</li>
                    </ul>
                </div>
                <div class="col-md-6 mb-4">
                    <h5 class="mb-3">Contact Person</h5>
                    <span class="d-block mb-2">
                        <a href="https://www.facebook.com/ramaadit1234567" target="_blank">Facebook</a>
                    </span>
                    <span class="d-block mb-2">
                        <a href="https://wa.me/62895396561111" target="_blank">Whatsapp</a>
                    </span>
                    <span class="d-block mb-2">
                        <a href="https://www.instagram.com/radhityas_" target="_blank">Instagram</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    {{-- / Contact Person --}}
@endsection
