 <?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Crud extends CI_Controller {  
      //functions  
      function index(){  
           $data["title"] = "Codeigniter Ajax CRUD with Data Tables";  
           $this->load->model("Crud_model");  
           $data['getdata']=$this->Crud_model->getname();
           $this->load->view('crud_view', $data);  
      }  
      function fetch_user(){  
           $this->load->model("Crud_model"); 
           $status=$this->input->post('status'); 
            //$this->Crud_model->make_query($status); 
           $fetch_data = $this->Crud_model->make_datatables($status);  
           //echo $this->db->last_query();
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array(); 
               $sub_array[] = '<input type="checkbox" name="update" id="'.$row->id.'">';   
                $sub_array[] = $row->username;  
                $sub_array[] = $row->email;  
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs">Update</button>';  
                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw" =>intval($_POST["draw"]),  
                "recordsTotal" =>$this->Crud_model->get_all_data($status),  
                "recordsFiltered"=>$this->Crud_model->get_filtered_data($status),  
                "data" =>$data  
           );  
           echo json_encode($output);  
      }  
 } 