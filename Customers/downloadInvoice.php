<?php   

    ob_start();
    include '../setting/setting.php';
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    /*============================================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA TRAER LOS DATOS DEL USUARIO DE DOS TABLAS
    ==============================================================================================*/
    $FacId = $_GET['id'];

    $x         = 0;
    $a         = "f";
    $b         = "u";
    $c         = "pf";
    $total     = 0;
    $field     = "UsuIdUsuario";
    $field1    = "FacEstado";
    $field2    = "FacId";
    $field3    = "ProId";
    $tabledb   = "tblFactura";
    $tabledb1  = "tblusuario";
    $tabledb2  = "tblproducto";
    $tabledb3  = "tblproductofactura";


    $db = new ConnectionDB();
    $connect = $db->connect();
    /*Instancio la clase CRUD*/
    //$sales = new CRUD();

    /*llamo al metodo ReadJoin2 para traer las ventas realizadas */  
   // $resultSales = $sales->ReadJoin2($tabledb, $tabledb1, $a, $b, $field, $field1, $FacEstado, $field2, 0, 100);  
   $consulta = "SELECT * FROM tblfactura f INNER JOIN tblusuario u ON f.UsuIdUsuario=u.UsuIdUsuario WHERE FacId=$FacId";
   $sql = mysqli_query($connect, $consulta);
   $search = mysqli_fetch_array($sql);
   $consulta2 = "SELECT * FROM tblproductofactura pf INNER JOIN tblproducto p ON pf.ProId=p.ProId WHERE FacId=$FacId";
   $sql2 = mysqli_query($connect, $consulta2);
   
?>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiavOnline</title>
    <?php include "../Link/LinksCss.php"; ?>
</head>
<div class="wrapper">
    <div id="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card animate__animated animate__fadeIn">
                    <div class="card-header">
                        <b>Fecha: </b>
                        <strong><?php echo $search['FacFecha'];?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="float-right"> <strong><b>Estado:</b></strong> Cancelada</span>

                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-6 col-md-4">
                                <h6 class="mb-2"><b>Tienda</b></h6>
                                <div>
                                    <strong>YESENIA S.A.</strong>
                                </div></br>
                                <div><b>Direccion</b>Barranquilla Atlantico</div>
                                <div><b>Email:</b> info@webz.com.pl</div>
                                <div><b>Telefono:</b> +57 314 666 3333</div>
                            </div>

                            <div class="col-6 col-md-4">
                                <h6 class="mb-2"><b>Cliente</b></h6>
                                <div>
                                    <strong><?php echo $search['UsuNombre'];?></strong>
                                </div></br>
                                <div><b>Direccion:</b><?php echo " ".$search['UsuDireccion'];?></div>
                                <div><b>Email:</b> <?php echo " ".$search['UsuCorreoElectronico'];?></div>
                                <div><b>Telefono:</b> <?php echo " ".$search['UsuTelefono'];?></div>
                            </div>
                            <div class="col-6 col-md-4">
                                <img class="mr-auto p-3 " width="300px" height= "100px" alt="..." src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/siavOnline/images/logoSiavOnline.jpeg">
                                </br>
                                <h5 class="text-center"><b>SiavOnline</b><h5>
                                <h6 class="mb-2 text-center"><b>Factura No</b> <?php echo " ".$search['FacId'];?></h6>
                                

                            </div>

                        </div>

                        <div class="table-responsive-sm">
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" width="2%" class="center">#</th>
                                        <th scope="col" width="20%">Producto/Servicio</th>
                                        <th scope="col" class="d-none d-sm-table-cell" width="23%">Descripción</th>
                                        <th scope="col" width="15%" class="text-right">Cantidad.</th>
                                        <th scope="col" width="20%" class="text-right">P. Unidad</th>
                                        <th scope="col" width="20%" class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while( $search2 = mysqli_fetch_array($sql2)){ 
                                    
                                    $amount = $search2['ProFacCantidad'];
                                    $price  = $search2['ProPrecio'];
                                    $total = $amount*$price;
                                    
                                ?>
                                    <tr>
                                        <td class="text-left"><?php echo $x+= 1;?></td>
                                        <td class="item_name"><?php echo $search2['ProNombre'];?></td>
                                        <td class="item_desc d-none d-sm-table-cell"><?php echo $search2['ProDescripcion'];?></td>
                                        <td class="text-right"><?php echo $amount;?></td>
                                        <td class="text-right"><?php echo moneda." " .number_format($price,0,'.',',');?></td>
                                        <td class="text-right"><?php echo moneda." " .number_format($total,0,'.',','); ?></td>
                                    </tr>
                                    <?php } ?>
                                
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-sm-5">
                            </div>

                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table table-sm table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left">
                                                <strong>Subtotal</strong>
                                            </td>
                                            <td class="text-right bg-light"><?php echo moneda." " .number_format($search['FacValorTotal']-2000,0,'.',',');?></td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Descuento</strong>
                                            </td>
                                            <td class="text-right bg-light">$ 0</td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Costo de Envio</strong>
                                            </td>
                                            <td class="text-right bg-light"><?php echo moneda." " .number_format(2000,0,'.',',');?></td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="text-right bg-light">
                                                <strong><?php echo moneda." " .number_format($search['FacValorTotal'],0,'.',',');?></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer container-fluid mt-3 bg-light">
    <div class="row">
        <div class="col footer-app">&copy; Todos los derechos reservados · <span class="brand-name"></span></div>
    </div>
</div>
<?php 
$html = ob_get_clean();

include '../setting/dompdf/autoload.inc.php';

use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'  => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('letter');

$dompdf->render();

$dompdf->stream("archivo_.pdf", array("Attachment" => true));
?>