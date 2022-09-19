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
		$data['hasil'] = $this->db->order_by('tanggal', 'DESC')->get('meteran', 10)->result();
		$data['login'] = $this->db->order_by('date', 'DESC')->get('log', 4)->result();
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
    $data['desk'] = 'Laporan data meteran';
    $data['hasil'] = $this->Model_page->tampil('meteran')->result();
		$this->load->view('include/header', $data);
    $this->load->view('laporan');
		$this->load->view('include/footer');
	}
	public function CSV(){ 
    // // file name 
    $filename = 'Laporan.csv'; 
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: application/csv; ");
    
    $this->db->select("id_pel, meter_awal, meter_akhir, stan_awal, stan_akhir, daya_awal, daya_akhir, tanggal");
    $this->db->from("Meteran");
    $this->db->order_by("tanggal", "ASC");
    $query = $this->db->get();
    $usersData = $query->result_array();
    $file = fopen('php://output', 'w');

    $header = array("ID Pelanggan","No Meter Awal", "No Meter Akhir", "Stan Awal", "Stan Akhir", "Daya Awal", "Daya Akhir", "Tanggal"); 
    fputcsv($file, $header);
    foreach ($usersData as $key=>$line){ 
        fputcsv($file, $line); 
    }
    fclose($file); 
    exit; 
  }

	public function edit_laporan(){
    $where = array('id' => $_POST['id']);
		$data = array(
      'id_pel'=>$_POST['id_pel'],
			'meter_awal'=>$_POST['meter_awal'],
			'meter_akhir'=>$_POST['meter_akhir'],
			'stan_awal'=>$_POST['stan_awal'],
			'stan_akhir'=>$_POST['stan_akhir'],
			'daya_awal'=>$_POST['daya_awal'],
			'daya_akhir'=>$_POST['daya_akhir'],
		);
		$this->db->update('meteran',$data,$where);
    $this->session->set_flashdata('msg','edit');
		redirect(base_url('page/laporan'));
	}

  function hapus($id){
		$where = array('id'=>$id);
		$this->Model_page->hapus('meteran',$where);
    $this->session->set_flashdata('msg','hapus');
		redirect(base_url('page/laporan'));
	}

  public function rekap()
	{
    $data['title'] = 'Rekap Laporan';
    $data['desk'] = 'Rekap Data Laporan Meteran.';
    $data['sidebar']= $this->Model_page->tampil('afdeling')->result();
    $data['hasil'] =  $this->Model_page->sum()->result();
    $data['total'] =  $this->Model_page->stat3('sampah')->row();
		if(isset($_POST['submit'])){
			$data ['dari'] = $_POST['dari']; 
			$data ['sampai'] = $_POST['sampai'];
			$data['harian'] =  $this->Model_page->harian('meteran', $data['dari'], $data['sampai'])->result();
			// print_r($data);die;
		}
		$this->load->view('include/header', $data);
    $this->load->view('rekap');
		$this->load->view('include/footer');
	}

	public function CSV_rekap($dari, $sampai){ 
    // // file name 
    $filename = 'Laporan '.$dari.' - '.$sampai.'.csv'; 
    header("Content-Description: File Transfer"); 
    header("Content-Disposition: attachment; filename=$filename"); 
    header("Content-Type: application/csv; ");
    
    $this->db->select("id_pel, meter_awal, meter_akhir, stan_awal, stan_akhir, daya_awal, daya_akhir, tanggal");
    $this->db->from("Meteran");
		$arr = array('tanggal >=' => $dari, 'tanggal <=' => $sampai);
		$this->db->where($arr);
    $this->db->order_by("tanggal", "ASC");
    $query = $this->db->get();
    $usersData = $query->result_array();
    $file = fopen('php://output', 'w');

    $header = array("ID Pelanggan","No Meter Awal", "No Meter Akhir", "Stan Awal", "Stan Akhir", "Daya Awal", "Daya Akhir", "Tanggal"); 
    fputcsv($file, $header);
    foreach ($usersData as $key=>$line){ 
        fputcsv($file, $line); 
    }
    fclose($file); 
    exit; 
  }

  public function user(){
    $data['title'] = 'User';
    $data['desk'] = 'Data User aplikasi.';
    $data['sidebar']= $this->Model_page->tampil('afdeling')->result();
    $data['hasil']= $this->Model_page->tampil('user')->result();
		$this->load->view('include/header', $data);
    $this->load->view('user');
		$this->load->view('include/footer');
	}
  public function tambah_user(){
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
		$where = array('id'=>$id);
		$this->Model_page->hapus('user',$where);
    $this->session->set_flashdata('msg','hapus');
		redirect(base_url('page/user'));
	}



}
