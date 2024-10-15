@extends('layouts.administrator.app')

@push('page-css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endpush

@section('content')
    <div class="col-lg-6 mb-2">
        <div class="card">
            <div class="card-header">
                <h5>Setting API</h5>
            </div>
            <div class="card-body">
                <div>
                    <form action="" method="POST" id="form-generate">
                        <div class="mb-4">
                            <label for="api_key" class="form-label">API Key</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="api_key" name="api_key"
                                    value="{{ Auth::user()->api_key }}" disabled>
                                <button class="btn btn-outline-primary waves-effect" type="button" id="apiKeyCopy"><i
                                        class="fa-regular fa-copy"></i></button>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="api_id" class="form-label">API ID</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="api_id" name="api_id"
                                    value="{{ Auth::user()->api_id }}" disabled>
                                <button class="btn btn-outline-primary waves-effect" type="button" id="apiIdCopy"><i
                                        class="fa-regular fa-copy"></i></button>
                            </div>
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-success waves-effect waves-light btn-generate"
                                id="generate" name="generate">
                                <span class="ti-xs ti ti-arrows-shuffle me-1"></span>Generate
                            </button>
                            <x-button-loading />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-2">
        <div class="card">
            <div class="card-header">
                <h5>Perhatian!</h5>
            </div>
            <div class="card-body">
                <ul>
                    <li>Demi keamanan akun Anda, Mohon tidak memberikan informasi API Key dan API ID kepada pihak lain.
                    </li>
                    <li>Jika terjadi penyalahgunaan API, akun akan kami banned tanpa sepengetahuan.</li>
                    <li>Semua transaksi pada website ini sudah Ter-Record, gunakan dengan bijak.</li>
                    <li>Terdapat kebocoran API atau data bukan tanggung jawab kami</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('page-js')
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        function generate() {

        }

        $(document).ready(function() {
            $('.btn-generate').removeClass('d-none')
            $('.btn-loading').addClass('d-none')

            $('#form-generate').on('submit', function(e) {
                e.preventDefault()

                Swal.fire({
                    title: 'Apakah Kamu Yakin?',
                    text: "API Key Dan API ID akan digenerate ulang, yang sebelumnya tidak akan bisa digunakan kembali",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Generate!',
                    customClass: {
                        confirmButton: 'btn btn-danger me-3 waves-effect waves-light',
                        cancelButton: 'btn btn-label-secondary waves-effect waves-light'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        $('.btn-generate').addClass('d-none')
                        $('.btn-loading').removeClass('d-none')

                        $.ajax({
                            url: "{{ route('api.generate') }}",
                            method: "POST",
                            dataType: "json",
                            success: function(res) {
                                $('#api_key').val(res.data.api_key)
                                $('#api_id').val(res.data.api_id)

                                Swal.fire({
                                    title: 'Berhasil',
                                    icon: 'success',
                                    text: res.message,
                                    showConfirmButton: false,
                                    timer: 1500,
                                    customClass: {
                                        confirmButton: 'btn btn-primary waves-effect waves-light'
                                    },
                                    buttonsStyling: false
                                });
                            },
                            error: function(err) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: err.responseJSON.message,
                                    icon: 'error',
                                    customClass: {
                                        confirmButton: 'btn btn-primary waves-effect waves-light'
                                    },
                                    buttonsStyling: false
                                });
                            },
                            complete: function() {
                                $('.btn-generate').removeClass('d-none')
                                $('.btn-loading').addClass('d-none')
                            }
                        })
                    }
                })
            })

            $('#apiKeyCopy').on('click', function() {
                var codeEl = $('#api_key').val()

                // Buat elemen textarea sementara untuk menyalin teks
                var $tempInput = $('<textarea>');
                $tempInput.val(codeEl).appendTo('body').select();

                // Salin teks ke clipboard
                document.execCommand('copy');

                // Hapus elemen textarea sementara
                $tempInput.remove();

                // Opsional: Tampilkan pesan konfirmasi atau ubah tampilan tombol
                Swal.fire({
                    title: 'Berhasil',
                    icon: 'success',
                    text: 'API Key Berhasil Di Copy!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: {
                        confirmButton: 'btn btn-primary waves-effect waves-light'
                    },
                    buttonsStyling: false
                });
            })

            $('#apiIdCopy').on('click', function() {
                var codeEl = $('#api_id').val()

                // Buat elemen textarea sementara untuk menyalin teks
                var $tempInput = $('<textarea>');
                $tempInput.val(codeEl).appendTo('body').select();

                // Salin teks ke clipboard
                document.execCommand('copy');

                // Hapus elemen textarea sementara
                $tempInput.remove();

                // Opsional: Tampilkan pesan konfirmasi atau ubah tampilan tombol
                Swal.fire({
                    title: 'Berhasil',
                    icon: 'success',
                    text: 'API ID Berhasil Di Copy!',
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: {
                        confirmButton: 'btn btn-primary waves-effect waves-light'
                    },
                    buttonsStyling: false
                });
            })
        })
    </script>
@endpush
