<?php

// application/models/UserModel.php

class UserModel extends Model{


    public function newUser()
    {
        $sql = 'INSERT INTO ' . $this->getTable() .'(login, password, email, token) VALUES("coco", "pass", "email@email.com", "tokon powerful")';
        $db = $this->getDb();
        $this->insert($sql);
    }

    public function modifyUser()
    {
        $sql = 'UPDATE ' . $this->getTable() .' SET login=? WHERE id=?';
        $db = $this->getDb();
        $this->update($sql, ['toto', '9']);
    }
}