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
            <a href="{{ route('dokter.memeriksa') }}" class="nav-link">
                <i class="nav-icon fas fa-user-md"></i>
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
            <a href="{{ route('dokter.historyPeriksa') }}" class="nav-link active">
                <i class="nav-icon fas fa-history"></i>
                <p>Riwayat Periksa</p>
            </a>
        </li>
    </ul>
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="m-0">Edit Riwayat Periksa</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <form action="{{ route('dokter.historyPeriksa.update', $periksa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                {{-- Informasi Pasien --}}
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header"><h3 class="card-title">Informasi Pasien</h3></div>
                        <div class="card-body">
                            <p><strong>Nama Pasien:</strong> {{ $periksa->pasien->name }}</p>
                            <p><strong>Email:</strong> {{ $periksa->pasien->email }}</p>
                            <p><strong>No. KTP:</strong> {{ $periksa->pasien->no_ktp }}</p>
                            <p><strong>No. HP:</strong> {{ $periksa->pasien->no_hp }}</p>
                        </div>
                    </div>
                </div>

                {{-- Form Edit --}}
                <div class="col-md-8">
                    <div class="card card-success">
                        <div class="card-header"><h3 class="card-title">Form Edit Pemeriksaan</h3></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tanggal Periksa</label>
                                <input 
                                    type="datetime-local"
                                    name="tgl_periksa"
                                    class="form-control"
                                    value="{{ \Carbon\Carbon::parse($periksa->tgl_periksa)->format('Y-m-d\TH:i') }}"
                                />
                            </div>

                                    <div class="form-group">
                                <label>Catatan Pemeriksaan</label>
                                <textarea name="catatan" class="form-control" rows="3">{{ $periksa->catatan }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="obat">
                                    <i class="fas fa-pills mr-2"></i>Pilih Obat
                                    <span class="text-danger">*</span>
                                </label>
                                <select id="obat" name="obat[]" class="form-control" multiple>
                                    @foreach($allObat as $obat)
                                        <option value="{{ $obat->id }}" 
                                            data-harga="{{ $obat->harga }}"
                                            @if($periksa->obat->contains($obat->id)) selected @endif>
                                            {{ $obat->nama_obat }} - Rp{{ number_format($obat->harga, 0, ',', '.') }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Estimasi Biaya --}}
                            <div class="form-group mt-4">
                                <i class="fas fa-money-bill-wave mr-2"></i>Estimasi Biaya
                                <div class="p-3 border rounded bg-light">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Biaya Konsultasi:</span>
                                        <span>Rp 150.000</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Biaya Obat:</span>
                                        <span id="total-obat">Rp 0</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between font-weight-bold">
                                        <span>Total Biaya:</span>
                                        <span id="total-biaya">Rp 150.000</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Hidden biaya_periksa untuk dikirim ke controller --}}
                            <input type="hidden" name="biaya_periksa" id="biaya_periksa" value="150000">
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('dokter.historyPeriksa') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        const biayaKonsultasi = 150000;

        function hitungTotal() {
            let totalObat = 0;
            $('#obat option:selected').each(function () {
                const harga = parseInt($(this).data('harga')) || 0;
                totalObat += harga;
            });

            const total = biayaKonsultasi + totalObat;

            $('#total-obat').text('Rp ' + totalObat.toLocaleString('id-ID'));
            $('#total-biaya').text('Rp ' + total.toLocaleString('id-ID'));
            $('#biaya_periksa').val(total); // ← INI YANG KURANG
        }

        $('#obat').on('change', hitungTotal);
        hitungTotal(); // hitung saat awal
    });
</script>
@endsection
