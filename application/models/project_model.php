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
/* File Name     : project_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  project_model extends MY_Model
{
    protected $_table_name      ='tbl_project';
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
                                	'field'=>'project_name',
                                	'label'=>'Project name',
                                	'rules'=>'required|trim|xss_clean|max_length[45]'
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
        $project = new stdClass();
        $project->developer_id="";
								$project->project_name="";
        return $project;
    }

    
}// ------------------End project_model --------------Class{}
//Owner : Madhuranga Senadheera



