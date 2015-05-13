<?php
require_once("../Conexion/conexionPHP.php");
session();

$errors         = array();  	// array to hold validation errors
$data 		= array(); 		// array to pass back data

// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array
$NombreEditar = $_POST['NombreEdita'];
$nombreid = $_POST['nombreid'];
$Carpeta = $_POST['Carpeta'];
$Descripcion = $_POST['Descripcion'];


$idUsuario = $_SESSION['id'];

	if (empty($NombreEditar))
		$errors['Comentario'] = 'Escribe un Nombre.';

        
	if ( ! empty($errors) ) {

		$data['success'] = false;
		$data['errors']  = $errors;
	} else {

            if(consulta("UPDATE comentariomuro SET nombre='$NombreEditar', Categoria='$Carpeta', comentario='$Descripcion' where idcomentarioMuro= '$nombreid';")){   
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

