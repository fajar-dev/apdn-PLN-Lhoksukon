<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
  function __construct(){
		parent::__construct();
		$this->load->model('Model_page');
		
		if($this->session->userdata('status')!= "login"){
			redirect(base_url('auth'));
		}
	}

	public function index(){
    redirect(base_url('page/dashboard'));
	}

	public function dashboard()
	{
    date_default_timezone_set("Asia/Jakarta");
    $jam = date('H:i');
    //atur salam menggunakan IF
    if ($jam > '05:30' && $jam < '10:00') {
        $salam = 'Good Morning,';
    } elseif ($jam >= '10:00' && $jam < '15:00') {
        $salam = 'Good Day,';
    } elseif ($jam >= '15:00' && $jam <= '19:00') {
        $salam = 'Good Afternoon,';
    } else {
        $salam = 'Good Night,';
    } 
    $data['title'] = 'Dashboard';
    $data['desk'] = $salam.' Have a nice day';
    $data['distrik'] =  $this->Model_page->stat0('afdeling');
    $data['kertas'] =  $this->Model_page->stat1('sampah')->row();
    $data['plastik'] =  $this->Model_page->stat2('sampah')->row();
    $data['total'] =  $this->Model_page->stat3('sampah')->row();
		$data['kaleng'] =  $this->Model_page->stat4('sampah')->row();
    $data['sidebar']= $this->Model_page->tampil('afdeling')->result();
    $data['hasil'] =  $this->Model_page->sum()->result();
		$this->load->view('include/header', $data);
    $this->load->view('dashboard');
		$this->load->view('include/footer');
	}

  public function pencatatan(){
    $data['title'] = 'Pencatatan';
    $data['desk'] = 'Pencatatan data Meteran.';
		$this->load->view('include/header', $data);
    $this->load->view('pencatatan');
		$this->load->view('include/footer');
	}

  public function tambah(){
		$config['upload_path']        = './file';
		$config['allowed_types']       = 'img|png|jpeg|gif|jpg';
		$config['encrypt_name']        = true;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto_awal')) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Gagal!! pastikan ekstensi gambar berupa gif, jpg atau png.</div>');
			redirect(base_url('page/pencatatan'));
		} else {
			$fileData = $this->upload->data();
			 $hasil['foto_awal'] = $fileData['file_name'];
		}
	 
		if (!$this->upload->do_upload('foto_akhir')) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Gagal!! pastikan ekstensi gambar berupa gif, jpg atau png.</div>');
			redirect(base_url('page/pencatatan'));
		} else {
			$fileData = $this->upload->data();
			 $hasil['foto_akhir'] = $fileData['file_name'];
		}
		// print_r($_FILES);die;
		$data = array(
			'id_pel' => $this->input->post('id_pel'),
			'tanggal' => $this->input->post('tanggal'),
			'meter_awal' => $this->input->post('meter_awal'),
			'meter_akhir' => $this->input->post('meter_akhir'),
			'stan_awal' => $this->input->post('stan_awal'),
			'stan_akhir' => $this->input->post('stan_akhir'),
			'daya_awal' => $this->input->post('daya_awal'),
			'daya_akhir' => $this->input->post('daya_akhir'),
			'foto_awal' => $hasil['foto_awal'],
			'foto_akhir' => $hasil['foto_akhir'],
			'log_petugas' => $this->session->userdata('nama')
		);
		$this->db->insert('meteran', $data);
		$this->session->set_flashdata('msg','tambah');
		redirect(base_url('page/pencatatan'));
  }                       

  public function laporan(){
    $data['title'] = 'Laporan';
    $data['desk'] = 'Laporan sampah afdeling';
    $data['hasil'] = $this->Model_page->tampil('meteran')->result();
		$this->load->view('include/header', $data);
    $this->load->view('laporan');
		$this->load->view('include/footer');
	}

  function hapus($id){
		$where = array('id'=>$id);
		$this->Model_page->hapus('meteran',$where);
    $this->session->set_flashdata('msg','hapus');
		redirect(base_url('page/laporan'));
	}

  public function rekap()
	{
    $data['title'] = 'Laporan Hasil';
    $data['desk'] = 'Laporan hasil data bank sampah.';
    $data['sidebar']= $this->Model_page->tampil('afdeling')->result();
    $data['hasil'] =  $this->Model_page->sum()->result();
    $data['total'] =  $this->Model_page->stat3('sampah')->row();
		if(isset($_POST['submit'])){
			$data ['dari'] = $_POST['dari']; 
			$data ['sampai'] = $_POST['sampai'];
			$data['harian'] =  $this->Model_page->harian('sampah', $data['dari'], $data['sampai'])->result();
		}
		$this->load->view('include/header', $data);
    $this->load->view('rekap');
		$this->load->view('include/footer');
	}

  public function user(){
    if($this->session->userdata('level')!= 2){
			redirect(base_url('page/dashboard'));
		}
    $data['title'] = 'User';
    $data['desk'] = 'Data User aplikasi.';
    $data['sidebar']= $this->Model_page->tampil('afdeling')->result();
    $data['hasil']= $this->Model_page->tampil('user')->result();
		$this->load->view('include/header', $data);
    $this->load->view('user');
		$this->load->view('include/footer');
	}
  public function tambah_user(){
    if($this->session->userdata('level')!= 2){
			redirect(base_url('page/dashboard'));
		}
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$alamat = $_POST['alamat'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$level = $_POST['level'];
		$data = array(
			'nama'=>$nama,
			'jk'=>$jk,
			'alamat'=>$alamat,
			'username'=>$username,
			'password'=>md5($password),
			'level'=>$level,
			);
		$this->Model_page->tambah('user',$data);
    $this->session->set_flashdata('msg','tambah');
		redirect(base_url('page/user'));
	}

  public function edit_user(){
    if($this->session->userdata('level')!= 2){
			redirect(base_url('page/dashboard'));
		}
    $where = array('id' => $_POST['id']);
    $cek = $this->Model_page->get('user', $_POST['id'])->row();
    if($_POST['password'] == ''){
      $password = $cek->password;
    }else{
      $password = md5($_POST['password']);
    };
    $nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$alamat = $_POST['alamat'];
		$username = $_POST['username'];
		$level = $_POST['level'];
		$data = array(
      'nama'=>$nama,
			'jk'=>$jk,
			'alamat'=>$alamat,
			'username'=>$username,
			'password'=>$password,
			'level'=>$level,
		);
		$this->db->update('user',$data,$where);
    $this->session->set_flashdata('msg','edit');
		redirect(base_url('page/user'));
	}

  function hapus_user($id){
    if($this->session->userdata('level')!= 2){
			redirect(base_url('page/dashboard'));
		}
		$where = array('id'=>$id);
		$this->Model_page->hapus('user',$where);
    $this->session->set_flashdata('msg','hapus');
		redirect(base_url('page/user'));
	}



}
