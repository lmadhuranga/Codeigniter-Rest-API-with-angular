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
/* File Name     : client_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  client_model extends MY_Model
{
    protected $_table_name      ='tbl_client';
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

    /*********************Construct()****************************/
    function __construct()
    {
        parent::__construct();
    }

    function count(){
        return $this->db->count_all($this->_table_name);
    }

    public function get_new(){
        $client = new stdClass();
        $client->first_name="";
								$client->last_name="";
								$client->password="";
								$client->male="";
								$client->email="";
        return $client;
    }

    
}// ------------------End client_model --------------Class{}
//Owner : Madhuranga Senadheera



