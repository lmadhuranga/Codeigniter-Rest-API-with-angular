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
/* File Name     : users_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  users_model extends MY_Model
{
    protected $_table_name      ='tbl_users';
    protected $_primary_key     ='id';
    protected $_order_by        ='desc';
    // protected $_primary_filter  ='';
    protected $_timestamps      =FALSE;    
    // rules
    public $rules = array(
                        array(
                        	'field'=>'username',
                        	'label'=>'Username',
                        	'rules'=>'trim|xss_clean|max_length[255]'
                        ),
						array(
                        	'field'=>'password',
                        	'label'=>'Password',
                        	'rules'=>'trim|xss_clean|max_length[255]'
                        ),
						array(
                        	'field'=>'email',
                        	'label'=>'Email',
                        	'rules'=>'trim|valid_email|xss_clean|max_length[255]'
                        ),
						array(
                        	'field'=>'fullName',
                        	'label'=>'FullName',
                        	'rules'=>'trim|xss_clean|max_length[255]'
                        ),
						array(
                        	'field'=>'phoneNo',
                        	'label'=>'PhoneNo',
                        	'rules'=>'trim|xss_clean|max_length[255]'
                        ),
						array(
                        	'field'=>'phoneNoland',
                        	'label'=>'PhoneNoland',
                        	'rules'=>'trim|xss_clean|max_length[255]'
                        ),
						array(
                        	'field'=>'role',
                        	'label'=>'Role',
                        	'rules'=>'trim|xss_clean|max_length[255]'
                        ),
						array(
                        	'field'=>'area',
                        	'label'=>'Area',
                        	'rules'=>'trim|xss_clean|max_length[255]'
                        ),
						array(
                        	'field'=>'regdate',
                        	'label'=>'Regdate',
                        	'rules'=>'trim|xss_clean|max_length[255]'
                        ),
						array(
                        	'field'=>'type',
                        	'label'=>'Type',
                        	'rules'=>'trim|xss_clean|max_length[255]'
                        ),
						array(
                        	'field'=>'key',
                        	'label'=>'Key',
                        	'rules'=>'trim|xss_clean|max_length[65535]'
                        ),
						array(
                        	'field'=>'timeSatmp',
                        	'label'=>'TimeSatmp',
                        	'rules'=>'trim|xss_clean'
                        ),
						array(
                        	'field'=>'warehouseId',
                        	'label'=>'WarehouseId',
                        	'rules'=>'trim|xss_clean|max_length[200]'
                        ),
						array(
                        	'field'=>'distributorID',
                        	'label'=>'DistributorID',
                        	'rules'=>'trim|xss_clean|max_length[255]'
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
        $users = new stdClass();
        $users->username="";
								$users->password="";
								$users->email="";
								$users->fullName="";
								$users->phoneNo="";
								$users->phoneNoland="";
								$users->role="";
								$users->area="";
								$users->regdate="";
								$users->type="";
								$users->key="";
								$users->timeSatmp="";
								$users->warehouseId="";
								$users->distributorID="";
        return $users;
    }

    
}// ------------------End users_model --------------Class{}
//Owner : Madhuranga Senadheera



