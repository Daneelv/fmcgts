<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class helper{
	
	var $CI = '';
	



   public function get_enum_values( $table, $field )
{
	
	 
    
	$CI =& get_instance();

    $type = $CI->db->query( "SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'" )->row( 0 )->Type;
    preg_match('/^enum\((.*)\)$/', $type, $matches);
    foreach( explode(',', $matches[1]) as $value )
    {
         $enum[trim( $value, "'" )] = ucwords(trim( $value, "'" ));
    }
    return $enum;
}


public function get_logo_src($id)
{
    $CI =& get_instance();
    
    $src = $CI->db->query("SELECT * FROM company WHERE id = $id LIMIT 1")->row();
    
    return $src;
    
}

}
