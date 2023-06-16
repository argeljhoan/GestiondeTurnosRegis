@extends('layouts.plantilla')


@section('content1')


<section class=" mt-5">
  
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4" style="height: 450px; overflow-y: auto;">
                    <div class="card-header">{{ __('Turnos Actuales') }}</div>
                    <div class="container">
                        <div class="row">
                            @foreach ($turnosActuales as $turno)
                            <div class="col-md-6 mt-3">
                                <div class="card" style="height: 100%;">
                                    <div class="card-body">
                                        <h3 class="card-title">{{$turno->modulo->nameModulo}}</h3>
                                        <div class="mt-3">
                                            <h3 class="card-title text-primary">Turno: <span class="bg-primary" style="padding: 5px; color:white;border-radius: 8px">{{$turno->name}}</span></h3>
                                            <h6 class="card-title"><strong class="text-primary"  style="font-size:15px">Nombre:</strong> {{ $turno->cita->nombre}} {{ $turno->cita->apellido }}</h6>
                                            <h6 class="card-title"><strong class="text-primary" style="font-size:15px">Identificacion:</strong> {{ $turno->cita->identificacion }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (($loop->iteration % 2) === 0)
                                </div>
                                <div class="row">
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-6">
                <div class="card mb-4" style="height: 450px; overflow-y: auto;">
                    <div class="card-header">{{ __('Promedio de Atencion') }}</div>
                    <div class="container">
                        <div class="row">
                            @foreach ($modulos as $modulo)
                            <div class="col-md-6 mt-3">
                                <div class="card" style="height: 100%;">
                                    <div class="card-body">
                                        <h3 class="card-title">{{$modulo->nameModulo}}</h3>
                                        <div class="mt-3">
                                            <h4 class="text-primary"><strong>Operador:</strong></h4>
                                            <h4 class="card-title ">{{$modulo->user->name}}</h4>
                                            <h6 class="card-title "><strong class="text-primary" style="font-size:15px">Personas Atendidas:</strong> {{ $modulo->persona}} </h6>
                                            <h6 class="card-title "><strong class="text-primary" style="font-size:15px">Promedio:</strong> {{ $modulo->promedio}} </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (($loop->iteration % 2) === 0)
                                </div>
                                <div class="row">
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="container mt-2">
      
      
        <div class="row">

            <div class="col">

                <div class="col-md-12">
           
                    <div class="card mb-2">
                        <div class="card-header">{{ __('Usuarios Atendidos') }}</div>
                        <div class="card-body">
                            <h3 class="text-primary">Usuarios Atendidos: <span style="color:black">{{$atendido}}</span></h3>
                            
                        </div>
        
                     
                    </div>
                  </div>


                  <div class="col-md-12">
           
                    <div class="card mb-2">
                        <div class="card-header">{{ __('Cedulas Digitales Atendidos') }}</div>
                        <div class="card-body">
                            <h3 class="text-primary">C.C Digitales Atendidas: <span style="color:black">{{$cedulas}}</span></h3>
                            
                        </div>
        
                     
                    </div>
                  </div>


            </div>
         
      

          <div class="col">  

          <div class="col-md-12">
            <div class="card mb-4" style="height: 450px; overflow-y: auto;">
                <div class="card-header">{{ __('Proximos Turnos') }}</div>
                <div class="container">
                    <div class="row">
                        @foreach ($turnosProximos as $turnosproximo)
                        <div class="col-md-6 mt-3">
                            <div class="card" style="height: 100%;">
                                <div class="card-body">
    
                                    <div class="mt-3">
                                        <h4 class="text-primary"><strong>Turno:</strong></h4>
                                        <h4 class="card-title ">{{$turnosproximo->name}}</h4>
                                        <h6 class="card-title "><strong class="text-primary" style="font-size:15px">Identificacion:</strong> {{ $turnosproximo ->cita->identificacion}}</h6>
                                        <h6 class="card-title "><strong class="text-primary" style="font-size:15px">Nombres:</strong> {{ $turnosproximo ->cita->nombre}} {{ $turnosproximo ->cita->apellido}}</h6>
                                        <h6 class="card-title "><strong class="text-primary" style="font-size:15px">Fecha:</strong> {{ $turnosproximo ->created_at;}} </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (($loop->iteration % 2) === 0)
                            </div>
                            <div class="row">
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
      </div>
    </div>
 
    

</section>

@endsection
@section('scripts')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    setTimeout(function() {
      location.reload();
    }, 120000); 
  </script>

 

@endsection