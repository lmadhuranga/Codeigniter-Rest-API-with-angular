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
/* File Name     : project_client_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  project_client_model extends MY_Model
{
    protected $_table_name      ='tbl_project_client';
    protected $_primary_key     ='id';
    protected $_order_by        ='id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'client_id',
                                	'label'=>'Client',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'project_id',
                                	'label'=>'Project id',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
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
        $project_client = new stdClass();
        $project_client->client_id="";
								$project_client->project_id="";
        return $project_client;
    }

    
}// ------------------End project_client_model --------------Class{}
//Owner : Madhuranga Senadheera



