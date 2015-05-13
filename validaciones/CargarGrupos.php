<?php
require_once("../Conexion/conexionPHP.php");
session();
$data[] = array();
$data2[] = array();
                    $idusuario = $_SESSION['id'];
$sql = consulta("select P.idProyecto,
P.nombreProyecto,
P.descripcionProyecto,
P.fechaCreacion,
P.fechaInicio,
P.fechaEstimadaFin,
P.idImagen
from  proyecto P
INNER JOIN participanteproyecto PP
ON P.idProyecto = PP.idProyecto
WHERE idUsuario = '$idusuario'; ");
                    if($sql->num_rows > 0){
                           $colorAsignado = 0;
                           $i=1;
                    while($v = mysqli_fetch_assoc($sql)){
                           $idproyecto=$v['idProyecto'];
                        
                           $nombre= $v['nombreProyecto'];
                          $Img=$v['idImagen']; 
                    //Definimos el color de las tablas
                    switch ($colorAsignado){
                        case 0:
                          
                            $tipe = 'emerald-box';
                            $Subtipe = 'emerald-bg';
                            $colorAsignado += 1;
                        break;
                        case 1:
                            $tipe = 'red-box';
                            $Subtipe = 'red-bg';
                             $colorAsignado += 1;
                         break;
                        case 2:
                            $tipe = 'gray-box';
                            $Subtipe = 'gray-bg';
                             $colorAsignado += 1;
                            break;
                        case 3:
                            $tipe = 'purple-box';
                            $Subtipe = 'purple-bg';
                             $colorAsignado += 1;
                            break;
                        case 4:
                            $tipe = 'yellow-box';                            
                            $Subtipe = 'yellow-bg';
                             $colorAsignado = 0;
                    break;
                    }
                     $sql2 = consulta("select nombreUsuario, apellidos, Foto
from participanteproyecto P
INNER JOIN usuario Us
ON  P.idUsuario = Us.idUsuario
where idProyecto = $idproyecto;");
                    if($sql2->num_rows > 0){
                           $j=0;
                    while($vP = mysqli_fetch_assoc($sql2)){
                            $name=$vP['nombreUsuario'];
                            $lastName=$vP['apellidos'];
                            $Foto =$vP['Foto'];
                          $data2[$j] = array(
                            'nombre2'=>$name,
                            'apellido2'=>$lastName,
                            'fotoh'=>$Foto,
                             'idProyecto'=>$idproyecto
                        );
                                      $j++;
                    }
                    }
                      $data[$i] = array(
                            'tipe'=>$tipe,
                            'subtipe'=>$Subtipe,
                            'nombre'=>$nombre,
                            'Img'=>$Img,
                            'idProyec'=>$idproyecto,
                            'array'=>$data2
                        );
                        ///
                        $i++;      
                    }
                    $data[0] = true;
        }else{
            $data[0] = false;
            } echo json_encode($data);