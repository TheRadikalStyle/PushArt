
<?php
require_once("Conexion/conexionPHP.php");
session();
$idUs = $_SESSION['id'];
$fotoUs = $_SESSION['foto'];
$idMensaje = '11';
$idUsNombre = $_SESSION['nombre'];
$idUsApellido = $_SESSION['apellido'];
?>

<script type="text/javascript">
    $('#EnviarMensaje').submit(function(event) {

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
            url: 'validaciones/EnviarMensajePara.php', // the url where we want to POST
            data: formData, // our data object
            dataType: 'json', // what type of data do we expect back from the server
            encode: true
        })
                // using the done promise callback
                .done(function(data) {

                    // log data to the console so we can see
                    console.log(data);

                    // here we will handle errors and validation messages
                    if (!data.success) {

                        // handle errors for name ---------------
                        if (data.errors.ComentarioMensaje) {

                            $('#coment-group').addClass('has-error'); // add the error class to show red input
                            $('#coment-group').append('<div class="help-block">' + data.errors.ComentarioMensaje + '</div>'); // add the actual error message under our input
                        }


                    } else {
                        $('textarea[name=Comentario]').val("");
                    }
                })

                // using the fail promise callback
                .fail(function(data) {

                    // show any errors
                    // best to remove for production
                    console.log(data);
                });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });


    var numDeArreglo = 0;

    function startTime() {

        var formData = {
            'idMensajePara': $('input[name=idMensajePara]').val(),
            'numDeArreglo': numDeArreglo
        };

        $.ajax({
            type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url: 'validaciones/RefrescarMensajes.php', // the url where we want to POST
            data: formData, // our data object
            dataType: 'json', // what type of data do we expect back from the server
            encode: true
        })
                .done(function(data) {

                    console.log(data);


                    if (!data.success) {


                    } else {

                        numDeArreglo = data.message;
                        if (data.Agregar) {
                            if (data.usuario) {

                                $('#Cuerpo').append('<div class="conversation-item item-left clearfix" style="max-height: 80%"><div class="conversation-image">    <img src="validaciones/' + data.foto + '" style=" width: 50px;    height: 50px;    overflow: hidden;    float: left;    border-radius: 50%;    background-clip: padding-box;    margin-top: 6px;"/></div><div class="conversation-body"><div class="name">' + data.nombre + ' ' + data.apellido + '</div><div class="time hidden-xs">January 17th 2015, 10:36 am</div><div class="text">' + data.comenta + '.</div></div></div>').show();
                                $('#Cuerpo').prop({scrollTop: $('#Cuerpo').prop("scrollHeight")});
                            } else {

                                $('#Cuerpo').append('<div class="conversation-item item-right clearfix" style="max-height: 80%"><div ><img src="validaciones/' + data.foto + '" style=" width: 50px;    height: 50px;    overflow: hidden;    float: right;    border-radius: 50%;    background-clip: padding-box;    margin-top: 6px;"/></div><div class="conversation-body"><div class="name">' + data.nombre + ' ' + data.apellido + '</div><div class="time hidden-xs">January 17th 2015, 10:40 am</div><div class="text">' + data.comenta + '.</div></div></div>').show();
                                $('#Cuerpo').prop({scrollTop: $('#Cuerpo').prop("scrollHeight")});
                            }
                        }
                    }
                })
                .fail(function(data) {
                    console.log(data);
                });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    }

    setInterval("startTime()", 5000);

</script>

<script>

    $('#Cuerpo').prop({scrollTop: $('#Cuerpo').prop("scrollHeight")});


</script>
<?PHP
$sql = consulta("select Foto, nombreUsuario, apellidos from usuario where idUsuario='$idMensaje'");

if ($sql->num_rows > 0) {
    $v = mysqli_fetch_assoc($sql);
    ?>
   <div class="row">
       <div class="col-lg-5" style="width: 100%;">
<div class="main-box clearfix" >
<header class="main-box-header clearfix">
<h2>Conversation</h2>
</header>
<div class="main-box-body clearfix" >
<div class="conversation-wrapper" >
<div class="conversation-content" >
<div class="conversation-inner" id="Cuerpo">
                                <?PHP
                                $sql2 = consulta("select UsuarioDesde,fechaComentario,Comentario  from inbox where (UsuarioPara = '$idMensaje' AND UsuarioDesde = '$idUs') OR (UsuarioPara = '$idUs' AND UsuarioDesde = '$idMensaje') order by fechaComentario ASC;");
                                $fecha = 0;
                                if ($sql2->num_rows > 0) {
                                    while ($v2 = mysqli_fetch_assoc($sql2)) {
                                        $Who = $v2['UsuarioDesde'];

                                        $strStart = $v2['fechaComentario'];
                                        $strEnd = date("Y-m-d h:m:s");

                                        $dteStart = new DateTime($strStart);
                                        $dteEnd = new DateTime();

                                            if ($Who == $idUs) {
                                                ?>

    <div class="conversation-item item-left clearfix" style="max-height: 80%">
<div class="conversation-image">
    <img src="validaciones/<?= $fotoUs ?>" style=" width: 50px;
    height: 50px;
    overflow: hidden;
    float: left;
    border-radius: 50%;
    background-clip: padding-box;
    margin-top: 6px;"/>
</div>
<div class="conversation-body">
<div class="name">
<?= $idUsNombre ?> <?= $idUsApellido ?>
</div>
<div class="time hidden-xs">January 17th 2015, 10:36 am</div>
<div class="text">
<?= $v2['Comentario'] ?>.
</div>
</div>
</div>
    
    
                                              
                                                <?PHP
                                            } else {
                                                ?>
    <div class="conversation-item item-right clearfix" style="max-height: 80%">
<div >
<img src="validaciones/<?= $v['Foto'] ?>" style=" width: 50px;
    height: 50px;
    overflow: hidden;
    float: right;
    border-radius: 50%;
    background-clip: padding-box;
    margin-top: 6px;"/>
</div>
<div class="conversation-body">
<div class="name">
<?= $v['nombreUsuario'] ?> <?= $v['apellidos'] ?>
</div>
<div class="time hidden-xs">January 17th 2015, 10:40 am</div>
<div class="text">
 <?= $v2['Comentario'] ?>.
</div>
</div>
</div>
                                    
                    <?PHP
                }
            }
        }

    ?>

    </div>
</div>
<div class="conversation-new-message">
<form id="EnviarMensaje" method="POST" role="form">
<div class="form-group">
<textarea name="Comentario" class="form-control chat-input" rows="2" placeholder="Enter your message..."></textarea>
</div>
<div class="clearfix chat-send">
    <input name="idMensajePara" type="hidden" class="btn btn-default pull-right btn-lg" value="<?= $idMensaje ?>"> 
                          
<button name="crea" type="submit" class="btn btn-success pull-right">Enviar Mensaje</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
    


                      
    <?PHP
}
?>



