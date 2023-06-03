@extends('layouts.plantilla')


@section('content1')


<section class="container">
    <!-- Ver Modulos button -->
    <table class="table">
      <tr>
        <td>
          <div class="button1">
            <a class="btn btn-primary" href="{{ route('Modulos.Gestion') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                <path d="M8 2a6 6 0 0 0-6 6c0 1.608.784 3.093 2.086 4.003C3.15 12.112 5.16 13 8 13c2.84 0 4.85-.888 5.914-2.997C13.216 11.094 14 9.609 14 8a6 6 0 0 0-6-6zm0 10c-1.691 0-3.203-.81-4.177-2.077A17.8 17.8 0 0 1 2 8a17.8 17.8 0 0 1 1.823-1.923C4.797 4.81 6.309 4 8 4c1.691 0 3.203.81 4.177 2.077A17.8 17.8 0 0 1 14 8a17.8 17.8 0 0 1-1.823 1.923C11.203 11.19 9.691 12 8 12zm0-7a1 1 0 1 1 0 2 1 1 0 0 1 0-2Z" />
              </svg> Ver Modulos
            </a>
          </div>
        </td>
      </tr>
    </table>
  
    <!-- Search form -->
    <div class="container center">
      <div class="row">
        <div class="col-sm-8 offset-sm-2">
          <form method="POST" action="{{ route('Turnos.Buscar') }}">
            @csrf
            <div class="input-group mb-3 gap-2">
              <div class="col-md-10">
                <input id="name" placeholder="Ingrese su Identificacion" type="number" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Buscar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- Error/success messages -->
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
  
    <!-- Appointments table -->
    <table class="table border-primary mt-5 table-hover">
      <thead class="table-primary">
        <tr>
          <th>Id</th>
          <th>Doc</th>
          <th>Identificacion</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Fecha-Cita</th>
          <th>Hora-Cita</th>
          <th>Turno</th>
          <th>Fecha-Turno</th>
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
                    <td>{{ $cita->fechaCita }}</td>
                    <td>{{ $cita->hora }}</td>
                    <td>----</td>
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
                        <td>{{ $cita->fechaCita }}</td>
                        <td>{{ $cita->hora }}</td>
                        <td>{{ $turno->name }}</td>
                        <td>{{ $turno->created_at->format('d-m-Y H:i:s') }}</td>
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