<?php

namespace App\Models;

class ProductosRopaModel extends Model
{
    protected $table1 ='productos';
    protected $table2 ='ropa';
// para acceder a las tablas fuera de la clase 
    public function getTable1() {
        return $this->table1;
    }
    public function getTable2() {
        return $this->table2;
    }

    
    // Aquí también se podría definir las consultas que son específicas
    // para los usuarios. Para las demás llamaremos a los métodos de la
    // clase padre.
    // También se podría configurar la conexión para que la información se 
    // recuperase de otra base de datos, otro usuario, etc. cambiando:
    // protected $db_host = 'localhost';
    // protected $db_user = 'root';
    // protected $db_pass = '';
    // protected $db_name = 'mvc_database'; 
}
