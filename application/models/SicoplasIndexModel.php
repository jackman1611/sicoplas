<?php 

class Application_Model_SicoplasIndexModel extends Zend_Db_Table_Abstract{
	
	public function GetAll($table){
		 try {
            $db = Zend_Db_Table::getDefaultAdapter();
            $qry = $db->query("SELECT * FROM $table");
            $row = $qry->fetchAll();
            $db->closeConnection();
            return $row;
        } catch (Exception $e) {
            echo $e;
        }
	}

    public function GetSpecific($id){
         try {
            $db = Zend_Db_Table::getDefaultAdapter();
            $qry = $db->query("SELECT * FROM usuarios WHERE id = ?",array($id));
            $row = $qry->fetchAll();
            $db->closeConnection();
            return $row;
        } catch (Exception $e) {
            echo $e;
        }
    }

    Public function Validar($post){

        try {
            //var_dump($post);exit;
            $db = Zend_Db_Table::getDefaultAdapter();
            $p = openssl_digest($post["passw"],"sha512");
            // var_dump($p);exit;
            $valiu = $db->query("SELECT * FROM usuarios WHERE correo = ? and password = ?",
        array(
            $post["mail"],
            $p));       
        $row = $valiu->fetchAll();             
                    $db->closeConnection();               
                    return $row;
                    //var_dump($valiu);exit;
        } catch (Exception $e) {
            echo $e;
        }//end try and catch
        
        

    }//end validar
	
}