@include('templates.header', ['title' => 'List Siswa'])

<div class="container mt-4">
    <div class="panel p-4">
        <div class="login-body">
            <div class="top d-flex justify-content-between align-items-center">
                <div class="logo mt-3 ">
                    <h3>TO DO LIST</h3>
                </div>
                <a href="{{ route('list-siswa.index') }}"><i class="fa-duotone fa-house-chimney"></i></a>
            </div>
            <div class="bottom">
                <h6 class="panel-title">Submit Student</h6>
                <form 
                    method="POST" 
                    action="{{ route('list-siswa.update', $data->id) }}" 
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-25">
                                <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                                <input type="text"
                                    class="form-control"
                                    placeholder="Name"
                                    name="name"
                                    value="{{ old('name', $data->name) }}">
                            </div>
                            @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-25">
                                <span class="input-group-text"><i class="fa-regular fa-home"></i></span>
                                <select name="clases" class="form-control">
                                    <option value="">CHOOSE CLASS</option>
                                    <option value="X" @if($data->clases == 'X') selected @endif>X</option>
                                    <option value="XI" @if($data->clases == 'XI') selected @endif>XI</option>
                                    <option value="XII" @if($data->clases == 'XII') selected @endif>XII</option>
                                </select>
                            </div>
                            @error('clases')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-25">
                                <span class="input-group-text"><i class="fa-regular fa-building"></i></span>
                                <select name="major" class="form-control">
                                    <option value="">CHOOSE MAJOR</option>
                                    <option value="PPLG" @if($data->major == 'PPLG') selected @endif>PPLG</option>
                                    <option value="TJKT" @if($data->major == 'TJKT') selected @endif>TJKT</option>
                                    <option value="TKRO" @if($data->major == 'TKRO') selected @endif>TKRO</option>
                                    <option value="MPLB" @if($data->major == 'MPLB') selected @endif>MPLB</option>
                                </select>
                            </div>
                            @error('major')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-25">
                                <span class="input-group-text"><i class="fa-regular fa-calendar"></i></span>
                                <input type="date"
                                    class="form-control"
                                    placeholder="Date"
                                    name="birth_date"
                                    value="{{ old('birth_date', $data->birth_date) }}">
                            </div>
                            @error('birth_date')
                            <div class="text-danger">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="input-group mb-25">
                                <span class="input-group-text"><i class="fa-regular fa-image"></i></span>
                                <input type="file"
                                    class="form-control"
                                    name="photo_profile">
                            </div>
                            @if($data->photo_profile)
                                <img src="{{ $data->photo_profile }}" class="img-thumbnail" width="120px">
                            @endif
                            @error('photo_profile')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 login-btn mt-4">Update Student</button>
                </form>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </div>
        </div>
    </div>

    @include('templates.footer')