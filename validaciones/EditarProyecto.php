<?php
require_once("../Conexion/conexionPHP.php");
session();

$errors         = array();  
$data 		= array(); 

$NombreProyecto= $_POST['NombreProyecto'];
$Descripcion = $_POST['DescProyecto'];
$idProyecto = $_POST['IdProyecto'];

            $fileName = $_FILES['File']['name'];
            $tmpName  = $_FILES['File']['tmp_name'];
            $fileSize = $_FILES['File']['size'];
            $fileType = $_FILES['File']['type'];
IF($NombreProyecto== null){
   $errors['Comentario'] = 'Asigna un nombre al proyecto.';
}
IF($Descripcion== null){
    $errors['Comentario'] = 'Asigna uns descripcion al proyecto.';
}
IF($idProyecto== null){
   $errors['Comentario'] = 'Error en conexion';
}
	if (empty($NombreProyecto))
		$errors['Comentario'] = 'Asigna un nombre al proyecto.';
                   
                   
	if ( ! empty($errors) ) {

		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
if(empty($fileName)){
     $fileName2 = md5(microtime());
            $subcadena = "."; 
            $posicionsubcadena = strpos ($fileName, $subcadena); 
            $dominio = substr ($fileName, ($posicionsubcadena+1));
            
            move_uploaded_file ($tmpName, "ImagenesUsuarioProyecto/$fileName2.$dominio");
            
            
            
            $tmpName = "ImagenesUsuarioProyecto/$fileName2.$dominio";
            if(consulta("UPDATE proyecto SET nombreProyecto = '$NombreProyecto',descripcionProyecto='$Descripcion',idImagen='$tmpName' WHERE idProyecto = '$idProyecto';")){   
                  header("Location: ../Home.html");
                $data['success'] = true;
                 $data['PROYEID']=$idProyecto;
		$data['message'] = 'Success!';
            }
            else{
                
                $data['success'] = false;
		$data['errors']  = $errors;
            }

		
	}else{
              if(!get_magic_quotes_gpc()) {
                $fileName = addslashes($fileName);
            }
            $fileName2 = md5(microtime());
            $subcadena = "."; 
            $posicionsubcadena = strpos ($fileName, $subcadena); 
            $dominio = substr ($fileName, ($posicionsubcadena+1));
            
            move_uploaded_file ($tmpName, "ImagenesUsuarioProyecto/$fileName2.$dominio");
            
            
            
            $tmpName = "ImagenesUsuarioProyecto/$fileName2.$dominio";
            
               if(consulta("UPDATE proyecto SET nombreProyecto = '$NombreProyecto',descripcionProyecto='$Descripcion',idImagen='$tmpName' WHERE idProyecto = '$idProyecto';")){   
                header("Location: ../Home.html");
                   $data['success'] = true;
                   $data['PROYEID'] = $idProyecto;
		$data['message'] = 'Success!';
            }
            else{
                
                $data['success'] = false;
		$data['errors']  = $errors;
            }
        }
        
        }
	// return all our data to an AJAX call
	echo json_encode($data);
