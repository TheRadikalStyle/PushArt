$(document).ready(function () {

 var sexo;
 var fechaNacimiento;
 var dteDiff;
 var nombre;
 var apellido;
  var foto;
 var correo; 
 var contra; 
 var idUsuario;
                         // process the form
                    $.ajax({
                        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                        url: 'validaciones/CargarPerfilDate.php',
                        dataType: 'json', // what type of data do we expect back from the server
                        encode: true
                    })
                            // using the done promise callback
                            .done(function (data) {

                                // log data to the console so we can see
                                console.log(data);

                                // here we will handle errors and validation messages
                                if (!data.success) {
                                            alert("Error al cargar los datos revisar conexion");
                                } else {
                                   nombre=data[1]['nombre'];
                                         apellido=data[1]['apellido'];
                                         sexo=data[1]['sexo2'];
                                         fechaNacimiento=data[1]['fechaNacimiento'];
                                         dteDiff=data[1]['dteDiff'];
                                          foto=data[1]['foto'];
                                           correo=data[1]['correo'];
                                           contra=data[1]['contra'];
                                           idUsuario=data[1]['idUsuario'];
                                           
                                           $("#Nuevo").append('<header class="main-box-header clearfix" style="  margin-left: 10px;">\n\
    <h2 class="h2-title">'+nombre+' '+apellido+'<a data-toggle="modal" data-target="#EditarPerfi"><p class="text-right" style="width: 70px; float:right;"><span class="glyphicon-pencil" style="position: relative;\n\
  top: 1px;\n\
  display: inline-block;\n\
  font-family: "Glyphicons Halflings";\n\
  font-style: normal;\n\
  font-weight: 400;\n\
  line-height: 1;\n\
  -webkit-font-smoothing: antialiased;"></span>Editar</p></a></h2> \n\
</header>\n\
    <div class="main-box-body clearfix" style="height: 100%">\n\
        <a data-toggle="modal" data-target="#newimage"><img src="validaciones/'+foto+'" alt="" style="border: solid 3px;" class="perfil-img"></a>\n\
        <div style="margin-top: 27px;\n\
  margin-left: 133px;\n\
  position: absolute;">\n\
            <ul class="fa-ul" style="  border: solid 1.5px gray;\n\
  border-radius: 6%;\n\
  margin-left: 28px;\n\
  padding-bottom: 15px;\n\
  padding-top: 15px;\n\
  margin-top: -18px;\n\
  background: wheat;">\n\
                <li>Correo: <span style="color: #1ABC4C;">'+correo+'</span></li>\n\
<li>Sexo:<span style="color: #1ABC4C;"> '+sexo+'</span></li>\n\
<li>Fecha Nacimiento: <span style="color: #1ABC4C;">'+fechaNacimiento+'</span></li>\n\
<li>Edad: <span style="color: #1ABC4C;">21</span></li>\n\
</ul>\n\
</div>\n\
<input data-toggle="modal" data-target="#newimage2" class="btn btn-primary"  value="Agregar imagen" style="margin-top: 170px;">\n\
 <div class="modal fade" id="EditarPerfi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\n\
  <div class="modal-dialog" >\n\
                    <div class="modal-header" >\n\
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>\n\
                        <h3 class="modal-title" style="color: white;" id="myModalLabel">Editar usuario</h3>\n\
                    </div>\n\
                    <div class="panel panel-default">\n\
                        <form class="form-horizontal" method="POST" role="form" id="CrearEdicion">\n\
                            <div class="panel-body">\n\
                                <div class="form-group form-group-lg">\n\
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge" style="text-align: left">Nombre:</label>\n\
                                    <div class="col-sm-10">\n\
                                        <input class="form-control" type="text" name="nombre" value="" id="formGroupInputLarge" placeholder="'+nombre+'">\n\
                                    </div>\n\
                                </div>\n\
                                <div class="form-group form-group-lg">\n\
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge" style="text-align: left">Apellido:</label>\n\
                                    <div class="col-sm-10">\n\
                                        <input class="form-control" type="text" name="apellido" value="" placeholder="'+apellido+'">\n\
                                    </div>\n\
                                </div>\n\
                                <div class="form-group form-group-lg">\n\
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge" style="text-align: left">Correo:</label>\n\
                                    <div class="col-sm-10">\n\
                                        <input class="form-control" type="text"  name="correo" value="" id="formGroupInputLarge2" placeholder="'+correo+'">\n\
                                    </div>\n\
                                </div>\n\
                                <div class="form-group form-group-lg">\n\
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge" style="text-align: left">Contraseña:</label>\n\
                                    <div class="col-sm-4">\n\
                                        <input  class="form-control" value=""  name="contrasenia" type="password" id="formGroupInputLarge3" style="width: 200px" placeholder="'+contra+'">\n\
                                    </div>\n\
                                </div>\n\
                                <div class="form-group form-group-lg">\n\
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge" style="text-align: left">Sexo:</label>\n\
                                    <div class="col-sm-8">\n\
                                        <label class="radio-inline">\n\
                                            <input type="radio" name="inlineRadioOptions" value="M"> Mujer\n\
                                        </label>\n\
                                           <label class="radio-inline">\n\
                                            <input type="radio" name="inlineRadioOptions" value="H"> Hombre\n\
                                        </label>\n\
                                    </div>\n\
                                </div>\n\
                                <div class="form-group form-group-lg">\n\
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge" style="text-align: left; margin-top: -10px">Fecha Nacimiento:</label>\n\
                                  <input  class="form-control" type="date"  name="fecha" value="'+fechaNacimiento+'" id="formGroupInputLarge4" style="width: 200px">\n\
                                </div>\n\
                            </div>\n\
                            <div class="modal-footer">\n\
                                <button class="btn btn-default" data-dismiss="modal">Regresar</button><button id="SAve" type="submit" class="btn btn-primary">Guardar</button>\n\</div>\n\
                        </form>\n\
                    </div>\n\
                </div>\n\
</div>\n\
 <div class="modal fade in" id="newimage2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="padding-right: 0px; background: black;"><div class="modal-backdrop fade in" style="height: 423px;"></div>\n\
                <div class="modal-dialog">\n\
                    <div class="modal-content">\n\
                        <div class="modal-header">\n\
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>\n\
                            <h3 class="modal-title" id="myModalLabel">Agregar una imagen</h3>\n\
                        </div>\n\
                        <form enctype="multipart/form-data" id="AsignarArchivo" method="POST" class="form-horizontal" role="form">\n\
                            <div class="modal-body">\n\
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
                                    <br>\n\
                                    <input name="idProyect" type="hidden" class="btn btn-default pull-right btn-lg" value="'+idUsuario+'">\n\
                                    <input type="file" size="50" id="exampleInputFile" name="File">\n\
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
<div class="clearfix">\n\
     <input name="idNot" type="hidden" value="121">\n\
</div>\n\
    </div>\n\
                            <div class="modal-footer">\n\
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>\n\
                                <input type="submit" name="cmdSubmit" class="btn btn-primary" value="Subir">\n\
                            </div>\n\
                        </form>\n\
                    </div>\n\
                </div>\n\
            </div>\n\
 <div class="modal fade" id="newimage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\n\
                <div class="modal-dialog">\n\
                    <form enctype="multipart/form-data" id="AsignarArchivo2" method="POST" class="form-horizontal" role="form">\n\
                    <div class="modal-content">\n\
                        <div class="modal-header">\n\
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>\n\
                            <h3 class="modal-title" id="myModalLabel">Imagen usuario</h3>\n\
                        </div>\n\
                        <div class="modal-body">\n\
                                  <div>\n\
                                    <label for="exampleInputFile">Cargar imagen</label>\n\
                                    <input type="file" size=50 id="exampleInputFile" name="File2">\n\
                                    <p class="help-block">Selecciona una imagen para personalizar tu perfil.</p>\n\
                                </div>\n\
                        </div>\n\
                        <div class="modal-footer">\n\
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>\n\
                            <button type="submit" class="btn btn-primary">Guardar</button>\n\
                        </div>\n\
                    </div>\n\
                      </form>\n\
                </div>\n\
            </div>');
          $('#AsignarArchivo2').submit(function() { //en el evento submit del fomulario
                              event.preventDefault();
                              $("#NewButon").attr('disabled', 'disabled');
                               if( $('input[name=File2]').val()){
                              //var datos = $(this).serialize(); // los datos del formulario
                              var data2 = new window.FormData($("#AsignarArchivo2")[0]);
                              $.ajax({
                                  type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                                  url: 'validaciones/AgregarFotos2.php', // the url where we want to POST
                                  data: data2, // our data object
                                  dataType: 'json', // what type of data do we expect back from the server
                                  processData: false,
                                  contentType: false,
                                  success:function(data){
                                       console.log(data);
                                       
                              alert('Subido exitosamente');
                                    $('#newfile').hide();
                                   $('#perfil-panel7').panel("close");
                                      
                                  },
                                  error:function(){
                                     
                                  }

                              });
                          }else{
                               console.log(data);
                          alert("Campo basio");
                      }
                      });
             $('#AsignarArchivo').submit(function() { //en el evento submit del fomulario
                              event.preventDefault();
                               alert('entre');
                              $("#NewButon").attr('disabled', 'disabled');
                              
                              alert($('input[name=Comentario]').val());
                               if( $('input[name=File]').val()){
                              //var datos = $(this).serialize(); // los datos del formulario
                              var data2 = new window.FormData($("#AsignarArchivo")[0]);
                               alert(data2);
                              $.ajax({
                                  type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                                  url: 'validaciones/AgregarFotos.php', // the url where we want to POST
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
              $('#CrearEdicion').submit(function (event) {
                     var sexo2;
 var fechaNacimiento2;
 var dteDiff2;
 var nombre2;
 var apellido2;
  var foto2;
 var correo2; 
 var contra2; 
              
                    $("#SAve").attr('disabled', 'disabled');
                    $('.form-group').removeClass('has-error'); // remove the error class
                    $('.help-block').remove(); // remove the error text

                    var formData = {
                        'NombreEdita': $('input[name=nombre]').val(),
                        'ApellidoEdita': $('input[name=apellido]').val(),
                        'CorreoEdita': $('input[name=correo]').val(),
                        'ContrasenaEdita': $('input[name=contrasenia]').val(),
                        'SexoEdita': this.elements.inlineRadioOptions.value,
                        'FechaEdita': $('input[name=fecha]').val()
                    };



                    // process the form
                    $.ajax({
                        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                        url: 'validaciones/EditarPerfil.php', // the url where we want to POST
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
                                            nombre2=data[1]['nombre2'];
                                         apellido2=data[1]['apellido2'];
                                         sexo2=data[1]['sexo2'];
                                         fechaNacimiento2=data[1]['fechaNacimiento2'];
                                          foto2=data[1]['foto2'];
                                           correo2=data[1]['correo2'];
                                           contra2=data[1]['contra2'];
                                             $("#SAve").removeAttr('disabled');
                                              $("#Nuevo").empty();
                                     $("#Nuevo").append('<header class="main-box-header clearfix" style="  margin-left: 10px;">\n\
    <h2 class="h2-title">'+nombre2+' '+apellido2+'<a data-toggle="modal" data-target="#EditarPerfi"><p class="text-right" style="width: 70px; float:right;"><span class="glyphicon-pencil" style="position: relative;\n\
  top: 1px;\n\
  display: inline-block;\n\
  font-family: "Glyphicons Halflings";\n\
  font-style: normal;\n\
  font-weight: 400;\n\
  line-height: 1;\n\
  -webkit-font-smoothing: antialiased;"></span>Editar</p></a></h2> \n\
</header>\n\
    <div class="main-box-body clearfix" style="height: 100%">\n\
        <a data-toggle="modal" data-target="#newimage"><img src="'+foto2+'" alt="" style="border: solid 3px;" class="perfil-img"></a>\n\
        <div style="margin-top: 27px;\n\
  margin-left: 133px;\n\
  position: absolute;">\n\
            <ul class="fa-ul" style="  border: solid 1.5px gray;\n\
  border-radius: 6%;\n\
  margin-left: 28px;\n\
  padding-bottom: 15px;\n\
  padding-top: 15px;\n\
  margin-top: -18px;\n\
  background: wheat;">\n\
                <li>Correo: <span style="color: #1ABC4C;">'+correo2+'</span></li>\n\
<li>Sexo:<span style="color: #1ABC4C;">'+sexo2+'</span></li>\n\
<li>Fecha Nacimiento: <span style="color: #1ABC4C;">'+fechaNacimiento2+'</span></li>\n\
<li>Edad: <span style="color: #1ABC4C;">21</span></li>\n\
</ul>\n\
</div>\n\
<input data-toggle="modal" data-target="#newimage2" class="btn btn-primary"  value="Agregar imagen" style="margin-top: 170px;">\n\
 <div class="modal fade" id="EditarPerfi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\n\
  <div class="modal-dialog" >\n\
                    <div class="modal-header" >\n\
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>\n\
                        <h3 class="modal-title" style="color: white;" id="myModalLabel">Editar usuario</h3>\n\
                    </div>\n\
                    <div class="panel panel-default">\n\
                        <form class="form-horizontal" method="POST" role="form" id="CrearEdicion">\n\
                            <div class="panel-body">\n\
                                <div class="form-group form-group-lg">\n\
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge" style="text-align: left">Nombre:</label>\n\
                                    <div class="col-sm-10">\n\
                                        <input class="form-control" type="text" name="nombre" value="" id="formGroupInputLarge" placeholder="'+nombre2+'">\n\
                                    </div>\n\
                                </div>\n\
                                <div class="form-group form-group-lg">\n\
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge" style="text-align: left">Apellido:</label>\n\
                                    <div class="col-sm-10">\n\
                                        <input class="form-control" type="text" name="apellido" value="" placeholder="'+apellido2+'">\n\
                                    </div>\n\
                                </div>\n\
                                <div class="form-group form-group-lg">\n\
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge" style="text-align: left">Correo:</label>\n\
                                    <div class="col-sm-10">\n\
                                        <input class="form-control" type="text"  name="correo" value="" id="formGroupInputLarge2" placeholder="'+correo2+'">\n\
                                    </div>\n\
                                </div>\n\
                                <div class="form-group form-group-lg">\n\
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge" style="text-align: left">Contraseña:</label>\n\
                                    <div class="col-sm-4">\n\
                                        <input  class="form-control" value=""  name="contrasenia" type="password" id="formGroupInputLarge3" style="width: 200px" placeholder="'+contra2+'">\n\
                                    </div>\n\
                                </div>\n\
                                <div class="form-group form-group-lg">\n\
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge" style="text-align: left">Sexo:</label>\n\
                                    <div class="col-sm-8">\n\
                                        <label class="radio-inline">\n\
                                            <input type="radio" name="inlineRadioOptions" value="M"> Mujer\n\
                                        </label>\n\
                                           <label class="radio-inline">\n\
                                            <input type="radio" name="inlineRadioOptions" value="H"> Hombre\n\
                                        </label>\n\
                                    </div>\n\
                                </div>\n\
                                <div class="form-group form-group-lg">\n\
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge" style="text-align: left; margin-top: -10px">Fecha Nacimiento:</label>\n\
                                  <input  class="form-control" type="date"  name="fecha" value="'+fechaNacimiento2+'" id="formGroupInputLarge4" style="width: 200px">\n\
                                </div>\n\
                            </div>\n\
                            <div class="modal-footer">\n\
                                <button class="btn btn-default" data-dismiss="modal">Regresar</button><button id="SAve" type="submit" class="btn btn-primary">Guardar</button>\n\</div>\n\
                        </form>\n\
                    </div>\n\
                </div>');
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
  
                            
                                }
                            }).fail(function (data) {

                                // show any errors
                                // best to remove for production
                                console.log(data);
                            });


});