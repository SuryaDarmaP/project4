<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Edit Data</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis | D-IV Rekayasa Perangkat Lunak</a>
        </div>
    </nav>

    <div class="container mt-3">
        <a href="{{ route('admin.home') }}">
            <i class="bi bi-arrow-left h1"></i>
        </a>

        <!-- Alerts -->
        @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (Session::get('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> {{ Session::get('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Form for editing admin data -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title text-center">Edit Data Admin</h5>
                        <form action="/postEditAdmin/{{ $data->id }}" method="POST">
                            @csrf
                            <!-- Nama Admin -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nama Admin</label>
                                <input type="text" class="form-control border border-secondary" name="name" required value="{{ $data->name }}">
                                <span class="text-danger">
                                    @error('name') {{ $message }} @enderror
                                </span>
                            </div>

                            <!-- Email Admin -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Email Admin</label>
                                <input type="email" class="form-control border border-secondary" name="email" required value="{{ $data->email }}">
                                <span class="text-danger">
                                    @error('email') {{ $message }} @enderror
                                </span>
                            </div>

                            <!-- Jenis Kelamin -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Pilih Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenisKelamin" value="Laki-laki" @if ($data->jenis_kelamin == 'Laki-laki') checked @endif>
                                    <label class="form-check-label">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenisKelamin" value="Perempuan" @if ($data->jenis_kelamin == 'Perempuan') checked @endif>
                                    <label class="form-check-label">Perempuan</label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success mt-4">Edit Data Admin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
