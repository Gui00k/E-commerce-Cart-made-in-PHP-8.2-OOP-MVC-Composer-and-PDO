<?php

namespace app\database\models;

class Read extends Model
{
    public function all($table, $fild = '*'){
        try {
            $query = $this->connect->query("select {$fild} from {$table}");
            $query->execute();

            return $query->fetchAll();
        } catch (\Throwable $th) {
             var_dump($th->getMessage);
        }
    }
}