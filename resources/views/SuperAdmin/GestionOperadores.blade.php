@extends('layouts.plantilla')


@section('content1')


<section class="container">
    

    <table class="table  ">
      <tr>
        <td>
          <div class="button1"> 
            <a class="btn btn-primary" href="{{ route('admin.Registro') }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
              <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
              <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
              </svg> Añadir Operadores
            </a>                
          </div>
        </td>
      </tr>
</table>        
<table class="table   border-primary">
                  <thead class="table-primary">
                      <tr>
                          <th>Id</th>
                          <th>Nombre</th>
                          <th>email</th>
                          <th>Modulo</th>
                          <th>Editar</th>
                          <th>Eliminar</th>
                         

                      </tr>
                  </thead>
                  <tbody>
                  @foreach ($usuarios as $user)
                      <tr>
                        <td>{{$user ->id}}</td>
                        <td>{{$user ->name}}</td>
                        <td>{{$user ->email}}</td>
                        @foreach ($user->modulos as $modulo)
                          <td>{{ $modulo->nameModulo}}</td> 
                        
                        @endforeach
                        <td>
                            <div class="button">
                              <a class="btn btn-warning" href="{{ route('admin.Editar',$user) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                              </svg>
                              </a>
                            </div>
                        </td>
                        <td>

                            <div  class="button">
                              <a class="btn btn-danger" href="{{ route('admin.Eliminando',$user) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                </svg>
                              </a>
                            </div>
                        </td>
                      
                      </tr>
                      @endforeach
                      <tbody>     
              </table>
</section>

@endsection