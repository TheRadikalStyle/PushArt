<?php
require_once("../Conexion/conexionPHP.php");
  session();
  
$idProyecto = $_POST['idProyect'];
$idUsuario = $_SESSION['id'];
$Comentario = $_POST['Comentario'];


            $fileName = $_FILES['File2']['name'];
            $tmpName  = $_FILES['File2']['tmp_name'];
            $fileSize = $_FILES['File2']['size'];
            $fileType = $_FILES['File2']['type'];
            
        if(empty($Comentario))
            $errors['file'] = 'Ingresa un 6.';
            
	if (empty($fileName))
		$errors['file'] = 'Ingresa un 1.';

	if (empty($tmpName))
		$errors['file'] = 'Ingresa un 2..';
        	
        if (empty($idProyecto))
		$errors['file'] = 'Ingresa un 3..';
                	        
        if (empty($idUsuario))
		$errors['file'] = 'Ingresa un 5..';
        
        
	if ( ! empty($errors)) {

		// if there are items in our errors array, return those errors
		$data['success'] = 1;
		$data['errors']  = $errors;
                $data["carpeta"]=$carpetaSelect;
	} else {
           $fileName2 = md5(microtime());
            $subcadena = "."; 
            $posicionsubcadena = strpos ($fileName, $subcadena); 
            $dominio = substr ($fileName, ($posicionsubcadena+1));
            
            move_uploaded_file ($tmpName, "ImagenesUsuarioProyecto/$fileName2.$dominio");
            
            
            
            $tmpName = "ImagenesUsuarioProyecto/$fileName2.$dominio";
            
            if(consulta("insert into comentariomuro set idUsuario = '$idUsuario', comentario = '$Comentario', FotoMuro='$tmpName',Categoria='$idProyecto', nombre='$fileName';")){
                $data['success'] = true;
		$data['message'] = 'Success!';
                
                 }else{
                $data['success'] = false;
		$data['errors']  = $errors;

                 }
                
	}
	// return all our data to an AJAX call
	echo json_encode($data);

