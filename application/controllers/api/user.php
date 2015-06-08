<?php 

class User extends REST_Controller
{
/*********************Construct()******************************/
	function __construct()
    {
    	parent::__construct(); 
    }

    
    /*************************Start Function index_get()***********************************/
    //    Owner                                         : Madhuranga Senadheera
    //    Description
    //    @ type :
    //    #return type :
    public function index_get()
    {

    	$this->load->model('users_model');
        // return araray ini
        $json_return_array = array();

    	$id = $this->input->get('id'); 
    	if($id!=false)
    	{
    		$user = $this->users_model->get_by(array('id'=>$id),'*');
    		$json_return_array = end($user);
    	}
    	else
    	{
    		$json_return_array = $this->users_model->get_by(array(),'*');	
    	}
        
        echo json_encode($json_return_array);
        exit();
    
    }//Function End index_get()---------------------------------------------------FUNEND()
 

    /*************************Start Function index_put()***********************************/
    //	Owner 										: Madhuranga Senadheera
    //	Description
    //	@ type :
    //	#return type :
    public function index_put()
    {   
    	$this->load->model('users_model');
    	// return araray ini
        $json_return_array = array();  
        // load helpers 
        $this->load->library('form_validation');   
        // set validation
 
        $this->form_validation->set_rules($this->users_model->rules);  
        if ($this->form_validation->run()==false)
        {
            // validation error
            $json_return_array['msg']       = 'Operation fail';
            $json_return_array['status']    = 'error';
            $json_return_array['statuss']    = validation_errors(); 
            
        }
        else
        {
            $form_data = $this->post_get_as_array(array('id','name')); 
    
            if ($this->users_model->save($form_data,$form_data['id'])) {
    
                $json_return_array['msg']       = 'System update success';
                $json_return_array['status']    = 'success'; 
    
            }
            else {
                $json_return_array['msg']       = 'System update failier';
                $json_return_array['status']    = 'error'; 
            }
        }
    
        echo json_encode($json_return_array);
        exit();
    
    }//Function End index_put()---------------------------------------------------FUNEND()


    /*************************Start Function input_post()***********************************/
    //	Owner 										: Madhuranga Senadheera
    //	Description
    //	@ type :
    //	#return type :
    public function index_post()
    { 
    	$this->load->model('users_model');
    	// return araray ini
        $json_return_array = array();
        // load helpers 
        $this->load->library('form_validation'); 
        // set validation
        $this->form_validation->set_rules('name','Name','required'); 
        if ($this->form_validation->run()==false)
        {
            // validation error
            $json_return_array['msg']       = 'Operation fail';
            $json_return_array['status']    = 'error';
            $json_return_array['statuss']    = validation_errors(); 
            
        }
        else
        {
            $form_data = $this->post_get_as_array(array('name')); 
    
            if ($this->users_model->save($form_data)) {
    
                $json_return_array['msg']       = 'System update success';
                $json_return_array['status']    = 'success'; 
    
            }
            else {
                $json_return_array['msg']       = 'System update failier';
                $json_return_array['status']    = 'error'; 
            }
        }
    
        echo json_encode($json_return_array);
        exit();
    
    }//Function End input_post()---------------------------------------------------FUNEND()




    /*************************Start Function index_delete()***********************************/
    //  Owner                                       : Madhuranga Senadheera
    //  Description
    //  @ type :
    //  #return type :
    public function index_delete()
    {   
        $this->load->model('users_model');
        // return araray ini
        $json_return_array = array();  
        // load helpers 
        $this->load->library('form_validation');   
        // set validation
        $_POST['id']  = $_GET['id'];
        $this->form_validation->set_rules('id','ID','required');
        if ($this->form_validation->run()==false)
        {
            // validation error
            $json_return_array['msg']       = 'Operation fail';
            $json_return_array['status']    = 'error';
            $json_return_array['statuss']    = validation_errors(); 
            
        }
        else
        {
            
            $form_data = $this->post_get_as_array(array('id')); 
            if ($this->users_model->delete($form_data['id'])) {
    
                $json_return_array['msg']       = 'Deleted';
                $json_return_array['status']    = 'success'; 
    
            }
            else {
                $json_return_array['msg']       = 'System update failier';
                $json_return_array['status']    = 'error'; 
            }
        }
    
        echo json_encode($json_return_array);
        exit();
    
    }//Function End index_delete()---------------------------------------------------FUNEND()


}// End User --------------Class{}
//Owner : Madhuranga Senadheera

 ?>