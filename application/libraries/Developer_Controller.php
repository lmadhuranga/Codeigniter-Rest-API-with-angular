<?php

/**
*
*
* @copyright  2014
* @license    None
* @version    1.0
* @link       None
* @since      Class available since Release 1.0
*
**/		
		
/***********************************************************************************/
/*                                                                                 */
/* File Name     : Developer_Controller.php                              */
/* Purpose       : 													           */
/*                 												                   */
/*                                                                                 */
/***********************************************************************************/

class Developer_Controller extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->data['meta_title'] = $this->data['site_name']." - Developer";

        $this->load->model('developer_model');
        
        // Login check
        $exception_uris = array(
            'developer/user/login', 
            'developer/user/logout',
            'developer/user/forget_password'
        );
        

        if (in_array(uri_string(), $exception_uris) == false) 
        {
            // is logged user
            if (($this->developer_model->is_logged() == false))
            {
                // redicret to login page
                redirect('developer/user/login');
            }
            else
            {
                // redirect to developer
                if (($this->developer_model->get_user_type() != 'D'))
                {
                    // redirect developer dashboard
                    redirect('developer/dashboard');
                }

                // set user id
                $this->data['current_user_id'] = $this->developer_model->get_current_user_id();
            }
        }  
 
	}

	/**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     */
    public function index()
    {
        
    }


    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * 
     */
    public function load_view($layout,$data)
    {
     // $this->load->view('admin/main', $data, FALSE);
    	
        $this->load->view($layout, $data);

        
    }
    /*---------------- ---------End of load_view()---------------------------*/
    
}
/* End of file Admin_Controller.php */
/* Location: ./application/controllers/Developer_Controller.php */