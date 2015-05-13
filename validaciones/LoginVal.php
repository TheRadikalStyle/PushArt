<?php
require_once("../Conexion/conexionPHP.php");

$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data

// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array

$usuario = $_POST['correo'];
$password = $_POST['password'];

	if (empty($password))
		$errors['password'] = 'Ingresa tu contraseña.';

	if (empty($usuario))
		$errors['correo'] = 'Ingresa tu correo.';

        
        
	// if there are any errors in our errors array, return a success boolean of false
	if ( ! empty($errors)) {

		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
            //$sql = consulta("SELECT idUsuario, nombreUsuario FROM usuario WHERE correoElectronico = '$usuario' AND  contrasenia='$password';");
            $sql = consulta("Call sp_LOGIN('$usuario','$password');");
            
            if($sql->num_rows > 0){
                $v = mysqli_fetch_assoc($sql);
                session_start();
                $_SESSION['id'] = $v['idUsuario'];
                $_SESSION['nombre'] = $v['nombreUsuario'];
                $_SESSION['apellido'] = $v['apellidos'];
                 $_SESSION['correo'] = $v['correoElectronico'];
                 $_SESSION['contrasenia'] = $v['contrasenia'];
                 $_SESSION['foto'] = $v['Foto'];
                 $_SESSION['bio'] = $v['bio'];
                 $_SESSION['telefono'] = $v['telefono'];
                 $_SESSION['exp'] = $v['experiencia'];
                 
                $data['success'] = true;
		$data['message'] = 'Success!';
                
            }
            else{
                $errors['UsuarioFail']= "1";
                $data['success'] = false;
		$data['errors']  = $errors;
            }
            
		
	}

	// return all our data to an AJAX call
	echo json_encode($data);
