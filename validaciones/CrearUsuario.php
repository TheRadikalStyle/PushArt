<?php
require_once("../Conexion/conexionPHP.php");

$errors         = array();  	// array to hold validation errors
$data 		= array(); 		// array to pass back data

// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array
$NombreCrea = $_POST['NombreCrea'];
$ApellidoCrea = $_POST['ApellidoCrea'];
$CorreoCrea= $_POST['CorreoCrea'];
//$Codigo= $_POST['Codigo'];
$ContrasenaCrea = $_POST['ContrasenaCrea'];
$Sexo = $_POST['Sexo'];
$FechaCrea = $_POST['FechaCrea'];
//$Accepto = $_POST['AcceptoUS'];
//
//if ($Accepto=="false") {
//    $errors['Titulo'] = 'Aceptar los terminos y condiciones';
//}else{
//    
//}

if(empty($Sexo)){
      $errors['Titulo'] = 'Selecciona un sexo.';
  }
  
	if (empty($NombreCrea))
		$errors['Titulo'] = 'Escribe un Nombre.';
        
        if (empty($ApellidoCrea))
		$errors['Titulo'] = 'Escribe un Apellido.';

        if (empty($CorreoCrea))
		$errors['Titulo'] = 'Escribe un Correo.';

            if (empty($ContrasenaCrea))
		$errors['Titulo'] = 'Escribe una Contraseña.';
            
                //if (empty($HombreEditar) || empty($MujerEditar) )
		//$errors['Titulo'] = 'Selecciona uno de los 2 campos.';
        
                   if (empty($FechaCrea))
		$errors['Titulo'] = 'Selecciona una fecha.';
                   
   $sql2 = consulta("select CorreoElectronico from usuario;");

                        if ($sql2->num_rows > 0) {
                            while ($v = mysqli_fetch_assoc($sql2)) {
                             if($v['CorreoElectronico']==$CorreoCrea){
                               $errors['Correo3'] = 'Correo en uso.';  
                             }   
                            }
                            }
                   
	if ( ! empty($errors) ) {

		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
            if(consulta("INSERT INTO usuario SET nombreUsuario = '$NombreCrea', apellidos= '$ApellidoCrea', correoElectronico = '$CorreoCrea', contrasenia = '$ContrasenaCrea',fechaNacimiento ='$FechaCrea' ,sexo='$Sexo', usuarioDesde = now();")){   
//                if(consulta("delete from solicitud where codigoRegistro='$Codigo';")){   
//                $data['success'] = true;
//		$data['message'] = 'Success!';
//                    
//                }else{
//                    $data['success'] = false;
//		$data['message'] = 'Success!';
//                }
               
		$data['success'] = true;
            }
            else{
                $errors['Titulo'] = 'Error Insert.';
                $data['success'] = false;
		$data['errors']  = $errors;
            }

		
	}

	// return all our data to an AJAX call
	echo json_encode($data);



