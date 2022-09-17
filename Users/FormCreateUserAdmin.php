<?php 

    include '../template/headAdmin.php';
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

?>

<!-- ========================
=INICIA FORMULARIO DE CREATE
=========================== -->

<div class="container">
    <div class="card d-flex justify-content-around flex-wrap">
        <div class="card-header">
            <h3>Registrar Usuarios<h3>
        </div>
        <form action="CreateUsersAdmin.php" method='post' id="formCreate">
            <div class="d-flex w-auto p-3">
                <div class="d-inline w-100 p-3">
                    <label>Cedula</label>
                    <input type="text" class="form-control" name="cedula" placeholder="Escribe su documento">
                </div>
                <div class="d-inline w-100 p-3">
                    <label>Nombres y Apellidos</label>
                    <input type="text" class="form-control" name="name" placeholder="Escribe su nombre completo">
                </div>
                <div class="d-inline w-100 p-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Escribe su Email">
                </div>
                <div class="d-inline w-100 p-3">
                    <label>Celular</label>
                    <input type="number" class="form-control" name="phone" placeholder="Escribe su telefono">
                </div>
            </div>
            <div class="d-flex w-auto p-3">
                <div class="d-inline w-100 p-3">
                    <label>Direccion</label>
                    <input type="text" class="form-control" name="addres" placeholder="Escribe su Direccion">
                </div>
                <div class="d-inline w-100 p-3">
                    <label>Rol</label>
                    <select name="role" class="form-control">
                        <option value="0">Seleccione</option>
                        <?php       
                          
                            $field   = "RolId";
                            $tabledb = "tblrol";

                            $role      = new CRUD();
                            $resultRole = $role->Read($tabledb, $field);
                            
                            while( $search = mysqli_fetch_array($resultRole) ){

                                echo '<option value="'.$search['RolId'].'">'.$search['RolDescripcion'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="d-inline w-100 p-3">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Escribe su contraseña">
                </div>
                <div class="d-inline w-100 p-3
                <?php if(!empty($_GET)){ echo "text-danger"; ?> ">
                <?php
                            $mensaje =$_GET['mensaje'];
                            echo $mensaje;
                        }
                                    
                ?>
                    <label>Confirmar Contraseña</label>
                    <input type="password" class="form-control" name="repeatPassword" placeholder="confirmar contraseña">
                </div>
            </div>
            <div class="form-check d-flex w-auto p-3">
                <input type="checkbox" class="form-check-input d-inline m-2" id="exampleCheck1">
                <label class="form-check-label d-inline w-100" for="exampleCheck1">he leido y acepto Terminos y condiciones</label>
                <br/><br/>
            </div>
            <button type="submit" value="Enviar" class="btn btn-primary m-2">Guardar</button>
        </form>
    </div>
</div>    

<!-- =================================================
=FINALIZA FORMULARIO Y INICIA SCRIPT PARA LAS ALERTAS
==================================================== --> 

<script>
    $('#formCreate').submit(function(e){
        e.preventDefault();
   
        swal("Listo!", "Usuario Guardado con Exito!", "success")
        .then((value) => {
            this.submit();
        }) 
    });
</script> 
<?php include '../template/footer.php'; ?>

