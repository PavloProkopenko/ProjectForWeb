<?php 


/**
 * database class
 */
class Database
{
	private function connect()
    {
        $str = 'mysql:host=localhost;dbname=courses_db';
        $con = new PDO($str, 'root', '');
    }

    public function query()
    {
        $con = $this->connect();
        var_dump($con);
    }
	
}