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
/* File Name     : document_type_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  document_type_model extends MY_Model
{
    protected $_table_name      ='tbl_document_type';
    protected $_primary_key     ='id';
    protected $_order_by        ='id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'type',
                                	'label'=>'Type',
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
        $document_type = new stdClass();
        $document_type->type="";
        return $document_type;
    }

    
}// ------------------End document_type_model --------------Class{}
//Owner : Madhuranga Senadheera



