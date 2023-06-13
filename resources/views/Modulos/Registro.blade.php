@extends('layouts.plantilla')


@section('content1')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Modulo') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Modulos.store') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label" placeholder="example : Modulo-1">{{ __('Nombre del Modulo:') }}</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       
                            <div class="d-flex flex-column gap-3 justify-content-center">
                                <label for="tramites" class="col-md-4 col-form-label">{{ __('Tramites:') }}</label>
                                <div class="d-flex flex-wrap">
                                    @foreach($tramites as $tramite)
                                    <div class="col-md-3 mt-3">
                                        <input type="checkbox" name="tramites[]" value="{{ $tramite->id }}"> {{ $tramite->name }}
                                    </div>
                                    @endforeach
                                </div>
                                @if ($errors->has('tramites'))
                                    <div class="alert alert-danger">
                                         <ul>
                                   @foreach ($errors->get('tramites') as $error)
                                      <li>{{ $error }}</li>
                                    @endforeach
                                     </ul>
                                    </div>
                                    @endif
                            </div>
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

                        <div class=" row mt-5">
                            <div class="col-md-8 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
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

<script>
    $(document).ready(function() {
      // Selecciona el elemento con la clase 'dropdown-toggle' y agrega el evento de clic
      $('.dropdown-toggle').click(function() {
        // Obtiene el menú desplegable asociado al elemento clicado
        var dropdownMenu = $(this).next('.dropdown-menu');
  
        // Verifica si el menú está oculto o visible y lo alterna
        dropdownMenu.toggle();
      });
    });
  </script>
@endsection