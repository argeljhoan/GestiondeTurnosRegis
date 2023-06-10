document.addEventListener('DOMContentLoaded', function() {
  var tiempoInicio = new Date().getTime();

  function actualizarCronometro() {
    var tiempoActual = new Date().getTime();
    var tiempoTranscurrido = tiempoActual - tiempoInicio;

    // Formatear el tiempo transcurrido como una cadena legible (opcional)
    var horas = Math.floor(tiempoTranscurrido / 3600000);
    var minutos = Math.floor((tiempoTranscurrido % 3600000) / 60000);
    var segundos = Math.floor((tiempoTranscurrido % 60000) / 1000);
    var tiempoFormateado = horas + ':' + minutos + ':' + segundos;

    // Actualizar el elemento HTML con el tiempo transcurrido formateado (opcional)
    document.getElementById('tiempo').textContent = tiempoFormateado;
    
    document.getElementById('tiempo_transcurrido').value = tiempoTranscurrido;

    setTimeout(actualizarCronometro, 1000);
  }

  actualizarCronometro();
});