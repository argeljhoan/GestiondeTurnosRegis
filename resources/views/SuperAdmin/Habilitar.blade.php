@extends('layouts.plantilla')


@section('content1')



<div class="container">
     <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">{{ __('Habilitar Operadores') }}</div>
          <div class="card-body">
            <form method="POST" action="{{ route('admin.Habilitar') }}">
              @csrf
              <div class="d-flex flex-column justify-content-center">

                <div class="row mb-3">
                  <label for="user" class="col-md-4 col-form-label">{{ __('Operadores Inhabilitados:') }}</label>

                  <div class="col-md-6">
                    <select class="form-select" name="user" id="user" required>
                      <option value="">Seleccione Operadores</option>
                      @foreach ($operadores as $operador)
                       <option value="{{ $operador->id }}">{{ $operador->name }}</option>
                       @endforeach
                       
                    </select>
                  </div>
              </div>

              <div class="row mb-3">
                <label for="modulo" class="col-md-4 col-form-label">{{ __('Modulos:') }}</label>

                <div class="col-md-6">
                  <select class="form-select" name="modulo" id="modulo" required>
                    <option value="">Seleccione Modulos</option>
                    @foreach ($modulos as $modulo)
                     <option value="{{ $modulo->id }}">{{ $modulo->nameModulo }}</option>
                     @endforeach
                     
                  </select>
                </div>
            </div>

                
                <div class="mt-3">
                  @if (Session::has('error'))
                    <div id="error-message" class="alert alert-danger">
                      {{ Session::get('error') }}
                    </div>
                  @endif
                  @if (Session::has('success'))
                    <div id="error-message" class="alert alert-success">
                      {{ Session::get('success') }}
                    </div>
                  @endif
                </div>
              </div>
                <div class="mt-3">
                  <button class="btn btn-primary" type="submit">Habilitar</button>
                </div>
              </div>
            </form>
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