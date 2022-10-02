<?php 
	
	$xml = new SimpleXMLElement("output2.xml", 0, true);
	
	function random_color_part() 
	{
    	return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
	}
	function random_color() 
	{
    	return random_color_part() . random_color_part() . random_color_part();
	}
	
	date_default_timezone_set('America/Santiago');
	$fecha_hora=date('d-m-Y - H:i:s');
	
	function color($valor)
	{
		if(($valor>0) && ($valor<=1))
		   $color="#00c400";
		if(($valor>1) && ($valor<=2))
		   $color="#00e020";
		if(($valor>2) && ($valor<=3))
		   $color="##00f000";   
		if(($valor>3) && ($valor<=4))
			$color="#d1ff00";
		if(($valor>4) && ($valor<=5))
		   $color="#ffe000";
		if(($valor>5) && ($valor<=6))
		   $color="#ffcc00";
		if(($valor>6) && ($valor<=7))
		   $color="#ffbc10";
		if(($valor>7) && ($valor<=8))
		   $color="#ff9c20";
		if(($valor>8) && ($valor<=9))
		   $color="#ff8000";
		if(($valor>9) && ($valor<=10))
		   $color="#ff0000";
		return $color;
	}
	
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
    <td><center><span style=" text-decoration: none; font-size: 30px; color: white; text-shadow: 0 0 0.1em #58D3F7, 0 0 0.1em #58D3F7" class="titulo_informe">INFORME DE VULNERABILIDADES(CVE)<br /><?php echo $fecha_hora;?></span></center></td>
  </tr>
</table>
<br /><br />
<div id="accordion">
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
    <table border="0" cellspacing="5" cellpadding="0">
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
    <table border="0" cellspacing="5" cellpadding="0">
	  <tr class="fuente_titulos">
 		  <td style="color: white;">VCE</td>
 		  <td style="color: white;">CVSS Score</td>
		</tr>
        <?php
		foreach($pt->script as $sc) 
	    {
	    	if($sc['id']=='vulners')
	    	{
	    		$array = explode("	", $sc['output']);
	    		$arraycve=array_filter($array, "strlen");
 				$cantidad=sizeof($arraycve)/3;
 				$vce=1;$puntaje=3;$link=5;
 				for($i=0;$i<=$cantidad;$i++)
 				{?>
 					
 					  <tr class="fuente_textos">
 					    <td><a style="color: #58D3F7;" href="<?php echo $arraycve[$link];?>" target="_blank"><?php echo $arraycve[$vce];?></a></td>
 					    <td  align="center" bgcolor="<?php echo color($arraycve[$puntaje]);?>"><?php echo $arraycve[$puntaje];?></td>
				      </tr>
 				<?php
					$vce=$vce+5;$puntaje=$puntaje+5;$link=$link+5;
 				}
	    	}	
	    }
		?>
        </table>
        <hr />
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