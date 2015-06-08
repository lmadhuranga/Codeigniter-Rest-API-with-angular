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
/* File Name     : document_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  document_model extends MY_Model
{
    protected $_table_name      ='tbl_document';
    protected $_primary_key     ='id';
    protected $_order_by        ='id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'project_id',
                                	'label'=>'Project',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'user_id',
                                	'label'=>'User id',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'doc_type_id',
                                	'label'=>'Doc type',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'document_name',
                                	'label'=>'Document name',
                                	'rules'=>'trim|xss_clean|max_length[200]'
                                ),
								array(
                                	'field'=>'other_url',
                                	'label'=>'Other url',
                                	'rules'=>'trim|xss_clean|max_length[65535]'
                                ),
								array(
                                	'field'=>'preview_url',
                                	'label'=>'Preview url',
                                	'rules'=>'trim|xss_clean|max_length[65535]'
                                ),
								array(
                                	'field'=>'preview_image',
                                	'label'=>'Preview image',
                                	'rules'=>'trim|xss_clean|max_length[200]'
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
        $document = new stdClass();
        $document->project_id="";
								$document->user_id="";
								$document->doc_type_id="";
								$document->document_name="";
								$document->other_url="";
								$document->preview_url="";
								$document->preview_image="";
        return $document;
    }

    
}// ------------------End document_model --------------Class{}
//Owner : Madhuranga Senadheera



