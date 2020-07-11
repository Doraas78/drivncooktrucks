<?php

class DatabaseManager{

    private $db;    //database

    /**
     * Constructor, to connect to database, select database and set charset
     */

    public function __construct(){

        $host = $GLOBALS['config']['host'];
        $user = $GLOBALS['config']['user'];
        $password = $GLOBALS['config']['password'];
        $dbname = $GLOBALS['config']['dbname'];
        $charset = $GLOBALS['config']['charset'];
        $port= $GLOBALS['config']['port'];

        $connection = "mysql:host=" . $host. ";dbname=" . $dbname . ";charset=" . $charset . ";port=" . $port;

        try{
            $this->db = new PDO($connection, $user, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
            return $this->db;
        }catch (PDOException $e)
        {
            die('Erreur de connexion à la base de données : ' . $e->getMessage()); // Stop the script and print an error
        }
    }

    /**
     * @return PDO
     */
    public function getDb(): PDO
    {
        return $this->db;
    }

    /**
     * Execute SQL statement
     * @access public
     * @param string $statement sql statement
     * @param string|null $className
     * @param bool $oneResult number of results (one or all)
     * @return mixed if succeed, return resources; if fail return error message and exit
     */

    public function query(string $statement, string $className = null, bool $oneResult = false) {

        // write SQL statement into log
        $sql = $statement;
        /*$str = $sql . " [". date("Y-m-d H:i:s") ."]" . PHP_EOL;
        file_put_contents("log.txt", $str,FILE_APPEND);*/

        // execute the query
        $result = $this->db->query($sql);

        if($result === false) {
            return null;
        }

        // prepare the how the result will be fetch
        if ($className === null) {
            $result->setFetchMode(PDO::FETCH_ASSOC);
        } else {
            $result->setFetchMode(PDO::FETCH_CLASS, $className);
        }

        // fetch the result
        if ($oneResult) {
            $data = $result->fetch();
        } else {
            $data = $result->fetchAll();
        }

        // check the results
        if ($data === false) {
            return null;
        }
        return $data;
    }

    /**
     * Makes a prepared SQL with parameters
     * @access public
     * @param string $statement sql statement
     * @param array $parameters parameters
     * @param string $className return class for data received
     * @param bool $oneResult (optional) number of results (one or all)
     * @param bool $noFetch (optional) number of results (one or all)
     * @return mixed
     */
    public function prepare(string $statement, array $parameters, string $className = null, bool $noFetch = false, bool $oneResult = false) {

        // write SQL statement into log
        $sql = $statement;
        /*$str = $sql . " [". date("Y-m-d H:i:s") ."]" . PHP_EOL;
        file_put_contents("log.txt", $str,FILE_APPEND);*/

        // Prepares a statement for execution and returns a statement object
        $sql = $this->db->prepare($sql);

        if($sql === null || $sql === false) {
            return null;
        }

        if (!$noFetch) {
            $sql->execute($parameters);


            if($sql === false) {
                return null;
            }

            if ($className === null) {
                $sql->setFetchMode(PDO::FETCH_ASSOC);
            } else {
                $sql->setFetchMode(PDO::FETCH_CLASS, $className);
            }

            if ($oneResult) {
                $data = $sql->fetch();
            } else {
                $data = $sql->fetchAll();
            }

            if($data === false) {
                return null;
            }
            return $data;
        } else {
            $data = $sql->execute($parameters);

            if($data === false) {
                return null;
            }

            return $data;
        }
    }

    /**
     *  Fetch extended error information associated with the last operation on the database handle
     * @access private
     * @return array
     */

    public function error() : array {
        return $this->db->errorInfo();
    }

}
