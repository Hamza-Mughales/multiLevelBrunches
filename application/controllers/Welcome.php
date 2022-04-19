<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public $db;
	
    public function __construct()
    {
		parent::__construct();
		$this->db = $this->load->database('default', true);
    }
    
    public function index()
    {

		$data['parent_data'] = $this->db->query("Select * from tb_branches")->result();
         if($_POST){
			 $insert_data=$_POST;
			 $this->db->insert("tb_branches",$insert_data);
		 }		
		$branches = "";
        $branches .= $this->multilevel_menu();

        $data["branches"]= "<ul class='main_ul'>" . $branches . "</ul>";

        $this->load->view('branches',$data);
    }

    public function multilevel_menu($parent_id = null)
    {
        $this->db = $this->load->database('default', true);
        $menu = "";

        if (is_null($parent_id)) {
            $sql = "SELECT * FROM tb_branches WHERE parent_id IS NULL";
        } else {
            $sql = "SELECT * FROM tb_branches WHERE parent_id = $parent_id";
        }

        $result = $this->db->query($sql)->result_array();

        foreach ($result as $i => $row) {
            if ($row["parent_id"]) {
                $menu .= "<li class='sub_li'>" . $row['name'];
            } else {
                $menu .= "<li class='main_li' >" . $row['name'];
            }

            $row_id = $row["id"];
            $sql_b = "SELECT * FROM tb_branches WHERE parent_id = $row_id";
            $count = $result = $this->db->query($sql_b)->result_array();
            if ($count) {
                $menu .= "<ul class='sub_ul'>" . $this->multilevel_menu($row["id"]) . "</ul>";
            } else {
                $menu .= $this->multilevel_menu($row["id"]);
            }

            $menu .= "</li>";
            $i++;
        }

        return $menu;
    }

}
