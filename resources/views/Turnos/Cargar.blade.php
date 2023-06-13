@extends('layouts.plantilla')

@section('content1')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Importar Citas</div>

                <div class="card-body">
                    @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                        {{$error}}
                        @endforeach
                    </div>
                    @endif

                    <form action="{{route('Turnos.CargarExcel')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    
                        <div class="d-flex justify-content-between">

                            <div class="form-group">
                                <label for="archivo" class="btn btn-success">
                                    <span id="nombre-archivo">Seleccionar Excel</span>
                                    <input type="file" id="archivo" name="archivo" accept=".xlsx, .xls" style="display: none;" onchange="actualizarNombreArchivo(this)">
                                </label>
                            </div>
                    
                            <button class="btn btn-primary text-md" type="submit">Importar</button>
                        </div>
                    </form>
                    <div class="alert alert-info mt-3">
                        <strong>Cargar citas del día:</strong> Por favor, seleccione su archivo Excel de citas para cargarlas.
                    </div>

                    <div class="mt-5">
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function actualizarNombreArchivo(input) {
        var nombreArchivo = input.files[0].name;
        document.getElementById("nombre-archivo").innerText = nombreArchivo;
    }
</script>
<script>
    setTimeout(function() {
      var errorMessage = document.getElementById('error-message');
      if (errorMessage) {
        errorMessage.style.display = 'none';
      }
    }, 180000);
  </script>
@endsection