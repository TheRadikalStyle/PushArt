
    <?PHP
    require_once("Conexion/conexionPHP.php");
    session();
    $idUs = $_SESSION['id'];
    $idProyecto = $_GET['idProyecto'];
    $nombreuser = $_SESSION['nombre'];
    $iduser = $_SESSION['id'];
    $_SESSION['proyid'] = $idProyecto;

    if (!empty($idProyecto)) {
        $sql = consulta("select * from proyecto where idProyecto = '$idProyecto';");

        if ($sql->num_rows > 0) {
            $v = mysqli_fetch_assoc($sql);
        $nombreProyect = $v['nombreProyecto'];
        $descProyect = $v['descripcionProyecto'];
        $ImgProyect = $v['idImagen'];
            ?>
            <script>
                $("#frminvitarparti").submit(function (event) {
                    var formData = {
                        'nombrehost': "<?= $nombreuser ?>",
                        'correoinv': $('input[name=correo]').val(),
                        'idproyectoinv': "<?= $idProyecto ?>",
                        'tipo': '3',
                        'idusers': "<?= $iduser ?>"

                    };

                    // process the form
                    $.ajax({
                        type: 'POST',
                        url: 'validaciones/TerminarRegistroInvitado.php',
                        data: formData,
                        dataType: 'json',
                        encode: true
                    })
                            .done(function (data) {
                                if (!data.success) {
                                    console.log(data);
                                } else {
                                    location.href = "Invita_amigos.php?idpro=" + data.idProyecto + "";
                                    alertify.success('se ha enviado correctamente');
                                }
                            })
                            .fail(function (data) {
                                console.log(data);
                            });
                    event.preventDefault();
                });
            </script>
            <style>
                ::-webkit-scrollbar {/*Oculta scrollbar*/
                    display: none;
                }
            </style>

<style type="text/css">
    #globo{
        width: 50%;

        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 2px 5px #555;
        background-color: 	#1F7A99;
        position: relative;
        color: #FFF;
        text-align: left; 

        margin-bottom: 10px; 
        margin-left: 30%;
         margin-right: 20%; 

    }
    #globo:before{
        content: "";
        width: 0;
        position: absolute;
        border-style: solid;
        border-width: 5px 0 5px 10px;
        border-color: transparent 	#1F7A99;
        top: 20px;
        right: -10px;
    }

    #globo2{
        width: 50%;

        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 2px 5px #555;
        background-color: #E6E6E6;
        position: relative;
        color: #FFF;
        text-align: right; 

        margin-bottom: 10px; 
         margin-left: 20%;
         margin-right: 30%; 
    }
    #globo2:before{
        content: "";
        width: 0;
        position: absolute;
        border-style: solid;
        border-width: 5px 10px 5px 0;
        border-color: transparent #E6E6E6;
        top: 20px;
        left: -10px;
    }

    hr {border: 0; height: 2px; border-top: 1px dashed black; border-bottom: 1px dashed black;}
    ::-webkit-scrollbar {

        width: 8px;

    }

    ::-webkit-scrollbar-button {

        width: 8px;

        height:5px;

    }

    ::-webkit-scrollbar-track {

        background:#eee;

        border: thin solid lightgray;

        box-shadow: 0px 0px 3px #dfdfdf inset;

        border-radius:10px;

    }

    ::-webkit-scrollbar-thumb {

        background:#999;

        border: thin solid gray;

        border-radius:10px;

    }

    ::-webkit-scrollbar-thumb:hover {

        background:#7d7d7d;

    }    
    p{
        opacity: 0.7;
    }
    p:hover{
        opacity: 1;
        cursor: pointer;
    }

</style>
<script>
    
    var numDeArreglo = 0;
    $('#EnviarMensaje').submit(function(event) {
        event.preventDefault();
        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text
        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'idMensajePara': $('input[name=idMensajePara]').val(),
            'ComentarioMensaje': $('textarea[name=Comentario]').val()
        };

        // process the form
        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: 'validaciones/EnviarMensajeGrupoPara.php', // the url where we want to POST
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

                    // handle errors for name ---------------
                    if (data.errors.ComentarioMensaje) {

                        $('#coment-group').addClass('has-error'); // add the error class to show red input
                        $('#coment-group').append('<div class="help-block">' + data.errors.ComentarioMensaje + '</div>'); // add the actual error message under our input
                    }


                } else {
                    $('textarea[name=Comentario]').val("");
                }

            },
            error: function() {
                $("#popup_content").html("<div>Ocurrio un problema al publicar un comentario</div>");
                $("#popup_button").click();
            }
        });
    });



    function startTime() {

        var formData = {
            'idMensajePara': $('input[name=idMensajePara]').val(),
            'numDeArreglo': numDeArreglo
        };

        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: 'validaciones/RefrescarMensajeGrupo.php', // the url where we want to POST
            data: formData, // our data object
            dataType: 'json', // what type of data do we expect back from the server
            encode: true,
            success: function(data) {

                console.log(data);


                if (!data.success) {


                } else {

                    numDeArreglo = data.message;
                    if (data.Agregar) {
                        if (data.usuario) {

                            $('#Cuerpo').append('<div id="globo"  class="MiComentario"><h5 class="comentario">' + data.comenta + '</h5><p class="fecha">' + data.hora + '</p></div>');
                            $('#Cuerpo').prop({scrollTop: $('#Cuerpo').prop("scrollHeight")});
                        } else {

                            $('#Cuerpo').append('<div id="globo2" class="AmigoComentario"><h5 class="comentario">' + data.comenta + '</h5> <p class="fecha"> ' + data.hora + '</p></div>');
                            $('#Cuerpo').prop({scrollTop: $('#Cuerpo').prop("scrollHeight")});
                        }
                    }
                }

            },
            error: function() {
                $("#popup_content").html("<div>Ocurrio un problema al publicar un comentario</div>");
                $("#popup_button").click();
            }
        });
    }

    setInterval("startTime()", 3000);
</script>
<script>
       /* $("#crear-archivo").click( function () {
            // esto es por mientras en lo que lo cambiamos, esto manda a llamar el click del boton 
            $("#crear-archivo-modal").click();
            //Esta es la opcion mia con popups solo hayq ue cambiar unas cosas
            /*var contenido=$("#newfile").html();
            $("#popup").html(contenido);
            $("#popup").trigger("create");
            $("#popup").popup("open",{
                transition:"slidedown",
                positionTo:"window"
            });
        });    */
        $("#navbar_navigation_proyect").hide();
        $("#crear-archivo").click( function () {
            $("#crear-archivo-modal").click();
        });  
        $("#asignar-tarea").click( function () {
            $("#asignar-tarea-modal").click();
        });  
        $("#crear-evento").click( function () {
            $("#crear-evento-modal").click();
        });  
        $("#crear-nota").click( function () {
            $("#crear-nota-modal").click();
        });  
        $("#agregar-miembro").click( function () {
            $("#agregar-miembro-modal").click();
        });  
        
 $("#btn_enviar").click(function(){
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
        
            }
        });
        
    });
                 
                
        $('.CalendarioSelect').on('click', function () {
            $('#cargarCalendario').hide();
            $('#cargarCalendario').empty();
            $('#cargarCalendario').load("CalendarioEvento.php?idProyecto=" + $(this).attr('name') + "");
            $('#cargarCalendario').fadeIn("slow");
        });


        $('.SelectIntegrantes').on('click', function () {
            $('#cargarCalendario').hide();
            $('#cargarCalendario').empty();
            $('#cargarCalendario').load("Integrantes.php?idProyecto=" + $(this).attr('name') + "");
            $('#cargarCalendario').fadeIn("slow");
        });

        $('.SelectNota').on('click', function () {
            $('#cargarCalendario').hide();
            $('#cargarCalendario').empty();
            $('#cargarCalendario').load("MisNotas.php?idNota=" + $(this).attr('name') + "");
            $('#cargarCalendario').fadeIn("slow");
        });



        $('#CrearNotaFast').submit(function (event) {
            $('.form-group').removeClass('has-error'); // remove the error class
            $('.help-block').remove(); // remove the error text

            var formData = {
                'NombreNota': $('input[name=nombreNota]').val(),
                'NotaContenido': $('textarea[name=NotaContenido]').val(),
                'idProyect': $('input[name=idProyect]').val()
            };



            // process the form
            $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url: 'validaciones/CrearNotaVal.php', // the url where we want to POST
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


                            if (data.errors.Comentario) {
                                $('#NotaCont-group').addClass('has-error'); // add the error class to show red input
                                $('#NotaCont-group').append('<div class="help-block">' + data.errors.Comentario + '</div>'); // add the actual error message under our input
                            }
                            if (data.errors.Titulo) {
                                $('#NotaName-group').addClass('has-error'); // add the error class to show red input
                                $('#NotaName-group').append('<div class="help-block">' + data.errors.Titulo + '</div>'); // add the actual error message under our input
                            }

                        } else {
                            location.href = "Invita_amigos.php?idpro=" + data.idProyect + "";
                                alertify.success('has publicado una nota');

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

        $('#AsignarEvento').submit(function (event) {
            $('.form-group').removeClass('has-error'); // remove the error class
            $('.help-block').remove(); // remove the error text

            // get the form data
            // there are many ways to get this data using jQuery (you can use the class or id also)
            var formData = {
                'Nombre': $('input[name=Nombre]').val(),
                'Descripcion': $('textarea[name=Descripcion]').val(),
                'fechaIn': $('input[id=datetimepicker1]').val(),
                'fechaFin': $('input[id=datetimepicker2]').val(),
                'idProyect': $('input[name=idProyect]').val()
            };


            // process the form
            $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url: 'validaciones/AsignarEventoVal.php', // the url where we want to POST
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

                            // handle errors for name ---------------
                            if (data.errors.Descripcion) {
                                $('#desc-group').addClass('has-error'); // add the error class to show red input
                                $('#desc-group').append('<div class="help-block">' + data.errors.Descripcion + '</div>'); // add the actual error message under our input
                            }
                            if (data.errors.fechaIn) {
                                $('#picker1-group').addClass('has-error'); // add the error class to show red input
                                $('#picker1-group').append('<div class="help-block">' + data.errors.fechaIn + '</div>'); // add the actual error message under our input
                            }
                            if (data.errors.fechaFin) {
                                $('#picker2-group').addClass('has-error'); // add the error class to show red input
                                $('#picker2-group').append('<div class="help-block">' + data.errors.fechaFin + '</div>'); // add the actual error message under our input
                            }
                            if (data.errors.Nombre) {
                                $('#name-group').addClass('has-error'); // add the error class to show red input
                                $('#name-group').append('<div class="help-block">' + data.errors.Nombre + '</div>'); // add the actual error message under our input
                            }
                            // handle errors for email --------------

                        } else {

                            location.href = "Invita_amigos.php?idpro=" + data.idProyecto + "";
                            alertify.success('has publicado un evento');

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


        $('#AsignarTarea').submit(function (event) {
            $('.form-group').removeClass('has-error'); // remove the error class
            $('.help-block').remove(); // remove the error text
            // get the form data
            // there are many ways to get this data using jQuery (you can use the class or id also)
            var formData = {
                'para': $('input[name=formGroupInputLarge]').val(),
                'tarea': $('textarea[name=estadoproyecto]').val(),
                'fecha': $('input[id=datepicker]').val(),
                'nivel': $('input[id=optionsRadios1]').val(),
                'idProyect': $('input[name=idProyect]').val()
            };

            // process the form
            $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url: 'validaciones/AsignarTareaVal.php', // the url where we want to POST
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

                            // handle errors for name ---------------
                            if (data.errors.para) {
                                $('#para-group').addClass('has-error'); // add the error class to show red input
                                $('#para-group').append('<div class="help-block">' + data.errors.para + '</div>'); // add the actual error message under our input
                            }
                            if (data.errors.tarea) {
                                $('#tarea-group').addClass('has-error'); // add the error class to show red input
                                $('#tarea-group').append('<div class="help-block">' + data.errors.tarea + '</div>'); // add the actual error message under our input
                            }
                            if (data.errors.fecha) {
                                $('#fecha-group').addClass('has-error'); // add the error class to show red input
                                $('#fecha-group').append('<div class="help-block">' + data.errors.fecha + '</div>'); // add the actual error message under our input
                            }

                            // handle errors for email --------------

                        } else {

                            //$('#Proyecto').append('<div class="col-sm-3"><div class="container-fluid contenedor-tarjeta"><div class="col-sm-4"><a href="TuPerfil.php"><img src="sources/imagenAnonima.png"class="img-rounded"></img ></a></div><div class="col-sm-8"><a href="Proyecto.php"><h5>Proyecto3</h5></a><p>DescripciÃ³n del proyecto</p></div></div></div>'); // add the actual error message under our input


                            location.href = "Invita_amigos.php?err=4";


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

        ////////////////////////////////////////////////////////////////////////////////////////

        $('.CrearComentario').submit(function (event) {
            $('.form-group').removeClass('has-error'); // remove the error class
            $('.help-block').remove(); // remove the error text

            // get the form data
            // there are many ways to get this data using jQuery (you can use the class or id also)
            var formData = {
                'Comentario': $('textarea[name=Comentario]').val(),
                'idProyect': $('input[name=idProyect]').val()
            };

            // process the form
            $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url: 'validaciones/ComentarioVal.php', // the url where we want to POST
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

                            // handle errors for name ---------------
                            if (data.errors.Comentario) {
                                $('#coment-group').addClass('has-error'); // add the error class to show red input
                                $('#coment-group').append('<div class="help-block">' + data.errors.Comentario + '</div>'); // add the actual error message under our input
                            }

                            // handle errors for email --------------

                        } else {

                            //$('#Proyecto').append('<div class="col-sm-3"><div class="container-fluid contenedor-tarjeta"><div class="col-sm-4"><a href="TuPerfil.php"><img src="sources/imagenAnonima.png"class="img-rounded"></img ></a></div><div class="col-sm-8"><a href="Proyecto.php"><h5>Proyecto3</h5></a><p>DescripciÃ³n del proyecto</p></div></div></div>'); // add the actual error message under our input

                            $('#contenido').hide();
                            $('#contenido').load("Proyecto_1.php?idProyecto=" + data.idProyect + "").focus();
                            $('#contenido').fadeIn("slow");
                            //location.href ="Invita_amigos.php?err=2";

                            // ALL GOOD! just show the success message!
                            // usually after form submission, you'll want to redirect
                            // window.location = '/thank-you'; // redirect a user to another page

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

        //////////////////////////////////////////////////////////////////

        $('.CrearComentarioHijo').submit(function (event) {
            $('.form-group').removeClass('has-error'); // remove the error class
            $('.help-block').remove(); // remove the error text

            // get the form data
            // there are many ways to get this data using jQuery (you can use the class or id also)
            var formData = {
                'Comentario': $(this).find('input[name=Comentario]').val(),
                'idNot': $(this).find('input[name=idNot]').val(),
                'idProyect': $(this).find('input[name=idProyect]').val()
            };

            // process the form
            $.ajax({
                type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                url: 'validaciones/ComentarioVal.php', // the url where we want to POST
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

                            // handle errors for name ---------------
                            if (data.errors.Comentario) {
                                $('#coment2-group').addClass('has-error'); // add the error class to show red input
                                $('#coment2-group').append('<div class="help-block">' + data.errors.Comentario + '</div>'); // add the actual error message under our input
                            }

                            // handle errors for email --------------

                        } else {

                            //$('#Proyecto').append('<div class="col-sm-3"><div class="container-fluid contenedor-tarjeta"><div class="col-sm-4"><a href="TuPerfil.php"><img src="sources/imagenAnonima.png"class="img-rounded"></img ></a></div><div class="col-sm-8"><a href="Proyecto.php"><h5>Proyecto3</h5></a><p>DescripciÃ³n del proyecto</p></div></div></div>'); // add the actual error message under our input

                            $('#contenido').hide();
                            $('#contenido').load("Proyecto_1.php?idProyecto=" + data.idProyect + "").focus();
                            $('#contenido').fadeIn("slow");
                            //location.href ="Invita_amigos.php?err=2";

                            // ALL GOOD! just show the success message!
                            // usually after form submission, you'll want to redirect
                            // window.location = '/thank-you'; // redirect a user to another page

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
        $(function () {
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd",
                onSelect: function (dateText, inst) {
                    var date = $.datepicker.parseDate(inst.settings.dateFormat || $.datepicker._defaults.dateFormat, dateText, inst.settings);
                    var dateText1 = $.datepicker.formatDate("d M yy", date, inst.settings);
                    $("#dateoutput").html("has escojido el dia: <b>" + dateText1 + "");
                }
            });
        });

        $(function () {
            $("#datetimepicker1").datepicker({
                dateFormat: "yy-mm-dd",
                onSelect: function (dateText, inst) {
                    var date = $.datepicker.parseDate(inst.settings.dateFormat || $.datepicker._defaults.dateFormat, dateText, inst.settings);
                    var dateText1 = $.datepicker.formatDate("d M yy", date, inst.settings);
                    $("#dateoutput2").html("has escojido el dia: <b>" + dateText1 + "");
                }
            });
        });
        $(function () {
            $("#datetimepicker2").datepicker({
                dateFormat: "yy-mm-dd",
                onSelect: function (dateText, inst) {
                    var date = $.datepicker.parseDate(inst.settings.dateFormat || $.datepicker._defaults.dateFormat, dateText, inst.settings);
                    var dateText1 = $.datepicker.formatDate("d M yy", date, inst.settings);
                    $("#dateoutput3").html("has escojido el dia: <b>" + dateText1 + "");
                }
            });
        });

    </script>
<style type="text/css">
       hr {border: 0; height: 2px; border-top: 1px dashed black; opacity: 0.5; border-bottom: 1px dashed black;}
                body
                {
                    font-family:"Lucida Sans";

                }
                *
                {
                    margin:0px
                }
                #searchbox
                {
                    width:250px;
                    border:solid 1px #000;
                    padding:3px;
                }
                #display
                {
                    width:250px;
                    display:none;
                    float:right; margin-right:30px;
                    border-left:solid 1px #dedede;
                    border-right:solid 1px #dedede;
                    border-bottom:solid 1px #dedede;
                    overflow:hidden;
                }
                .display_box
                {
                    padding:4px; border-top:solid 1px #dedede; font-size:12px; height:30px;
                }

                .display
                {
                    display:none;
                    white-space:nowrap;  
                    width:115px;
                    margin-left: 10px;
                    height:auto;
                    overflow:hidden;
                    text-overflow:ellipsis;
                }

                .mostrar{

                }
                .mostrar:hover{
                    cursor: pointer;
                }
                .mostrar2{
                    
                }
                .mostrar2:hover{
                    cursor: pointer;

                }
                .mostrar3{
                    padding: -10px;                   
                    margin: -10px;
                    margin-left: -30px;
                }
                .mostrar3:hover{
                    cursor: pointer;

                }

                .display_box:hover
                {
                    background:#3b5998;
                    color:#FFFFFF;
                    cursor: pointer;
                }
                #shade
                {
                    background-color:#00CCFF;

                }


            </style>
<div class="div_contenido_mensaje" id="Div_Mensaje" align="center" style="height: 100%;">

    <?PHP
    $sql = consulta("select * from proyecto where idProyecto='$idProyecto'");

    if ($sql->num_rows > 0) {
        $v = mysqli_fetch_assoc($sql);
        ?>

        <div id="HEAD" class="mensaje_header" align="left">
            <div class="col-sm-4 imagen" >
                
                <img src="validaciones/<?= $v['idImagen'] ?>">
            </div>
            <div class="col-sm-8 info_contacto">
                <div class="nombre"><?= $v['nombreProyecto'] ?> </div>

            </div>

        </div>
        <hr>
        <script>

            $('#Cuerpo').prop({scrollTop: $('#Cuerpo').prop("scrollHeight")});


        </script>
        <div id="Cuerpo" class="body_mensajes_chat" style="height: 220px;">

            <?PHP
            $sql2 = consulta("select * from grupochat where ProyectoPara = '$idProyecto';");
            $fecha = 0;
            if ($sql2->num_rows > 0) {
                while ($v2 = mysqli_fetch_assoc($sql2)) {
                    $Who = $v2['UsuarioDesde'];

                    $sql3 = consulta("select * from usuario where idUsuario = '$Who'");
                    if ($sql3->num_rows > 0) {
                        $v3 = mysqli_fetch_assoc($sql3);
                        $strStart = $v2['fechaComentario'];
                        $strEnd = date("Y-m-d h:m:s");

                        $dteStart = new DateTime($strStart);
                        $dteEnd = new DateTime();

                        $dteDiff = $dteEnd->diff($dteStart);

                        if ($fecha == 0) {
                            $fecha = $dteStart->format("d");
                        }

                        if ($fecha != $dteStart->format("d")) {
                            $fecha = $dteStart->format("d");
                            ?>

                            <?php $de = "de";
                            $del = "del";
                            ?>
                            <div style="background-position: 15px 50%; /* x-pos y-pos */
                                 text-align: center;
                                 padding: 10px;
                                 border: 2px solid #F7AB75;
                                 margin-top: 15px;
                                 margin-left: 25%;
                                 margin-right: 25%;
                                 margin-bottom: 15px;
                                 width: 50%;
                                 color:#000000;">    <?= $dteStart->format("d") ?> de <?= $dteStart->format("m") ?> del <?= $dteStart->format("Y") ?> </div>
                                 <?PHP
                             }

                             if ($Who == $idUs) {
                                 ?>
                
            
                <div style=" width: 50px; height: 50px; float: right; margin-right: 2px;" ><img style="width: 100%; height:100%;" class="img-circle" src="validaciones/<?=$v3['Foto']?>"> </div>
               
                <div id='globo' class="MiComentario" style="">

                                <div class="comentario" ><?= $v2['Comentario'] ?></div>
                                <div class="fecha"> 
                                    <?PHP
                                    if ($dteDiff->format("%d") != 0) {
                                        if ($dteStart->format("l") == "Monday") {
                                            ?>
                                            lun.
                                            <?PHP
                                        }
                                        if ($dteStart->format("l") == "Tuesday") {
                                            ?>
                                            mar.
                                            <?PHP
                                        }
                                        if ($dteStart->format("l") == "Wednesday") {
                                            ?>
                                            mier.
                                            <?PHP
                                        }
                                        if ($dteStart->format("l") == "Thursday") {
                                            ?>
                                            jue.
                                            <?PHP
                                        }
                                        if ($dteStart->format("l") == "Friday") {
                                            ?>
                                            vier.
                                            <?PHP
                                        }
                                        if ($dteStart->format("l") == "Saturday") {
                                            ?>
                                            sab.
                                            <?PHP
                                        }
                                        if ($dteStart->format("l") == "Sunday") {
                                            ?>
                                            dom.
                                            <?PHP
                                        }
                                    }
                                    ?>
                    <?= $dteStart->format("h:i A"); ?>
                                </div>
                                
 
                            </div>
             
        
                            <?PHP
                        } else {
                            ?>
       <div style=" width: 50px; height: 50px; float: left; margin-right: 2px;" ><img style="width: 100%; height:100%;" class="img-circle" src="validaciones/<?=$v3['Foto']?>"> </div>
               
                            <div class="AmigoComentario" id='globo2'>

                                <div class="comentario"><?= $v2['Comentario'] ?></div>
                                <div class="fecha"> 
                                    <?PHP
                                    if ($dteDiff->format("%d") != 0) {
                                        if ($dteStart->format("l") == "Monday") {
                                            ?>
                                            lun.
                                            <?PHP
                                        }
                                        if ($dteStart->format("l") == "Tuesday") {
                                            ?>
                                            mar.
                                            <?PHP
                                        }
                                        if ($dteStart->format("l") == "Wednesday") {
                                            ?>
                                            mier.
                                            <?PHP
                                        }
                                        if ($dteStart->format("l") == "Thursday") {
                                            ?>
                                            jue.
                                            <?PHP
                                        }
                                        if ($dteStart->format("l") == "Friday") {
                                            ?>
                                            vier.
                                            <?PHP
                                        }
                                        if ($dteStart->format("l") == "Saturday") {
                                            ?>
                                            sab.
                                            <?PHP
                                        }
                                        if ($dteStart->format("l") == "Sunday") {
                                            ?>
                                            dom.
                                            <?PHP
                                        }
                                    }
                                    ?>
                    <?= $dteStart->format("h:i A"); ?>
                                </div>
                            </div>
                            <?PHP
                        }
                    }
                }
            }
            ?>


        </div>
       
        <hr>
        <div id="Mensaje" class="div_enviar_mensaje" >
            <div class="panel panel-default" >
                <form id="EnviarMensaje" method="POST" role="form">
                    <div class="panel-body">
                        <div class="form-group div_form_mensaje" id="coment-group" align="center">
                            <div class="txtarea"><textarea name="Comentario" class="form-control" id="bs-input-estadoproyecto" placeholder="Escribe un comentario" rows="3"></textarea></div>
                            <input name="idMensajePara" type="hidden" class="btn btn-default pull-right btn-lg" value="<?= $idProyecto ?>"> 
                            <div class="submit"><input name="crea" type="submit" class="btn btn-default pull-right btn-lg" value="Enviar"> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?PHP
    }
    ?>
</div>
   



            <!--Crear proyecto-->
            <div class="modal fade" id="newproyect" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                            <h3 class="modal-title" id="myModalLabel">Crear proyecto</h3>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge"><div>Nombre: </div></label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="formGroupInputLarge" placeholder="Nombre del proyecto">
                                    </div>
                                </div>        
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Crear</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--Invitar amigos-->
            <div class="modal fade" id="invite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                            <h3 class="modal-title" id="myModalLabel">Invita a tus amigos a unirse</h3>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-group form-group-lg botonmas">
                                    <button type="button" class="btn btn-default" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                    <br>
                                </div>
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Correo</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="formGroupInputLarge" placeholder="correo">
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        <!--agregar archivo-->
            <div class="modal fade" id="newfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" >&times;</span><span class="sr-only">Cerrar</span></button>
                            <h3 class="modal-title" id="myModalLabel">Agregar un archivo</h3>
                        </div>
                        <form enctype="multipart/form-data" id="AsignarArchivo" method="POST" action="validaciones/ArchivoVal.php" class="form-horizontal" role="form">
                            <div class="modal-body">
                                <div id="archivo-group">
                                    <label for="exampleInputFile">Cargar archivo</label>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                    <div class="select-style">
                                        <p class="help-block">Seleccione una carpeta para su archivo:</p>  
                                        <select name="Carpeta">
                                            <option value="0">Archivo</option>
                                                  <?PHP
                            $sql6 = consulta("select * from carpeta WHERE idProyectoFK = '$idProyecto';"); 
                             if ($sql6->num_rows > 0) {
                                      while ($v6 = mysqli_fetch_assoc($sql6)) {
                            ?>
                            
                                            <option value="<?= $v6['idCarpeta'] ?>"><?= $v6['nombreCarpeta'] ?></option>
                                            <?PHP
                                             }
                                              }
                                            ?>
                                        </select>
                                    </div>
                                    <br>
                                    <input name="idProyect" type="hidden" class="btn btn-default pull-right btn-lg" value="<?= $idProyecto ?>"> 
                                    <input type="file" size=50 id="exampleInputFile" name="File">
                                    <p class="help-block">Selecciona el archivo que deseas compartir.</p>
                                </div> 

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <input type="submit" name="cmdSubmit" class="btn btn-primary" value="Subir" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--animacion al cargar-->
            <!--Crear nota-->
            <div class="modal fade" id="newnote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                            <h3 class="modal-title" id="myModalLabel">Crear nota</h3>
                        </div>
                        <form class="form-horizontal" method="POST" role="form" id="CrearNotaFast">
                            <div class="modal-body">

                                <div>
                                    <div class="form-group form-group-lg">
                                        <label class="col-sm-2 control-label" for="formGroupInputLarge">Nombre:</label>
                                        <div class="col-sm-10" id="NotaName-group">
                                            <input class="form-control" name="nombreNota" type="text" id="formGroupInputLarge" placeholder="Nombre de tu nota">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-group form-group-lg" >
                                            <div class="col-sm-2">
                                                <label class="col-sm-2 control-label" for="formGroupInputLarge">Nota:</label>
                                            </div>

                                            <div class="col-sm-10" id="NotaCont-group">
                                                <textarea name="NotaContenido" class="form-control" id="bs-input-estadoproyecto"placeholder="Escribe tu nota rapida aqui"rows="6"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>          
                                <input name="CREARNOTA" type="submit" class="btn btn-default" value="Crear"> 
                                <input name="idProyect" type="hidden" class="btn btn-default pull-right btn-lg" value="<?= $idProyecto ?>"> 

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--Evento-->
            <div class="modal fade" id="newevent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                            <h3 class="modal-title" id="myModalLabel">Crear evento</h3>
                        </div>
                        <form class="form-horizontal" role="form" id="AsignarEvento">
                            <div class="modal-body">


                                <div class="form-group form-group-lg">
                                    <div class="col-sm-2">
                                        <label class="control-label" for="formGroupInputLarge">Nombre:</label>
                                    </div>
                                    <div class="col-sm-10" id="name-group">
                                        <input class="form-control" name="Nombre" type="text" id="formGroupInputLarge" placeholder="Nombre de tu evento">

                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <div class="col-sm-2">
                                        <label class="control-label" for="formGroupInputLarge">DescripciÃ³n:</label>
                                    </div>
                                    <div class="col-sm-10" id="desc-group">
                                        <textarea name="Descripcion" class="form-control" id="bs-input-estadoproyecto"placeholder="Escribe una descripcion del evento"rows="6"></textarea>
                                    </div>
                                </div>

                                <div class="form-group form-group-lg">
                                    <div class="col-sm-2">
                                        <label class="control-label"  for="formGroupInputLarge">Fecha inicio:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="container">
                                            <div class="row">
                                                <div class='col-sm-4'>
                                                    <div class="form-group" id="picker1-group">

                                                        <input id="datetimepicker1" type="text" class="form-control" >

                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                        <p id="dateoutput2"></p> 

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-2">
                                            <label class="control-label" for="formGroupInputLarge">Fecha final:</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="container">
                                                <div class="row">
                                                    <div class='col-sm-4'>
                                                        <div class="form-group" id="picker2-group">

                                                            <input id="datetimepicker2" type="text" class="form-control" />

                                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                            <p id="dateoutput3"></p> 


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <input name="idProyect" type="hidden"  value="<?= $idProyecto ?>"> 
                                        <input name="crea" type="submit" class="btn btn-primary" value="Crear"> 
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--asignar tarea-->

            <div class="modal fade" id="newwork" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                            <h3 class="modal-title" id="myModalLabel">Asignar tarea</h3>
                        </div>
                        <form id="AsignarTarea" method="POST" class="form-horizontal" role="form">
                            <div class="modal-body">

                                <div>
                                    <div class="form-group form-group-lg">
                                        <label class="col-sm-2 control-label" for="formGroupInputLarge">Para:</label>
                                        <div class="col-sm-10" id="para-group">
                                            <input class="form-control" name="formGroupInputLarge" type="text" id="formGroupInputLarge" placeholder="Nombre de quien realizara la tarea.">


                                        </div>
                                    </div>
                                    <div class="form-group form-group-lg" >
                                        <label class="col-sm-2 control-label" for="formGroupInputLarge">Tarea:</label>
                                        <div class="col-sm-10" id="tarea-group">
                                            <textarea type="text" name="estadoproyecto" class="form-control" id="bs-input-estadoproyecto"placeholder="DescripciÃ³n de tarea a realizar."rows="6"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-lg"">
                                        <div class="col-sm-2">
                                            <label class="control-label" for="formGroupInputLarge">Fecha de realizaciÃ³n:</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="container">
                                                <div class="row">
                                                    <div class='col-sm-4'>

                                                        <div class="form-group"  id="fecha-group">

                                                            <input id="datepicker" type="text" class="form-control" >

                                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                            <p id="dateoutput"></p> 
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-lg">
                                        <label class="col-sm-2 control-label" for="formGroupInputLarge">Nivel de prioridad:</label>
                                        <div class="col-sm-10">

                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked>Baja
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="2" checked>Media
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="3" checked>Alta
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div> 
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <input name="idProyect" type="hidden"  value="<?= $idProyecto ?>"> 
                                    <input name="crea" type="submit" class="btn btn-primary" value="Guardar"> 
                                </div>  
                            </div>




                        </form>
                    </div>
                </div>
            </div>


            

            <!--nuevo mienbro-->
            <div class="modal fade" id="newmenber" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                            <h3 class="modal-title" id="myModalLabel">Invitar integrante</h3>
                        </div>

                        <div class="modal-body">
                            <form class="form-horizontal" role="form" id="AgregarIntegrante">
                                <div class="form-group form-group-lg botonmas">
                                    <button type="button" class="btn btn-default" ><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                    <br>
                                </div>
                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge">Correo</label>
                                    <div id="AgregarInter-group" class="col-sm-10">
                                        <input class="search" type="text" id="Search" placeholder="correo" name="correo">
                                        <input name="idProyect" type="hidden" class="btn btn-default pull-right btn-lg" value="<?= $idProyecto ?>"> 
                                        <input type="submit" class="btn btn-primary"></input>
                                    </div>
                                    <div id="display" style="position: absolute; margin-left: 110px; margin-top: 40px;">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Nueva Carpeta-->
            <div class="modal fade" id="newCarpeta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                            <h3 class="modal-title" id="myModalLabel">Crear Carpeta</h3>
                        </div>

                        <div class="modal-body">
                            <form class="form-horizontal" role="form" id="AgregarCarpeta">

                                <div class="form-group form-group-lg">
                                    <label class="col-sm-2 control-label" for="formGroupInputLarge" style="margin-top: 10px;">Nombre:</label><br>
                                    <div id="AgregarCarp-group" class="col-sm-10">
                                        <input type="text" placeholder="Nombre Carpeta" name="nameCarpeta">
                                        <input name="idProyect" type="hidden" class="btn btn-default pull-right btn-lg" value="<?= $idProyecto ?>"> 
                                        <input type="submit" value='Crear' class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            
<!-- Desplegar Edtar Proyecto -->

<div class="modal fade" id="EditarProyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

          <div class="modal-dialog">
               <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                        <h3 class="modal-title" id="myModalLabel">Editar proyecto</h3>
                    </div>
              <div class="panel panel-default">
                <div class="panel-body">
                    
                    <form enctype="multipart/form-data" id="EditarProyectoEnvio" class="form-horizontal" method="POST" role="form">
                  <div class="form-group form-group-lg">
                    <div class="col-sm-2 control-label">
                        <a data-toggle="modal" data-target="#newimage"><img id="imgproyecto" style="border-radius: 10px; width: 80px; height: 80px;" src="validaciones/<?= $ImgProyect ?>" class="img-rounded"></img ></a>
                    </div>
                    <div class="col-sm-10">
                      <label for="exampleInputFile">Cargar archivo</label>
                         <input type="file" size=50 id="exampleInputFile" name="File">
                              <p>Seleccione una imagen para reconocer mas fácil el proyecto</p>
                    </div>
                     
                  </div>
                  <div class="form-group form-group-lg">
                      <label class="col-sm-2 control-label" for="formGroupInputLarge">Nombre proyecto</label>
                          <div class="col-sm-10">
                           <input class="form-control" name="NombreProyecto" value="<?= $nombreProyect ?>" type="text" id="formGroupInputLarge" placeholder="Nombre proyecto">
                          </div>
                  </div>
              
                  <div class="form-group form-group-lg">
                      <label class="col-sm-2 control-label" for="formGroupInputLarge">Descripción proyecto</label>
                          <div class="col-sm-10">
                             <textarea name="DescProyecto" class="form-control" id="bs-input-descipcionproyeco" placeholder="Cuentanos acerca del proyecto."rows="3"><?= $descProyect ?></textarea>
                          </div>
                  </div>
                      <div class="modal-footer">
                          <input type="hidden" name="IdProyecto" value="<?= $idProyecto ?>">
                                <button class="btn btn-default" data-dismiss="modal">Regresar</button> 
                                <button id="btn_enviar" class="btn btn-primary">Guardar</button>  

                            </div>  
                </form>

              </div>
            </div>

          </div>

</div>
            
            <!-- Desplegar Info calendario -->
            <?PHP
            $idEvento = $_GET['idEvento'];

            $sql = consulta("select * from evento where idEvento = '2';");

            if ($sql->num_rows > 0) {
                $v = mysqli_fetch_assoc($sql);
                $nom = $v['nombreEvento'];
                $des = $v['descripcionEvento'];
                $FechaIn = $v['fechaEvento'];
                $FechaFin = $v['fechaFin'];
                ?>

                <div class="modal fade" id="showevent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
                                <h3 class="modal-title" id="myModalLabel">Evento</h3>
                            </div>
                            <form class="form-horizontal" role="form" id="AsignarEvento">
                                <div class="modal-body">


                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-2">
                                            <label class="control-label" for="formGroupInputLarge">Nombre:</label>
                                        </div>
                                        <div class="col-sm-10" id="name-group">
                                            <label class="control-label" for="formGroupInputLarge"><?= $nom ?></label>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-2">
                                            <label class="control-label" for="formGroupInputLarge">DescripciÃ³n:</label>
                                        </div>
                                        <div class="col-sm-10" id="desc-group">
                                            <label class="control-label" for="formGroupInputLarge"><?= $des ?></label>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-lg">
                                        <div class="col-sm-2">
                                            <label class="control-label"  for="formGroupInputLarge">Fecha inicio:</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="container">
                                                <div class="row">
                                                    <div class='col-sm-4'>
                                                        <div class="form-group" id="picker1-group">

                                                            <label class="control-label" for="formGroupInputLarge"><?= $FechaIn ?></label>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-lg">
                                            <div class="col-sm-2">
                                                <label class="control-label" for="formGroupInputLarge">Fecha final:</label>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class='col-sm-4'>
                                                            <div class="form-group" id="picker2-group">

                                                                <label class="control-label" for="formGroupInputLarge"><?= $FechaFin ?></label>


                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Regresar</button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                           <div class="modal fade" id="ShowValidacion2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" >
        <div class="modal-content">
                <div class="modal-body">
<form class="form-horizontal" method="POST" role="form" id="EliminarIntegrante">
                    <div class="form-group form-group-lg" style="text-align:center; margin-top:auto  ">
                        <label class="control-label" for="formGroupInputLarge">Â¿Estas Seguro que deseas eliminar a <input type="text" class="UsuarioName" style="border: none; border-width: 0; 
background-color: transparent; outline: none; width: 100px;text-align: center" disabled> de tu grupo?</label>
                        <input type="hidden" class="UsuarioId" name="UsuarioElimina" disabled>
                        <input type="hidden" class="ProyectoName" name="ProyectoElimina" disabled>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" >Regresar</button>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </div>
                       </form>
                </div>
        </div>
    </div>
</div>

                <script type="text/javascript">

                        $(".imagenArchivo").on('click', function () {
                        var comparar = $("#Image").attr('src');
                            if (comparar == "images/Carpeta Cerrada.png")  {    
                            
                                 $("#Image").attr('src','images/Carpeta Abierta.png');
                                 $("#display2").hide('slow');
                            } else {
                                
                                 $("#Image").attr('src','images/Carpeta Cerrada.png');
                              
                                 $("#display2").show('slow');
                            }
                        });
                        
                        $(".imagenArchivo").hover(function () {
                            var comparar = $("#Image").attr('src');
                            if (comparar == "images/Carpeta Cerrada.png")  {
                                $("#Image").attr('src','images/Carpeta Abierta.png');

                            } else {
                                $("#Image").attr('src','images/Carpeta Cerrada.png');
                            }
                        }, function () {
                            var comparar = $("#Image").attr('src');
                            if (comparar == "images/Carpeta Abierta.png") {

                           $("#Image").attr('src','images/Carpeta Cerrada.png');
                            } else {
                           $("#Image").attr('src','images/Carpeta Abierta.png');
                            }
                        });
                        
                         $(".imagenesCarpeta").on('click', function () {
                             var comparar = $("."+ this.name +"").attr('src');
                            if (comparar == "images/Carpeta Cerrada.png") {    
                               
                                 $("."+ this.name +"").attr('src','images/Carpeta Abierta.png');
                                 $("#"+ this.name +"").hide('slow');                   
           
                            } else {
                              
                                 $("."+ this.name +"").attr('src','images/Carpeta Cerrada.png');
                                 $("#"+ this.name +"").show('slow');
                            }
                        });
                        
                           $(".imagenesCarpeta").hover(function () {
                               
                               var comparar = $("."+ this.name +"").attr('src');
                               
                            if (comparar == "images/Carpeta Cerrada.png") {
                                 $("."+ this.name +"").attr('src','images/Carpeta Abierta.png');

                            } else {
                                $("."+ this.name +"").attr('src','images/Carpeta Cerrada.png');
                            }
                        }, function () {
                            var comparar = $("."+ this.name +"").attr('src');
                            if (comparar == "images/Carpeta Abierta.png") {
                               $("."+ this.name +"").attr('src','images/Carpeta Cerrada.png');
                            } else {
                              $("."+ this.name +"").attr('src','images/Carpeta Abierta.png');
                            }
                        });

                    var idUsuarioM;

                    function set_item(id, texto) {
                        // change input value
                        $('#Search').val(texto);
                        // hide proposition list
                        $('#display').hide();

                        idUsuarioM = id;
                    }


$('#AgregarCarpeta').submit(function (event) {
                        $('.form-group').removeClass('has-error'); // remove the error class
                        $('.help-block').remove(); // remove the error text

                        var formData = {
                            'CarpetaName': $('input[name=nameCarpeta]').val(),
                            'idProyect': $('input[name=idProyect]').val()
                        };



                        // process the form
                        $.ajax({
                            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
                            url: 'validaciones/AgregarCarpeta.php', // the url where we want to POST
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
                                            $('#AgregarCarp-group').addClass('has-error'); // add the error class to show red input
                                            $('#AgregarCarp-group').append('<div class="help-block">' + data.errors.Titulo + '</div>'); // add the actual error message under our input
                                        }

                                    } else {
                                        location.href = "Invita_amigos.php?idpro=" + data.idProyect + "";
                                        alertify.success('has agregado a un miembro nuevo');

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

                    $(".search").keyup(function ()
                    {
                        $('.form-group').removeClass('has-error'); // remove the error class
                        $('.help-block').remove(); // remove the error text

                        var searchbox = $(this).val();
                        var dataString = 'searchword=' + searchbox;

                        if (searchbox == '')
                        {
                            $("#display").hide();
                        }
                        else
                        {

                            $.ajax({
                                type: "POST",
                                url: "validaciones/search.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#display").html(html).show();
                                }
                            });
                        }
                        return false;


                    });
                    $('#AgregarIntegrante').submit(function (event) {
                        $('.form-group').removeClass('has-error'); // remove the error class
                        $('.help-block').remove(); // remove the error text

                        var formData = {
                            'UsuarioName': $('#Search').val(),
                            'IdUsuario': idUsuarioM,
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
                                        location.href = "Invita_amigos.php?idpro=" + data.idProyect + "";
                                        alertify.success('has agregado a un miembro nuevo');

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

                    $(".search").keyup(function ()
                    {
                        $('.form-group').removeClass('has-error'); // remove the error class
                        $('.help-block').remove(); // remove the error text

                        var searchbox = $(this).val();
                        var dataString = 'searchword=' + searchbox;

                        if (searchbox == '')
                        {
                            $("#display").hide();
                        }
                        else
                        {

                            $.ajax({
                                type: "POST",
                                url: "validaciones/search.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#display").html(html).show();
                                }
                            });
                        }
                        return false;


                    });



                </script>

            <?PHP
        }
    }
}
?>