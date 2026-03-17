<x-app-layout>
    <x-slot name="header">
        <h2 class="h4">Data KTP</h2>
    </x-slot>
    <div class="container mt-4">
        <div class="mb-3 float-end">
            @if (isAdmin())
            <a href="{{ route('ktp.create') }}" class="btn btn-primary">
                Tambah Data
            </a>
            @endif
            <a href="{{ route('ktp.export.csv') }}" class="btn btn-success">
                Export CSV
            </a>
            <a href="{{ route('ktp.export.pdf') }}" class="btn btn-danger">
                Export PDF
            </a>
            @if (isAdmin())
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#importModal">
                    Import CSV
                </button>
            @endif
        </div>
        <form method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari nama">
                <button class="btn btn-secondary">Search</button>
            </div>
        </form>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center" width="200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            <td class="text-center">
                                {{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}
                            </td>
                            <td>{{ $d->nik }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->alamat }}</td>
                            <td class="text-center">
                                <a href="{{ route('ktp.show',$d->id) }}" class="btn btn-info btn-sm">
                                    Detail
                                </a>
                                @if (isAdmin())
                                    <a href="{{ route('ktp.edit',$d->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    <form action="{{ route('ktp.destroy',$d->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>

    <!-- Modal Import -->
    <div class="modal fade" id="importModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Data KTP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('ktp.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Upload File CSV</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>
                        <p class="text-muted small">
                            Format CSV: nik,nama,tanggal_lahir,alamat
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Import
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>