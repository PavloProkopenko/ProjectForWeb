<?php 


/**
 * database class
 */
class Database
{
	private function connect()
    {
        $str = DB_DRIVER.":hostname=".DB_HOST.";dbname=".DB_NAME;
        return new PDO($str, 'root', '');
    }

    public function query($query, $data = array(), $type = 'object')
    {
        $con = $this->connect();

        $stm = $con->prepare($query);
        if($stm)
        {
            $check = $stm->execute($data);
            if($check)
            {
                $type = PDO::FETCH_OBJ;
                if($type != 'object')
                {
                    $type = PDO::FETCH_ASSOC;
                }

                $result = $stm->fetchAll($type);

                if($result && count($result) > 0)
                {
                    return $result;
                }
            }
        }

        return false;
    }
	
}