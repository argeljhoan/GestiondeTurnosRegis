@extends('layouts.plantilla')

@section('content1')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               
                @foreach($citas as $cita)
                <div class="card-body">
                    <form method="POST" action="{{ route('Turnos.store',$cita)}}">
                        @csrf
                   
                       
                        <div class="container mt-5">
                            <div class="text-center">
                                <img  src='images/logo.black.svg' style="width: 500px">
                                <p class="mt-2">Bienvenido a la Registraduría Especial de Cúcuta</p>
                                <p>Turno<strong id="turno">{{$cita->codigo}} </strong></p>
                                <p>Fecha de impresión: <span id="fecha">{{$cita->impresion}} </span></p>
                                <p>Indentificacion: <span id="Indentificacion">{{$cita->identificacion}} </span></p>
                                <p>Nombre: <span id="Nombre">{{$cita->nombre}} </span></p>
                                <p>Apellido: <span id="Apellido">{{$cita->apellido}} </span></p>
                                <p>Tramite: <span id="Nombre">{{$cita->tramite->name}} </span></p>
                         
                            </div>
                        </div>
                    
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
                     <div class="d-flex justify-content-center flex-row gap-3 mt-2">
                        <button type="submit" class="btn btn-primary  ">Generar</button>
                        <a href="{{ route('Turnos.Registrar') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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