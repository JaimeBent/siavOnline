<?php 

    include '../template/headStart.php';
    include '../setting/Connection.php';    
    include '../CRUD/CRUD.php';

    /*=============================================================================
    =DECLARAR VARIABLES Y ASIGNARLES LOS DATOS TRAIDOS DEL FORMULARIO POR EL POST
    ===============================================================================*/
    if(!empty($_POST)){
        
        $name           = $_POST["name"];
        $role           = 3;
        $email          = $_POST["email"];
        $phone          = $_POST["phone"];
        $addres         = $_POST["addres"];
        $cedula         = $_POST["cedula"];
        $password       = $_POST["password"];
        $repeatPassword = $_POST["repeatPassword"];
    
        if($password==$repeatPassword){
    
            /*==================================================================================
            =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA INSERTAR LOS DATOS DEL USUARIO
            ====================================================================================*/
    
            $field1  = "UsuIdUsuario";
            $field2  = "UsuNombre";
            $field3  = "UsuCorreoElectronico";
            $field4  = "UsuDireccion";
            $field5  = "UsuTelefono";
            $field6  = "RolId";
            $field7  = "UsuCedula";
            $field8  = "UsuClave";
            $tabledb = "tblusuario";
        
            $data   = "'$name' , '$email', '$addres', $phone, $role, $cedula, $password";
            $fields = "$field2, $field3, $field4, $field5, $field6, $field7, $field8";
            
            $usu = new CRUD();
            $classCRUD = $usu->Create($tabledb, $fields, $data);
    
            if ($classCRUD){ ?>

                <script>
                
                swal("Listo!", "Usuario Guardado con Exito!", "success")
                .then((value) => {
                    window.location.replace('../Index/login.php');
                }) 
                </script><?php
            
            } else {
                echo 'error de registro';
            }
    
        }else{  ?> <!-- cierro el php para iniciar formulario html -->
    
            <!-- ========================
            =INICIA FORMULARIO DE CREATE
            =========================== -->
            
            <div class="container">
                <div class="card d-flex justify-content-around flex-wrap ">
                    <div class="card-header">
                        <h3>Registrate<h3>
                    </div>
                    <form action="FormCreateUsers.php" method='post' id="formCreate" class="">
                        <div class="d-flex w-auto p-3">
                            <div class="d-inline w-50 p-3">
                                <label>Cedula</label>
                                <input type="text" class="form-control" name="cedula" value="<?php echo $cedula;  ?>">
                            </div>
                            <div class="d-inline w-50 p-3">
                                <label>Nombres y Apellidos</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $name;  ?>">
                            </div>
                            <div class="d-inline w-50 p-3">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $email;  ?>">
                            </div>
                        </div>
                        <div class="d-flex w-auto p-3">
                            <div class="d-inline w-50 p-3">
                                <label>Celular</label>
                                <input type="number" class="form-control" name="phone" value="<?php echo $phone;  ?>">
                            </div>
                            <div class="d-inline w-50 p-3">
                                <label>Direccion</label>
                                <input type="text" class="form-control" name="addres" value="<?php echo $addres;  ?>">
                            </div>
                            <div class="d-inline w-50 p-3">
                                <label>Contraseña</label>
                                <input type="password" class="form-control border border-danger" name="password" placeholder="Escribe tu contraseña">
                            </div>
                        </div>
                        <div class="d-flex w-auto p-3">
                            <div class="d-inline w-50 p-3 text-danger">
                                <label><?php $mensaje = "las contraseñas no coinciden"; echo $mensaje; ?></label>
                                <input type="password" class="form-control border border-danger" name="repeatPassword" placeholder="confirmar contraseña">
                            </div>
                            <div class="d-inline w-50 p-3"></div>
                            <div class="d-inline w-50 p-3"></div>
                        </div>
                        <div class="form-check d-flex w-auto p-3">
                            <input type="checkbox" class="form-check-input d-inline m-2" id="exampleCheck1">
                            <label class="form-check-label d-inline w-100" for="exampleCheck1">he leido y acepto Terminos y condiciones</label>
                            <br/><br/>
                        </div>
                        <button type="submit" value="Enviar" name="btn1" class="btn btn-primary m-2">Guardar</button>    
                    </form>
                </div>
            </div> 
            <?php //inicia codigo php para continuar con la validacion
    
        }

    }else{  ?> <!-- termino codigo php para mostrar formulario inicial -->

        <!-- ========================
        =INICIA FORMULARIO DE CREATE
        =========================== -->
        
        <div class="container">
            <div class="card d-flex justify-content-around flex-wrap ">
                <div class="card-header">
                    <h3>Registrate<h3>
                </div>
                <form action="FormCreateUsers.php" method='post' id="formCreate" class="">
                    <div class="d-flex w-auto p-3">
                        <div class="d-inline w-50 p-3">
                            <label>Cedula</label>
                            <input type="text" class="form-control" name="cedula" placeholder="Escribe tu numero de documento">
                        </div>
                        <div class="d-inline w-50 p-3">
                            <label>Nombres y Apellidos</label>
                            <input type="text" class="form-control" name="name" placeholder="Escribe tu nombre completo">
                        </div>
                        <div class="d-inline w-50 p-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Escribe tu Email">
                        </div>
                    </div>
                    <div class="d-flex w-auto p-3">
                        <div class="d-inline w-50 p-3">
                            <label>Celular</label>
                            <input type="number" class="form-control" name="phone" placeholder="Escribe tu numero de telefono">
                        </div>
                        <div class="d-inline w-50 p-3">
                            <label>Direccion</label>
                            <input type="text" class="form-control" name="addres" placeholder="Escribe tu Direccion">
                        </div>
                        <div class="d-inline w-50 p-3">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="Escribe tu contraseña">
                        </div>
                    </div>
                    <div class="d-flex w-auto p-3">
                        <div class="d-inline w-50 p-3"> 
                            <label>Confirmar Contraseña</label>
                            <input type="password" class="form-control" name="repeatPassword" placeholder="confirmar contraseña">
                        </div>
                        <div class="d-inline w-50 p-3"></div>
                        <div class="d-inline w-50 p-3"></div>
                    </div>
                    <div class="form-check d-flex w-auto p-3">
                        <input type="checkbox" class="form-check-input d-inline m-2" id="exampleCheck1">
                        <label class="form-check-label d-inline w-100" for="exampleCheck1">he leido y acepto Terminos y condiciones</label>
                        <br/><br/>
                    </div>
                    <button type="submit" value="Enviar" name="btn1" class="btn btn-primary m-2">Guardar</button>    
                </form>
            </div>
        </div>  
        <?php 

    }//termina condicional 

?>

<?php include '../template/footer.php'; ?>

