@extends('components.layout')

@section('title', 'Edit Jadwal Periksa')

@section('nav-content')
    <ul class="nav">
        <li class="nav-item"><a href="{{ route('dokter.dashboard') }}" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li class="nav-item"><a href="{{ route('dokter.memeriksa') }}" class="nav-link"><i class="nav-icon fas fa-book"></i> Memeriksa</a></li>
        <li class="nav-item"><a href="{{ route('dokter.jadwalPeriksa') }}" class="nav-link active"><i class="nav-icon fas fa-calendar-alt"></i> Jadwal Periksa</a></li>
        <li class="nav-item"><a href="{{ route('dokter.historyPeriksa') }}" class="nav-link"><i class="nav-icon fas fa-book"></i> Riwayat Periksa</a></li>
    </ul>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Jadwal Periksa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dokter.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dokter.jadwalPeriksa') }}">Jadwal Periksa</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10"><!-- Menjorok ke kiri -->

                    <!-- Alert Messages -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h5><i class="icon fas fa-ban"></i> Error!</h5>
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(isset($activeSchedule))
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian!</h5>
                            Saat ini ada jadwal aktif: <strong>{{ ucfirst($activeSchedule->hari) }}</strong>
                            ({{ date('H:i', strtotime($activeSchedule->jam_mulai)) }} - {{ date('H:i', strtotime($activeSchedule->jam_selesai)) }})
                            <br><small>Jika Anda mengaktifkan jadwal ini, jadwal tersebut akan otomatis dinonaktifkan.</small>
                        </div>
                    @endif

                    <!-- Form -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Jadwal Periksa</h3>
                            <div class="card-tools">
                                <a href="{{ route('dokter.jadwalPeriksa') }}" class="btn btn-tool">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>

                        <form action="{{ route('dokter.updateJadwal', $jadwal->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="hari">Hari <span class="text-danger">*</span></label>
                                            <select class="form-control @error('hari') is-invalid @enderror" id="hari" name="hari" required>
                                                <option value="">Pilih Hari</option>
                                                @foreach(['senin','selasa','rabu','kamis','jumat'] as $day)
                                                    <option value="{{ $day }}" {{ old('hari', $jadwal->hari) == $day ? 'selected' : '' }}>
                                                        {{ ucfirst($day) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('hari') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status <span class="text-danger">*</span></label>
                                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                                                <option value="">Pilih Status</option>
                                                <option value="1" {{ old('status', $jadwal->status) == '1' ? 'selected' : '' }}>Aktif</option>
                                                <option value="0" {{ old('status', $jadwal->status) == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                                            </select>
                                            @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jam_mulai">Jam Mulai <span class="text-danger">*</span></label>
                                            <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror"
                                                   id="jam_mulai" name="jam_mulai"
                                                   value="{{ old('jam_mulai', date('H:i', strtotime($jadwal->jam_mulai))) }}" required>
                                            @error('jam_mulai') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jam_selesai">Jam Selesai <span class="text-danger">*</span></label>
                                            <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror"
                                                   id="jam_selesai" name="jam_selesai"
                                                   value="{{ old('jam_selesai', date('H:i', strtotime($jadwal->jam_selesai))) }}" required>
                                            @error('jam_selesai') <span class="invalid-feedback">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                @if($errors->has('jadwal'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('jadwal') }}
                                    </div>
                                @endif

                                <div class="alert alert-info">
                                    <h5><i class="icon fas fa-info"></i> Informasi Jadwal Saat Ini</h5>
                                    <strong>Hari:</strong> {{ ucfirst($jadwal->hari) }}<br>
                                    <strong>Jam:</strong> {{ date('H:i', strtotime($jadwal->jam_mulai)) }} - {{ date('H:i', strtotime($jadwal->jam_selesai)) }}<br>
                                    <strong>Status:</strong>
                                    @if($jadwal->status == 1)
                                        <span class="badge badge-success">Aktif</span>
                                    @else
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                    @endif
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Jadwal
                                </button>
                                <a href="{{ route('dokter.jadwalPeriksa') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div> <!-- col-md-10 -->
            </div> <!-- row -->
        </div> <!-- container-fluid -->
    </section>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('.alert:not(.alert-info):not(.alert-warning)').fadeOut('slow');
        }, 5000);

        $('#jam_mulai, #jam_selesai').on('change', function () {
            var jamMulai = $('#jam_mulai').val();
            var jamSelesai = $('#jam_selesai').val();
            if (jamMulai && jamSelesai && jamSelesai <= jamMulai) {
                alert('Jam selesai harus lebih besar dari jam mulai!');
                $('#jam_selesai').focus();
            }
        });

        $('form').on('submit', function (e) {
            if (!confirm('Apakah Anda yakin ingin mengupdate jadwal ini?')) {
                e.preventDefault();
            }
        });
    });
</script>
@endsection
