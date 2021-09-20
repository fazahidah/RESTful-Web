<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct(){
        parent::__construct();
        // $this->load->database();
        $this->load->model('rest_model');
    }

	public function index()
	{
		$this->load->view('login_view');
	}

	function rest_api()
	{
		$api = $this->rest_model->api();
		echo json_encode($api);
    }

    function register()
	{
		$p = $this->input->post();
		$table = "user";
		$data = [
			'nama' => $p['nama'],
			'username' => $p['username'],
			'email' => $p['email'],
			'password' => md5($p['password'])
        ];
        if($p['password'] != $p['confirm']){
            echo "<script> alert('konfirmasi lagi ya'); </script>";
            redirect("auth");
        }
		$this->rest_model->register($table,$data);
		redirect("auth");
    }
    
    function login()
    {
        $p = $this->input->post();
        $auth = $this->db->select('username,password,nama')->from('user')->where('username',$p['username'])->get();
        $authResult =$auth->result();
        $countAuth = $auth->num_rows();
        if ($countAuth > 0) {
            $password = md5($p['password']) == $authResult[0]->password;
            if ($password) {
                $_SESSION["username"] = $authResult[0]->username;
                $_SESSION["nama"] = $authResult[0]->nama;
                redirect("restful");
            }
            else {
                setcookie("alert","Password Salah !", time() + (15),"/");
                redirect("auth");
            }
        }
        else {
            setcookie("alert","Username Tidak Ditemukan", time() + (15),"/");
            redirect("auth");
        }
    }
}
