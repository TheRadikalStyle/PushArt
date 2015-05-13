<?php
require_once("../Conexion/conexionPHP.php");
session();

$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data

// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array

$Conetnido = $_POST['UsuarioName'];
$idProyec = $_POST['idProyect'];
$responsable = $_SESSION['id'];

        if (empty($Conetnido))
		$errors['Titulo'] = 'Escribe un usuario.';

	if ( ! empty($errors) ) {
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
          $sql = consulta("select * from usuario where correoElectronico = '$Conetnido';");
          if($sql->num_rows > 0){
                           $colorAsignado = 0;
                           $i=1;
                    while($v = mysqli_fetch_assoc($sql)){
                        $idUsuar=$v['idUsuario'];
                    }
          }
                    
          
           if ($sql->num_rows > 0) {
            if(consulta("INSERT INTO participanteproyecto SET idProyecto = '$idProyec', idUsuario = '$idUsuar', esAdmin = '0', fechaIngreso = CURDATE() , invitadoPor = '$responsable';")){          
                $data['idProyect'] = $idProyec;
                $data['success'] = true;
		$data['message'] = 'Success!';
            }
            else{
                 $errors['Titulo'] = 'El usuario ya pertenece al grupo.';
                $data['success'] = false;
		$data['errors']  = $errors;
            }

		
	}
             else{
                 $errors['Titulo'] = 'Escribio un usuario no existe.';
                $data['success'] = false;
		$data['errors']  = $errors;
            }
            }
	// return all our data to an AJAX call
	echo json_encode($data);