<script type="text/javascript">
      $('.ProyectoSelect').on('click', function() {
            $('#contenido').hide();
                   $('#proyctoSelectPanel').show();
              $('#contenido').html('<p><img style="margin-left: 20%; margin-top: 10%;width: 10%; height: 10%" src="images/loading1.gif"/></p><b style=" margin-left: 30%; margin-top: 10%;">Cargando Proyecto</b>');
           
            $('#contenido').load("Proyecto_1.php?idProyecto=" + $(this).attr('name') + "");
            $('#contenido').fadeIn("slow");
        });
        

    
//    $(".SHOWELIMIProyecto").on('click', function () {
//                                   var Proyectoid = $("."+ this.name +"1").attr('value');
//                                   var Proyectoname = $("."+ this.name +"2").attr('value');
//                                   $(".ProyectoName").attr('value',Proyectoname);
//                                  $(".ProyectoID").attr('value',Proyectoid);
//                                 $("#ShowValidacion3").modal('show'); 
//                        });
//     
//$('#EliminarProyecto').submit(function (event) {
//       
//        var formData = {
//                        'ProyectoIDElimina': $('input[name=ProyectoIDElimina]').val()
//                    };
//
//   
//
//                    // process the form
//                    $.ajax({
//                        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
//                        url: 'validaciones/EliminarProyecto.php', // the url where we want to POST
//                        data: formData, // our data object
//                        dataType: 'json', // what type of data do we expect back from the server
//                        encode: true
//                    })
//                     .done(function (data) {
//
//                                // log data to the console so we can see
//                                console.log(data);
//
//                                // here we will handle errors and validation messages
//                                if (!data.success) {
//
//
//                                    if (data.errors.Comentario) {
//                                        $('#form-control').addClass('has-error'); // add the error class to show red input
//                                        $('#form-control').append('<div class="help-block">' + data.errors.Comentario + '</div>'); // add the actual error message under our input
//                                    }
//                                    if (data.errors.Titulo) {
//                                        $('#NotaName-group').addClass('has-error'); // add the error class to show red input
//                                        $('#NotaName-group').append('<div class="help-block">' + data.errors.Titulo + '</div>'); // add the actual error message under our input
//                                    }
//
//                                } else {
//                                   $('#contenido').hide();
//         $('#contenido').html('<p><img style="margin-left: 20%; margin-top: 10%;width: 10%; height: 10%" src="images/loading1.gif"/></p> <b style=" margin-left: 30%; margin-top: 10%;">Cargando Proyectos<b>');
//        $('#contenido').load("CargarProyectos.php");
//        $('#contenido').show();
//                                   alertify.success('Se han guardado los cambios');
//
//                                }
//                            })
//
//                            // using the fail promise callback
//                            .fail(function (data) {
//
//                                // show any errors
//                                // best to remove for production
//                                console.log(data);
//                            });
//
//                    // stop the form from submitting the normal way and refreshing the page
//                    event.preventDefault();
//                });

</script>
<style>
    .tarjeta-proyecto{
        border:2px solid #000;
        border-radius: 10px;
        background-color: #FFF;
        padding:5px;
        /*-moz-box-shadow:5px 5px 5px 5px #000;
        -webkit-box-shadow:3px 3px 5px 6px #000;*/
        box-shadow:10px 10px 20px 0px #000;
    }
    .tarjeta-proyecto .imagen_proyecto{
        display: inline-block;
        vertical-align: top;
    }
    .tarjeta-proyecto .imagen_proyecto img{
        border-radius: 10px; 
        width: 80px; 
        height: 80px;
    }
    .tarjeta-proyecto .info_proyecto{
        max-width: 180px;
        margin:0px;
        display: inline-block;
        vertical-align: top;
        white-space:nowrap;  
        width:191px;
        height:auto;
        overflow:hidden;
        text-overflow:ellipsis;
        text-decoration: none;
    }
    .tarjeta-proyecto .info_proyecto .nombre{
        margin: 0px;
        color:#004579;
        font-size: 20px;        
    }
    .tarjeta-proyecto .info_proyecto .descripcion{

       white-space:nowrap;  
                    width:191px;
                    margin-left: 10px;
                    height:auto;
                    overflow:hidden;
                    text-overflow:ellipsis;

    }
</style>
<div class="row">
<div class="col-lg-12">

<div class="row">

                   <?PHP
                   require_once("Conexion/conexionPHP.php");
session();
                    $idusuario = $_SESSION['id'];
                    $sql = consulta("select P.idProyecto,
P.nombreProyecto,
P.descripcionProyecto,
P.fechaCreacion,
P.fechaInicio,
P.fechaEstimadaFin,
P.idImagen
from  proyecto P
INNER JOIN participanteproyecto PP
ON P.idProyecto = PP.idProyecto
WHERE idUsuario = '$idusuario' limit 2; ");
                    if($sql->num_rows > 0){
                           $colorAsignado = 0;
                    while($v = mysqli_fetch_assoc($sql)){
                            $idproyecto=$v['idProyecto'];
                         
                    //Definimos el color de las tablas
                    switch ($colorAsignado){
                        case 0:
                          
                            $tipe = 'emerald-box';
                            $Subtipe = 'emerald-bg';
                            $colorAsignado += 1;
                        break;
                        case 1:
                            $tipe = 'red-box';
                            $Subtipe = 'red-bg';
                             $colorAsignado += 1;
                         break;
                        case 2:
                            $tipe = 'gray-box';
                            $Subtipe = 'gray-bg';
                             $colorAsignado += 1;
                            break;
                        case 3:
                            $tipe = 'purple-box';
                            $Subtipe = 'purple-bg';
                             $colorAsignado += 1;
                            break;
                        case 4:
                            $tipe = 'yellow-box';                            
                            $Subtipe = 'yellow-bg';
                             $colorAsignado = 0;
                    break;
                    }
                            ?>

    <div class="col-lg-4 col-md-6 col-sm-6">
<div class="main-box clearfix project-box <?= $tipe ?>">
<div class="main-box-body clearfix">
<div class="project-box-header <?= $Subtipe ?>">
<div class="name">
  <a class="ProyectoSelect" name="<?= $v['idProyecto'] ?>">
<?=$v['nombreProyecto']?>
</a>
</div>
</div>
<div class="project-box-content">
<?PHP
    if($x==0){
    ?>
    <img style="width: 450px;" src="http://campus.cva.itesm.mx/perspectiva/farticulos/arte.jpg">
    <?PHP
    
    $x=$x+1;
    }else{
        ?>
    <img style="width: 450px;"src="http://k39.kn3.net/8744E6627.jpg">
    <?PHP
    }
    ?>  
</div>

<div class="project-box-ultrafooter clearfix">
<!-- Participantes del proyecto -->
    <?PHP
    $sql2 = consulta("select nombreUsuario, apellidos, Foto
from participanteproyecto P
INNER JOIN usuario Us
ON  P.idUsuario = Us.idUsuario
where idProyecto = $idproyecto;");
                    if($sql2->num_rows > 0){
                    while($vP = mysqli_fetch_assoc($sql2)){
                            $name=$vP['nombreUsuario'];
                            $lastName=$vP['apellidos'];
                            $Foto =$vP['Foto'];
    ?>
  
<img class="project-img-owner" alt="" src="validaciones/<?= $Foto ?>" data-toggle="tooltip" title="<?= $name ?> <?= $lastName ?>"/>

<?PHP
                    }
                    
                    }
?>
<a href="#" class="link pull-right">
<i class="fa fa-arrow-circle-right fa-lg"></i>
</a>
</div>
</div>
</div>
</div>
    
<!--
<div class="col-sm-3" style="margin-bottom: 15px;">
                <div class="container-fluid contenedor-tarjeta">
                     <div class="col-sm-4">
                 <a class="ProyectoSelect" name="<?= $v['idProyecto'] ?>"><img src="validaciones/<?= $v['idImagen'] ?>" style="border-radius: 10px; width: 80px; height: 80px;" ></a>
                         </div>
                    <div class="col-sm-8" style=" 
       white-space:nowrap;  
                    width:191px;
                    margin-left: 10px;
                    height:auto;
                    overflow:hidden;
                    text-overflow:ellipsis;
    ">
                        <a style="position: absolute; margin-left: 40%"><form class="SHOWELIMIProyecto" name="<?= $idproyecto ?>"><img style="cursor: pointer; width: 25px;height: 25px;margin-left: 75px" src="images/Eliminar.png" ></form></a>
                         
                       <a  class="ProyectoSelect" name="<?= $v['idProyecto'] ?>"> <h5><?= $v['nombreProyecto'] ?></h5> </a>
                         <h3 class="<?= $idproyecto ?>1" value="<?=$v['idProyecto']?>"></h3>
                          <h3 class="<?= $idproyecto ?>2" value="<?=$v['nombreProyecto']?>"></h3>
                          <?=$v['descripcionProyecto'] ?>
                  </div>
                </div>
            </div>
-->
            <?PHP
                    }
            }
            ?>



</div>
</div>
</div>

<script>

		$('.chart').easyPieChart({
			easing: 'easeOutBounce',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			},
			barColor: '#68b3a5',
			trackColor: '#f2f2f2',
			scaleColor: false,
			lineWidth: 8,
			size: 130,
			animate: 1500
		});

	</script>
      <div class="modal fade" id="ShowValidacion3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" >
        <div class="modal-content">
                <div class="modal-body">
<form class="form-horizontal" method="POST" role="form" id="EliminarProyecto">
                    <div class="form-group form-group-lg" style="text-align:center; margin-top:auto  ">
                        <label class="control-label" for="formGroupInputLarge">Estas Seguro que deseas eliminar el proyecto "<input type="text" class="ProyectoName" style="border: none; border-width: 0; 
background-color: transparent; outline: none; width: 100px;text-align: center;text-overflow: ellipsis" disabled> "?</label>
                    <input type="hidden" class="ProyectoID" name="ProyectoIDElimina" disabled>
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
<!-- cambiar por POP-->
<!--       <div class="modal fade" id="ShowValidacion3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" >
        <div class="modal-content">
                <div class="modal-body">
<form class="form-horizontal" method="POST" role="form" id="EliminarProyecto">
                    <div class="form-group form-group-lg" style="text-align:center; margin-top:auto  ">
                        <label class="control-label" for="formGroupInputLarge">Estas Seguro que deseas eliminar el proyecto "<input type="text" class="ProyectoName" style="border: none; border-width: 0; 
background-color: transparent; outline: none; width: 100px;text-align: center;text-overflow: ellipsis" disabled> "?</label>
                    <input type="hidden" class="ProyectoID" name="ProyectoIDElimina" disabled>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" >Regresar</button>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </div>
                       </form>
                </div>
        </div>
    </div>
</div>-->
