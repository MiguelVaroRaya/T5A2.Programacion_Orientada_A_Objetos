<?php

declare(strict_types=1);
use App\Models\ProductosRopaModel;
$ropaModel = new ProductosRopaModel();
$resultado = $ropaModel->cambiarTallas('M');
?>
<main class="main_secciones">
<?php echo '<h1>Un total de '.$resultado["@cantidad"].' ha sido cambiado a la talla '. $resultado["nueva_talla"].'</h1>';?> 
<a href="/">
  <button type="button">
    Volver
  </button>
</a> 
</main>