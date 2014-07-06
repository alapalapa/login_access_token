<?php 
class JSON_WebService {
    private $methods, $args, $strcall;
    public function __construct($rawData) {
        $this->strcall = str_replace($_SERVER["SCRIPT_NAME"]."/", "", $_SERVER["REQUEST_URI"]);
        $this->args = $rawData;
        $this->methods = array();
        header('Cache-Control: no-cache, must-revalidate');
        header('Content-type: application/json; charset=utf-8');
    }
   
    public function Register($name) {
        $this->methods[$name] = true;
    }
   
    public function Remove($name) {
        $this->methods[$name] = false;
    }
   
    private function call($name, $args) {
        if ($this->methods[$name] == true) {
            $result = call_user_func_array($name, $args);
            return json_encode($result);
        }
    }
   
    function start() {
        try{
            if(!function_exists($this->strcall))
                throw new Exception("Function '".$this->strcall."' does not exist.");
            if (!$this->methods[$this->strcall])
                throw new Exception("Access denied for function '".$this->strcall."'.");
                
            header("HTTP/1.0 200 OK");
            print $this->call($this->strcall, json_decode($this->args));
        }
        catch(Exception $e){
            header("HTTP/1.0 500 Internal server error");
            print json_encode(
                array(
                    "message" => $e->getMessage(),
                    "code" => $e->getCode(),
                    "file" => $e->getFile(),
                    "line" => $e->getLine(),
                    "stackTrace" => $e->getTrace(),
                    "status" => array("message" => "Internal server error", "code" => "500")
                )
            );
        }
    }
}
?>