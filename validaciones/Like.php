<?php
require_once("../Conexion/conexionPHP.php");
    session();
  $data3[] = array();
   $data2[] = array();
  $idLike = $_POST['idLike'];
  
$idUsuar= $_SESSION['id'];

    $sql255 = consulta("select * from likes where idcomentarioMuro='$idLike' and idUsuario='$idUsuar';");

    if ($sql255->num_rows > 0) {
        while ($v55 = mysqli_fetch_assoc($sql255)) {
        $like=$v55['Likes'];
        $idsave=$v55['idLikes'];
                    
            }
                            
       
        if($like==0){
            $like=1;
        }else{
             $like=0;
        }
        
        if(consulta("UPDATE likes SET Likes='$like' where idcomentarioMuro= '$idLike' and idUsuario='$idUsuar' and idLikes='$idsave';")){   
               $data3[0] = true;
                     $data3[1] = array(
                            'like'=>$like
                        );
            }
            else{
                
               $data3[0] = false;
            }
 }else{
       if(consulta("INSERT INTO likes SET idcomentarioMuro = '$idLike', Likes= '1', idUsuario = '$idUsuar';")){   
               $data3[0] = true;
                     $data3[1] = array(
                            'like'=>$like
                        );
            }
            else{
                
               $data3[0] = false;
            }
 }  echo json_encode($data3);
