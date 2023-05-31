@extends('layouts.plantilla')

@section('content1')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Confirmar eliminación
                </div>
                <div class="card-body">
                    <p>¿Estás seguro de que deseas eliminar este Modulo</p>
                    <p><strong>Nombre:</strong> {{ $modulo->nameModulo }}</p>
                    <p><strong>Operador:</strong> {{ $modulo->name }}</p>

                    <form action="{{ route('Modulos.Eliminando', $modulo) }}" method="POST">
                        @csrf
                        @method('delete')

                        <div class="d-flex flex-row gap-3 ">
                            <button type="submit" class="btn btn-danger  ">Eliminar</button>
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