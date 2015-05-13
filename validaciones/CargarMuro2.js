$(document).ready(function () {

 var nombre;
 var foto;
 var comentario;
 var idcomhijo;
 var nombrehijo;
  var fotohijo;
 var comentariohijo;
 var idcomhijohijo;
  var array2;
  var FotoMuro;
  var Categoria;
          var formData = {
            'idMuro': 1
        };

        // process the form
     // process the form
                    $.ajax({
                        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                        url: 'validaciones/CargarComentariosMuro.php',
                        data: formData,
                        dataType: 'json', // what type of data do we expect back from the server
                        encode: true
                    }).done(function (data) {

                                // log data to the console so we can see
                                console.log(data[0]);
                                // here we will handle errors and validation messages
                                if (!data[0]) {
                                            alert("Error al cargar datos revisar conexion");
                                } else {
                                     for (var i = 1; i <=data.length; i++) {
                                         nombre=data[i]['nombreUser'];
                                         foto=data[i]['Foto'];
                                         comentario=data[i]['Comentario'];
                                         idcomhijo=data[i]['idComHijo'];
                                         array2=data[i]['array'];
                                         FotoMuro=data[i]['FotoMuro'];
                                         Categoria=data[i]['Categoria'];
                                         
                             $("#menu").append('<div id="main" data-role="main" class="ui-content jqm-content contenido" style="height: 100%;  border-width: 0;\n\
  overflow: visible;\n\
  overflow: hidden;\n\
  background: white">\n\
<div id="contenido" style="display: block; ">\n\
                        <img src="validaciones/'+foto+'" style="position: absolute;\n\
  float: left;\n\
  margin-top: 10px;\n\
  margin-left: 15px;\n\
  width: 70px;\n\
  height: 70px;\n\
  border-radius: 50%;\n\
  border: solid blue 3px;">\n\
                        <img src="validaciones/'+FotoMuro+'"  style="width: 100%;\n\
  height: 236px;\n\
  margin-left: 40px;\n\
  margin-top: 25px;\n\
  padding-right: 80px;">\n\
</div>\n\
                  <div style="background-color: #FFF;\n\
  margin-top: 10px;\n\
  margin-left: 10px;\n\
  padding: 10px;">\n\
 <div style="position: absolute;   box-sizing: border-box;">\n\
<a href="#">\n\
    <img src="validaciones/'+foto+'" alt="" style="  width: 30px;\n\
  height: 30px;  display: block;\n\
  border-radius: 50%;\n\
  background-clip: padding-box;\n\
  margin-top: 10px">\n\
</a>\n\
</div>\n\
 <div style="  padding-left: 40px;  position: relative;">\n\
<header class="story-header">\n\
<div class="story-author" style="  font-weight: 300;">\n\
<a href="#" class="story-author-link">\n\
'+nombre+' </a>\n\
</div>\n\
</header>\n\
     <div style="color: #6c6f75;\n\
  font-size: 0.85em;">\n\
'+comentario+'</div>\n\
<footer style="  font-size: 0.85em;">\n\
</footer>\n\
</div>\n\
            </div>\n\
            \n\
      <div id="hijo'+idcomhijo+''+i+'" style="background-color: #FFF;\n\
  margin-top: 10px;\n\
  margin-left: 40px;\n\
  padding: 10px;\n\
  margin-bottom: 10px">\n\
            </div>\n\
            <div class="EnviarPeticion'+i+'" name="name'+i+'" >\n\
                            <input name="name'+i+'" type="hidden" class="btn btn-default pull-right btn-lg"  value="'+idcomhijo+'"> \n\
                            <button name="crea" type="submit" class="btn btn-success pull-right" style="padding-bottom: 10px">Ver mas...</button>\n\
                    </div>\n\
        </div>\n\
   <div style="background: black; height: 8px"></div>');
                                     for(var j=0 ; j< array2.length ; j++){
                                          nombrehijo=array2[j]['nombreUserh'];
                                           fotohijo=array2[j]['Fotoh'];
                                            comentariohijo=array2[j]['Comentarioh'];
                                             idcomhijohijo=array2[j]['idComHijoh'];
                                            $("#hijo"+idcomhijohijo+i).append('<div style="position: absolute;   box-sizing: border-box;">\n\
<a href="#">\n\
    <img src="validaciones/'+fotohijo+'" alt="" style="  width: 30px;\n\
  height: 30px;  display: block;\n\
  border-radius: 50%;\n\
  background-clip: padding-box;\n\
  margin-top: 10px">\n\
</a>\n\
</div>\n\
 <div style="  padding-left: 40px;  position: relative;">\n\
<header class="story-header">\n\
<div class="story-author" style="  font-weight: 300;">\n\
<a href="#" class="story-author-link">\n\
'+nombrehijo+'</a>\n\
</div>\n\
</header>\n\
     <div style="color: #6c6f75;\n\
  font-size: 0.85em;">\n\
'+comentariohijo+'</div>\n\
<footer style="  font-size: 0.85em;">\n\
</footer>\n\
</div>\n\
 ');
                                     }   
$('.EnviarPeticion'+i).on('click', function(){
        event.preventDefault();
          
         var nombre2;
 var foto2;
 var comentario2;
 var idcomhijo2;
 var nombrehijo2;
  var fotohijo2;
 var comentariohijo2;
 var idcomhijohijo2;
  var array22;
  var FotoMuro2;
  var nombreimg;
  var likes;
  var Dislikes;
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
                    nombre2=data3[1]['nombreUser2'];
                    foto2=data3[1]['Foto2'];
                    comentario2=data3[1]['Comentario2'];
                    idcomhijo2=data3[1]['idComHijo2'];
                    array22=data3[1]['array2'];
                      FotoMuro2=data3[1]['FotoMuro'];
                      nombreimg=data3[1]['nombreimg'];
                      likes=data3[2]['likes'];
                      Dislikes=data3[2]['Dislikes'];
                   $("#Muroglobal").append('<div data-role="main" class="ui-content jqm-content contenido" style="height: 100%;  border-width: 0;\n\
  overflow: visible;\n\
  overflow: hidden;\n\
  background: white">\n\
    <div style="  font-family: cursive;\n\
  font-size: larger;\n\
  font-style: oblique;\n\
  font-variant: small-caps;\n\
  color: brown;">'+nombreimg+'</div>\n\
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
<a href="#" class="story-author-link ui-link">\n\
'+nombre2+'</a>\n\
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
<a href="#" class="story-author-link ui-link">\n\
'+nombrehijo2+' </a>\n\
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
alert('lol');
                 

                } else {
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
alert('lol');
                 

                } else {
                    alert('valores guardados');
                }
            },
            error: function() {
                $("#popup_content").html("<div>Ocurrio un problema al publicar un comentario</div>");
                $("#popup_button").click();
            }
        });
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
                            })

                            // using the fail promise callback
                            .fail(function (data) {

                                // show any errors
                                // best to remove for production
                                console.log(data);
                            });
});