<?php
/**
*
*
* @copyright  2014
* @license    None
* @version    1.0
* @link       None 
*
**/     
        
/***********************************************************************************/
/*                                                                                 */
/* File Name     : Option_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  Option_model extends MY_Model
{
    protected $_table_name      ='tbl_option';
    protected $_primary_key     ='id';
    protected $_order_by        ='id';
    protected $_primary_filter  ='intval';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                        array(
                            	'field'=>'option_name',
                            	'label'=>'Option name',
                            	'rules'=>'trim|xss_clean|max_length[65535]'
                            ),
							array(
                            	'field'=>'variable_name',
                            	'label'=>'Variable name',
                            	'rules'=>'trim|xss_clean|max_length[65535]'
                            ),
							array(
                            	'field'=>'option_value',
                            	'label'=>'Option value',
                            	'rules'=>'trim|xss_clean|max_length[65535]'
                            ),
							array(
                            	'field'=>'scale',
                            	'label'=>'Scale',
                            	'rules'=>'trim|xss_clean|max_length[100]'
                            ),
							array(
                            	'field'=>'option_type',
                            	'label'=>'Option type',
                            	'rules'=>'trim|xss_clean|max_length[100]'
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

 
    
}// ------------------End User_M --------------Class{}
//Owner : Madhuranga Senadheera



