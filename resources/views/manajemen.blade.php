<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Keuangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }
        h2, h3, h5, p {
            margin-bottom: 0.5rem;
        }
        h3 {
            font-size: 1.5rem; /* Mengurangi ukuran font untuk saldo */
        }
        .btn {
            padding: 0.5rem 1rem; /* Ukuran padding tombol */
            font-size: 1rem; /* Ukuran font tombol */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
            font-size: 0.875rem; /* Mengurangi ukuran font untuk tabel */
        }
        th, td {
            padding: 0.5rem; /* Mengurangi padding tabel */
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        th {
            background-color: #e9ecef;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Ringkasan -->
        <div class="row mb-4">
            <div class="col-md-8">
                <h2 class="mb-3">Ringkasan</h2>
                <h5 class="mb-3">{{ date('F Y') }}</h5>
                <p class="mb-3">Jumlah Pemasukan: Rp {{ number_format(session('totalPemasukan', 0), 2, ',', '.') }}</p>
                <p class="mb-3">Jumlah Pengeluaran: Rp {{ number_format(session('totalPengeluaran', 0), 2, ',', '.') }}</p>
                <p class="mb-3">Sisa Saldo: Rp {{ number_format(session('saldo', 0), 2, ',', '.') }}</p>
            </div>
        </div>

        <!-- Info Saldo -->
        <div class="row mb-4">
            <div class="col-md-8">
                <h3 class="mb-3">Saldo : Rp {{ number_format(session('saldo', 0), 2, ',', '.') }}</h3>
            </div>
        </div>

        <!-- Tombol Tambah -->
        <div class="row mb-4">
            <div class="col-md-8">
                <a href="{{ route('pemasukan.index') }}" class="btn btn-success btn-lg">+</a>
                <a href="{{ route('pengeluaran.index') }}" class="btn btn-danger btn-lg">-</a>
            </div>
        </div>

        <!-- Tabel Pemasukan -->
        <h3 class="mt-5">Pemasukan</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Nilai</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pemasukans as $pemasukan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pemasukan->kategori->name }}</td>
                        <td>{{ $pemasukan->tanggal_pemasukan }}</td>
                        <td>{{ number_format($pemasukan->jumlah_pemasukan, 2, ',', '.') }}</td>
                        <td>{{ $pemasukan->deskripsi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tabel Pengeluaran -->
        <h3 class="mt-5">Pengeluaran</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Nilai</th>
                    <th>Deskripsi</th>
                </tr>
            <tbody>
                @foreach($pengeluarans as $pengeluaran)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pengeluaran->kategori->name }}</td>
                        <td>{{ $pengeluaran->tanggal_pengeluaran }}</td>
                        <td>{{ number_format($pengeluaran->jumlah_pengeluaran, 2, ',', '.') }}</td>
                        <td>{{ $pengeluaran->deskripsi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
