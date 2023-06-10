@extends('layouts.plantilla')

@section('content1')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Confirmar Ausencia del Usuario
                </div>
                <div class="card-body">
                    <p>¿Estás seguro de Cancelar el Proceso antes de que el Usuario pasara al Modulo?</p>
                    <p><strong>Turno:</strong> {{ $turno->name }}</p>
                    <p><strong>Nombre:</strong> {{ $turno->cita->nombre }}</p>
                    <p><strong>Apellido:</strong> {{ $turno->cita->apellido }}</p>
                    
                    <form action="{{ route('Turnos.Actualizar', $turno) }}" method="POST">
                        @csrf
                        @method('put')

                        <div class="d-flex flex-row gap-3 ">
                            <button type="submit" class="btn btn-primary" name="accion" value="no_gestiono"  >Confirmar</button>
                            <a href="{{ route('Turnos.Atencion',['id' => Auth::user()->id, 'cita' => '0'])}}" class="btn btn-secondary">Cancelar</a>
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


@endsection