<?php
require_once("../Conexion/conexionPHP.php");
    session();
  $data3[] = array();
   $data2[] = array();
  $idcomentario = $_POST['idcomentario'];
    $sql2 = consulta("select * from comentariomuro CM 
INNER JOIN usuario U
ON U.idUsuario = CM.idUsuario
WHERE CM.idComentariolHijoMuro is null  AND CM.idcomentarioMuro='$idcomentario'
order by fechaComentarioMuro DESC;");

    if ($sql2->num_rows > 0) {
$i=1;
        while ($v = mysqli_fetch_assoc($sql2)) {
        $Foto=$v['Foto'];
     $nombreUser  =$v['nombreUsuario'];
$Comentario=$v['comentario'] ;
$idhijo = $v['idcomentarioMuro'];
$fotomuro = $v['FotoMuro'];
$nombreimg = $v['nombre'];
 $sql22 = consulta("select * from comentariomuro CM
                                        INNER JOIN usuario U
                                      ON U.idUsuario = CM.idUsuario 
                                      where idComentariolHijoMuro = '$idhijo' order by fechaComentarioMuro;");
                       
                               if ($sql22->num_rows > 0) {
                                   $j=0;
                            while ($v22 = mysqli_fetch_assoc($sql22)) {
                                 $fotohijo= $v22['Foto'];
                                      $nombrehijo= $v22['nombreUsuario'];
                                       $comentariohijo= $v22['comentario'];
                                $idhijo2= $v22['idComentariolHijoMuro'];
                                $data2[$j] = array(
                            'Fotoh2'=>$fotohijo,
                            'nombreUserh2'=>$nombrehijo,
                            'Comentarioh2'=>$comentariohijo,
                            'idComHijoh2'=>$idhijo2
                        );
                                     
                                       $j++;
                                        }
                                        
                        }
                        $data3[$i] = array(
                            'Foto2'=>$Foto,
                            'nombreUser2'=>$nombreUser,
                            'idComHijo2'=>$idhijo,
                            'Comentario2'=>$Comentario,
                            'array2'=>$data2,
                            'FotoMuro'=>$fotomuro,
                            'nombreimg'=>$nombreimg
                        );
                        ///
                        $i++;
            }
            $sql2552 = consulta("select Likes,Dislikes from likes where idcomentarioMuro='$idcomentario';");
             if ($sql2552->num_rows > 0) {
                 $likesR=0;
                 $DislikesR=0;
                            while ($v2552 = mysqli_fetch_assoc($sql2552)) {
                                 $likes  =$v2552['Likes'];
                                 $dislikes=$v2552['Dislikes'];
                                 $likesR=$likesR+$likes;
                                 $DislikesR=$DislikesR+$dislikes;
                            }
             }
            
              $i=$i+1;
              $data3[2] = array(
                            'likes'=>$likesR,
                            'Dislikes'=>$DislikesR
                        );
                            $data3[0] = true;
        }else{
            $data3[0] = false;
            } echo json_encode($data3);
