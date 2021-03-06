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

    public function insertUsario($post,$table){
        try {
            $db = Zend_Db_Table::getDefaultAdapter();
            $encri = openssl_digest($post["pword"],"sha512");
            $datasave = array(
                'rol'=>$post['rol'],
                'nombre'=>$post['name'],
                'apellidop'=>$post['apa'],
                'apellidom'=>$post['ama'],
                'direccion'=>$post['dir'],
                'telefono'=>$post['phone'],
                'correo'=>$post['mail'],
                'password'=>$encri); 
            $res = $db->insert($table, $datasave);
            $db->closeConnection();               
            return $res;
        } catch (Exception $e) {
            echo $e;
        }
    }//Insert

    public function insertVector($idf,$tempo,$table){
        try {
            $db = Zend_Db_Table::getDefaultAdapter();
            $datasave = array(
                'form'=>$idf,
                'vector'=>$tempo);
            $res = $db->insert($table, $datasave);
            $db->closeConnection();               
            return $res;
        } catch (Exception $e) {
            echo $e;
        }
    }//Insert

    public function insertEmpresa($post,$table){
        try {
            $db = Zend_Db_Table::getDefaultAdapter();
            $datasave = array(
                'nombree'=>$post['name'],
                'direccion'=>$post['dir'],
                'correo'=>$post['mail'],
                'telefono'=>$post['telf'],
                'nombreg'=>$post['gere'],
                'estado'=>$post['estado']);
                $res = $db->insert($table, $datasave);
                $db->closeConnection();               
                return $res;
            } catch (Exception $e) {
                echo $e;
            }
        }

        public function insertNuevoServicio($post,$table,$id){
        try {
            $db = Zend_Db_Table::getDefaultAdapter();
            $datasave = array(
                'descripcion'=>$post['descrip'],
                'comentarios'=>$post['coment'],
                'id_usr'=>$id,
                'id_empresa'=>$post['emp']);
                $res = $db->insert($table, $datasave);
                $db->closeConnection();               
                return $res;
            } catch (Exception $e) {
                echo $e;
            }
        }
        

    public function GetSpecific($table,$wh,$id){
         try {
            $db = Zend_Db_Table::getDefaultAdapter();
            $qry = $db->query("SELECT * FROM $table WHERE $wh = ?",array($id));
            $row = $qry->fetchAll();
            $db->closeConnection();
            return $row;
        } catch (Exception $e) {
            echo $e;
        }
    }//getespecific

public function GetLast($table){
         try {
            $db = Zend_Db_Table::getDefaultAdapter();
            $qry = $db->query("SELECT * FROM $table ORDER by ID DESC LIMIT 1;");
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
        }//catch
    }//end validar
	

    public function UpdateUsrSicoplas($post,$table,$wh){
        try {
            $db = Zend_Db_Table::getDefaultAdapter();
            $qry = $db->query("UPDATE $table SET nombre = ? , apellidop = ? , apellidom = ? , direccion = ? , telefono = ? , correo = ? WHERE $wh = ?",array(
                $post['name'],
                $post['apa'],
                $post['ama'],
                $post['dir'],
                $post['phone'],
                $post['mail'],
                $post['id']));
            $db->closeConnection();               
            return $qry;
        } 
        catch (Exception $e) {
            echo $e;
        }
    }

  public function UpdateEmpSicoplas($post,$table,$wh){
        try {
            $db = Zend_Db_Table::getDefaultAdapter();
            $qry = $db->query("UPDATE $table SET nombree = ? , direccion = ? , correo = ? , telefono = ? , nombreg = ? , estado = ? WHERE $wh = ?",array(
                $post['name'],
                $post['dir'],
                $post['mail'],
                $post['telf'],
                $post['gere'],
                $post['estado'],
                $post['id']));
            $db->closeConnection();               
            return $qry;
        } 
        catch (Exception $e) {
            echo $e;
        }
    }
    public function deleteAll($id,$table,$wh){
        try {
            $db = Zend_Db_Table::getDefaultAdapter();
            $var =  $db->query ("DELETE from $table where $wh = ? ",array($id));
            $db->closeConnection();
            return $var;
        } catch (Exception $e) {
            echo $e;
        }
    }  
}