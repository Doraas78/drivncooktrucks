<?php


class Model{

    private $databaseManager; //database connection object
    private $table; //table name
    private $entity;

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    public function __construct($table){

        $this->databaseManager = new DatabaseManager();
        $this->table = $table;
        $this->entity = MODEL_PATH . ucfirst($this->table) . 'Model';
    }

    /**
     * Add an element in database
     * @param string $statement sql query
     * @param array $attributes array of data to update
     * @return bool true if succeed
     **/
    public function insert(string $statement, array $attributes)
    {
        foreach ($attributes as $attribute) {
            if ($attributes === '') {
                return false;
            }
        }

        return $this->databaseManager->prepare($statement, $attributes, null, true);
    }

    /**
     * Update data in database
     * @param string $statement  sql query
     * @param array $attributes array of data to update
     * @return bool true if succeed
     **/
    public function update(string $statement, array $attributes)
    {
        foreach ($attributes as $attribute) {
            if ($attributes === '') {
                return false;
            }
        }

        return $this->databaseManager->prepare($statement, $attributes, null, false, true);
    }

    /**
     * Delete an element in the database
     * @param string $key
     * @param string $value
     * @return bool
     */
    public function delete(string $key, string $value)
    {
        return $this->databaseManager->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $key . '= ?', array($value), null,  true);
    }

    /**
     * retrieves all the element passed in parameters
     * @return mixed
     */

    public function all() {
        return $this->databaseManager->query('SELECT * FROM ' . $this->table);
    }

    /**
     * Get one element of the database based of the ID
     * @param int $id ID of the element
     * @return mixed
     */
    public function findID(int $id) {
        return $this->databaseManager->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?', array($id), null, false, true);
    }

    /**
     * Get one element of the database
     * @param string $key
     * @param string $value
     * @param bool $onlyOne
     * @return mixed
     */
    public function find(string $key, $value, bool $onlyOne = false)  {
        return $this->databaseManager->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $key . ' = ?', array($value), null, false, $onlyOne);
    }

    /**
     * Get the last element handle in the database
     * @return string
     */
    public function lastInsertId()
    {
        $db = $this->databaseManager->getDb();
        return $db->lastInsertId();
    }

    /**
     * Launches the query or prepare method of Database according to the parameters it receives.
     *
     * @param string $statement SQL query
     * @param array $attributes array of parameters
     * @param bool $noFetch
     * @param bool $onlyOne Indicates whether one or more elements are desired
     * @return mixed
     */
    public function query(string $statement, array $attributes = [], bool $noFetch = false, bool $onlyOne = false) {
        if (empty($attributes)) {
            return $this->databaseManager->query($statement, $this->entity, $onlyOne);
        } else {
            return $this->databaseManager->prepare($statement, $attributes, $this->entity, $noFetch, $onlyOne);
        }
    }
}
