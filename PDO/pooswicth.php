<?php


class DatabaseHandler
{
    private $pdo;

    // public function __construct($servername, $username, $password, $dbname)
    // {
    //     $this->mysqli = new mysqli($servername, $username, $password, $dbname);

    //     if ($this->mysqli->connect_error) {
    //         die("Connection failed: " . $this->mysqli->connect_error);
    //     }

        
    //     $this->mysqli->set_charset('utf8mb4');
    // }

    public function __construct($servername, $username, $password, $dbname)
{
    try {
        $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";

        $this->pdo = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}


public function insertRecord($table, $data)
{
    $columns = implode(',', array_keys($data));
    $values = implode(',', array_fill(0, count($data), '?'));

    $sql = "INSERT INTO $table($columns) VALUES($values)";

    try {
        $stmt = $this->pdo->prepare($sql);

        $params = array_values($data);
        $stmt->execute($params);

        return true;
    } catch (PDOException $e) {
        die("Error in prepared statement: " . $e->getMessage());
    }
}


public function updateRecord($table, $data, $id)
{
    $args = array();
    
    foreach ($data as $key => $value) {
        $args[] = "$key = :$key";
    }

    $setClause = implode(',', $args);
    
    $sql = "UPDATE $table SET $setClause WHERE id = :id";
    
    try {
        $stmt = $this->pdo->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->bindValue(":id", $id);

        $result = $stmt->execute();

        return $result;
    } catch (PDOException $e) {
        die("Error in prepared statement: " . $e->getMessage());
    }
}


public function deleteRecord($table, $id)
{
    $sql = "DELETE FROM $table WHERE id = :id";

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();

        return $result;
    } catch (PDOException $e) {
        die("Error in prepared statement: " . $e->getMessage());
    }
}


public function selectRecords($table, $columns = "*", $where = null)
{
    $sql = "SELECT $columns FROM $table";

    if ($where !== null) {
        $sql .= " WHERE $where";
    }

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (PDOException $e) {
        die("Error in prepared statement: " . $e->getMessage());
    }
}


    public function closeConnection()
    {
        $this->pdo = null;
    }
}

