@extends('layouts.plantilla')


@section('content1')
<section class="container">

<table class="table border-primary mt-5 table-hover">
    <thead class="table-primary">
      <tr>
        <th>Id</th>
        <th>Doc</th>
        <th>Identificacion</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Hora-Cita</th>
        <th>Turno</th>
        <th>Estado</th>
        <th>Tramite</th>
        <th>Atender</th>
      </tr>
    </thead>
    <tbody>

   
        @if ($citas)
        @php
        $count = 0; // Inicializar el contador
       @endphp
        @foreach ($citas as $cita)
         
                @foreach ($cita->turnos as $turno)
                    <tr>
                        <td>{{ $cita->id }}</td>
                        <td>{{ $cita->documento }}</td>
                        <td>{{ $cita->identificacion }}</td>
                        <td>{{ $cita->nombre }}</td>
                        <td>{{ $cita->apellido }}</td>
                        <td>{{ $cita->hora }}</td>
                        <td>{{ $turno->name }}</td>
                        <td>{{ $cita->estado->name }}</td>
                        <td>{{ $cita->tramite->name }}</td>

                        <td>
                          <div class="button">
                            @if (empty($info) && $count == 0)
                            @php
                                $count = 1; // Establecer el contador en 1 para habilitar el primer botón
                            @endphp
                            <a class="btn btn-primary" href="{{ route('Turnos.info',['cita' => $cita, 'id' => $id])}}">
                        @else
                            <a class="btn btn-danger disabled" href="#" data-bs-toggle="tooltip" title="Inhabilitado">
                        @endif
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                          <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                          <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                          </svg>
                            </a>
                          </div>
                        </td>
                    </tr>
                @endforeach
           
        @endforeach
   
       
    @endif

    

    </tbody>
  </table>
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
  @if(!empty($info))
  <div class="card text-center">
    <div class="card-body">
      <form action="{{ route('Turnos.Tiempo', ['turno' => $info->id]) }}" method="POST" id="tiempoForm">
        @csrf
        <h2 class="card-title">Turno Actual</h2>
        <div class="datos-persona">
          <strong>Nombre:</strong> {{ $info->nombre }}
        </div>
        <div class="datos-persona">
          <strong>Apellido:</strong> {{ $info->apellido }}
        </div>
        <div class="datos-persona">
          <strong>Cédula:</strong> {{ $info->identificacion }}
        </div>
        <div class="datos-persona">
          <strong>Turno:</strong> {{ $info->turno }}
        </div>
        <div class="datos-persona">
          <strong>Estado:</strong> Atendiendo
        </div>

        <div class="cronometro">
          Tiempo transcurrido: <span id="tiempo" >{{ $info->tiempo }}</span>
        </div>
        
        <div class="operarios-container1 mt-3">
          <div class="acciones">
            <input type="number" name="tiempo_transcurrido" id="tiempo_transcurrido">
            <button type="submit" name="accion" value="no_gestiono" class="btn btn-danger mx-2">No Gestiono</button>
            <button type="submit" name="accion" value="finalizado" class="btn btn-primary mx-2">Finalizado</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('js/tiempo.js') }}"></script>

@endif

  
    
</section>
@endsection
@section('scripts')

<script src="{{ asset('js/app.js') }}"></script>

<script>
  $(function () {
    $('[data-bs-toggle="tooltip"]').tooltip();
  });
</script>
<script>
  
  setTimeout(function() {
    var errorMessage = document.getElementById('error-message');
    if (errorMessage) {
      errorMessage.style.display = 'none';
    }
  }, 5000);
</script>

 
@endsection