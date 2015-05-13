<?php
require_once("../Conexion/conexionPHP.php");
  session();
  
$idUsuario = $_SESSION['id'];


            $fileName = $_FILES['File2']['name'];
            $tmpName  = $_FILES['File2']['tmp_name'];
            $fileSize = $_FILES['File2']['size'];
            $fileType = $_FILES['File2']['type'];
            
	if (empty($fileName))
		$errors['file'] = 'Ingresa un 1.';

	if (empty($tmpName))
		$errors['file'] = 'Ingresa un 2..';
        
        if (empty($idUsuario))
		$errors['file'] = 'Ingresa un 5..';
        
        
	if ( ! empty($errors)) {

		// if there are items in our errors array, return those errors
		$data['success'] = 1;
		$data['errors']  = $errors;
	} else {
            $fileName2 = md5(microtime());
            $subcadena = "."; 
            $posicionsubcadena = strpos ($fileName, $subcadena); 
            $dominio = substr ($fileName, ($posicionsubcadena+1));
            
            move_uploaded_file ($tmpName, "ImagenesUsuarioProyecto/$fileName2.$dominio");
            
            
            
            $tmpName = "ImagenesUsuarioProyecto/$fileName2.$dominio";
            
            if(consulta("UPDATE usuario SET Foto='$tmpName' where idUsuario= '$idUsuario';")){
                $data['success'] = true;
		$data['message'] = 'Success!';
                
                 }else{
                $data['success'] = false;
		$data['errors']  = $errors;

                 }
     
 }
	// return all our data to an AJAX call
	echo json_encode($data);

