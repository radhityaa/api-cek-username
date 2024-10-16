@extends('layouts.administrator.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Tambah Game</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="name" class="form-label">Nama Game</label>
                    <input type="text" class="form-control @error('name') invalid @enderror" id="name" name="name"
                        value="{{ old('name') }}" placeholder="Nama Game" required>
                    @error('name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control @error('status') invalid @enderror" required>
                        <option value="" selected disabled>--Pilih Status--</option>
                        <option value="Normal">Normal</option>
                        <option value="Gangguan">Gangguan</option>
                        <option value="Tutup">Tutup</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="form-label">Keterangan (Opsional)</label>
                    <textarea name="description" id="description" class="form-control @error('description') invalid @enderror"
                        cols="10" rows="10" placeholder="Keterangan (Opsional)">API Keadaan Normal, Silahkan Gunakan Dengan Bijak</textarea>
                    @error('description')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="picture" class="form-label">Gambar</label>
                    <input type="file" class="form-control @error('picture') invalid @enderror" id="picture"
                        name="picture" required>
                    @error('picture')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-success btn-save">Simpan</button>
                    <a href="{{ route('games.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
