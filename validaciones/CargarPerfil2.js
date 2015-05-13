$(document).ready(function () {
 var FotoMuro;
 var idcomentariomuro;
                         // process the form
                    $.ajax({
                        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                        url: 'validaciones/CargarPerfilDate2.php',
                        dataType: 'json', // what type of data do we expect back from the server
                        encode: true
                    })
                            // using the done promise callback
                            .done(function (data) {

                                // log data to the console so we can see
                                console.log(data);

                                // here we will handle errors and validation messages
                                if (!data[0]) {
                                            alert("Error al cargar los datos revisar conexion");
                                } else {
                                    
                                       $("#ImagenesUser").empty();
                                      for (var z=1;z<data.length;z++) {
                                       FotoMuro=data[z]['FotoMuro'];
                                        idcomentariomuro=data[z]['idcomentariomuro'];
                                       $("#ImagenesUser").append('<div class="swiper-slide" style="background-image:url(validaciones/'+FotoMuro+')"><img id="name1'+z+'" name="'+idcomentariomuro+'" class="perfil-img2" src="http://www.cosassencillas.com/wp-content/uploads/2007/12/Botonesconuneleganteefectocristalbrillan_884C/ShinyButtonBlue.png"></div>');
                                     
                                    $("#name1"+z).on('click', function () {
         var foto2;
 var comentario2;
 var idcomhijo2;
 var nombrehijo2;
  var fotohijo2;
 var comentariohijo2;
 var idcomhijohijo2;
 var nombre2;
  var array22;
  var FotoMuro2;
  var nombreimg;
var Dislikes;
var likes;
  var nan=$(this).attr('name');
        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
                'idcomentario': nan
            };

        // process the form
        $.ajax({
            type: 'POST', // define the type
            // of HTTP verb we want to use (POST for our form)
            url: 'validaciones/SeleccionImagen2.php', // the url where we want to POST
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
               $("#Muroglobal2").empty();
                    nombre2=data3[1]['nombreUser2'];
                    foto2=data3[1]['Foto2'];
                    comentario2=data3[1]['Comentario2'];
                    idcomhijo2=data3[1]['idComHijo2'];
                    array22=data3[1]['array2'];
                      FotoMuro2=data3[1]['FotoMuro'];
                      nombreimg=data3[1]['nombreimg'];
                      likes=data3[2]['likes'];
                      Dislikes=data3[2]['Dislikes'];
                   $("#Muroglobal2").append('<div data-role="main" class="ui-content jqm-content contenido" style="height: 100%;  border-width: 0;\n\
  overflow: visible;\n\
  overflow: hidden;\n\
  background: white">\n\
    <div style="  font-family: cursive;\n\
  font-size: larger;\n\
  font-style: oblique;\n\
  font-variant: small-caps;\n\
  color: brown;">'+nombreimg+'</div><a data-toggle="modal" data-target="#EditarPerfi2" style="position: relative; float: right;margin-top: -5%;">editar</a>\n\
                    <div id="contenido" style="display: block; ">\n\
                        <img src="validaciones/'+foto2+'" style="position: absolute;\n\
  float: left;\n\
  margin-top: 10px;\n\
  margin-left: 15px;\n\
  width: 70px;\n\
  height: 70px;\n\
  border-radius: 50%;\n\
  border: solid blue 3px;">\n\
                        <img src="validaciones/'+FotoMuro2+'" style="width: 100%;\n\
  height: 236px;\n\
  margin-left: 40px;\n\
  margin-top: 25px;\n\
  padding-right: 80px;">\n\
</div>\n\
    <div id="likes'+idcomhijo2+'" name="'+idcomhijo2+'">'+likes+' Like</div>     <div id="Dislike'+idcomhijo2+'" name="'+idcomhijo2+'">'+Dislikes+' Dislike</div>     <div id="Reportar'+idcomhijo2+'"  name="'+idcomhijo2+'">Reportar</div>\n\
                  <div style="background-color: #FFF;\n\
  margin-top: 10px;\n\
  margin-left: 5px;\n\
  padding: 10px;">\n\
 <div style="position: absolute;   box-sizing: border-box;">\n\
<a href="#" class="ui-link">\n\
    <img src="validaciones/'+foto2+'" alt="" style="  width: 40px;\n\
  height: 40px;  display: block;\n\
  border-radius: 50%;\n\
  background-clip: padding-box;\n\
  margin-top: 5px">\n\
</a>\n\
</div>\n\
 <div style="  padding-left: 45px;  position: relative;">\n\
<header class="story-header">\n\
<div class="story-author" style="  font-weight: 300;">\n\
<a class="story-author-link ui-link">\n\
'+nombre2+' ->Descripcion</a>\n\
</div>\n\
</header>\n\
     <div style="color: #6c6f75;\n\
  font-size: 0.85em;">\n\
'+comentario2+'</div>\n\
<footer style="  font-size: 0.85em;">\n\
</footer>\n\
</div>\n\
            </div>\n\
              <div id="'+idcomhijo2+'" style="background-color: #FFF;\n\
  margin-top: 10px;\n\
  margin-left: 40px;\n\
  padding: 10px;\n\
  margin-bottom: 10px;\n\
  overflow: auto;\n\
     max-height: 293px;">\n\
</div>\n\
<div class="conversation-new-message" style="margin-top: 10px">\n\
<form class="CrearComentarioHijo" method="POST" role="form">\n\
<div class="form-group">\n\
<input type="text" name="Comentario" class="form-control" rows="2" placeholder="Ingresar tu comentario...">\n\
</div>\n\
<div class="clearfix">\n\
     <input name="idNot" type="hidden" value="'+idcomhijo2+'">\n\
<button name="crea" type="submit" value="Comentar" class="btn btn-success pull-right">Comentar</button>\n\
</div>\n\
</form>\n\
    </div>\n\
                </div>\n\
<div class="modal fade" id="EditarPerfi2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\n\
  <div class="modal-dialog" >\n\
                    <div class="modal-header" >\n\
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>\n\
                        <h3 class="modal-title" style="color: white;" id="myModalLabel">Editar Imagen</h3>\n\
                    </div>\n\
                    <div class="panel panel-default">\n\
                        <form class="form-horizontal" method="POST" role="form" id="CrearEdicion2">\n\
                            <div class="panel-body">\n\
                                <div class="form-group form-group-lg">\n\
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge" style="text-align: left">Nombre:</label>\n\
                                    <div class="col-sm-10">\n\
                                        <input class="form-control" type="text" name="nombre" value="'+nombreimg+'" id="formGroupInputLarge" placeholder="'+nombreimg+'">\n\
                                         <input class="form-control" name="nombreid" type="hidden" value="'+idcomhijo2+'" id="formGroupInputLarge" placeholder="">\n\
                                    </div>\n\
                                </div>\n\
                                   <div class="form-group form-group-lg">\n\
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge" style="text-align: left">Descripcion:</label>\n\
                                    <div class="col-sm-10">\n\
                                        <input class="form-control" type="text" name="Descripcion" value="'+comentario2+'" id="formGroupInputLarge" placeholder="'+comentario2+'">\n\
                                    </div>\n\
                                </div>\n\
                                 <div id="archivo-group">\n\
                                    <label for="exampleInputFile">Seleccionar categoria</label>\n\
                                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">\n\
                                    <div class="select-style">\n\
                                        <p class="help-block">Seleccione una categoria para tu imagen:</p>\n\
                                      <select name="Carpeta">\n\
                                        <option value="0">Global</option>\n\
                                            <option value="1">Dibujos e Imagenes</option>\n\
                                            <option value="2">Diseño Digital</option>\n\
                                            <option value="3">Esculturas</option>\n\
                                            <option value="4">Pinturas</option>\n\
                                            <option value="5">Fotografias</option>\n\
                                                                                    </select>\n\
                                    </div>\n\
                                 <button class="btn btn-danger" style="margin-top: 5%" data-dismiss="modal">Eliminar</button>\n\
                            <div class="modal-footer">\n\
                                <button class="btn btn-default" data-dismiss="modal">Regresar</button><button id="SAve" type="submit" class="btn btn-primary">Guardar</button>\n\</div>\n\
                        </form>\n\
                    </div>\n\
                </div>\n\
</div>');
                    for(var z=0;z<array22.length;z++){
                                           nombrehijo2=array22[z]['nombreUserh2'];
                                           fotohijo2=array22[z]['Fotoh2'];
                                            comentariohijo2=array22[z]['Comentarioh2'];
                                             idcomhijohijo2=array22[z]['idComHijoh2'];
                       $("#"+idcomhijohijo2).append('<div style="position: relative;   box-sizing: border-box;">\n\
<a href="#" class="ui-link">\n\
    <img src="validaciones/'+fotohijo2+'" alt="" style="  width: 40px;\n\
  height: 40px;  display: block;\n\
  border-radius: 50%;\n\
  background-clip: padding-box;\n\
  margin-top: 5px">\n\
</a>\n\
</div>\n\
 <div style="  padding-left: 45px;  position: relative; margin-top: -48px">\n\
<header class="story-header">\n\
<div class="story-author" style="  font-weight: 300;">\n\
<a class="story-author-link ui-link">\n\
'+nombrehijo2+' ->Comentario</a>\n\
</div>\n\
</header>\n\
     <div style="color: #6c6f75;\n\
  font-size: 0.85em;">\n\
'+comentariohijo2+'</div>\n\
<footer style="  font-size: 0.85em;">\n\
</footer>\n\
</div>\n\
');
                    }
                    
                     $("#Dislike"+idcomhijo2).on('click', function(){   
  var nan=$(this).attr('name');
        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'idLike': nan
        };

        // process the form
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: 'validaciones/DisLike.php', // the url where we want to POST
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
                 

                } else {
                    location.href = 'Perfil.html';
                    alert('valores guardados');
                }
            },
            error: function() {
                $("#popup_content").html("<div>Ocurrio un problema al publicar un comentario</div>");
                $("#popup_button").click();
            }
        });
 }); 
 $("#likes"+idcomhijo2).on('click', function(){   
  var nan=$(this).attr('name');
   alert(nan);
        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'idLike': nan
        };

        // process the form
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: 'validaciones/Like.php', // the url where we want to POST
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
                 

                } else {
                    
                    location.href = 'Perfil.html';
                    alert('valores guardados');
                }
            },
            error: function() {
                $("#popup_content").html("<div>Ocurrio un problema al publicar un comentario</div>");
                $("#popup_button").click();
            }
        });
 });                   
 $('#CrearEdicion2').submit(function (event) {
 var nombre2;
                    $("#SAve").attr('disabled', 'disabled');
                    $('.form-group').removeClass('has-error'); // remove the error class
                    $('.help-block').remove(); // remove the error text

                    var formData = {
                        'NombreEdita': $('input[name=nombre]').val(),
                        'nombreid': $('input[name=nombreid]').val(),
                        'Carpeta': $('select[name=Carpeta]').val(),
                         'Descripcion': $('select[name=Descripcion]').val()
                    };



                    // process the form
                    $.ajax({
                        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                        url: 'validaciones/EditarPerfil2.php', // the url where we want to POST
                        data: formData, // our data object
                        dataType: 'json', // what type of data do we expect back from the server
                        encode: true
                    })
                            // using the done promise callback
                            .done(function (data) {

                                // log data to the console so we can see
                                console.log(data);

                                // here we will handle errors and validation messages
                                if (!data.success) {

                                     $("#SAve").removeAttr('disabled');
                                    if (data.errors.Comentario) {
                                        $('#form-control').addClass('has-error'); // add the error class to show red input
                                        $('#form-control').append('<div class="help-block">' + data.errors.Comentario + '</div>'); // add the actual error message under our input
                                    }
                                    if (data.errors.Titulo) {
                                        $('#NotaName-group').addClass('has-error'); // add the error class to show red input
                                        $('#NotaName-group').append('<div class="help-block">' + data.errors.Titulo + '</div>'); // add the actual error message under our input
                                    }

                                } else {
                                    $("#SAve").removeAttr('disabled');
                                       redirecciona("Home.html");
                                }
                            })

                            // using the fail promise callback
                            .fail(function (data) {

                                // show any errors
                                // best to remove for production
                                console.log(data);
                            });

                    // stop the form from submitting the normal way and refreshing the page
                    event.preventDefault();
                });
                     $('.CrearComentarioHijo').submit(function(event) {
                         var nombre3;
 var foto3;
 var comentario3;
 var idcomhijo3;
            event.preventDefault();
            var x = $(this);
            $('.col-sm-10').removeClass('has-error'); // remove the error class
            $('.form-group').removeClass('has-error'); // remove the error class
            $('.help-block').remove(); // remove the error text
            var formData = {
                'Comentario': $('input[name=Comentario]').val(),
                'idNot': $('input[name=idNot]').val()
            };


            $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url: 'validaciones/ComentarioMuroVal.php', // the url where we want to POST
                data: formData, // our data object
                dataType: 'json', // what type of data do we expect back from the server
                encode: true,
                beforeSend: function() {

                    $("#popup_content").html("<div align='center'>Verificando Datos...</div><div><img class='loading_bar' src='Imagen/loading.gif'/></div>");
                    $("#popup_button").click();

                },
                success: function(data) {

                    console.log(data);
                    if (!data.success) {
                        if (data.errors.Comentario) {

                            $('#' + data.errors.Notas + '-gruop').addClass('has-error'); // add the error class to show red input
                            $('#' + data.errors.Notas + '-gruop').append('<div class="help-block">' + data.errors.Comentario + '</div>'); // add the actual error message under our input
                        }
                    } else {
                                     nombre3=data[1]['nombreUser3'];
                                           foto3=data[1]['Foto3'];
                                            comentario3=data[1]['Comentario3'];
                                             idcomhijo3=data[1]['idComHijo3'];
$("#"+idcomhijo3).append('<div style="position: relative;   box-sizing: border-box;">\n\
<a href="#" class="ui-link">\n\
    <img src="'+foto3+'" alt="" style="  width: 40px;\n\
  height: 40px;  display: block;\n\
  border-radius: 50%;\n\
  background-clip: padding-box;\n\
  margin-top: 5px">\n\
</a>\n\
</div>\n\
 <div style="  padding-left: 45px;  position: relative; margin-top: -48px">\n\
<header class="story-header">\n\
<div class="story-author" style="  font-weight: 300;">\n\
<a href="#" class="story-author-link ui-link">\n\
'+nombre3+' </a>\n\
</div>\n\
</header>\n\
     <div style="color: #6c6f75;\n\
  font-size: 0.85em;">\n\
'+comentario3+'</div>\n\
<footer style="  font-size: 0.85em;">\n\
    <a href="#" class="story-comments-link ui-link">\n\
<i class="fa fa-comment fa-lg"></i> 2 Like\n\
</a>\n\
<a href="#" class="story-comments-link ui-link">\n\
<i class="fa fa-comment fa-lg"></i> 1 Comentario\n\
</a>\n\
</footer>\n\
</div>\n\
');
                    }


                },
                error: function() {
                    $("#popup_content").html("<div>Ocurrio un problema al publicar un comentario</div>");
                    $("#popup_button").click();
                }
            });
        });
                    //
                }
          },
            error: function() {
                $("#popup_content").html("<div>Ocurrio un problema al publicar un comentario</div>");
                $("#popup_button").click();
            }
        });
    });
                                    }
                                       }
                                   });
                                   
});
