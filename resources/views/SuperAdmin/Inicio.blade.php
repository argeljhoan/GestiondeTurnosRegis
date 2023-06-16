@extends('layouts.plantilla')


@section('content1')
<section>
    <div class="d-flex justify-content-center">
        <div class="header">
            <img src="images/logo-black.svg" alt="Logo Registraduría Nacional del Estado Civil">
        </div>
    </div>

</section>

<section class=" mt-5">
  
 <div class="container  " id="divregis" style="border: solid 1px black; ">
    <div class="d-flex  flex-column justify-content-center mt-5" style=" padding:15px;">
    <h1>Bienvenido</h1>
    <h2>Registraduría Especial de Cúcuta</h2>
    <p>¡Transformando la experiencia de los trámites en línea!</p>
</div>
  </div>
    
</section>


@endsection
@section('scripts')


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script>

 

    var errorMessage = document.getElementById('divregis');

  

setInterval(function() {
    errorMessage.style.display = errorMessage.style.display === 'none' ? 'block' : 'none';
}, 5000);

</script>
@endsection