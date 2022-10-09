<?php 

class User_m extends CI_model
{
	
	public function addUser($random,$uid){

		 $data = array('uid'=>$uid,
                      'otp'=>$random);
		$add =$this->db->insert('otp',$data);
		if($add){
			return $add;
		}else{
			return null;
		}
	}

     public function getdata()  
      {  
         //data is retrive from this query  
         $query = $this->db->get('users');  
         return $query->result_array();  
      }


    public function validation($email,$pass)
    {
    
    $query=$this->db->query("SELECT * FROM `users` WHERE `email`='$email' AND `	password`='$pass'");
           /* ->from('users')
            ->where('email',$email)
            ->where('password',$password)
            ->where('status',$status)
            ->get();*/
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return null;
        }
    }

    public function getjoin(){
        //echo $sql = $this->db->get_compiled_select('users');
          $id=2; 
          $this->db->select('us.*,ot.*');
          $this->db->from('users as us');
          $this->db->join('otp as ot','ot.uid=us.id','inner outer');
          $this->db->where('us.id',$id);
          $this->db->order_by('us.id','desc');
          $query=$this->db->get();

          if($query->num_rows()>0){

            return $query->result_array();

         }

    }

}

?>