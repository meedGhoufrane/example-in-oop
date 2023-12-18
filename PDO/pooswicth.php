<?php


class DatabaseHandler
{
    private $mysqli;

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->mysqli = new mysqli($servername, $username, $password, $dbname);

        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }

        // Set charset to UTF-8 for proper handling of international characters
        $this->mysqli->set_charset('utf8mb4');
    }

    public function insertRecord($table, $data)
    {
        $columns = implode(',', array_keys($data));
        $values = implode(',', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO $table($columns) VALUES($values)";

        $stmt = $this->mysqli->prepare($sql);

        if (!$stmt) {
            die("Error in prepared statement: " . $this->mysqli->error);
        }

        $types = str_repeat('s', count($data));
        $params = array_values($data);
        $stmt->bind_param($types, ...$params);

        $result = $stmt->execute();

        $stmt->close();

        return $result;
    }

    public function updateRecord($table, $data, $id)
    {
        $args = array();

        foreach ($data as $key => $value) {
            $args[] = "$key = ?";
        }

        $sql = "UPDATE $table SET " . implode(',', $args) . " WHERE id = ?";

        $stmt = $this->mysqli->prepare($sql);

        if (!$stmt) {
            die("Error in prepared statement: " . $this->mysqli->error);
        }

        $types = str_repeat('s', count($data) + 1);
        $params = array_values($data);
        $params[] = $id;
        $stmt->bind_param($types, ...$params);

        $result = $stmt->execute();

        $stmt->close();

        return $result;
    }

    public function deleteRecord($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = ?";

        $stmt = $this->mysqli->prepare($sql);

        if (!$stmt) {
            die("Error in prepared statement: " . $this->mysqli->error);
        }

        $stmt->bind_param('i', $id);

        $result = $stmt->execute();

        $stmt->close();

        return $result;
    }

    public function selectRecords($table, $columns = "*", $where = null)
    {
        $sql = "SELECT $columns FROM $table";

        if ($where !== null) {
            $sql .= " WHERE $where";
        }

        $stmt = $this->mysqli->prepare($sql);

        if (!$stmt) {
            die("Error in prepared statement: " . $this->mysqli->error);
        }

        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();

        return $result;
    }

    public function closeConnection()
    {
        $this->mysqli->close();
    }
}

// Usage example:

// Create an instance of the DatabaseHandler class
$databaseHandler = new DatabaseHandler('localhost', 'root', '', 'task_db');

// Insert example
$insertData = array('column1' => 'value1', 'column2' => 'value2');
$databaseHandler->insertRecord('your_table', $insertData);

// Update example
$updateData = array('column1' => 'new_value1', 'column2' => 'new_value2');
$databaseHandler->updateRecord('your_table', $updateData, 1);

// Delete example
$databaseHandler->deleteRecord('your_table', 1);

// Select example
$selectResult = $databaseHandler->selectRecords('your_table', 'column1, column2', 'column1 = "value1"');

// Process select result if needed
while ($row = $selectResult->fetch_assoc()) {
    // Process each row
}

// Close the database connection
$databaseHandler->closeConnection();
