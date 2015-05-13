<?php
require_once("../Conexion/conexionPHP.php");
        session();
        $UsuarioSesion = $_SESSION['id'];
       $data[]= array();
          $sql33 = consulta("select FotoMuro,idcomentariomuro from comentariomuro where idUsuario='$UsuarioSesion' and idComentariolHijoMuro is null;");

                                            if ($sql33->num_rows > 0) {
                                                $i=1;
                                           while($v33 = mysqli_fetch_assoc($sql33)){
                    
                                    
                        $FotoMuro = $v33['FotoMuro'];
                        $idcomentariomuro = $v33['idcomentariomuro'];
                        
                        $data[$i] = array(
                           'FotoMuro'=> $FotoMuro,
                            'idcomentariomuro'=> $idcomentariomuro
                        );
                         
                        $i++;
                                           }
                                $data[0] = true;
                              }else{
                                  $data[0] = false;
                              } 
                              echo json_encode($data);