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
  var idmuro=17;
          var formData = {
            'idMuro': idmuro
        };
 $("#Muroglobal").append('<div data-role="main" class="ui-content jqm-content contenido" style="height: 100%;  border-width: 0;\n\
  overflow: visible;\n\
  overflow: hidden;\n\
  background: white;">\n\
    <div style="  background: white;\n\
  text-align: center;\n\
  font-family: monospace;\n\
  max-width: 30%;\n\
  border: solid blue 4px;\n\
  font-size: x-large;\n\
  font-style: oblique;\n\
  font-weight: 200;">Grupo</div>\n\
</div>\n\
<li class="dropdown profile-dropdown" style="visibility: hidden;">\n\
<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">\n\
     <img alt="usuario"src="validaciones/sources/barra.png" style="width: 12%;\n\
  margin-left: 81%;\n\
  margin-top: -18%;\n\
  background: black;\n\
  border-radius: 20%;\n\
  cursor: pointer;">\n\
</a>\n\
    <ul class="dropdown-menu" style="  margin-left: 51%;\n\
  margin-top: -6%; ">\n\
    <li><a data-toggle="modal" data-target="#EditarProyecto" ><span class="glyphicon glyphicon-plus-sign"></span>  INFORMACI&Oacute;N</a></li>\n\
                        <li><a  data-toggle="modal" data-target="#newmenber" ><span class="glyphicon glyphicon-user"></span>  MIEMBRO</a></li>\n\
                            <li><a  data-toggle="modal" data-target="#newimage2" ><span class="glyphicon glyphicon-download-alt"></span> Agregar Imagen</a>\n\
</li>\n\
</ul>\n\
</li>\n\
<div class="modal fade" id="newimage2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background: black">\n\
 <div class="modal-dialog">\n\
                    <div class="modal-content">\n\
                        <div class="modal-header">\n\
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>\n\
                            <h3 class="modal-title" id="myModalLabel">Agregar una imagen</h3>\n\
                        </div>\n\
                        <form enctype="multipart/form-data" id="AsignarArchivo" method="POST" class="form-horizontal" role="form">\n\
                            <div class="modal-body">\n\
                                <div id="archivo-group">\n\
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">\n\
<input name="idProyect" type="hidden" class="btn btn-default pull-right btn-lg" value="'+idmuro+'">\n\
                                    <input type="file" size="50"  name="File2">\n\
                                    <p class="help-block">Selecciona la imagen que deseas subir.</p>\n\
                                </div>\n\
                            </div>\n\
                            <label for="exampleInputFile" style="  margin-left: 3%;">Ingresar comentario inicial</label>\n\
                            <div class="conversation-new-message" style="margin-top: 10px; margin-top: 10px;\n\
  width: 89%;\n\
  margin-left: 5%;">\n\
<div class="form-group">\n\
<input type="text" name="Comentario" class="form-control" rows="2" placeholder="Ingresar tu comentario...">\n\
</div>\n\
    </div>\n\
                            <div class="modal-footer">\n\
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>\n\
                                <input type="submit" name="cmdSubmit" class="btn btn-primary" value="Subir">\n\
                            </div>\n\
                        </form>\n\
                    </div>\n\
 <div class="modal fade" id="newmenber" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background: black;   overflow: hidden;">\n\
                <div class="modal-dialog">\n\
                    <div class="modal-content">\n\
                        <div class="modal-header">\n\
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>\n\
                            <h3 class="modal-title" id="myModalLabel">Invitar integrante</h3>\n\
                        </div>\n\
                        <div class="modal-body">\n\
                            <form class="form-horizontal" role="form" id="AgregarIntegrante2" method="POST" data-ajax="false">\n\
                                <div class="form-group form-group-lg">\n\
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Correo</label>\n\
                                    <div id="AgregarInter-group" class="col-sm-10">\n\
                                        <input type="text" name="Comentario22" class="form-control" rows="2" placeholder="Ingresar tu comentario...">\n\
                                        <input name="idProyect" type="hidden" class="btn btn-default pull-right btn-lg" value="'+idmuro+'">\n\
                                        <input type="submit" class="btn btn-primary">\n\
                                    </div>\n\
                                    <div id="display" style="position: absolute; margin-left: 110px; margin-top: 40px;">\n\
                                    </div>\n\
                                </div>\n\
                            </form>\n\
                        </div>\n\
                        <div class="modal-footer">\n\
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>\n\
                        </div>\n\
                    </div>\n\
                </div>\n\
            </div>\n\
<div class="modal fade" id="EditarProyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background: black;   overflow: hidden; height: 200%;">\n\
          <div class="modal-dialog">\n\
              <div class="modal-header" style=" background-color: #FFF;">\n\
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>\n\
                        <h3 class="modal-title" id="myModalLabel">Editar proyecto</h3>\n\
                    </div>\n\
              <div class="panel panel-default">\n\
                <div class="panel-body">\n\
                    <form enctype="multipart/form-data" id="EditarProyectoEnvio" class="form-horizontal" method="POST" role="form">\n\
                  <div class="form-group form-group-lg">\n\
                    <div class="col-sm-2 control-label">\n\
                        <a data-toggle="modal" data-target="#newimage"><img id="imgproyecto" style="border-radius: 10px; width: 80px; height: 80px; margin-left: 40%;" src="validaciones/<?= $ImgProyect ?>" class="img-rounded"></a>\n\
                    </div>\n\
                    <div class="col-sm-10">\n\
                      <label for="exampleInputFile">Cargar archivo</label>\n\
                         <input type="file" size=50 id="exampleInputFile" name="File"/>\n\
                              <p>Seleccione una imagen para reconocer mas fácil el proyecto</p>\n\
                    </div>\n\
                  </div>\n\
                  <div class="form-group form-group-lg">\n\
                      <label class="col-sm-2 control-label" for="formGroupInputLarge">Nombre proyecto</label>\n\
                          <div class="col-sm-10">\n\
                           <input class="form-control" name="NombreProyecto" value="" type="text" id="formGroupInputLarge" placeholder="Nombre proyecto">\n\
                          </div>\n\
                  </div>\n\
                  <div class="form-group form-group-lg">\n\
                      <label class="col-sm-2 control-label" for="formGroupInputLarge">Descripción proyecto</label>\n\
                          <div class="col-sm-10">\n\
                             <textarea name="DescProyecto" class="form-control" id="bs-input-descipcionproyeco" placeholder="Cuentanos acerca del proyecto."rows="3"></textarea>\n\
                          </div>\n\
                  </div>\n\
                      <div class="modal-footer">\n\
                          <input type="hidden" name="IdProyecto" value="'+idmuro+'">\n\
                                <button class="btn btn-default" data-dismiss="modal">Regresar</button>\n\
                                <button id="btn_enviar" class="btn btn-primary">Guardar</button>\n\
  </div>\n\
                </form>\n\
                    <form id="eliminaMiembro">\n\
                        <div class="member">\n\
                            <div style="margin-top: 20px;">\n\
                                <img class="project-img-owner" alt="" src="validaciones/<?= $Foto_miembro ?>" data-toggle="tooltip" />\n\
                                <div class="info_member_proyecto" style="display: inline-block; vertical-align: top;">\n\
                                    <div><?= $name_miembro." ".$lastName_miembro ?></div>\n\
                                    <div><?=$email_miembro?></div>\n\
                                </div>\n\
                                <a data-toggle="modal" data-target="#EliminarMiembroProyecto"  name="<?= $id_miembro ?>" class="deleteMember_proyect"><span class="glyphicon glyphicon-remove-circle"  style="display: inline-block;float: right;color: red; height: 20px; width: 20px;padding-top:10px;"></span></a>\n\
                            </div>\n\
                        </div>\n\
                    </form>\n\
              </div>\n\
            </div>\n\
          </div>\n\
</div>');  
     $("#btn_enviar").click(function(){
     event.preventDefault();
  var formData = new FormData($("#EditarProyectoEnvio")[0]);
   $.ajax({
            url: 'validaciones/EditarProyecto.php',  
            type: 'POST',
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
    
            },
            //una vez finalizado correctamente
            success: function(data){
                alert("Cambios reslizados");
            },
            error: function(data) {
                    alert(data.errors.Comentario);
            }
        });
        
    });
       $('#AsignarArchivo').submit(function(event) { //en el evento submit del fomulario
                              event.preventDefault();
                              $("#NewButon").attr('disabled', 'disabled');
                              alert($('input[name=File2]').val());
                              alert($('input[name=Comentario]').val());
                               if( $('input[name=File2]').val()){
                              //var datos = $(this).serialize(); // los datos del formulario
                              var data2 = new window.FormData($("#AsignarArchivo")[0]);
                              $.ajax({
                                  type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                                  url: 'validaciones/AgregarFotos3.php', // the url where we want to POST
                                  data: data2, // our data object
                                  dataType: 'json', // what type of data do we expect back from the server
                                  processData: false,
                                  contentType: false,
                                  success:function(data){
                                       console.log(data);
                                    $('#newfile').hide();
                                   $('#perfil-panel7').panel("close");
                                      
                                  },
                                  error:function(){
                                      console.log(data);
                                  }

                              });
                          }else{
                          alert("Campo basio");
                      }
                      });
                        $("#AgregarIntegrante2").submit(function(event){
                        //alert("Entro1");
                         event.preventDefault();
                         alert('entre');
                         alert($('input[name=idProyect]').val());
                         alert($('input[name=Comentario22]').val());
                        $('.form-group').removeClass('has-error'); // remove the error class
                        $('.help-block').remove(); // remove the error text

                        var formData = {
                            'UsuarioName': $('input[name=Comentario22]').val(),
                         /*   'IdUsuario': idUsuarioM,*/
                            'idProyect': $('input[name=idProyect]').val()
                        };
                        // process the form
                        $.ajax({
                            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                            url: 'validaciones/AgregarMiembro.php', // the url where we want to POST
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

                                        if (data.errors.Titulo) {
                                            $('#AgregarInter-group').addClass('has-error'); // add the error class to show red input
                                            $('#AgregarInter-group').append('<div class="help-block">' + data.errors.Titulo + '</div>'); // add the actual error message under our input
                                        }

                                    } else {
                       alert('Integrante guardado');

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
   <div style="background: black; height: 8px"></div>\n\
                </div>');
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