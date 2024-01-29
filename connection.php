<?php

class crud
{
    public static function connect()
    {
        try {
            $con = new PDO('mysql:localhost=host; dbname=crudsystem', 'root', '');
            return $con;
        } catch (PDOException $error1) {
            echo 'Something went wrong,it was not possible to connect you to database' . $error1->getMessage();
        }
        catch(Exception $error2)
        {
            echo 'Generic error!' .$error2->getMessage();
        }
    }
    public static function Selectdata(){
        $data=array();
        $p=crud::connect()->prepare('SELECT * FROM crudtable');
        $p->execute();
        $data=$p->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public static function delete($id)
    {
        $p=crud::connect()->prepare('DELETE FROM crudtable WHERE id=:id');
        $p->bindValue(':id',$id);
        $p->execute();
    }
   
}

?>