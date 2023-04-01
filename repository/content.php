<?php

include (__DIR__."/../component/config.php");

class contentRepository{
    private string $table = 'tbl_content';

    private string $sql;
    // private string $select = 'select * from '.$table;

    public function findId($id){
        global $conn;
        $this->sql = 'select * from '.$this->table.' where id='.$id.' limit 0,1';
        $execute = mysqli_query($conn, $this->sql);
        return $execute;
    }
}

?>