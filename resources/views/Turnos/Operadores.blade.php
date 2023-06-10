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
    <div class="pagination justify-content-end">
        <nav>
          <ul class="pagination">
            @if ($citas->lastPage() > 1)
            {{-- Flecha "Anterior" --}}
            @if ($citas->onFirstPage())
            <li class="page-item disabled">
              <span class="page-link" aria-label="Anterior">
                <span aria-hidden="true">&laquo;</span>
              </span>
            </li>
            @else
            <li class="page-item">
              <a class="page-link" href="{{ $citas->previousPageUrl() }}" aria-label="Anterior">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            @endif
    
            {{-- Números de página --}}
            @for ($i = 1; $i <= $citas->lastPage(); $i++)
            @if ($citas->currentPage() == $i)
            <li class="page-item active">
              <span class="page-link">{{ $i }}</span>
            </li>
            @else
            <li class="page-item">
              <a class="page-link" href="{{ $citas->url($i) }}">{{ $i }}</a>
            </li>
            @endif
            @endfor
    
            {{-- Flecha "Siguiente" --}}
            @if ($citas->hasMorePages())
            <li class="page-item">
              <a class="page-link" href="{{ $citas->nextPageUrl() }}" aria-label="Siguiente">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
            @else
            <li class="page-item disabled">
              <span class="page-link" aria-label="Siguiente">
                <span aria-hidden="true">&raquo;</span>
              </span>
            </li>
            @endif
            @endif
          </ul>
        </nav>
      </div>
</section>
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