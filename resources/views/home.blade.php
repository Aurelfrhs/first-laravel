@include('templates.header', ['title' => 'ADD pages'])

<div class="main-content login-panel">
    <div class="login-body">
        <div class="top d-flex justify-content-between align-items-center">
            <div class="logo">
                <img src="assets/images/logo-black.png" alt="Logo">
            </div>
            <a href="{{ route('add') }}"><i class="fa-duotone fa-plus"></i></a>
        </div>
        <div class="bottom">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            <h3 class="panel-title">Todolist</h3>
            <ul>
              @foreach($data as $d) 
              <li class="d-flex justify-content-between">
                <span>{{ $d->activity_name}}</span>
                <div>
                  <a href="/update/{{ $d->id }}" class="btn btn-warning text-light">
                    <i class="fa-solid fa-edit"></i>
                  </a>
                  <form method="POST" 
                  action="{{ route('delete', ['id' => $d->id]) }}"
                  class="ml-2">
                      @method('DELETE')
                      @csrf
                      <button href="submit" class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                  </form>
                </div>
                </a>
              </li>
              @endforeach
            </ul>
        </div>
    </div>

@include('templates.footer')