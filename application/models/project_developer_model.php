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
/* File Name     : project_developer_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  project_developer_model extends MY_Model
{
    protected $_table_name      ='tbl_project_developer';
    protected $_primary_key     ='id';
    protected $_order_by        ='id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'developer_id',
                                	'label'=>'Developer',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'project_id',
                                	'label'=>'Project',
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
        $project_developer = new stdClass();
        $project_developer->developer_id="";
								$project_developer->project_id="";
        return $project_developer;
    }

    
}// ------------------End project_developer_model --------------Class{}
//Owner : Madhuranga Senadheera



