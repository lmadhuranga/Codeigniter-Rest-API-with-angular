<?php

class  Driver_model extends MY_Model
{
    protected $_table_name      ='tbl_driver';
    protected $_primary_key     ='id';
    protected $_order_by        ='id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(               
						array(
                        	'field'=>'username',
                        	'label'=>'User name',
                        	'rules'=>'required|trim|xss_clean|max_length[25]'
                        ),
						array(
                        	'field'=>'firstname',
                        	'label'=>'First name',
                        	'rules'=>'required|trim|xss_clean|max_length[25]'
                        ),
						array(
                        	'field'=>'lastname',
                        	'label'=>'Last name',
                        	'rules'=>'required|trim|xss_clean|max_length[25]'
                        ),
						array(
                        	'field'=>'email',
                        	'label'=>'Email',
                        	'rules'=>'required|trim|valid_email|xss_clean|max_length[45]'
                        ),
						array(
                        	'field'=>'image',
                        	'label'=>'Mobile no',
                        	'rules'=>'required|trim|integer|xss_clean|max_length[250]'
                        ),
						array(
                        	'field'=>'password',
                        	'label'=>'Password',
                        	'rules'=>'required|trim|xss_clean|max_length[25]'
                        ),
						
        );
    
     public $login_rules = array(
                                array(
                                    'field'=>'email',
                                    'label'=>'Email',
                                    'rules'=>'required|trim|valid_email|xss_clean|max_length[45]'
                                    ),
                                array(
                                    'field'=>'user_password',
                                    'label'=>'User password',
                                    'rules'=>'required|trim|xss_clean|max_length[250]'
                                ),
                            );

    /*********************Construct()****************************/
    function __construct()
    {
        parent::__construct();
    }

    function count(){
        return $this->db->count_all($this->_table_name);
    }
    
    
    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function           check currnt user is logged in
     * 
    */
    public function is_logged()
    { 
        return (bool) $this->session->userdata('loggedin');
    }
    /*---------------- ---------End of functionName()---------------------------*/
    

    
    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function           check email is exist
     * 
    */
    public function is_email()
    {
        if (count(get_by(array('email'=>$email))))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
    /*---------------- ---------End of is_email()---------------------------*/
   

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function           check user name is valid
     * 
    */
    public function  get_current_username()
    {
        return  $this->session->userdata('username');
    }
    /*---------------- ---------End of is_username()---------------------------*/

            
    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          return current user name
     * 
    */
    public function get_current_first_name()
    {
        return  $this->session->userdata('firstname');
    }
    /*---------------- ---------End of get_current_first_name()---------------------------*/
    


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          return last name
     * 
    */
    public function get_current_last_name()
    {
        return   $this->session->userdata('lastname');
    }
    /*---------------- ---------End of get_current_last_name()---------------------------*/
     


    
    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          return current user id
     * 
    */
    public function get_current_user_id()
    {
        return  $this->session->userdata('id');
    }
    /*---------------- ---------End of get_current_user_id()---------------------------*/
    

   
   /**
    * @author                          Madhuranga Senadheera
    * Purpose of the function         return current user email
    * 
    */
   public function  get_current_user_email()
   {
       return  $this->session->userdata('email');
   }
   /*---------------- ---------End of get_current_user_email()---------------------------*/
   


   /**
    * @author                          Madhuranga Senadheera
    * Purpose of the function          check user driver
    * 
    */
   public function is_driver()
   {
  
        return (bool) $this->session->userdata('user_type') == 'driver';
   }
   /*---------------- ---------End of is_driver()---------------------------*/
   

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          get user type
     * 
     */
    public function get_user_type()
    {
        return $this->session->userdata('user_type');
    }
    /*---------------- ---------End of get_user_type()---------------------------*/
     

    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function         driver user login function
     * 
    */
    public function user_login($email,$password)
    {
        
        if (!$this->is_logged()) 
        { 
            
            $user_data = $this->driver_model->get_by(array('email'=>$email,'password'=>$this->hash_password($password)), array('id', 'firstname', 'lastname', 'email', 'username', 'password',  'last_login', 'image','created', 'modified', 'enable'),NULL , TRUE,1);

            // user name and password corect
            if (count($user_data)==1) 
            { 
                // check inactive user
                if ($user_data->enable==1)
                {
                    // set session data 
                    $session_data = array(
                                            'user_id'       => $user_data->id,
                                            'firstname'     => $user_data->firstname,
                                            'lastname'      => $user_data->lastname,
                                            'email'         => $user_data->email,
                                            'username'      => $user_data->username,
                                            'user_type'     => 'driver', 
                                            'image'         => $user_data->image,
                                            'loggedin'      => TRUE,
                                         );
                    $this->session->set_userdata($session_data); 

                    
                    // user is authenticated, lets see if there is a redirect:
                    if( $this->session->userdata('redirect_back') )
                    {
                        $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
                        $this->session->unset_userdata('redirect_back');
                        redirect( $redirect_url );
                    }
                    else
                    {
                        // redirect home page
                        redirect('driver/home');
                    }
                }
                else 
                {
                    $this->session->set_flashdata('error', 'Inactive user');
                    redirect('driver/user/login');
                } 
            }
            else
            {
                // redirect login page
                $this->session->set_flashdata('error', 'User name password not match');
                redirect('driver/user/login');
            }
        }
        else  
        {
            if($this->is_driver())
            {
                 // already logged to system
                if( $this->session->userdata('redirect_back') )
                {
                    $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
                    $this->session->unset_userdata('redirect_back');
                    redirect( $redirect_url );
                }
                else
                {
                    // redirect home page
                    redirect('driver/home');
                }
            }
            else
            {
                redirect('driver/user/logout');
            }
           
             
        }
         
        
    }
    /*---------------- ---------End of user_login()---------------------------*/
    


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Hass password
     * 
     */
    public function hash_password($password)
    {
        return  md5($password). $this->config->item('encryption_key');
    }
    /*---------------- ---------End of hash_password()---------------------------*/


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Log out the user
     * @variable                         : type
     * @return                             boolean 
     */
    public function log_out()
    {
         $array_items = array(
                            'user_id'   => '',
                            'firstname' => '',
                            'lastname'  => '',
                            'email'     => '',
                            'username'  => '',
                            'user_type'  => '', 
                            'image'     => '',
                            'loggedin'  => '',
                         );

        return (bool) $this->session->unset_userdata($array_items);
        
    }
    /*---------------End of log_out()---------------*/
    
    
   
}// ------------------End Driver Model --------------Class{}
//Owner : Madhuranga Senadheera



