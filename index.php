
<!doctype html>
<html lang="en-US">
<head>

  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title> Alumnos </title>

  <link rel="stylesheet" type="text/css" href="estilo.css">
  <link rel="stylesheet" type="text/css" href="animacion.css">
  <link rel="stylesheet" type="text/css" media="all" href="style.css">
 

  <!--script type="text/javascript" src="js/currency-autocomplete.js"></script-->
</head>
	<body>
    <div class="CajaUno animated bounceInDown">

            <form action="gestion.php" method="post" enctype="multipart/form-data"><!--Pasa el archivo la propiedad enctype="multipart/form-data" en foto, no el nombre -->
            <input type="text" name="patente"  id="autocomplete"/>
            <br>
            <input type="submit" class="MiBotonUTN" value="ingreso"  name="estacionar" />
            <br/>
            <input type="submit" class="MiBotonUTN" value="egreso" name="estacionar" />
            <br>
            <input type="file" class="MiBotonUTN" name="fotoAutito">
          </form>



    </div>
      <div class="CajaEnunciado animated bounceInLeft">
      <h2>autos:</h2>
   
      
      
    </div>
      		
	</body>
</html>