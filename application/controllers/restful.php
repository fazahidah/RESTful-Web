<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restful extends CI_Controller {

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
		$this->load->view('restful_view');
	}

	function rest_api()
	{
		$api = $this->rest_model->api();
		echo json_encode($api);

	}

	function hapus($id_produk)
	{
		$table = 'produk';
		$id = [
			'id_produk' => $id_produk
		];
		$this->rest_model->hapus($table,$id);
		redirect("restful");
	}

	function edit()
	{
		$p = $this->input->post();
		$table = "produk";
		$data = [
			'stok' => $p['editStok'],
			'harga' => $p['editHarga']
		];
		$id = ['id_produk'=>$p['idProduk']];
		$this->rest_model->edit($table,$data,$id);
		redirect("restful");
	}

	function tambah(){
		$p = $this->input->post();
		$table = "produk";
		$data = [
			'nama' => $p['tambahNama'],
			'stok' => $p['tambahStok'],
			'harga' => $p['tambahHarga']
		];
		$this->rest_model->tambah($table,$data);
		redirect("restful");
	}
}
