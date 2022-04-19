<?php
class B_model extends CI_Model
{
	function __construct(){
		parent::__construct();
	}

	
	function multilevel_menu($parent_id=NULL)
{
    
    $menu = "";

    if(is_null($parent_id)){
        $sql = "SELECT * FROM dynamic_menu WHERE parent_id IS NULL";
    }else{
        $sql = "SELECT * FROM dynamic_menu WHERE parent_id = $parent_id";
    }
    
    $result = $this->db->query($sql)->result_array();
        while($result[$i]) {
        	if($row["parent_id"]){
                $menu .= "<li class='sub_li'>".$row['name'];
            }else{
        		$menu .= "<li class='main_li' >".$row['name'];
        	}
            
            
            $row_id = $row["id"];
            $sql_b = "SELECT * FROM dynamic_menu WHERE parent_id = $row_id";
            $count =$result = $this->db->query($sql_b)->result_array();            
            if($count){
                $menu .= "<ul class='sub_ul'>".$this->multilevel_menu( $row["id"])."</ul>";
            }else{
                $menu .= $this->multilevel_menu( $row["id"]);
            }
            
			$menu .= "</li>";
			$i++;
        }
    
    return $menu;
}
} 




