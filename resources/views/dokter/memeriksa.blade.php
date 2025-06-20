@extends('components.layout')

@section('nav-content')
    <ul class="nav">
        <li class="nav-item">
            <a href="{{ route('dokter.dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dokter.memeriksa') }}" class="nav-link active">
                <i class="nav-icon fas fa-stethoscope"></i>
                <p>Memeriksa</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dokter.jadwalPeriksa') }}" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>Jadwal Periksa</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dokter.historyPeriksa') }}" class="nav-link">
                <i class="nav-icon fas fa-history"></i>
                <p>Riwayat Periksa</p>
            </a>
        </li>
    </ul>
@endsection

@section('title', 'Daftar Pasien Belum Diperiksa')

@section('content')
    <div class="content-wrapper">
        <!-- Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Daftar Pasien Belum Diperiksa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dokter.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Memeriksa Pasien</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Alert -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if($periksas->count() > 0)
                    <!-- TABEL PASIEN -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-stethoscope"></i> Pasien Menunggu Pemeriksaan
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="periksaTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pasien</th>
                                            <th>Jadwal Periksa</th>
                                            <th>Keluhan</th>
                                            <th>Status & Antrian</th>
                                            <th>Dokter</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($periksas as $index => $janjiPeriksa)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td><i class="fas fa-user-injured text-primary mr-2"></i> <strong>{{ $janjiPeriksa->pasien->name ?? 'N/A' }}</strong></td>
                                                <td>
                                                    <i class="fas fa-calendar-alt text-info mr-1"></i>
                                                    <strong>{{ ucfirst($janjiPeriksa->jadwalPeriksa->hari) }}</strong><br>
                                                    <small><i class="fas fa-clock mr-1"></i>{{ $janjiPeriksa->jadwalPeriksa->jam_mulai }} - {{ $janjiPeriksa->jadwalPeriksa->jam_selesai }}</small>
                                                </td>
                                                <td>
                                                    {{ $janjiPeriksa->keluhan ? Str::limit($janjiPeriksa->keluhan, 50) : 'Belum ada keluhan' }}
                                                </td>
                                                <td>
                                                    <span class="badge badge-warning"><i class="fas fa-clock mr-1"></i> Menunggu</span><br>
                                                    <small>No. Antrian: {{ $janjiPeriksa->no_antrian }}</small>
                                                </td>
                                                <td><i class="fas fa-user-md text-success mr-1"></i>{{ $janjiPeriksa->jadwalPeriksa->dokter->name ?? 'N/A' }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('dokter.memeriksEdit', $janjiPeriksa->id) }}" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-stethoscope"></i> Periksa
                                                        </a>
                                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{ $janjiPeriksa->id }}">
                                                            <i class="fas fa-times"></i> Tolak
                                                        </button>
                                                    </div>

                                                    <!-- Modal Tolak -->
                                                    <div class="modal fade" id="deleteModal{{ $janjiPeriksa->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-danger text-white">
                                                                    <h5 class="modal-title"><i class="fas fa-exclamation-triangle"></i> Konfirmasi Penolakan</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Yakin ingin menolak pemeriksaan <strong>{{ $janjiPeriksa->pasien->name ?? 'N/A' }}</strong>?</p>
                                                                    <p class="text-muted">Tindakan ini tidak dapat dibatalkan.</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Batal</button>
                                                                    <form action="{{ route('dokter.tolakPeriksa', $janjiPeriksa->id) }}" method="POST">
                                                                        @csrf @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Ya, Tolak</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- TAMPILAN KETIKA TIDAK ADA PASIEN -->
                    <div class="col-md-8">
                        <div class="card card-outline card-secondary">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-stethoscope"></i> Pasien Menunggu Pemeriksaan</h3>
                            </div>
                            <div class="card-body text-center py-5">
                                <i class="fas fa-clipboard-check fa-4x text-muted mb-3"></i>
                                <h4 class="text-muted">Tidak Ada Pasien Menunggu</h4>
                                <p class="text-muted">Saat ini tidak ada pasien yang menunggu untuk diperiksa.</p>
                                <a href="{{ route('dokter.dashboard') }}" class="btn btn-primary mt-3">
                                    <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#periksaTable').DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                pageLength: 10,
                order: [[2, "desc"]],
                language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    zeroRecords: "Data tidak ditemukan",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
                    infoFiltered: "(difilter dari _MAX_ total data)",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Selanjutnya",
                        previous: "Sebelumnya"
                    }
                }
            });

            setTimeout(function () {
                $('.alert').fadeOut('slow');
            }, 5000);
        });
    </script>
@endsection
