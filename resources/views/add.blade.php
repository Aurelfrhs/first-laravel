@include('templates.header', ['title' => 'ADD pages'])

HALAMAN HOME

$title = 'LOGIN | APLIKASI DAFTAR SISWA';
include('templates/header.php');


<div class="main-content login-panel">
    <div class="login-body">
        <div class="top d-flex justify-content-between align-items-center">
            <div class="logo">
                <img src="assets/images/logo-black.png" alt="Logo">
            </div>
            <a href="/"><i class="fa-duotone fa-house-chimney"></i></a>
        </div>
        <div class="bottom">
            <h3 class="panel-title">Tambah Activity</h3>
            <form action="{{ route('add') }}" method="POST">
              @csrf
                <div class="input-group mb-25">
                    <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="email address"
                        name="activity_name"
                        value="{{ old('activity_name') }}"
                        >
                </div>
                @error('activity_name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <button class="btn btn-primary w-100 login-btn" type="submit">Sign in</button>
                <div class="mt-2">Don't have an account? <a href="/register.php" class="text-white fs-14">Click Here!</a></div>
            </form>
        </div>
    </div>


@include('templates.footer')