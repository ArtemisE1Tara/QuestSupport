<?php

class additionally{
    public static function testAuthOrDie($login, $password)
    {
        if(!isset($_SERVER['PHP_AUTH_USER'])
                || ($_SERVER['PHP_AUTH_PW']!=$password) 
                || strtolower($_SERVER['PHP_AUTH_USER'])!=$login)
        {
            header('WWW-Authenticate: Basic realm="Backend"');
            header('HTTP/1.0 401 Unauthorized');
            echo json_encode([
                "code" => 401,
                "version" => self::getApiVersion()['version'],
                "error" => 'Authenticate required!',
                'debug' => ''
            ]);
            die();
        }
    }
    public static function getApiVersion(){
      
        // $this->testAuthOrDie();
        return [
            "version" => 1.0,
            "type" => "OpenCart Module"
        ];
    }
}