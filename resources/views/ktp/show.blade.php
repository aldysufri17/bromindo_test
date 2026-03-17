<x-app-layout>

    <x-slot name="header">
        <h2 class="h4">Detail Data KTP</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body text-center">
                        @if($data->foto)
                            <img src="{{ asset('storage/'.$data->foto) }}" class="rounded-circle mb-3 d-block mx-auto" width="150"
                                height="150" style="object-fit:cover;">
                        @else
                            <img src="https://via.placeholder.com/150" alt="X foto X" class="rounded-circle mb-3 d-block mx-auto text-danger">
                        @endif
                        <h4 class="mb-3">{{ $data->nama }}</h4>
                        <hr>
                        <div class="text-start">
                            <p><b>NIK :</b> {{ $data->nik }}</p>
                            <p><b>Tanggal Lahir :</b> {{ $data->tanggal_lahir }}</p>
                            <p><b>Umur :</b> {{ $data->umur }} Tahun</p>
                            <p><b>Alamat :</b><br>
                                {{ $data->alamat }}
                            </p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('ktp.index') }}" class="btn btn-secondary">
                                ← Kembali
                            </a>
                            @if (isAdmin())
                            <a href="{{ route('ktp.edit',$data->id) }}" class="btn btn-warning">
                                Edit
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>