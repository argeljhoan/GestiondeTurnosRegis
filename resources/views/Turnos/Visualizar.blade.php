@extends('layouts.plantilla')

@section('content1')

<div class="container">
    <div class="row">
        @foreach ($turnos as $turno)
        <div class="col-md-3 col-sm-6 col-xs-12 mt-3">
            <div class="card" style="height: 210px; overflow-y: auto;">
                <div class="card-body">
                    <div class="bg-primary" style="padding: 3px; color:white;border-radius: 8px">
                    <h1 class="card-title">{{$turno->modulo->nameModulo}}</h4>
                    </div>
                    <div class="mt-4">
                    <h2 class="card-title">Turno: <span class="bg-primary"  style="padding: 5px; color:white;border-radius: 8px">{{$turno->name}}</span></h2>
                    <h6 class="card-title"><strong  style="font-size:15px" >Nombre:</strong> {{ $turno->cita->nombre}} {{ $turno->cita->apellido }} </h6> 
                    <h6 class="card-title"><strong style="font-size:15px">Identificacion:</strong>  {{ $turno->cita->identificacion }} </h6> 
                   </div>
                </div>
            </div>
        </div>
        @if (($loop->iteration % 4) === 0)
            </div>
            <div class="row">
        @endif
        
        @endforeach
    </div>
</div>

@endsection

@section('scripts')
<script>
  setTimeout(function() {
    location.reload();
  }, 7000); 
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
