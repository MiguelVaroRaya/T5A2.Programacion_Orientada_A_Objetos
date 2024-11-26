<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <p class="header-paragraph">Pruebas de consultas:</p>
    <?php
     use App\Models\ProductosModel; // Recuerda el uso del autoload.php
     
     // Se instancia el modelo
     $productoModel = new ProductosModel();

     // Descomentar consultas para ver la creación. Cuando se lanza execute hay código para
     // mostrar la consulta SQL que se está ejecutando.
     
     // Consulta 
/*      $productos = $productoModel->all();
    foreach($productos as $producto){
        echo '<br/>Id: '.$producto->id.'|Nombre: '.$producto->nombre.'<br/>';
    } */

     // Consulta
/*      $productos = $productoModel->select('Nombre')
     ->where('nombre','LIKE','%pantalon%')
     ->get();
     foreach($productos as $producto){
        echo '<br/>Nombre: '.$producto->Nombre.'<br/>';
    }
 */
     // Consulta
     // $productoModel->select('id', 'nombre')
      //           ->where('id', '>', '0')
    //             ->orderBy('id', 'DESC')
     //            ->get();

     // Consulta
     // $productoModel->select('columna1', 'columna2')
     //             ->where('columna1', '>', '3')
     //             ->where('columna2', 'columna3')
     //             ->where('columna2', 'columna3')
     //             ->where('columna3', '!=', 'columna4', 'OR')
     //             ->orderBy('columna1', 'DESC')
     //             ->get();

     // Consulta
     //$productoModel->create(['nombre' => 'camisa','precio' => '20']);

     // Consulta
    //$productoModel->delete(4);

     // Consulta
     $productoModel->update(1, ['nombre' => 'chaqueton']);
    ?>
</body>

</html>