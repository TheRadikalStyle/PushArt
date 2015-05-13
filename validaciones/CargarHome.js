$(document).ready(function () {
$('#contenidoo').hide();
        $('#contenidoo').empty();
        $('#contenidoo').html("<div align='center'><img class='loading_circle' src='Imagen/loading.gif'/></div>");
        $('#options-panel').panel("close");
        $('#contenidoo').load("Muro.html").trigger('create');
        $('#contenidoo').fadeIn("slow");
 var sexo;
 var fechaNacimiento;
 var dteDiff;
 var nombre;
 var apellido;
  var foto;
 var correo; 
 var contra; 
                         // process the form
                    $.ajax({
                        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                        url: 'validaciones/CargarHomeMuro.php',
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
                                         sexo=data[1]['sexo'];
                                         fechaNacimiento=data[1]['fechaNacimiento'];
                                         dteDiff=data[1]['dteDiff'];
                                          foto=data[1]['foto'];
                                           correo=data[1]['correo'];
                                           contra=data[1]['contra'];
                                           $("#Start").empty();
                                                   $("#Start").append('<img alt="" style="  width: 70px;\n\
  height: 70px;\n\
  border-radius: 50%;\n\
  float: left;"  src="validaciones/'+foto+'"/>\n\
<div class="user-box" style="   width: 220px;\n\
  overflow: hidden;\n\
  text-overflow: ellipsis;\n\
  white-space: nowrap;">\n\
<span class="name">\n\
    <a class="dropdown-toggle" data-toggle="dropdown" style="   font-family: -webkit-body;\n\
  padding-left: 15px;\n\
  font-size: medium;\n\
  font-style: inherit; cursor: pointer" >\n\
       <span>'+nombre+'</span>\n\
<i class="fa fa-angle-down"></i>\n\
</a>\n\
</span>\n\
</div>\n\
<div class="user-box" style="\n\
  white-space: normal;\n\
  padding-top: 10px;\n\
  padding-left: 20px;">\n\
  <span class="status" style="padding-left: 30px;">\n\
      <img src="http://www.clker.com/cliparts/q/V/y/m/9/w/glossy-green-icon-button-md.png" style="width: 20px; height: 20px">\n\
      <i class="fa fa-circle" style="color: #FFF; margin-top: 5px">Online</i>\n\
</span>\n\
    </div>');
                                }
                            
                            });
                        });

