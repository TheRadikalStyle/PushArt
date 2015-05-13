<?php
require_once("../Conexion/conexionPHP.php");
session();

$errors         = array();  	// array to hold validation errors
$data 		= array(); 		// array to pass back data

// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array
$NombreEditar = $_POST['NombreEdita'];
$ApellidoEditar = $_POST['ApellidoEdita'];
$CorreoEditar = $_POST['CorreoEdita'];
$ContrasenaEditar = $_POST['ContrasenaEdita'];
$SexoEditar = $_POST['SexoEdita'];
$FechaEditar = $_POST['FechaEdita'];

$idUsuario = $_SESSION['id'];

	if (empty($NombreEditar))
		$errors['Comentario'] = 'Escribe un Nombre.';

        if (empty($CorreoEditar))
		$errors['Titulo'] = 'Escribe un Correo.';

            if (empty($ContrasenaEditar))
		$errors['Titulo'] = 'Escribe una Contraseña.';
            
                //if (empty($HombreEditar) || empty($MujerEditar) )
		//$errors['Titulo'] = 'Selecciona uno de los 2 campos.';
        
                   if (empty($FechaEditar))
		$errors['Titulo'] = 'Selecciona una fecha.';
                       $sql222 = consulta("select correoElectronico from usuario where idUsuario!='$idUsuario';");
                     if ($sql222->num_rows > 0) {
                            while ($v222 = mysqli_fetch_assoc($sql222)) {
                                 $cooreeor= $v222['correoElectronico'];
                                 if($cooreeor==$CorreoEditar){
                                     $errors['Titulo'] = 'Correo en uso, ingresa otro';
                                 }
                                 
                                 
                                        }
                                        
                        }
                   
	if ( ! empty($errors) ) {

		$data['success'] = false;
		$data['errors']  = $errors;
	} else {

            if(consulta("UPDATE usuario SET nombreUsuario='$NombreEditar',apellidos='$ApellidoEditar',correoElectronico='$CorreoEditar',contrasenia='$ContrasenaEditar',sexo='$SexoEditar',fechaNacimiento = '$FechaEditar' where idUsuario= '$idUsuario';")){   
                $data['success'] = true;
		$data['message'] = 'Success!';
                       $data[1] = array(
                           'sexo2'<= $SexoEditar,
                            'fechaNacimiento2'=>$FechaEditar,
                            'nombre2'=>$NombreEditar,
                            'apellido2'=>$ApellidoEditar,
                            'foto2'=>$foto,
                            'correo2'=>$CorreoEditar,
                            'contra2'=>$ContrasenaEditar
                        );
            }
            else{
                
                $data['success'] = false;
		$data['errors']  = $errors;
            }

		
	}

	// return all our data to an AJAX call
	echo json_encode($data);

