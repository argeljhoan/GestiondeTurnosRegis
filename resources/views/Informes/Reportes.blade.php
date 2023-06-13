@extends('layouts.plantilla')


@section('content1')


<section class="container">
    <!-- Ver Modulos button -->
    <table class="table">
      <tr>
        <td>
          <div class="button1">
            @can('Modulos.Gestion')
            <a class="btn btn-primary" href="{{ route('Modulos.Gestion') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                <path d="M8 2a6 6 0 0 0-6 6c0 1.608.784 3.093 2.086 4.003C3.15 12.112 5.16 13 8 13c2.84 0 4.85-.888 5.914-2.997C13.216 11.094 14 9.609 14 8a6 6 0 0 0-6-6zm0 10c-1.691 0-3.203-.81-4.177-2.077A17.8 17.8 0 0 1 2 8a17.8 17.8 0 0 1 1.823-1.923C4.797 4.81 6.309 4 8 4c1.691 0 3.203.81 4.177 2.077A17.8 17.8 0 0 1 14 8a17.8 17.8 0 0 1-1.823 1.923C11.203 11.19 9.691 12 8 12zm0-7a1 1 0 1 1 0 2 1 1 0 0 1 0-2Z" />
              </svg> Ver Modulos
            </a>
            @endcan
          </div>
        </td>
      </tr>
    </table>
  
    <!-- Search form -->
  @if($num == '1')
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">{{ __('Buscar Por Rango de Fecha') }}</div>
            <div class="card-body">
              <form method="POST" action="{{ route('Informes.BusquedaRango') }}">
                @csrf
                <div class="d-flex flex-column justify-content-center">
                  <div class="col-md-10">
                  <label for="fechaInicio" class="col-md-4 col-form-label">{{ __('Fecha Inicio:') }}</label>
                 
                    <input id="fechaInicio" type="date" class="form-control" name="fechaInicio" value="{{ old('fechaInicio') }}" required autocomplete="fechaInicio" autofocus>
                  </div>
                  <div class="col-md-10 mt-2">
                    
                    <label for="fechaFinal" class="col-md-4 col-form-label">{{ __('Fecha Final:') }}</label>
                    <input id="fechaFinal" type="date" class="form-control" name="fechaFinal" value="{{ old('fechaFinal') }}" required autocomplete="fechaFinal" autofocus>
                  </div>
                  <div class="mt-3">
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
                  <div class="mt-3">
                    <button class="btn btn-primary" type="submit">Consultar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      @elseif($num == '2')
   
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card">
              <div class="card-header">{{ __('Buscar Por Estado') }}</div>
              <div class="card-body">
                <form method="POST" action="{{ route('Informes.BusquedaEstado') }}">
                  @csrf
                  <div class="d-flex flex-column justify-content-center">

                    <div class="row mb-3">
                      <label for="estado" class="col-md-4 col-form-label">{{ __('Estados:') }}</label>

                      <div class="col-md-6">
                        <select class="form-select" name="estado" id="estado" required>
                          <option value="">Seleccione un Estado</option>
                           @foreach ($resultados as $estado)
                           <option value="{{ $estado->id }}">{{ $estado->name }}</option>
                           @endforeach
                            
                        </select>
                      </div>
                  </div>

                    <div class="col-md-10">
                    <label for="fechaInicio" class="col-md-4 col-form-label">{{ __('Fecha Inicio:') }}</label>
                   
                    <input id="fechaInicio" type="date" class="form-control" name="fechaInicio" value="{{ old('fechaInicio') }}" required autocomplete="fechaInicio" autofocus>
                    </div>
                    <div class="col-md-10 mt-2">
                      
                      <label for="fechaFinal" class="col-md-4 col-form-label">{{ __('Fecha Final:') }}</label>
                      <input id="fechaFinal" type="date" class="form-control" name="fechaFinal" value="{{ old('fechaFinal') }}" required autocomplete="fechaFinal" autofocus>
                    </div>
                    <div class="mt-3">
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
                    <div class="mt-3">
                      <button class="btn btn-primary" type="submit">Consultar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        @elseif($num == '3')
     
        <div class="container">
          <div class="row">
            <div class="col-md-8 offset-md-2">
              <div class="card">
                <div class="card-header">{{ __('Buscar Por Tramite') }}</div>
                <div class="card-body">
                  <form method="POST" action="{{ route('Informes.BusquedaTramite') }}">
                    @csrf
                    <div class="d-flex flex-column justify-content-center">

                      <div class="row mb-3">
                        <label for="tramite" class="col-md-4 col-form-label">{{ __('Tramites:') }}</label>
  
                        <div class="col-md-6">
                          <select class="form-select" name="tramite" id="tramite" required>
                            <option value="">Seleccione un Tramite</option>
                             @foreach ($resultados as $tramite)
                             <option value="{{ $tramite->id }}">{{ $tramite->name }}</option>
                             @endforeach
                              
                          </select>
                        </div>
                    </div>



                      <div class="col-md-10">
                      <label for="fechaInicio" class="col-md-4 col-form-label">{{ __('Fecha Inicio:') }}</label>
                     
                        <input id="fechaInicio" type="date" class="form-control" name="fechaInicio" value="{{ old('fechaInicio') }}" required autocomplete="fechaInicio" autofocus>
                      </div>
                      <div class="col-md-10 mt-2">
                        
                        <label for="fechaFinal" class="col-md-4 col-form-label">{{ __('Fecha Final:') }}</label>
                        <input id="fechaFinal" type="date" class="form-control" name="fechaFinal" value="{{ old('fechaFinal') }}" required autocomplete="fechaFinal" autofocus>
                      </div>
                      <div class="mt-3">
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
                      <div class="mt-3">
                        <button class="btn btn-primary" type="submit">Consultar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @elseif($num == '4')
        
          <div class="container">
            <div class="row">
              <div class="col-md-8 offset-md-2">
                <div class="card">
                  <div class="card-header">{{ __('Buscar Por Modulo') }}</div>
                  <div class="card-body">
                    <form method="POST" action="{{ route('Informes.BusquedaModulo') }}">
                      @csrf

                      <div class="row mb-3">
                        <label for="modulo" class="col-md-4 col-form-label">{{ __('Modulos:') }}</label>
  
                        <div class="col-md-6">
                          <select class="form-select" name="modulo" id="modulo" required>
                            <option value="">Seleccione un Modulo</option>
                             @foreach ($resultados as $modulo)
                             <option value="{{ $modulo->id }}">{{ $modulo->nameModulo }}</option>
                             @endforeach
                              
                          </select>
                        </div>
                    </div>

                      <div class="d-flex flex-column justify-content-center">
                        <div class="col-md-10">
                        <label for="fechaInicio" class="col-md-4 col-form-label">{{ __('Fecha Inicio:') }}</label>
                       
                          <input id="fechaInicio" type="date" class="form-control" name="fechaInicio" value="{{ old('fechaInicio') }}" required autocomplete="fechaInicio" autofocus>
                        </div>
                        <div class="col-md-10 mt-2">
                          
                          <label for="fechaFinal" class="col-md-4 col-form-label">{{ __('Fecha Final:') }}</label>
                          <input id="fechaFinal" type="date" class="form-control" name="fechaFinal" value="{{ old('fechaFinal') }}" required autocomplete="fechaFinal" autofocus>
                        </div>
                        <div class="mt-3">
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
                        <div class="mt-3">
                          <button class="btn btn-primary" type="submit">Consultar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        @endif





      <!-- Error/success messages -->
     

    <!-- Appointments table -->

  
<div class="d-flex justify-content-end mt-5">
<form action="{{ route('Informes.Generar') }}" method="POST"  jus>
  @csrf
  <input type="hidden" name="citas" value="{{ json_encode($citas) }}">
  <button type="submit" class="btn btn-success">Exportar Reporte</button>
</form>
</div>
      
    
    <table class="table border-primary mt-3 table-hover">
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