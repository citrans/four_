<?php
class login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('model_app');
    }

    function index(){
        $data=array(
            'title'=>'Login Page'
        );
        $this->load->view('pages/v_login',$data);
    }

    function cek_login() {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //query the database
        $result = $this->model_app->login($username, $password);
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                //create the session
                $sess_array = array(
                    'ID' => $row->id_admin,
                    'USERNAME' => $row->username,
                    'PASS'=>$row->password,
                    'LEVEL' => $row->level,
					'TELP'=>$row->no_telp,
                    'login_status'=>true,
                );
                //set session with value from database
                $this->session->set_userdata($sess_array);
               // echo "benar";
                redirect('Dashboard','refresh');
            }
            return TRUE;
        } else {
            //if form validate false
            $this->session->set_flashdata('notif', 'password atau username salah');
            redirect('login','refresh');
			//echo "salah";
            return FALSE;
        }
    }

    function logout() {
        $this->session->unset_userdata('ID');
        $this->session->unset_userdata('USERNAME');
        $this->session->unset_userdata('PASS');
        $this->session->unset_userdata('NAME');
        $this->session->unset_userdata('LEVEL');
		$this->session->unset_userdata('TELP');
        $this->session->unset_userdata('login_status');
        $this->session->set_flashdata('notif','THANK YOU FOR LOGIN IN THIS APP');
        redirect('login');
    }
}
