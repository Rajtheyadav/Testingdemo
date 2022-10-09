<?php  
 class Crud_model  extends CI_Model  
 {  
      var $table = "users";  
      var $select_column = array("id", "username", "email", "mobileno");  
      var $order_column = array(null, "username", "email", null, null);  
      function make_query($status)  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table); 
           $this->db->where("status",$status); 
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("email", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           }  
      }  
      function make_datatables($status){  
           $this->make_query($status);  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->where("status",$status)->get();  
           return $query->result();  
      }  
      function get_filtered_data($status){  
           $this->make_query($status);  
           $query = $this->db->where("status",$status)->get();  
           return $query->num_rows();  
      }       
      function get_all_data($status)  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);
           $this->db->where("status",$status);  
           return $this->db->count_all_results();  
      }  
      function getname(){
          $this->db->select("*");
          $this->db->from($this->table);
          $res=$this->db->get();
          return $res->result();
      }
 }  