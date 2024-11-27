<?php

namespace App\Models;

/**
 * Gestiona la conexión de la base de datos e incluye un esquema para
 * un Query Builder. Los return son ejemplo en caso de consultar la tabla
 * usuarios.
 */
require_once '../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable('..');
$dotenv->load();


class Model
{

    private $connection;

    private $query; // Consulta a ejecutar

    protected $select = '*';
    protected $where, $values = [];
    protected $orderBy;
    protected $from;
    protected $table1;
    protected $table2; // Definido en el hijo

    public function __construct()
    {

        $this->connection();
    }

    private function connection()
    {
        $dbHost = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];
        $dbUser = $_ENV['DB_USER'];
        $dbPass = $_ENV['DB_PASS'];
        try {
            $dsn = "mysql:host={$dbHost};dbname={$dbName}";
            $this->connection = new \PDO($dsn, $dbUser, $dbPass);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    // QUERY BUILDER
    // Consultas: 

    // Recibe la cadena de consulta y la ejecuta
    private function query($sql, $data = [])
    {

        echo "Consulta: {$sql} <br>"; // borrar, solo para ver ejemplo
        echo "Data: ";
        var_dump($data);


        // Si hay $data se lanzará una consulta preparada, en otro caso una normal
        if ($data) {

            $stmp = $this->connection->prepare($sql);

            // Vincular los parámetros dinámicamente
            foreach ($data as $key => $value) {

                $stmp->bindValue($key + 1, $value);
            }

            $stmp->execute();
        } else {
            $this->query = $this->connection->query($sql);
        }


        return $this;
    }

    public function select(...$columns)
    {
        // Separamos el array en una cadena con ,
        $this->select = implode(', ', $columns);

        return $this;
    }

    public function from(...$tables)
    {
        // Separamos el array en una cadena con ,
        $this->from  = implode(', ', $tables);

        return $this;
    }

    // Devuelve todos los registros de una tabla
    public function all()
    {
        // La consulta sería
        $sql = "SELECT * FROM {$this->from}";
        // Y se llama a la sentencia
        $this->query($sql)->get();
        // para obtener los datos del select
        return $this->query->fetchall(\PDO::FETCH_OBJ);
    }

    // Consulta base a la que se irán añadiendo partes
    public function get()
    {
        if (empty($this->query)) {
            $sql = "SELECT {$this->select} FROM {$this->from}";

            // Se comprueban si están definidos para añadirlos a la cadena $sql
            if ($this->where) {
                $sql .= " WHERE {$this->where}";
            }

            if ($this->orderBy) {
                $sql .= " ORDER BY {$this->orderBy}";
            }

            $this->query = $this->connection->prepare($sql);
            $this->query->execute($this->values);
            //para obtener los datos del select
            return $this->query->fetchall(\PDO::FETCH_OBJ);
        }
    }

    public function find($id)
    {
        $sql = "SELECT * FROM {$this->from} WHERE id = ?";

        $this->query = $this->connection->prepare($sql);
        $this->query->execute([$id]);
        return $this->query->fetch(\PDO::FETCH_OBJ);
    }

    // Se añade where a la sentencia con operador específico
    public function where($column, $operator, $value = null, $chainType = 'AND')
    {
        if ($value == null) { // Si no se pasa operador, por defecto =
            $value = $operator;
            $operator = '=';
        }

        // Si ya había algo de antes 
        if ($this->where) {
            $this->where .= " {$chainType} {$column} {$operator} ?";
        } else {
            $this->where = "{$column} {$operator} ?";
        }

        $this->values[] = $value;

        return $this;
    }

    // Se añade orderBy a la sentencia
    public function orderBy($column, $order = 'ASC')
    {
        if ($this->orderBy) {
            $this->orderBy .= ", {$column} {$order}";
        } else {
            $this->orderBy = "{$column} {$order}";
        }

        return $this;
    }

    // Insertar, recibimos un $_GET o $_POST
    public function create($data)
    {
        $columns = array_keys($data); // array de claves del array
        $columns = implode(', ', $columns); // y creamos una cadena separada por ,

        $values = array_values($data); // array de los valores

        $sql = "INSERT INTO {$this->from} ({$columns}) VALUES (?" . str_repeat(', ? ', count($values) - 1) . ")";

        $this->query($sql, $values);

        return $this;
    }

    public function update($id, $data)
    //llamamos con from a la tabla que queremos modificar y $id y $data los parametros correspondientes
    {
        $fields = [];

        foreach ($data as $key => $value) {
            $fields[] = "{$key} = ?";
        }

        $fields = implode(', ', $fields);

        $sql = "UPDATE {$this->from} SET {$fields} WHERE id = ?";

        $values = array_values($data);
        $values[] = $id;

        $this->query($sql, $values);
        return $this;
    }

    public function delete($id)
    //delete se realizara en la tabla uno solamente ya que las siguiente se borraría en cascada.
    {
        $sql = "DELETE FROM {$this->table1} WHERE id = ?";

        $this->query($sql, [$id], 'i');
    }
    // en este metodo llamamos dentro al select y las claves para comparar y hacer el join las pasamos desde fuera
    public function innerJoin($primaria, $foranea)
    {
        //consulta
        $sql = "SELECT {$this->select} FROM {$this->table1} INNER JOIN {$this->table2} ON {$primaria}={$foranea}";
        $this->query = $this->connection->prepare($sql);
        $this->query->execute();
        //para obtener los datos del select
        return $this->query->fetchall(\PDO::FETCH_OBJ);
    }
}
