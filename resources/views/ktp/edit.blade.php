<x-app-layout>

    <x-slot name="header">
        <h2 class="h4">Edit Data KTP</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('ktp.update',$data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" value="{{ $data->nama }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3">{{ $data->alamat }}</textarea>
                    </div>
                    <button class="btn btn-primary">
                        Update
                    </button>
                    <a href="{{ route('ktp.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>