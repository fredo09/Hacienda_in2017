<?php
include 'plantilla.php';
include 'conexion2.php';

//recibimos el id que se envia desde detalle cobro
$id=$_REQUEST['id'];

//consulta a la base de datos de los datos del cliente
$strConsulta = "SELECT  c.RFC, c.Direccion, c.Nombre FROM detalle_cobro d, cliente c where d.idCliente=c.idCliente and d.idCobro=$id";

$cliente = $conexion->query($strConsulta);

$fila = mysqli_fetch_array($cliente);

//consulta a la base de datos de los datos del Usuario y fecha de cobro
$Consulta = "SELECT u.usuario FROM detalle_cobro d, usuario u WHERE d.idUsuario= u.idUsuario AND d.idCobro=$id";

$usuario = $conexion->query($Consulta);

$filas = mysqli_fetch_array($usuario);

//FECHA DE CREACION DE reporte

$Consulta = "SELECT c.fecha,c.hora FROM detalle_cobro d, cobro c WHERE d.idCobro=c.idCobro AND d.idCobro=$id";

$fecha = $conexion->query($Consulta);

$fila_fecha = mysqli_fetch_array($fecha);

$pdf=new PDF('L','mm','Letter');
$pdf->Open();
$pdf->AddPage();
$pdf->SetMargins(40,30,0);
$pdf->Ln(10);
$pdf->Line(2,2,2,2);
$pdf->SetFont('Arial','',16);

$pdf->Cell(0,6,'Datos del Cliente  ',0,1);
$pdf->Cell(0,6,'ID del Comprobante: '. $id ,0,1);
$pdf->Cell(0,6,'RFC: '. $fila['RFC'],0,1);
$pdf->Cell(0,6,'Nombre: '. $fila['Nombre'],0,1);
$pdf->Cell(0,6,'Domicilio: '. $fila['Direccion'],0,1);
$pdf->Ln(10);
// dato de usuario
$pdf->Cell(0,6,'Usuario que lo atendio: '. $filas['usuario'],0,1);
$pdf->Cell(0,6,'Fecha de emision: '. $fila_fecha['fecha'],0,1);
$pdf->Cell(0,6,'Hora de emision: '. $fila_fecha['hora'],0,1);
$pdf->Ln(19);
$pdf->Cell(0,6,'Descripcion:  ',0,1);
$pdf->Ln(6);

$pdf->SetWidths(array(65, 60, 55, 50, 50));
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(85,107,47);
$pdf->SetTextColor(255);


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Pone el emcabezado de la tabla de cobro
for($i=0;$i<1;$i++){
    $pdf->Row(array('CANTIDAD','FOLIO', 'CONCEPTO', 'SUB_TOTAL'));
  }
  //consulta para el detaller_cobro
  $strConsulta2 = "SELECT d.cantidad ,doc.Folio, doc.Concepto, d.sub_monto FROM detalle_cobro d, documento doc WHERE d.idDocumento2=doc.idDocumento and d.idCobro=$id;";

	$cobro = $conexion->query($strConsulta2);
	$numfilas = mysqli_num_rows($cobro);

//For para recorrer los datos obtenidos del consulta
	for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysqli_fetch_array($cobro);
			$pdf->SetFont('Arial','',10);

			if($i%2 == 1){

        $pdf->SetFillColor(253,253,253);
    		$pdf->SetTextColor(0);
				$pdf->Row(array($fila['cantidad'],$fila['Folio'], $fila['Concepto'], $fila['sub_monto']));
			}
      else	{
				$pdf->SetFillColor(253,253,253);
    			$pdf->SetTextColor(0);
				$pdf->Row(array($fila['cantidad'],$fila['Folio'], $fila['Concepto'], $fila['sub_monto']));
			}
		}

    //recibimos el id que se envia desde detalle cobro
    $idtotal=$_REQUEST['idtotal'];

   //salto de linea
    $pdf->Ln(10);

  //  $strConsulta = "SELECT monto FROM cobro where idCobro=$id";

//    $cliente = $conexion->query($strConsulta);

  //  $fila = mysqli_fetch_array($cliente);

   //Apartado para mostrar el Total de la cobro
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,6,'Total:  $'. $idtotal,0,1);



//salida del pdf
$pdf->Output();

 ?>
