@include('templates.header', ['title' => 'List Siswa'])

<?php

?>

<div class="container mt-4">
    <div class="panel p-4">
        <div class="login-body">
            <div class="top d-flex justify-content-between align-items-center">
                <div class="logo mt-3 ">
                    <h3>TO DO LIST</h3>
                </div>
                <a href="/"><i class="fa-duotone fa-house-chimney"></i></a>
            </div>
            <div class="bottom">
                <h6 class="panel-title">Submit Student</h3>
                    <form method="POST" method="{{ route('list-siswa.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="input-group mb-25">
                                    <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                                    <input type="text"
                                        class="form-control"
                                        placeholder="Name"
                                        name="name"
                                        value="{{old('name')}}">
                                    </div>
                                    @error('name')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="input-group mb-25">
                                    <span class="input-group-text"><i class="fa-regular fa-home"></i></span>
                                    <select name="clases" class="form-control" value="{{old('classes')}}">
                                        <option value="">CHOOSE CLASS</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                </div>
                                @error('claswes')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="input-group mb-25">
                                    <span class="input-group-text"><i class="fa-regular fa-building"></i></span>
                                    <select name="major" class="form-control" value="{{old('major')}}">
                                        <option value="">CHOOSE MAJOR</option>
                                        <option value="PPLG">PPLG</option>
                                        <option value="TJKT">TJKT</option>
                                        <option value="TKRO">TKRO</option>
                                        <option value="MPLB">MPLB</option>
                                    </select>
                                </div>
                                @error('major')
                                <div class="text-danger">
                                    {{$message}}
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
                                        value="{{old('date')}}">
                                </div>
                                @error('birth_date')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="input-group mb-25">
                                    <span class="input-group-text"><i class="fa-regular fa-image"></i></span>
                                    <input type="file"
                                        class="form-control"
                                        name="photo_profile"
                                        >
                                </div>
                                @error('photo_profile')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <button class="btn btn-primary w-100 login-btn mt-4">Tambah</button>
                    </form>
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @endif
            </div>
            <div class="table table-responsive mt-5">
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Major</th>
                    <th>Profile</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $d)
                  <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->clases }}</td>
                    <td>{{ $d->major }}</td>
                    <td>
                      <img class="img-thumbnail" src="{{$d->photo_profile}}" width="100">
                    </td>
                    <td>
                      <div class="d-flex gap-2 justify-content-end">
                        <a 
                          class="btn btn-warning"
                          href="{{ route('list-siswa.show', $d->id) }}">
                        <i class="fa-solid fa-edit"></i>
                        </a>
                        <form method="POST" action="{{ route('list-siswa.destroy', $d->id) }}">
                            @csrf
                            @method('DELETE')
                          <button 
                          type="submit"
                          class="btn btn-danger ml-3">
                            <i class="fa-solid fa-trash"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>


    @include('templates.footer')