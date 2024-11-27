<?php

namespace App\Models;

class ProductosComidaModel extends Model
{
    protected $table1 ='productos';
    protected $table2 ='comida';
// para acceder a las tablas fuera de la clase 
    public function getTable1() {
        return $this->table1;
    }
    public function getTable2() {
        return $this->table2;
    }
}