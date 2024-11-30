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

    use App\clases\Ropa;
    use App\Models\ProductosRopaModel; // Recuerda el uso del autoload.php
    use App\Models\ProductosElectronicoModel;
    use App\Models\ProductosComidaModel;
    // Se instancian los modelos tener en cuenta que hay que cambiar las consultas ya que he cambiado el nombre de la variables 
    //para los nuevos objetos
    /*     $ropaModel = new ProductosRopaModel();
    $electronicoModel = new ProductosElectronicoModel();
    $comidaModel = new ProductosComidaModel(); */
    // Descomentar consultas para ver la creación. Cuando se lanza execute hay código para
    // mostrar la consulta SQL que se está ejecutando.

    // Consulta 
    /*     $productos = $ropaModel->all();
    var_dump($productos);
 */

    $ropaModel = new ProductosRopaModel();
    $comidaModel = new ProductosComidaModel();
    $electronicoModel = new ProductosElectronicoModel();

    $ropa = $ropaModel->select(
        'productos.id as id',
        'nombre',
        'precio',
        'talla',
        'id_producto'
    )->innerJoin('productos.id', 'id_producto');

    $comida = $comidaModel->select(
        'productos.id as id',
        'comida.id as id2',
        'nombre',
        'precio',
        'caducidad',
        'id_producto'
    )->innerJoin('productos.id', 'id_producto');

    var_dump($comida);
    // Consulta
    /*          $productos = $productoModel->select('productos.id,id_producto')
     ->from('ropa','productos')
     ->get();
     var_dump($productos); */

    // Consulta
    // utilizamos los getter de las tablas tanto para generar el productos.id (es necesario para que no haya ambiguedad con el id de ropa)
    //como para establecer en from las tablas con las que vamos a operar
    //quiza en el select se podria poner directamtne la columna productos.id sin llamar a la tabla
    /*     $productos = $productoModel->select($productoModel->getTable1().'.id', 'nombre','talla')

                  ->from($productoModel->getTable1(),$productoModel->getTable2())
                 ->orderBy('id', 'DESC')
                ->get();
                foreach($productos as $producto){
                    echo 'Id.-'.$producto->id.'<br/>Nombre.-'.$producto->nombre.'<br/>Talla.-'.$producto->talla;

                } */
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
    //$productoModel->from($productoModel->getTable2())->update(1,['talla'=>'L']);

    // Consulta
    //$resultado = $productoModel->select('*')->where('precio', '=', 4)->get();
    /* $resultado = $ropaModel->select('productos.id as id','nombre','precio',
'talla','id_producto')

->innerJoin('productos.id','id_producto');
print_r($resultado);

    //echo "<br>";
/*     $resultado2 = $productoModel->from($productoModel->getTable1())->find(1);
    print_r($resultado2) */
    //Consulta para crear el objeto ropa e insertarlo en sus dos tablas 
    //$resultado = $electronicoModel->crearProducto(['nombre' => 'Nintendo', 'precio' => '239'], ['modelo' => 'Switch']);
    $resultado = $comidaModel->crearProducto(['nombre' => 'Apio', 'precio' => '2'], ['caducidad' => '2024/12/11']);
    ?>

</body>

</html>