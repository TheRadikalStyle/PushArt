<?php
require_once("../Conexion/conexionPHP.php");
        session();
        $UsuarioSesion = $_SESSION['id'];
       $data[]= array();
          $sql = consulta("select * from usuario where idUsuario = '$UsuarioSesion'");

                                            if ($sql->num_rows > 0) {
                                                $v = mysqli_fetch_assoc($sql);
                           
                         if($v['sexo'] == 'H'){
                                    $sexo = 'Hombre';
                              } else{
                                    $sexo = 'Mujer';
                              }
                                    
                        $strStart = $v['fechaNacimiento'];
                        $strEnd = date("Y-m-d");

                        $dteStart = new DateTime($strStart);
                        $dteEnd = new DateTime();

                        $dteDiff = $dteEnd->diff($dteStart);
                        $nombre=$v['nombreUsuario']; 
                        $apellido=$v['apellidos'];
                        $foto= $v['Foto']; 
                        $correo=$v['correoElectronico'] ;
                         $contra=$v['contrasenia'] ;
                       
                        $data['sexo'] =$sexo;
                        $data['fechaNacimiento']= $strStart;
                        $data['nombre'] =$nombre;
                        $data['apellido']=$apellido; 
                        $data['foto'] =$foto;
                        $data['correo']= $correo;
                        $data['dteDiff']= $dteDiff;
                        
                        $data[1] = array(
                           'sexo'<= $sexo,
                            'fechaNacimiento'=>$strStart,
                            'dteDiff'=>$dteDiff,
                            'nombre'=>$nombre,
                            'apellido'=>$apellido,
                            'foto'=>$foto,
                            'correo'=>$correo,
                            'contra'=>$contra
                        );
                         
                        
 
                                $data['success'] = true;
                              }else{
                                  $data['success'] = false;
                              } 
                              echo json_encode($data);



