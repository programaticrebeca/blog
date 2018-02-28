<?php
include_once ('funciones.php');
?>

<!DOCTYPE html>

<html>
<head>
    <title>Blog</title>
    <link href="estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="cabecera">
    <div class="contenidocabecera">
        <a href="http://www.ajeclm.com/" target="blank" class="logo"></a>
        <a href="index.php"><h1>Blog del Programa TIC</h1></a>
    </div>  
</div>
<div class="fondo">
    <div class="contenido">
        

<?php
//conectamos con la base de datos
$link = mysql_connect('localhost', 'ejeblog','ejeblogpsw');
mysql_select_db('blog');

//seleccionamos las entradas
$query = "SELECT * FROM entradas ORDER BY fecha DESC";
$queryEntradas = mysql_query($query);

while($entrada = mysql_fetch_object($queryEntradas)){
    //recogemos sus valores
$id = $entrada->id_entrada;
$fechasql = $entrada->fecha;
$imagen = $entrada->imagen;
$descripcion = $entrada->descripcion_img;
$titulo = $entrada->titulo;
$texto = $entrada->texto;


?>        
        
        
        
        <div class="entrada">
            <div class="contenedorimagen">
                <img class="imagen" src="imagenes/<?php echo $imagen; ?>"
                     alt="<?php echo $descripcion; ?>" title="<?php echo $descripcion; ?>"/>
            </div>
            <div class="informacion">
                <p class="fecha"><?php echo fechaTxt($fechasql); ?></p>
                <h2 class="titulo"><?php echo $titulo; ?></h2>
                <p class="texto"><?php echo $texto; ?></p>
                <form action="entrada.php" method="post" enctype="multipart/form-data">
                    <input type="number" name="numero" value="<?php echo $id; ?>" style="display: none;" />
                   <input type="submit" class="boton leer" value="LEER MAS"/> 
                </form>
            </div>
        </div>
        
<?php
};

mysql_close($link);
?>
        
        
    </div>
    <div class="pie">
        <div class="contenidopie">
            <a href="https://www.jccm.es/" target="blank">
                <img class="junta" src="imagenes/comunes/junta.jpg"
                     alt="logo de la jccm" title="logo de la jccm"/>
            </a>
            <a href="http://www.ajeclm.com/programa-tic/" target="blank">
                <img class="programatic" src="imagenes/comunes/programatic.jpg"
                     alt="programatic" title="programatic"/>
            </a>
            <a href="http://www.ajeclm.com/" target="blank">
                <img class="aje" src="imagenes/comunes/aje.jpg"
                     alt="logo de aje" title="logo aje"/>
            </a>
            <a href="http://ec.europa.eu/esf/home.jsp?langId=es" target="blank">
                <img class="europeo" src="imagenes/comunes/europeo.jpg"
                     alt="logo del fondo social europeo"
                     title="logo del fondo social europeo"/>
            </a>
            
        </div>
    </div>  
</div>

</body>
</html>


