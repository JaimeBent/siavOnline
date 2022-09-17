<?php
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    /*=============================================================================
    =DECLARAR VARIABLES Y ASIGNARLES LOS DATOS TRAIDOS DEL FORMULARIO POR EL POST
    ===============================================================================*/

    $name     = $_POST["name"];
    $role     = $_POST["role"];
    $email    = $_POST["email"];
    $phone    = $_POST["phone"];
    $addres   = $_POST["addres"];
    $cedula   = $_POST["cedula"];
    $password = $_POST["password"];

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

    if($password==$repeatPassword){
   
        $data   = "'$name' , '$email', '$addres', $phone, $role, $cedula, $password";
        $fields = "$field2, $field3, $field4, $field5, $field6, $field7, $field8";
        
        $usu       = new CRUD();
        $classCRUD = $usu->Create($tabledb, $fields, $data);
        
        if ($classCRUD){
            
            if($role==3){

                header ('location:../Sales/NewSales.php');
                
            }else{


                header ('location:../Users/ReadUsers.php');
            }
        
        } else {
            echo 'error de registro';
        }

    }else{

        header ('location:../Users/FormCreateUserAdmin.php?mensaje="contraseñas no coinciden"');
    }

   

?>