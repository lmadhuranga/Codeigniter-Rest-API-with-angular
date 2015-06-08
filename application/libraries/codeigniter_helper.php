<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function p($a)
{
    echo '<pre>';
    print_r($a);
    echo '</pre>';

}
function v($a)
{
    echo '<pre>';
    var_dump($a);
    echo '</pre>';

}


function clean_header($array){
    $CI = get_instance();
    $CI->load->helper('inflector');
    foreach($array as $a){
        $arr[] = humanize($a);
    }
    return $arr;
}

/*************************Start Function reduce_word_length()***********************************/
//    Owner                                         : Madhuranga Senadheera
//    Description
//    @ type :
//    #return type :
function reduce_word_length($word,$length=9)
{
    return substr_replace($word,'',0,($length));
}//Function End reduce_word_length()---------------------------------------------------FUNEND()



function emailto($email,$text=null)
{
    if ($text==null) {
        
        return "<a href='mailto:".$email."' alt='".$email."'>".$email."<a/>";
    }
    else
    {
        return "<a href='mailto:".$email."' alt='".$text."'>".$text."<a/>";
    }
}

function linkme($link,$text=null)
{
    if ($text==null) {
        
        return "<a href='".$link."' alt='".$link."'>".$link."<a/>";
    }
    else
    {
        return "<a href='".$link."'  alt='".$text."'>".$text."<a/>";
    }
}


function erro_suclink($link,$text=null)
{
    if ($text==null) {
        
        return "<a href='".$link."' alt='".$link."'>".$link."<a/>";
    }
    else
    {
        return "<a href='".$link."'  alt='".$text."'>".$text."<a/>";
    }
}

/*************************Start Function image_set_value()***********************************/
/**
 * @author         : Madhuranga Senadheera
 * Description   :set value replace by this
 * @ $path       : string
 * @ $default    : string 'default.jpg'
 * #return type  : String  
*/
function image_set_value($path,$default='default.jpg')
{
    $path = trim($path);
    if (empty($path))
    {
        return  $default;
    }
    else 
    {
        return $path;
    } 
}//Function End image_set_value()---------------------------------------------------FUNEND()



/**
 * @author                          Madhuranga Senadheera
 * Purpose of the function          Added sri lanka RS10/=
 * @return_type                     Money formting
 */
function money_formator($value)
{
    return 'Rs '.$value.' /=';
}
/*---------------- ---------End of money_formator()---------------------------*/


 
 /**
  * @author                          Madhuranga Senadheera
  * Purpose of the function          get time from date
  * @date_with_time                  2014-09-09 10:12
  * @return_type                     24hour
  */
function get_time_24($date_with_time)
{ 
    $phpdate = strtotime( $date_with_time );
    return date('H:i', $phpdate );
}
 /*---------------- ---------End of get_time()---------------------------*/
 
 
 /**
  * @author                          Madhuranga Senadheera
  * Purpose of the function          get time form date with am pm
  * @date_with_time                  2014-09-09 10:12
  * @return_type                     12hour
  */
function get_time_12($date_with_time)
{ 
    $phpdate = strtotime( $date_with_time );
    return date('h:i a', $phpdate );
}
 /*---------------- ---------End of get_time()---------------------------*/


/**
 * @author                          Madhuranga Senadheera
 * Purpose of the function          Description
* @date_with_time                  2014-09-09 10:12
 */
function get_date_only($date_with_time)
{
    
}
/*---------------End of get_date_only ()---------------*/


 

/**
 * @author                          Madhuranga Senadheera
 * Purpose of the function          Set status per label
 * @return_type                     return_type
 */
function status_manager($status)
{
    if (is_null($status)||empty($status)) {
        return '<span class="label label-default">none</span class="label">';
    } $status_array = array(
                            'A' => 'Available'
                            );
    switch ($status)
    { 

        case 'A':
            return '<span class="label label-success">'.$status_array[$status].'</span class="label">';
            break;

        default:
            return '<span class="label label-success">'.$status_array[$status].'</span class="label">';
            break;
        /*
         <span class="label label-default">Default</span>
        <span class="label label-primary">Primary</span>
        <span class="label label-success">Success</span>
        <span class="label label-info">Info</span>
        <span class="label label-warning">Warning</span>
        <span class="label label-danger">Danger</span>*/
    }
}
/*---------------- ---------End of status_manager_()---------------------------*/



/**
 * @author                          Madhuranga Senadheera
 * Purpose of the function          get month name when given month id
 * @return_type                     return_type
 */
function get_month_name($id)
{
    $array_month_name = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
    return $array_month_name[($id-1)];
}
/*---------------- ---------End of get_month_name()---------------------------*/


/**
 * @author                          Madhuranga Senadheera
 * Purpose of the function          Send email 
 * @return_type                     return_type
 */
/*public function send_email($to,$subject,$content,$debug_enable=NULL)
{
    $config['protocol'] = 'sendmail';
    $config['mailpath'] = '/usr/sbin/sendmail';
    $config['charset'] = 'iso-8859-1';
    $config['wordwrap'] = TRUE;

    $CI->email->initialize($config);

    $CI->load->library('email');

    $CI->email->from('senadheera@gmail.com', 'Senadheera Taxi');
    $CI->email->to($to); 

    $CI->email->subject($subject);
    $CI->email->message($content);  

    return (bool)$CI->email->send();

    if ($debug_enable!=NULL) {
        echo $CI->email->print_debugger();
    }
    
}*/
/*---------------- ---------End of send_email()---------------------------*/
