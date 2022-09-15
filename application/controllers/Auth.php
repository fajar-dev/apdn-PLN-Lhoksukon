<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Model_page');
		
		if($this->session->userdata('status')=="login"){
			?>
			<script>
			window.location="<?php echo base_url(); ?>page/dashboard";
			</script>
			<?php
		}
		
	}

	public function index()
	{
    $data['title'] = 'Login';
		$this->load->view('login', $data);
	}

	function login()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		
		$where = array(
			'username'=>$user,
			'password'=>md5($pass)
		);
		$cek = $this->Model_page->cek_login('user',$where)->num_rows();
		$hasil= $this->Model_page->cek_login('user',$where)->result();

		if($cek > 0 ){
			foreach ($hasil as $data) {
				$sesi = array(
					'id'=>$data->id_petugas,
					'nama'=>$data->nama,
					'level'=>$data->level,
					'status'=>"login",
					'login'=>1
					);
			};
			$this->session->set_userdata($sesi);
			redirect(base_url('page/dashboard'));
		}else{
			$this->session->set_flashdata('msg',
			'<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <h4 class="alert-heading">Gagal !!</h4>
      <p>Username atau Password yang anda masukan salah</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>'
			);
			redirect(base_url('auth'));
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		$this->session->userdata('status')==" ";
		redirect(base_url('auth'));
	} 

}
