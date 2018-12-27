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
    public function get_get(){
        
        $count = $this->get('count');
        $message = array('quotes',$this->QuotesModel->getAll());
        
        $val = array('quotes',$this->QuotesModel->getOpt($count));

        // If the count parameter doesn't exist return all the users

        if ($count === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($message)
            {
                // Set the response and exit
                $this->response($message, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No quotes were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular quote.

        $count = (int) $count;

        // Validate the count.
        if ($count <= 0)
        {
            // Invalid count, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // Get the quote from the array, using the count as key for retrieval.
        
        
        if (!empty($val))
        {
            foreach ($val as $key => $value)
            {
                if (isset($value['count']) && $value['count'] === $count)
                {
                    $val = $value;
                }
            }
        }

        if (!empty($val))
        {
            $this->set_response($val, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Quote(s) could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

    }

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
