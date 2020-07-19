<?php

/**
 * baseModel: Parent Model class
 * this file serves as main model class. All database CRUDs are written with dynamic sql quries.
 *
 * NOTE: Please read documentation to view usage of all CRUD functions.
 *
 */
class baseModel
{

    public $conn;

    public function __construct()
    {
        try { // PDO database connection
            $this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Connection Failed: " . $e->getMessage();
        }
    }

    /* function to fetch data from DB, The SELECT query is Dynamic
     *  this function accepts 4 parametes:
     *  1. $table_name: which will be table name to fetch from,
     *  2. $conditions: Conditions to be applied in sql query if any, for example where condition
     *  3. $columns: This is all your column names to be fetched seperated by comma
     *  4. $query: This parameter is to pass a complete sql query. This parameter is written to execute-
     *        complex queries like sql joins.
     */
    public function select($table_name = null, $conditions = null, $columns = " * ", $query = null)
    {
        try {
            $sql = "SELECT $columns FROM $table_name";
            if ($query) {
                $sql1 = $this->conn->prepare($query);
                $sql1->execute();
                $result = $sql1->setFetchMode(PDO::FETCH_ASSOC);
                return $sql1->fetchAll();
            }
            if ($conditions) {
                foreach ($conditions as $key => $value) {
                    $condition = "";
                    $condition .= $key . "='" . $value . "', "; // converting array to concatenated string
                }
                $condition = substr($condition, 0, -2);
                $sql .= " WHERE " . $condition;
                $sql = $this->conn->prepare($sql);
                $sql->execute();
                $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
                return $sql->fetch();
            } else {
                $sql = $this->conn->prepare($sql); // Query wothout any condition
                $sql->execute();
                $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
                return $sql->fetchAll();
            }
        } catch (PDOException $e) {
            echo "An Error occured:" . $e->getMessage();
        }
    }

    /* Insert data into DB using dynamic query and it accepts 2 parameters
     *  1. $table_name: which is table name
     *  2. $data: This is array of data to be inserted
     */
    public function insert($table_name, $data)
    {
        try {
            $sql = "INSERT INTO $table_name" . ' (';
            $sql .= implode(",", array_keys($data)) . ') VALUES ('; // implode array and get keys only
            $sql .= "'" . implode("','", array_values($data)) . " ')"; // implode array and get values only
            $sql = $this->conn->prepare($sql);
            return $sql->execute();

        } catch (PDOException $e) {
            echo "An error occured: " . $e->getMessage();
        }
    }

    /* Update DB record using dynamic query
     *  1. $table_name: which is table name
     *  2. $data: This is array of data to be inserted
     *  3. $id: Id of record to be updated
     */
    public function update($table_name, $data, $id)
    {
        try {
            $sql = '';
            foreach ($data as $key => $value) { // fetching data array and convering onto concatinated string
                $sql .= $key . " = '" . $value . "',";
            }
            $sql = substr($sql, 0, -1);
            $sql = $this->conn->prepare("UPDATE $table_name SET $sql WHERE id=$id");
            return $sql->execute();
        } catch (PDOException $e) {
            echo "An error occured: " . getMessage();
        }
    }

    /* Delete record form DB at specific id
     *  1. $table_name: which is table name
     *  2. $id: Id of record to be deleted
     */
    public function delete($table_name, $id)
    {
        try {
            $sql = $this->conn->prepare("DELETE FROM $table_name WHERE id=$id");
            return $sql->execute();
        } catch (PDOException $e) {
            echo "An error occured: " . getMessage();
        }
    }

    /* This function serves purpose of redirection from different pages/files
     */
    public function redirect($url)
    {
        $fullurl = ROOT_PATH . $url;
        header('location: ' . $fullurl);exit;
    }
}
