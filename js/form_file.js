$(document).ready(function(){
  $('#select-maquina').on('change', function(){
    var maquina = $(this).val();
    $('#maquina').val(maquina)
    $.ajax({
      type: "POST",
      url: 'consulta_datos.php',
      data: {maquina: maquina,
             fecha: fecha,
             local: local
            },
      dataType: 'json',
      success: function(data){
        $('#fecha').html('<b>Fecha:</b> '+ data.local[0])
        $('#titulo1 b').html(data.local[10])
        $('#titulo2 b').html(data.local[11])
        $('#titulo3 b').html(data.local[12])
        $('#titulo4 b').html(data.local[13])
        $('#maquina-nro').html('<b>Maquina nro: </b>'+ data.local[1])
        $('#modelo').html('<b>Modelo: </b>'+ data.local[3] +', '+ data.local[4])
        $('#denom').html('<b>Denom: </b>'+ data.local[5])
        $('#mecanicoInicialE').html(data.local[6])
        $('#mecanicoInicialS').html(data.local[7])
        $('#electronicoInicialE').html(data.local[8])
        $('#electronicoInicialS').html(data.local[9])
        if(data.edit){
          $('#mecanicoFinalE').val(data.edit[2])
          $('#mecanicoFinalS').val(data.edit[3])
          $('#electronicoFinalE').val(data.edit[4])
          $('#electronicoFinalS').val(data.edit[5])
          $('#mecanicoTotalE').html(data.local[6] - data.edit[2])
          $('#mecanicoTotalS').html(data.local[7] - data.edit[3])
          $('#electronicoTotalE').html(data.local[8] - data.edit[4])
          $('#electronicoTotalS').html(data.local[9] - data.edit[5])
        }else{
          $('#mecanicoFinalE').val(0)
          $('#mecanicoFinalS').val(0)
          $('#electronicoFinalE').val(0)
          $('#electronicoFinalS').val(0)
          $('#mecanicoTotalE').html(0)
          $('#mecanicoTotalS').html(0)
          $('#electronicoTotalE').html(0)
          $('#electronicoTotalS').html(0)
        }
      }
    });
  });

  $('#save_file').submit(function(event) {
    var action = $(this).attr('action');
    var datos = $(this).serialize();
    $.ajax({
      type: "POST",
      url: action,
      data: datos,
      dataType: 'json',
      success: function(data){
        if(data.success){
          alert(data.msg);
        }else{
          alert(data.msg);
        }
      }
    });
    event.preventDefault();
  });
});
