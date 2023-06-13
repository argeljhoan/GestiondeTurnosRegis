@extends('layouts.plantilla')


@section('content1')
<section>
    <div class="">
        <div class="header">
            <img src="images/logo-black.svg" alt="Logo Registraduría Nacional del Estado Civil">
        </div>
    </div>

</section>

<section class=" mt-5">
    

    <div class="container mt-5">
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4">
            
             <h1>Usuario Atendidos</h1>

            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-4">

              <h1> Turnos Actuales</h1>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card mb-4">

              <h1> Turnos Proximos</h1>

            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4">

              <h1>Promedio de Atencion Por Modulo</h1>

            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-4">

              <h1> Cedulas Digitales</h1>

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
  $(document).ready(function() {
    // Desplazamiento suave al hacer clic en un enlace del menú
    $('a[data-scroll]').on('click', function(e) {
      e.preventDefault();
      var target = $(this).attr('href');
      $('html, body').animate({
        scrollTop: $(target).offset().top
      }, 500);
    });
  });
</script>
 

@endsection