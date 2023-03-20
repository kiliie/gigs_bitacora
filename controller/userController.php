<?php

class ControllerUsers{
    private $_method;
    private $_complement;
    private $_data;

    function __construct($method,$complement,$data)
	{
        $this->_method = $method;
        $this->_complement = $complement==null ? 0: $complement;
        $this->_data = $data !=0 ? $data : "";
        //echo $this->_complement . "Controller"
    }
    public function index(){
        switch ($this->_method) {
            case 'GET':                
                switch ($this->_complement) {
                    case  0:
                        $user = ModelUsers::getUsers(0);
                        $json = $user;                       
                        echo json_encode($json,true);
                        return;
                   default :                        
                        $user = ModelUsers::getUsers($this->_complement);
                        $json = $user;                           
                        echo json_encode($json,true);
                        return;
                }   
            case 'POST':                
                $createUser = ModelUsers::createUser($this->generateSalting()); 
                $json = array(
                    "response:"=>$createUser
                );
                echo json_encode($json,true);
                return;
            default :
                $json = array(
                    "ruta:"=>"not found"
                );
                echo json_encode($json,true);
                return;
        }
        
    }
    private function generateSalting(){
        $trimmed_data="";
        if (($this->_data != "") || (!empty($this->_data))){
            $trimmed_data = array_map('trim', $this->_data);               
            $trimmed_data['pss'] = md5($trimmed_data['pss']);          
            $identifier = str_replace("$","asd",crypt($trimmed_data["user"].$trimmed_data["mail"],'$1$aserwtop$'));
            $key = str_replace("$","ERT",crypt($trimmed_data["mail"].$trimmed_data["user"],'$1$aserwtops9921jkadfjk$'));
            $trimmed_data['identifier']=$identifier;
            $trimmed_data['key']=$key;            
            $trimmed_data['dateUpdate']= date("Y-m-d h:i");
            //echo gettype($trimmed_data);
            //print_r($identifier);
            //print_r($trimmed_data);
            return $trimmed_data;
        }
    }
   
    
}

?>