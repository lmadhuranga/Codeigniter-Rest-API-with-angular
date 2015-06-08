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
/* File Name     : comment_model.php                                               */
/* Purpose       :                                                                 */
/*                                                                                 */
/*                                                                                 */
/***********************************************************************************/
class  comment_model extends MY_Model
{
    protected $_table_name      ='tbl_comment';
    protected $_primary_key     ='id';
    protected $_order_by        ='id';
    // protected $_primary_filter  ='';
    protected $_timestamps      =TRUE;    
    // rules
    public $rules = array(
                    array(
                                	'field'=>'user_id',
                                	'label'=>'User',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'doucment_id',
                                	'label'=>'Doucment',
                                	'rules'=>'required|trim|integer|xss_clean|max_length[11]'
                                ),
								array(
                                	'field'=>'comment',
                                	'label'=>'Comment',
                                	'rules'=>'required|trim|xss_clean|max_length[65535]'
                                ),
								array(
                                	'field'=>'user_type',
                                	'label'=>'User type',
                                	'rules'=>'trim|xss_clean|max_length[1]'
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
        $comment = new stdClass();
        $comment->user_id="";
								$comment->doucment_id="";
								$comment->comment="";
								$comment->user_type="";
        return $comment;
    }

    
}// ------------------End comment_model --------------Class{}
//Owner : Madhuranga Senadheera



