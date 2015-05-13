<?php

require_once("../Conexion/conexionPHP.php");
session();

$errors = array();   // array to hold validation errors
$data= array();   // array to pass back data

$Coment = $_POST['Comentario'];
$idNot = $_POST['idNot'];

$idUsuario = $_SESSION['id'];
$nombre= $_SESSION['nombre'];
$foto = $_SESSION['foto'];


if (empty($Coment)){
    $errors['Comentario'] = 'Ingresa un comentario.';
    $errors['Notas'] = $idNot;
}
// return a response ===========================================================
// if there are any errors in our errors array, return a success boolean of false
if (!empty($errors)) {

    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    //$sql = consulta("SELECT idUsuario, nombreUsuario FROM usuario WHERE correoElectronico = '$usuario' AND  contrasenia='$password';");

    if (empty($idNot)) {
        if (consulta("call sp_InsertComentarioMuro('$idUsuario',null,'$Coment');")) {
            $data['success'] = true;
            $data['message'] = 'Success!';
        } else {

            $data['success'] = false;
            $data['errors'] = $errors;
        }
    } else {
        if (consulta("call sp_InsertComentarioMuro('$idUsuario','$idNot','$Coment');")) {
            $data['success'] = true;
            $data['message'] = 'Success!';
        } else {
            $data['success'] = false;
            $data['errors'] = $errors;
        }
            $data[1] = array(
                            'Foto3'=>$foto,
                            'nombreUser3'=>$nombre,
                            'idComHijo3'=>$idNot,
                            'Comentario3'=>$Coment
                        );
    }
    // if there are no errors process our form, then return a message
    // DO ALL YOUR FORM PROCESSING HERE
    // THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)
    // show a message of success and provide a true success variable
}

// return all our data to an AJAX call
echo json_encode($data);
