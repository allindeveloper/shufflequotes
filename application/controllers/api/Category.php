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
class Category extends REST_Controller {
   
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
       
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['category_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->post = $_REQUEST;
        $this->load->model('CategoryModel');
        $this->load->library(array('form_validation', 'preview'));
    }


    /*
    * METHOD GET
    */
    public function get_get(){
        
        $message = array('categories',$this->CategoryModel->getAll());
        
        
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
                    'message' => 'No categories were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular quote.

       

        // Get the quote from the array, using the count as key for retrieval.
        
        
        if (!empty($message))
        {
            foreach ($message as $key => $value)
            {
                if (isset($value['count']) && $value['count'] === $count)
                {
                    $message = $value;
                }
            }
        }

        if (!empty($message))
        {
            $this->set_response($message, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Quote(s) could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }

    }

    

    
}
