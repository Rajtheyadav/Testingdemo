<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    
    function __construct() {
         parent::__construct();

	        $this->load->helper('form');
	        $this->load->library('form_validation');
	        $this->load->model('User_m');
	    }

	    public function searchingGrid(){

	    	$this->load->view('searchingGrid');
	    	
	    }
	    public function adddata(){

	    	    $data['getdata']=$this->User_m->getjoin();

	    	    print_r($data);exit;

	    }
	    
		public function index()
		{
			$this->load->view('index');
		}

		public function gridTable(){
		
			$this->load->view('gridTable');
		}

		public function gridTab(){

			$da = $this->User_m->getdata();
			$data= array();
			foreach($da as $key=>$row){
			     $data[] = array(
                                 'recid' =>$row['id'],                                       
                                 'username' => $row['username'],
                                 'email' => $row['email'] ,
                                 'status' => $row['status']           
                                   );

		   }
           //echo "<pre>";
		  // print_r($data);exit;
		   echo json_encode($data);
		}

		 public function otpVerify(){
		    
		    $this->load->view('otpverify');
		    
		  }
		   public function dashboard(){
		    
		    $this->load->view('thankyou');
		    
		  }
		  public function login_id(){

		  	 $this->load->view('login');

		  }
		  public function otpVerified(){
		    $uid=$this->session->userdata('id');
		  	$otp = $this->input->post('otp');
		  	$status=1;
		  	$data=array('status'=>$status);
		  	$sql="SELECT `password` FROM `users` WHERE `id`='".$uid."'";
		  	$row=$this->db->query($sql)->row();
		  	if($row->password==$otp){
		      $this->db->where('id',$uid);
		  	 $otpVerify=$this->db->update('users',$data);
		  	 if($otpVerify>0){
		       
		       echo 1;
		  	 }else{
		  	 	echo 0;
		  	 }

		  	}
		  	else{
		  		echo 2;
		  	}

		  }

		  public function sign_in()
		      {

		        $email=$this->input->post('email');
		        $pass=md5($this->input->post('password'));
		        $status=1;
		        $login_id=$this->User_m->validation($email,$pass,$status);

		        if($login_id)
		        {
		            $this->session->set_userdata('id',$login_id[0]->id);
		            $this->session->set_userdata('email',$login_id[0]->name);
		             $this->session->set_userdata('username',$login_id[0]->username);
		          
		           // redirect('Register/dashboard');
					echo 1;

		        }
		        else
		        {
		             
		             echo "0";
		        }

		    }

	public function send_email($email,$username,$random){
        
        $m ="Your Registration has been Successfully!";
         //$this->load->library('email');
		/* $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'ritika9999904@gmail.com',
            'smtp_pass' => 'Ritika@12345',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,

        );*/
        $config = Array(
            'protocol' => 'mail',
            'smtp_host' => 'mail.madkunj.in',
            'smtp_port' => 587,
            'smtp_user' => 'inquiry@madkunj.in',
            'smtp_pass' => 'G0;Mf3YG%Ljw',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE,
        );

        $username =$username;
        $email= $email;
        $sub=$username; 
        $form_message= $random;
        
        $msg =".$username ,$form_message.";

	    $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($email); // change it to yours
        $this->email->to('cixohix732@tebyy.com');
        $this->email->cc($email);
        $this->email->subject($sub);
        $this->email->message($msg);
        $this->load->library('email', $config);
        if ($this->email->send())
        {
           echo "send mail";
           show_error($this->email->print_debugger()); 

        } else {
            echo "failed";
            // echo error_message();
             //$this->otpVerify();
             show_error($this->email->print_debugger()); 
            
        }
	}

	public function userRegister(){

      
     $this->form_validation->set_rules('username','Username','required');
     $this->form_validation->set_rules('state','state','required');
     $this->form_validation->set_rules('mobileno','mobileno','required');
     $this->form_validation->set_rules('city','city','required');
     $this->form_validation->set_rules('email','Email Id','required');

    if($this->form_validation->run() == false)
    {
        $this->load->view('index');
    }
    else
    {
        $random = (rand(5,10000));
        $username = $this->input->post('username');
        $state = $this->input->post('state');
        $mobileno = $this->input->post('mobileno');
        $city = $this->input->post('city');
        $email = $this->input->post('email');

        $data = array('username'=>$username,
                      'email'=>$email,
		              'password'=>$random,
		              'mobileno'=>$mobileno,
		              'state'=>$state,
		              'city'=>$city);
        $this->db->insert('users',$data);
        $uid=$this->db->insert_id();
        $value = $this->User_m->addUser($random,$uid);
        $this->send_email($email,$username,$random);
        if($value)
        {
           echo 1;// redirect('Register/otpVerify');
          

        }
        else
        {
           // $this->form_validation->set_message('login', 'password salah');
            //redirect('c_login',$login);
            //return false;
            echo 0; 
        }
      }

	}
}
