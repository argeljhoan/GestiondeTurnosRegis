$(document).ready(function() {
  // Obtener el elemento del cronómetro
  var tiempoElement = document.getElementById('tiempo');
  var contador = 0;

  // Obtener el valor inicial del contador desde el campo de tiempo en la página
  var tiempoInicial = parseInt(tiempoElement.textContent);

console.log(tiempoInicial);

  // Verificar si se obtuvo un valor válido desde la página o el almacenamiento local
  var contadorLocalStorage = localStorage.getItem('contador');
  if (tiempoInicial == 0 ) {
    contador = tiempoInicial;
  }
  else if(contadorLocalStorage) {
    contador = parseInt(contadorLocalStorage);
  } else {
    
  }

  // Función para actualizar el contador cada segundo
  function actualizarCronometro() {
    contador++;
    var horas = Math.floor(contador / 3600);
    var minutos = Math.floor((contador % 3600) / 60);
    var segundos = contador % 60;
    tiempoInicial = contador;
    tiempoElement.textContent = horas.toString().padStart(2, '0') + ':' +
                                 minutos.toString().padStart(2, '0') + ':' +
                                 segundos.toString().padStart(2, '0');
  }

  // Iniciar el contador
  var intervalo = setInterval(actualizarCronometro, 1000);

  window.addEventListener('beforeunload', function() {
    localStorage.setItem('contador', contador);
    tiempoInicial = contador;
  });

  // Enviar el valor del contador al formulario cuando se envíe
  $('#tiempoForm').submit(function() {
    tiempoInicial = contador;
    var tiempoTranscurridoInput = document.getElementById('tiempo_transcurrido');
    tiempoTranscurridoInput.value = contador;
    clearInterval(intervalo); // Detener el contador
  });

});