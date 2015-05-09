$(document).ready(function(){

  function cargar_operacion( input_inicial, input_final, input_total ){
    $(input_final).on('keyup', function(){
      mecanicoInicialE  = $(input_inicial).text()
      if ( mecanicoInicialE != '----' ){
        mecanicoFinalE = $(input_final).val()
        $(input_total).text(mecanicoInicialE-mecanicoFinalE)
      }
    });
  }

  cargar_operacion('#mecanicoInicialE', '#mecanicoFinalE', '#mecanicoTotalE' )
  cargar_operacion('#mecanicoInicialS', '#mecanicoFinalS', '#mecanicoTotalS' )
  cargar_operacion('#electronicoInicialE', '#electronicoFinalE', '#electronicoTotalE' )
  cargar_operacion('#electronicoInicialS', '#electronicoFinalS', '#electronicoTotalS' )
  
  $('#electronicoFinalE').on('keyup', function(){
    $('#colectado').text($('#electronicoTotalE').text())
    totalizar()
  });

  $('#mecanicoFinalS').on('keyup', function(){
    $('#premios').text($('#mecanicoTotalS').text())
    totalizar()
  });
  
  function totalizar() {
    colectado = $('#colectado').text()
    premios = $('#premios').text()
    if ( colectado != '-----' && premios !='-----'){
      bruta = $('#colectado').text()-$('#premios').text()
      jcj = 14
      dividendo = bruta - jcj
      porcentaje1 = bruta/2
      porcentaje2 = bruta/2
      cliente = premios + (premios*0.50)
      empresa = jcj + (jcj*0.50)
      // setters
      $('#rBruta').text(bruta)
      $('#jcj').text(jcj)
      $('#dividendo').text(dividendo)
      $('#porcentaje1').text(porcentaje1)
      $('#porcentaje2').text(porcentaje2)
      $('#cliente').text(cliente)
      $('#empresa').text(empresa)
    }  
    
  }
  
  
  
});
