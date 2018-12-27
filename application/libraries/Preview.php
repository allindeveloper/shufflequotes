<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Preview 
{
  
   public function success()
    {
       $res_success = ['message' => "Successfully Added a Quote!"];
   
       return $res_success;
    }

    public function failure()
    {
       $res_failure = ['message' => "Error in Adding Quote"];
   
       return $res_failure;
    }
    
}

?>