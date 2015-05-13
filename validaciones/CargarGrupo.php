<?php
require_once("../Conexion/conexionPHP.php");
    session();
    $idUs = $_SESSION['id'];
    $idProyecto = $_POST['idgrupo'];
    $nombreuser = $_SESSION['nombre'];
    $data[] = array();

    if (!empty($idProyecto)) {
        $sql = consulta("select * from proyecto where idProyecto = '$idProyecto';");

        if ($sql->num_rows > 0) {
            $v = mysqli_fetch_assoc($sql);
        $nombreProyect = $v['nombreProyecto'];
        $descProyect = $v['descripcionProyecto'];
        $ImgProyect = $v['idImagen'];
         $data[1] = array(
                            'nombreproye'=>$nombreProyect,
                            'descproye'=>$descProyect,
                            'imgproye'=>$ImgProyect,
                            'idproye'=>$idProyecto
                        );
         
        }
         $data[0] = true;
    }else{
            $data[0] = false;
            } echo json_encode($data);
