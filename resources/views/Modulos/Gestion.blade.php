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
                            <a class="btn  btn-sm" style="background-color:#fa3841" href="{{ route('Modulos.Eliminar',$moduloData['id']) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M12 19c.946 0 1.81-.103 2.598-.281l-1.757-1.757c-.273.021-.55.038-.841.038-5.351 0-7.424-3.846-7.926-5a8.642 8.642 0 0 1 1.508-2.297L4.184 8.305c-1.538 1.667-2.121 3.346-2.132 3.379a.994.994 0 0 0 0 .633C2.073 12.383 4.367 19 12 19zm0-14c-1.837 0-3.346.396-4.604.981L3.707 2.293 2.293 3.707l18 18 1.414-1.414-3.319-3.319c2.614-1.951 3.547-4.615 3.561-4.657a.994.994 0 0 0 0-.633C21.927 11.617 19.633 5 12 5zm4.972 10.558-2.28-2.28c.19-.39.308-.819.308-1.278 0-1.641-1.359-3-3-3-.459 0-.888.118-1.277.309L8.915 7.501A9.26 9.26 0 0 1 12 7c5.351 0 7.424 3.846 7.926 5-.302.692-1.166 2.342-2.954 3.558z"></path></svg>
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


@endsection
