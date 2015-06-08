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
/* File Name     : Driver_Controller.php                              */
/* Purpose       : 													           */
/*                 												                   */
/*                                                                                 */
/***********************************************************************************/

class Driver_Controller extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
 
		$this->data['meta_title'] = $this->data['site_name']." - Driver";

		$this->load->model('driver_model');
        
        // Login check
        $exception_uris = array(
            'driver/user/ajax_driver_login', 
            'driver/user/login', 
            'driver/user/logout',
            'driver/user/forget_password',
            
        ); 
        
        if (in_array(uri_string(), $exception_uris) == false)
        {
            // is logged user
            if (($this->driver_model->is_logged() == false))
            { 
                // redicret to login page
                redirect('driver/user/login');
            }
            else
            {
                
                // redirect to driver
                if (($this->driver_model->get_user_type() != 'driver'))
                {
                    // redirect driver dashboard
                    redirect(site_url());
                } 
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
    

}
/* End of file Driver_Controller.php */
/* Location: ./application/driver/controllers/Driver_Controller.php */