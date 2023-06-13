@extends('layouts.plantilla')


@section('content1')

<div class="container  table-hover">
    <div class="row " >
        @foreach ($modulosData as $moduloData)
        <div class="col-md-3 mt-3">
            <div class="card" style="height: 320px; overflow-y: auto;">
                <div class="card-body">

                   
             


                    <div class="d-flex justify-content-between">

                        <div class="d-flex justify-content-start gap-2">
                            @can('Modulos.Gestion')
                            <a class="btn btn-primary btn-sm text-end" href="{{ route('Modulos.Turnos',$moduloData['id']) }}">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M8 2a6 6 0 0 0-6 6c0 1.608.784 3.093 2.086 4.003C3.15 12.112 5.16 13 8 13c2.84 0 4.85-.888 5.914-2.997C13.216 11.094 14 9.609 14 8a6 6 0 0 0-6-6zm0 10c-1.691 0-3.203-.81-4.177-2.077A17.8 17.8 0 0 1 2 8a17.8 17.8 0 0 1 1.823-1.923C4.797 4.81 6.309 4 8 4c1.691 0 3.203.81 4.177 2.077A17.8 17.8 0 0 1 14 8a17.8 17.8 0 0 1-1.823 1.923C11.203 11.19 9.691 12 8 12zm0-7a1 1 0 1 1 0 2 1 1 0 0 1 0-2Z" />
                              </svg> Ver Modulo
                            </a>
                            @endcan
                          </div>

                        <div class="d-flex justify-content-end gap-2">             
                        <div class="button">
                            <a class="btn btn-warning btn-sm" href="{{ route('Modulos.Editar',$moduloData['id']) }} ">
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                              <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                            </svg>
                            </a>
                        </div>
                    
                        <div class="button">
                            <a class="btn btn-danger btn-sm" href="{{ route('Modulos.Eliminar',$moduloData['id']) }}">
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="10" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                              </svg>
                            </a>
                        </div>
                    </div>

                    </div>
                    <div class="mt-4">
                    <h4 class="card-title" style= "color: #2e14ff;font-weight: 700">{{ $moduloData['modulo'] }}</h4>
                    <h5 class="card-title"> {{ $moduloData['User'] }} </h5> 
                    <p class="card-text">Trámites:</p>
                    <ul>
                        @foreach ($moduloData['tramites'] as $tramite)
                            <li>{{ $tramite }}</li>
                        @endforeach
                    </ul>
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

    <div class="container d-flex align-items-end mt-5">
        <table class="table">
            <tr>
                <td>
                    <div class="d-flex justify-content-end">
                        <div class="button1"> 
                            <a class="btn btn-primary" href="{{ route('Modulos.Registro') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                                    <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                                </svg> Añadir Modulo
                            </a>                
                        </div>
                    </div>
                </td>
            </tr>
        </table>     
    </div>
@endsection
@section('scripts')

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
