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
                    <p>¿Estás seguro de que deseas Inhabilitar este Operador?</p>
                    <p><strong>Nombre:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    @can('admin.Eliminar')
                    <form action="{{ route('admin.Eliminar', $user) }}" method="POST">
                        @csrf
                        @method('delete')

                        <div class="d-flex flex-row gap-3 ">
                            <button type="submit" class="btn btn-danger  ">Inhabilitar</button>
                            <a href="{{ route('admin.Gestion') }}" class="btn btn-secondary">Cancelar</a>
                        </div>

                    </form>
                    @endcan
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