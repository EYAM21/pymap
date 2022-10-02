<?php 
	

	$xml = new SimpleXMLElement("output.xml", 0, true);
	
	function random_color_part() 
	{
    	return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
	}
	function random_color() 
	{
    	return random_color_part() . random_color_part() . random_color_part();
	}
	
	date_default_timezone_set('America/Santiago');
	$fecha_hora=date('d-m-Y - H:i:s')
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Informe Puertos Abiertos</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
<style type="text/css">
.fuente_titulos {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #666;
}
div {
    height: 350px;
}
.fuente_protocolo {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #036;
}
.fuente_estado_verde {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	font-weight: bold;
	color: #090;
}
.fuente_textos {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #666;
}
.titulo_informe {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 28px;
	font-weight: bold;
	text-transform: uppercase;
	color: #000;
	text-align: center;
}
#puerto
{
	width: 40px;
	height: 40px;
	-moz-border-radius: 50%;
	-webkit-border-radius: 50%;
	border-radius: 50%;
	display: flex;
    justify-content: center;
    align-items: center;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: #FFF;
}
body {

	background-color: black;
}
</style>
</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img style="margin-left: -190px;" src="imagenes/logo.png" width="170" /></td>
    <td><center><span style=" text-decoration: none; font-size: 30px; color: white; text-shadow: 0 0 0.1em #58D3F7, 0 0 0.1em #58D3F7" class="titulo_informe">Escaneo de puertos<br /><?php echo $fecha_hora;?></span></center></td>
  </tr>
</table>
<br /><br />
<div  id="accordion">
  <?php
	foreach($xml->host as $datos) 
	{
		?>
  <h3 style="background-color: #007399;"><?php echo "Dirección IP :<b>".$datos->address['addr']."</b> | Nombre del Equipo :<b>".$datos->hostnames->hostname['name']."</b>";?></h3>
    <div style="background-color: rgba(46,46,50,0.6); ">
    <?php
  		foreach($datos->ports->port as $pt) 
    	{
			?>
    <table  border="0" cellspacing="5" cellpadding="0">
      <tr>
	    <td width="40" height="40" rowspan="2" class="fuente_titulos"><div id="puerto" style="background-color:#<?php echo random_color();?>"><?php echo $pt['portid'];?></div></td>
        <td style="color: white;" class="fuente_titulos">Puerto : </td>
        <td style="color: #58D3F7;" class="fuente_protocolo"><?php echo $pt['portid'];?></td>
        <td style="color: white;" class="fuente_titulos">Protocolo :</td>
        <td style="color: #58D3F7;" class="fuente_protocolo"><?php echo strtoupper($pt['protocol']);?></td>
        <td style="color: white;" class="fuente_titulos">Estado :</td>
        <td style="color: #00b300;" class="fuente_estado_verde"><?php echo strtoupper($pt->state['state']);?></td>
      </tr>
      <tr>
      	<td style="color: white;" class="fuente_titulos">Servicio : </td>
        <td style="color: #58D3F7;" class="fuente_protocolo"><?php echo strtoupper($pt->service['name']);?></td>
        <td style="color: white;" class="fuente_titulos">Producto :</td>
        <td style="color: #58D3F7;" class="fuente_protocolo"><?php echo strtoupper($pt->service['product']);?></td>
        <td style="color: white;" class="fuente_titulos">Versión :</td>
        <td style="color: #58D3F7;" class="fuente_protocolo"><?php echo strtoupper($pt->service['version']);?></td>
      </tr>
    </table>
    <hr>
        <?php
		}
		?>
  </div>
  <?php 
	}
?>
</div>
</body>
</html>