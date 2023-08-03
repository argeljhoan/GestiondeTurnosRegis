@extends('layouts.plantilla')


@section('content1')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Gestionar Turno para C.C Digital') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Turnos.CitasDigital') }}">
                        @csrf

                        <div class="mb-3 row text-center">
                           
                        
                                <h5 class="col-md-4 col-form-label text-md-end" id="Fecha">Fecha: <span class="text-center">{{$fechaActual}}</span></h5>
                                @error('Fecha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>
                             
                        <div class="row mb-3">
                            <label for="tramite" class="col-md-4 col-form-label text-md-end">{{ __('Tramite') }}</label>

                            <div class="col-md-6">
                              <select class="form-select" name="tramite" id="tramite" required>
                                <option value="">Seleccione el Tramite</option>
                                    @foreach ($tramites as $tramite)
                                 <option value="{{ $tramite->id }}">{{$tramite->name}}</option>
                                 @endforeach
                                
                              </select>
                            </div>
                        </div>
                             
                        <div class="row mb-3">
                            <label for="doc" class=" col-md-4 col-form-label text-md-end">{{ __('Documento') }}</label>

                            <div class="col-md-6">
                              <select class="form-select" name="doc" id="doc" required>
                                <option value="">Seleccione un Doc</option>
                                    
                                 <option value="C.C.">Cedula Ciudadania</option>
                                 <option value="T.I.">Tarjeta de Identidad</option>
                                
                              </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Identificacion') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="number" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="name" >

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      
                        <div class="row mb-3">
                            <label for="apellido" class="col-md-4 col-form-label text-md-end">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="name">

                                @error('apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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

                        <div class=" row mt-5 text-center">
                            <div class="col-md-8 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
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

<script>
    setTimeout(function() {
        var errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 5000);
</script>
@endsection