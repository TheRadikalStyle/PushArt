$(document).ready(function () {
      var nombre2;

  var nan=$(this).attr('name');
        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'idPeticionPara': $('input[name='+nan+']').val()
        };

        // process the form
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: 'validaciones/SeleccionImagen.php', // the url where we want to POST
            data: formData, // our data object
            dataType: 'json', // what type of data do we expect back from the server
            encode: true,
            beforeSend: function() {

                $("#popup_content").html("<div align='center'>Verificando Datos...</div><div><img class='loading_bar' src='Imagen/loading.gif'/></div>");
                $("#popup_button").click();

            },
            success: function(data3) {

                console.log(data3);

                if (!data3[0]) {

                    // handle errors for name ---------------
                    if (data3.errors.ComentarioMensaje) {

                        $('#coment-group').addClass('has-error'); // add the error class to show red input
                        $('#coment-group').append('<div class="help-block">' + data.errors.ComentarioMensaje + '</div>'); // add the actual error message under our input
                    }


                } else {
                    $("#Muroglobal").empty();
                }
          },
            error: function() {
                $("#popup_content").html("<div>Ocurrio un problema al publicar un comentario</div>");
                $("#popup_button").click();
            }
        });
    
    
    
});


