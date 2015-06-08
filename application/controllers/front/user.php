<?php 

class User extends MY_Controller
{
/*********************Construct()******************************/
	function __construct()
    {
    	parent::__construct();
    }

    
    /**
     * @author                          Madhuranga Senadheera
     * Purpose of the function          Description
     * @variable 						: type
     * @return 							return_type 
     */
    public function index()
    {
        $this->data['sub_view']='front/single_page';
        $this->load->view('front/_layout_main', $this->data, FALSE);
    }
    /*---------------End of index()---------------*/


    public function template_index()
    {
        $this->load->view('front/user/template_index');
    }



    public function template_View()
    {
        $this->load->view('front/user/template_view');
    }

    public function template_edit()
    {
        $this->load->view('front/user/template_edit');
    }

    public function template_create()
    {
        $this->load->view('front/user/template_create');
    }




}// End User --------------Class{}
//Owner : Madhuranga Senadheera

 ?>