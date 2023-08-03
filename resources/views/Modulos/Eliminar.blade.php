@extends('layouts.plantilla')

@section('content1')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Confirmar Inhabilitacion
                </div>
                <div class="card-body">
                    <p>¿Estás seguro de que deseas Inhabilitar este Modulo</p>
                    <p><strong>Nombre:</strong> {{ $modulo->nameModulo }}</p>
                    <p><strong>Operador:</strong> {{ $modulo->name }}</p>

                    <form action="{{ route('Modulos.Eliminando', $modulo) }}" method="POST">
                        @csrf
                        @method('delete')

                        <div class="alert alert-info mt-3">
                            <strong>Modulos:</strong> Si Inhabilitas Este Modulo y tiene un usuario Operador asignado, este tambien se inhabilitara.
                        </div>

                        <div class="d-flex flex-row gap-3 ">
                            <button type="submit" class="btn btn-danger  ">Inhabilitar</button>
                            <a href="{{ route('Modulos.Gestion') }}" class="btn btn-secondary">Cancelar</a>
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