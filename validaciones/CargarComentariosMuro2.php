<?php
require_once("../Conexion/conexionPHP.php");
    session();
  $data[] = array();
  $data2[] = array();
  $idMuro = $_POST['idMuro'];
    $sql2 = consulta("select * from comentariomuro CM 
INNER JOIN usuario U
ON U.idUsuario = CM.idUsuario
WHERE CM.idComentariolHijoMuro is null AND Categoria= '$idMuro' 
order by fechaComentarioMuro DESC;");

    if ($sql2->num_rows > 0) {
$i=1;
        while ($v = mysqli_fetch_assoc($sql2)) {
         $Foto=$v['Foto'];
     $nombreUser  =$v['nombreUsuario'];
$Comentario=$v['comentario'] ;
$idhijo = $v['idcomentarioMuro'];
$FotoMuro = $v['FotoMuro'];
$Categoria = $v['Categoria'];



            /////
               ///
                        $sql22 = consulta("select * from comentariomuro CM
                                        INNER JOIN usuario U
                                      ON U.idUsuario = CM.idUsuario 
                                      where idComentariolHijoMuro = '$idhijo' order by fechaComentarioMuro limit 2;");
                       
                               if ($sql22->num_rows > 0) {
                                   $j=0;
                            while ($v22 = mysqli_fetch_assoc($sql22)) {
                                 $fotohijo= $v22['Foto'];
                                      $nombrehijo= $v22['nombreUsuario'];
                                       $comentariohijo= $v22['comentario'];
                                $idhijo2= $v22['idComentariolHijoMuro'];
                                $data2[$j] = array(
                            'Fotoh'=>$fotohijo,
                            'nombreUserh'=>$nombrehijo,
                            'Comentarioh'=>$comentariohijo,
                            'idComHijoh'=>$idhijo2
                        );
                                     
                                       $j++;
                                        }
                                        
                        }
                        $data[$i] = array(
                            'Foto'=>$Foto,
                            'nombreUser'=>$nombreUser,
                            'idComHijo'=>$idhijo,
                            'Comentario'=>$Comentario,
                            'array'=>$data2,
                            'FotoMuro'=>$FotoMuro,
                            'Categoria'=>$Categoria
                        );
                        ///
                        $i++;
                            }
                            $data[0] = true;
        }else{
            $data[0] = false;
            } echo json_encode($data);


