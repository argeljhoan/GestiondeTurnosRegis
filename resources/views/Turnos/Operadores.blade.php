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
        
      </tr>
    </thead>
    <tbody>

   
        @if ($citas)
        @foreach ($citas as $cita)
            @if ($cita->turnos->isEmpty())
                <tr>
                    <td>{{ $cita->id }}</td>
                    <td>{{ $cita->documento }}</td>
                    <td>{{ $cita->identificacion }}</td>
                    <td>{{ $cita->nombre }}</td>
                    <td>{{ $cita->apellido }}</td>
                    
                    <td>{{ $cita->hora }}</td>
                    <td>----</td>
                    
                    <td>{{ $cita->estado->name }}</td>
                    <td>{{ $cita->tramite->name }}</td>
                </tr>
            @else
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
                    </tr>
                @endforeach
            @endif
        @endforeach
   
       
    @endif


    </tbody>
  </table>
    <!-- Pagination -->
    
</section>
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