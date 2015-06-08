<?php
/**
*
*
* @copyright  2015
* @license    None
* @version    1.0
* @link       None 
*
**/     
        
/***********************************************************************************/
/*                                                                                 */
/* File Name     : developer_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  developer_model extends MY_Model
{
    protected $_table_name      ='tbl_developer';
    protected $_primary_key     ='id';
    protected $_order_by        ='id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'first_name',
                                	'label'=>'First name',
                                	'rules'=>'required|trim|xss_clean|max_length[45]'
                                ),
								array(
                                	'field'=>'last_name',
                                	'label'=>'Last name',
                                	'rules'=>'required|trim|xss_clean|max_length[45]'
                                ),
								array(
                                	'field'=>'password',
                                	'label'=>'Password',
                                	'rules'=>'required|trim|xss_clean|max_length[200]'
                                ),
								array(
                                	'field'=>'male',
                                	'label'=>'Male',
                                	'rules'=>'trim|xss_clean|max_length[2]'
                                ),
								array(
                                	'field'=>'email',
                                	'label'=>'Email',
                                	'rules'=>'required|trim|valid_email|xss_clean|max_length[200]'
                                )
        );
  public $login_rules = array( 
                                array(
                                    'field'=>'email',
                                    'label'=>'Email',
                                    'rules'=>'required|trim|valid_email|xss_clean|max_length[200]'
                                )
        );

    /*********************Construct()****************************/
    function __construct()
    {
        parent::__construct();
    }

    function count(){
        return $this->db->count_all($this->_table_name);
    }

    public function get_new(){
        $developer = new stdClass();
        $developer->first_name="";
								$developer->last_name="";
								$developer->password="";
								$developer->male="";
								$developer->email="";
        return $developer;
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
     * Purpose of the function          return current user name
     * 
    */
    public function get_current_first_name()
    {
        return  $this->session->userdata('first_name');
    }
    /*---------------- ---------End of get_current_first_name()---------------------------*/
    


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          return last name
     * 
    */
    public function get_current_last_name()
    {
        return   $this->session->userdata('last_name');
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
     * Purpose of the function         developer user login function
     * 
    */
    public function user_login($email,$password)
    {

        if (!$this->is_logged()) 
        {
            $user_data = $this->developer_model->get_by(array('email'=>$email,'password'=>$this->hash_password($password)), array('id', 'first_name', 'last_name', 'email',  'password', 'status', 'created', 'modified'),NULL , TRUE,1);

            // user name and password corect
            if (count($user_data)==1) 
            { 
                // check inactive user
                if ($user_data->status=='A')
                {
                    // set session data 
                    $session_data = array(
                                            'user_id'       => $user_data->id,
                                            'first_name'     => $user_data->first_name,
                                            'last_name'      => $user_data->last_name,
                                            'email'         => $user_data->email, 
                                            'user_type'     => 'D', 
                                            // 'image'         => $user_data->image,
                                            'loggedin'      => TRUE,
                                         );
                    $this->session->set_userdata($session_data); 

                    // redirect home page
                    redirect('developer/home');
                }
                else 
                {
                    $this->session->set_flashdata('error', 'Inactive user');
                    redirect('developer/user/login');
                } 
            }
            else
            {
                // redirect login page
                $this->session->set_flashdata('error', 'User name password not match');
                redirect('developer/user/login');
            }
        }
        else  
        {
            // already logged to system
            $this->session->set_flashdata('error', 'User already logged to system');
            redirect('developer/user/login');
             
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
                            'first_name' => '',
                            'last_name'  => '',
                            'email'     => '', 
                            'user_type'  => '', 
                            'image'     => '',
                            'loggedin'  => '',
                         );

        return (bool) $this->session->unset_userdata($array_items);
        
    }
    /*---------------End of log_out()---------------*/
   

    
}// ------------------End developer_model --------------Class{}
//Owner : Madhuranga Senadheera



