<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest_model extends CI_Controller {

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
    function api(){
        return $this->db->get("produk")->result();
	}
	
	function hapus($table,$id){
		return $this->db->delete($table,$id);
	}

	function edit($table,$data,$id){
		return $this->db->update($table,$data,$id);
	}

	function tambah($table,$data){
		return $this->db->insert($table,$data);
	}

	function register($table,$data){
		return $this->db->insert($table,$data);
	}
}
