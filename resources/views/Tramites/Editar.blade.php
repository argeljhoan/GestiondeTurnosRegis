@extends('layouts.plantilla')


@section('content1')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Tramite') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Tramites.Actualizar',$tramite) }}">
                        @csrf
                        @method('put')
                        <div class="mb-3 row">
                           
                            <label for="name" class="col-md-4 col-form-label" placeholder="example : Modulo-1">{{ __('Name:') }}</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$tramite->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       
                          <p class="col-md-4 col-form-label ">Estos Son los Tramites de los Modulos, que Operan para la Atencion al Usuario</p>
                        <div class="mt-5">
                            @if (Session::has('error'))
                            <div id="error-message" class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                           @endif
                           @if (Session::has('success'))
                           <div id="error-message" class="alert alert-primary">
                               {{ Session::get('success') }}
                           </div>
                         @endif
                        </div>
                   @can('Tramites.Actualizar')
                        <div class=" row mt-5">
                            <div class="col-md-8 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                            </div>
                        </div>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    setTimeout(function() {
        var errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 5000);
</script>
@endsection