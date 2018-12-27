<?php
use ShuffleRestserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *

 * @subpackage      Rest Server
 * @category        Controller
 * @author          Uchendu Precious

 */
class Quote extends REST_Controller {
   
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
       
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['quotes_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['quotes_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->post = $_REQUEST;
        $this->load->model('QuotesModel');
        $this->load->library(array('form_validation', 'preview'));
    }


    /*
    * METHOD GET
    */

    function get_get()
    {
       $quotes='';
       
            $data= array('quotes',$this->QuotesModel->getAll());
            if(!empty($data))
            {
                $quotes=$data;
            }
            else
            {
                $this->response('No Such Church',REST_Controller::HTTP_NO_CONTENT);
                exit;
            }
        
        $this->response($quotes, REST_Controller::HTTP_OK);
    }

    function BYCATEGORY_get(){
        $category = $this->get('category');
        $quotes='';
        if(!empty($category))
        {
            $data=array('quotes',$this->QuotesModel->getByCategory($category));
            if(!empty($data))
            {
               $quotes=$data;
            }
            else
            {
                $this->response('No Such Quote',REST_Controller::HTTP_NO_CONTENT);
                exit;
            }
        }
        else
        {
            $data=array('quotes',$this->QuotesModel->getAll());
            if(!empty($data))
            {
                $quotes=$data;
            }
            else
            {
                $this->response('No Such Church',REST_Controller::HTTP_NO_CONTENT);
                exit;
            }
        }
        $this->response($quotes, REST_Controller::HTTP_OK);
    }
    function BYCOUNT_get(){
        $count = $this->get('count');
        $quotes='';
        $intcount = (int) $count;
        if($intcount < 0){
            $this->set_response([
                'status' => FALSE,
                'message' => 'Quote(s) could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }else{
        if(!empty($count))
        {
            $data=array('quotes',$this->QuotesModel->getOpt($count));
            if(!empty($data))
            {
               $quotes=$data;
            }
            else
            {
                $this->response('No Such Quote',REST_Controller::HTTP_NO_CONTENT);
                exit;
            }
        }
        else
        {
            $data= array('quotes',$this->QuotesModel->getAll());
            if(!empty($data))
            {
                $quotes=$data;
            }
            else
            {
                $this->response('No Such Church',REST_Controller::HTTP_NO_CONTENT);
                exit;
            }
        }
        $this->response($quotes, REST_Controller::HTTP_OK);
    }
    }
    // public function get_get($count, $category){
    //     $count = $this->get('count');
    //     $category = $this->get('category');
    //     $quotes='';
       
    //     if(empty($category) && empty($count))
    //     {
    //         $data= array('quotes35',$this->QuotesModel->getAll());
    //         if(!empty($data))
    //         {
    //            $quotes=[$data];
    //         }
    //         else
    //         {
    //             $this->set_response([
    //                 'status' => FALSE,
    //                 'message' => 'Quote(s) could not be found'
    //             ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    //             exit;
    //         }
    //     }
    //     else if(!empty($category) && empty($count)){
            
    //         $data= array('quotes',$this->QuotesModel->getByCategory($category));
    //         if(!empty($data))
    //         {
    //            $quotes=[$data];
    //         }
    //         else
    //         {
    //             $this->set_response([
    //                 'status' => FALSE,
    //                 'message' => 'Quote(s) could not be found'
    //             ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    //             exit;
    //         }
    //     }
    //     else if(!empty($count) && empty($category)){
    //         $intcount = (int) $count;
    //         if ($intcount < 0 )
    //         {
    //             $this->set_response([
    //                 'status' => FALSE,
    //                 'message' => 'Quote(s) could not be found'
    //             ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    //             exit;
    //         }else{
    //         $data= array('quotes33',$this->QuotesModel->getOpt($count));
    //         if(!empty($data))
    //         {
    //            $quotes=[$data];
    //         }
    //         else
    //         {
    //             $this->set_response([
    //                 'status' => FALSE,
    //                 'message' => 'Quote(s) could not be found'
    //             ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
    //             exit;
    //         }
    //     }
    //     }
      
    //     $this->set_response($quotes, REST_Controller::HTTP_OK);
    // }

     /*
    * METHOD POST
    */
    function POST_post()
    {
        $this->form_validation->set_rules('content', 'Quote Content', 'required');
       $this->form_validation->set_rules('author', 'Quote Author', 'required');
       $this->form_validation->set_rules('category', 'Quote Category', 'required');

  
       //this checks if there are any validation errors
       if($this->form_validation->run()==FALSE)
       {
          //if there are validation errors, json response is sent
          $errors=validation_errors();
          echo $errors;
          $this->set_response($errors, REST_Controller::HTTP_BAD_REQUEST);
          exit;
       }
       //if no validation errors are detected then the transaction should continue
       else
       {
           //array of data to be inserted into the database: array('database_field'=>'form_field_value')
           $data=array(
             'content'=>$this->input->post('content'),
             'author'=>$this->input->post('author'),
             'category'=>$this->input->post('category'),
           );
           
           $success=$this->QuotesModel->add($data);
           // check if record inserted successfully
           if($success)
           {
             // if database transaction is successful json response is sent
             $this->response($this->preview->success(), REST_Controller::HTTP_CREATED);
           }
           else
           {
              $this->response($this->preview->failure(), REST_Controller::HTTP_BAD_REQUEST);
           }
       }
    }

    
}
