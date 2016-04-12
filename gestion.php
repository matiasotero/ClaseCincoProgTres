<?php

/*	1- si es un ingreso lo guardo en ticket.txt
 	2- si es salida leo el archivo:
 	leer del archivo todos los datos, guardarlos en un array
	si la patente existe en el archivo .
	 sobreescribo el archivo con todas las patentes
	 y su horario si la patente solicitada
	... calculo el costo de estacionamiento a 
	20$ el segundo y lo muestro.
	si la patente no existe mostrar mensaje y 
	el boton que me redirija al index  
	3- guardar todo lo facturado en facturado.txt*/

//var_dump($_POST["estacionar"]);
//var_dump($_FILES["fotoAutito"]["name"]);
echo "<br>";
//$archivoDestino="Fotitos/".$_FILES["fotoAutito"]["name"];
$extAnterior=explode(".", $_FILES["fotoAutito"]["name"]);
//var_dump($extAnterior[1]);
$archivoDestino="Fotitos/".$_POST["patente"].".".$extAnterior[1];
echo "<br>";
//var_dump($archivoDestino);
move_uploaded_file($_FILES["fotoAutito"]["tmp_name"], $archivoDestino);//tmp_name te devuelve el lugar donde se guarda en el directorio de archivo temporales del servidor
//die();
$accion = $_POST["estacionar"];
$patente = $_POST["patente"];
$ahora=date("y-m-d h:i:s");
$listaDeAutos=array();
$listaAuxiliar=array();
if ($accion == "ingreso") 
{	
	echo "Se guardo la patente ".$patente;
	$archivo=fopen("ticket.txt", "a");
	fwrite($archivo, $patente."[".$ahora."["."\n");//el corchete es separador//si el escape "\n" no funciona, probar PHP_EOL
	//echo "<br>";
	//echo var_dump($archivoDestino[1]);
	//echo "<br>";
	fclose($archivo);
}
else
{
	$archivo=fopen("ticket.txt", "r");
	while (!feof($archivo))//La función feof devuelve true si es el final de la fila del archivo
	{
		$renglon=fgets($archivo);
		$auto=explode("[", $renglon);
		if($auto[0] != "")//esto sirve para que no se guarde un elemento vacio
			$listaDeAutos[]=$auto;
	}
	//var_dump($listaDeAutos);
	fclose($archivo);
	$esta=false;
	foreach ($listaDeAutos as $auto) 
	{
		if($auto[0]==$patente)
		{
			$esta=true;
			$fechaInicio=$auto[1];
			$fechaDiferencia=strtotime($ahora)-strtotime($fechaInicio);//strtotime() tranforma de string a dato tipo date o fecha
			echo "El tiempo transcurrido es: ".$fechaDiferencia;
		}
		else
		{
			if($auto[0]!="")
				$listaAuxiliar[]=$auto;
		}
		//echo $auto[0]."<br>";// el indice cero es la patente, el indice uno es la fecha
	}
		if($esta)
		{
			echo "<br>"."El auto esta"."<br>";
			$archivoDos=fopen("ticket.txt", "w");
			foreach ($listaAuxiliar as $auto) 
			{
				fwrite($archivoDos, $auto[0]."[".$auto[1]."\n");
			}
			fclose($archivoDos);
		}
		else
			echo "No esta el auto";
}

$archivo=fopen("ticket.txt", "r");


echo "<table border=1>";
echo "<th>Patente</th><th>Fecha</th><th>Foto</th>";

while (!feof($archivo)) 
{	
	echo "<tr>";	
	$renglon=fgets($archivo);
	$auto=explode("[", $renglon);
	if(trim($reglon))//trim() saca todos los espacios
	{
		echo "<br>"."<td>".$auto[0]."</td>"."<td>".$auto[1]."</td>"."<td>"."<img src= $auto[2] width=200px>"."</td>"."<br>";
		echo "</tr>";
	}
}

echo "</table>";

?>
<br>
<br>
<a href="index.php">volver</a>