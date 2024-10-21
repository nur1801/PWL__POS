@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Profile') }}</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update', $user->user_id) }}"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf

                            <div class="row">
                                <div class="col-md-8">
                                    <!-- Form fields for profile details -->
                                    <!-- Username -->
                                    <div class="form-group mt-3">
                                        <label for="username">{{ __('Username') }}</label>
                                        <input id="username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ $user->username }}" required autocomplete="username">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Nama -->
                                    <div class="form-group mt-3">
                                        <label for="nama">{{ __('Nama') }}</label>
                                        <input id="nama" type="text"
                                            class="form-control @error('nama') is-invalid @enderror" name="nama"
                                            value="{{ old('nama', $user->nama) }}" required autocomplete="nama">
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Password Lama -->
                                    <div class="form-group mt-3">
                                        <label for="old_password">{{ __('Password Lama') }}</label>
                                        <input id="old_password" type="password"
                                            class="form-control @error('old_password') is-invalid @enderror"
                                            name="old_password" autocomplete="old-password">
                                        @error('old_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Password Baru -->
                                    <div class="form-group mt-3">
                                        <label for="password">{{ __('Password Baru') }}</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="new-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="form-group mt-3">
                                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" autocomplete="new-password">
                                    </div>
                                </div>

                                <!-- Gambar Profil dan Button di sebelah kanan -->
                                <div class="col-md-4 d-flex flex-column align-items-center justify-content-center">
                                    <!-- Gambar Profil -->
                                    <img id="profile-pic"
                                        src="{{ $user->avatar ? asset('storage/photos/' . $user->avatar) : asset('img/pp.jpg') }}"
                                        class="img-thumbnail mb-3" width="220" height="220" alt="Profile Picture">

                                    <!-- Button Ganti Foto -->
                                    <div class="mt-2">
                                        <label for="avatar" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i> Ganti Foto
                                        </label>
                                        <input type="file" id="avatar" name="avatar" class="d-none"
                                            onchange="previewImage(event)">
                                    </div>

                                    <!-- Tempat Menampilkan Nama File yang Dipilih -->
                                    <div class="text-center mt-2">
                                        <small id="file-name" class="text-muted"></small>
                                        <small id="error-avatar" class="error-text text-danger"></small>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Simpan -->
                            <div class="row mb-0">
                                <div class="col-md-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ 'Update Profile' }}
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Jika profile berhasil diperbarui, tampilkan notifikasi sukses
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        @endif

        // Jika tidak ada perubahan pada profile, tampilkan notifikasi info
        @if (session('info'))
            Swal.fire({
                icon: 'info',
                title: 'Tidak ada perubahan',
                text: '{{ session('info') }}',
                confirmButtonText: 'OK'
            });
        @endif

        // Preview gambar dan tampilkan nama file
        function previewImage(event) {
            var fileInput = event.target;
            var file = fileInput.files[0];
            var error = document.getElementById('error-avatar');
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            var maxSize = 5 * 1024 * 1024; // 5 MB

            error.textContent = '';

            if (file) {
                var fileNameElement = document.getElementById('file-name');
                fileNameElement.textContent = 'File: ' + file.name;

                if (!allowedExtensions.exec(file.name)) {
                    error.textContent = 'Format gambar harus berupa jpeg, png, jpg, atau gif';
                    fileInput.value = '';
                    fileNameElement.textContent = ''; // Kosongkan nama file jika ada error
                    return false;
                }

                if (file.size > maxSize) {
                    error.textContent = 'Gambar maksimal 5 MB';
                    fileInput.value = '';
                    fileNameElement.textContent = ''; // Kosongkan nama file jika ada error
                    return false;
                }

                var reader = new FileReader();
                reader.onload = function(e) {
                    var output = document.getElementById('profile-pic');
                    output.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
