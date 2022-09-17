<div class="container">
    <form action="../Users/CreateUsersAdmin.php" method='post' id="formCreate">
        <div class="form-group row">
            <div class="col-md-4">
                <input type="hidden" name="idUsuario">
                <label><b>Cedula</b></label><input type="text" class="form-control" name="cedula" >
            </div>
            <div class="col-md-4">
                <label><b>Nombres y Apellidos</b></label>
                <input type="text" class="form-control" name="name" >
            </div>
            <div class="col-md-4">
                <label><b>Email</b></label>
                <input type="email" class="form-control" name="email">
            </div>
        </div><br>
        <div class="form-group row">
            <div class="col-md-4">
                <label><b>Celular</b></label>
                <input type="number" class="form-control" name="phone">
            </div>
            <div class="col-md-4">
                <label><b>Direccion</b></label>
                <input type="text" class="form-control" name="addres" >
            </div>
            <div class="col-md-4">
                <label><b>Rol</b></label>
                <select name="role" class="form-control">
                    <option value="3">cliente</option>
                </select>
            </div>
        </div><br>
        <div class="form-group row">
            <div class="col-md-4">
                <label><b>Contraseña</b></label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="col-md-4">
                <label><b>Confirmar Contrasena</b></label>
                <input type="password" class="form-control" name="repeatPassword" placeholder="confirmar contrasena">
            </div> 
        </div><br>
        <button type="submit" value="Enviar" class="btn btn-primary m-2"><b>Guardar</b></button>
    </form>
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