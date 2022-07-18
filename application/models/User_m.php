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

}

?>