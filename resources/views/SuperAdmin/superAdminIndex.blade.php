@extends('layouts.plantilla')


@section('content1')


<section class="main-section">
    <div class="accordion">
        <div class="header">
            <img src="images/logo-black.svg" alt="Logo Registraduría Nacional del Estado Civil">
        </div>
        <ul>
            <li tabindex="0">
                <div>
                    <a href="#">
                        <section class="hero-section">
                            <div class="content">
                                <h1>Bienvenido a la Registraduría Especial de Cúcuta</h1>
                                <p>¡Transformando la experiencia de los trámites en línea!</p>
                            </div>
                        </section>
                    </a>
                </div>s
            </li>
        </ul>
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