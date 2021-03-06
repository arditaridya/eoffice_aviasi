<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pencarian extends CI_Controller {
	
	 public function __construct() {
        parent::__construct();
        session_start();

        if ($this->session->userdata('level') == null or $this->session->userdata('level') == '3') {
            $this->session->set_flashdata('session_expired', TRUE);
            redirect('login');
        }
		
		$this->load->model('m_permasalahan');
		//$this->load->model('m_senjata_tni_al');
		

    }
	
	
	public function index(){
		
		if(empty($_POST['SIMAK'])){
			$da1 = "";
			$whe1 = "";
		}else{
			$da1 = $_POST['SIMAK'];
			$whe1 = "and a.SIMAK like '%".$da1."%' ";
		}
		
		if(empty($_POST['status_tanah'])){
			$da2 = "";
			$whe2 = "";
		}else{
			$da2 = $_POST['status_tanah'];
			$whe2 = "and a.status_tanah = '".$da2."' ";
		}
		
		if(empty($_POST['tahun_perolehan'])){
			$da3 = "";
			$whe3 = "";
		}else{
			$da3 = $_POST['tahun_perolehan'];
			$whe3 = "and a.tahun_perolehan = '".$da3."' ";
		}
		
		if(empty($_POST['provinsi']) || $_POST['provinsi'] == 0){
			$da4 = "";
			$dkab = 0;
			$whe4 = "";
		}else{
			$da4 = $_POST['provinsi'];
			$dkab = $_POST['provinsi'];
			$whe4 = "and a.provinsi = '".$da4."' ";
		}
		//echo "and a.status_tanah = '".$da2."' ";die();
		//echo $whe1."zzz";die();
		$querykab = $this->db->query("SELECT 
					*
				FROM 
					kabupaten
				WHERE 
					provinsi ='".$dkab."'
					
					")->result();
		$data['kabupaten'] = $querykab;
		
		if(empty($_POST['kabupaten']) || $_POST['provinsi'] == 0){
			$da5 = "";
			$whe5 = "";
		}else{
			$da5 = $_POST['kabupaten'];
			$whe5 = "and a.kabupaten = '".$da5."' ";
		}
		if(empty($_POST['kotama']) || $_POST['kotama'] == 0){
			$da6 = 0;
			
		}else{
			$da6 = $_POST['kotama'];
			
		}
		
		$data['vi1'] = $da1;
		$data['vi2'] = $da2;
		$data['vi3'] = $da3;
		$data['vi4'] = $da4;
		$data['vi5'] = $da5;
		$data['vi6'] = $da6;
		//echo $da1."asasa";die();		
		//$query3 = $this->db->query("select a.*,c.simak,c.lokasi from detil_pemanfaatan a,pemanfaatan b,data_aset c where b.lanud='".$lanud_id."' and b.simak=c.simak and a.t_pemanfaatan=b.id order by b.id desc")->result();
		//$query3 = $this->db->query("select * from data_aset where id='1000'")->result();
		//$data['datanya']=$query3;
		$data['title']="Pencarian";
		$querykot = $this->db->query("SELECT 
					*
				FROM 
					kotama
					
					")->result();
		$data['kotama'] = $querykot;
		
		$query = $this->db->query("SELECT 
					*
				FROM 
					provinsi
					
					")->result();
		$data['provinsi'] = $query;
		
		$querysa = $this->db->query("SELECT 
					*
				FROM 
					status_tanah
					
					")->result();
		$data['status_tanah'] = $querysa;
		
		$query2 = $this->db->query("SELECT 
					count(a.id) as jumdenma
				FROM 
					data_aset a,
					dasar_perolehan b,
					m_lanud c,
					kotama d
				WHERE 
					a.dasar_perolehan = b.id and
					a.lanud = c.id and
					c.kotama = d.id and
					c.kotama = '1'
					$whe1
					$whe2
					$whe3
					$whe4
					$whe5
					")->result();
					
		foreach ($query2 as $ruk)
				{
				$jumdenma = $ruk->jumdenma;
				}
		$data['jumdenma'] = $jumdenma;
		
		$query21 = $this->db->query("SELECT 
					a.*,b.*,b.dasar_perolehan as daper,c.*,d.*
				FROM 
					data_aset a,
					dasar_perolehan b,
					m_lanud c,
					kotama d
				WHERE 
					a.dasar_perolehan = b.id and
					a.lanud = c.id and
					c.kotama = d.id and
					c.kotama = '1'
					$whe1
					$whe2
					$whe3
					$whe4
					$whe5
					")->result();
		$data['datadenma'] = $query21;
		
		$query3 = $this->db->query("SELECT 
					count(a.id) as jumseskoau
				FROM 
					data_aset a,
					dasar_perolehan b,
					m_lanud c,
					kotama d
				WHERE 
					a.dasar_perolehan = b.id and
					a.lanud = c.id and
					c.kotama = d.id and
					c.kotama = '2'
					$whe1
					$whe2
					$whe3
					$whe4
					$whe5
					")->result();
					
		foreach ($query3 as $ruk)
				{
				$jumseskoau = $ruk->jumseskoau;
				}
		$data['jumseskoau'] = $jumseskoau;
		$query31 = $this->db->query("SELECT 
					a.*,b.*,b.dasar_perolehan as daper,c.*,d.*
				FROM 
					data_aset a,
					dasar_perolehan b,
					m_lanud c,
					kotama d
				WHERE 
					a.dasar_perolehan = b.id and
					a.lanud = c.id and
					c.kotama = d.id and
					c.kotama = '2'
					$whe1
					$whe2
					$whe3
					$whe4
					$whe5
					")->result();
		$data['dataseskoau'] = $query31;
		
		$query4 = $this->db->query("SELECT 
					count(a.id) as jumaau
				FROM 
					data_aset a,
					dasar_perolehan b,
					m_lanud c,
					kotama d
				WHERE 
					a.dasar_perolehan = b.id and
					a.lanud = c.id and
					c.kotama = d.id and
					c.kotama = '3'
					$whe1
					$whe2
					$whe3
					$whe4
					$whe5
					")->result();
					
		foreach ($query4 as $ruk)
				{
				$jumaau = $ruk->jumaau;
				}
		$data['jumaau'] = $jumaau;
		
		$query41 = $this->db->query("SELECT 
					a.*,b.*,b.dasar_perolehan as daper,c.*,d.*
				FROM 
					data_aset a,
					dasar_perolehan b,
					m_lanud c,
					kotama d
				WHERE 
					a.dasar_perolehan = b.id and
					a.lanud = c.id and
					c.kotama = d.id and
					c.kotama = '3'
					$whe1
					$whe2
					$whe3
					$whe4
					$whe5
					")->result();
		$data['dataaau'] = $query41;
		
		$query5 = $this->db->query("SELECT 
					count(a.id) as jumkodikau
				FROM 
					data_aset a,
					dasar_perolehan b,
					m_lanud c,
					kotama d
				WHERE 
					a.dasar_perolehan = b.id and
					a.lanud = c.id and
					c.kotama = d.id and
					c.kotama = '4'
					$whe1
					$whe2
					$whe3
					$whe4
					$whe5
					")->result();
					
		foreach ($query5 as $ruk)
				{
				$jumkodikau = $ruk->jumkodikau;
				}
		$data['jumkodikau'] = $jumkodikau;
		$query51 = $this->db->query("SELECT 
					a.*,b.*,b.dasar_perolehan as daper,c.*,d.*
				FROM 
					data_aset a,
					dasar_perolehan b,
					m_lanud c,
					kotama d
				WHERE 
					a.dasar_perolehan = b.id and
					a.lanud = c.id and
					c.kotama = d.id and
					c.kotama = '4'
					$whe1
					$whe2
					$whe3
					$whe4
					$whe5
					")->result();
		$data['datakodikau'] = $query51;
		
		$query6 = $this->db->query("SELECT 
					count(a.id) as jumkoopsa
				FROM 
					data_aset a,
					dasar_perolehan b,
					m_lanud c,
					kotama d
				WHERE 
					a.dasar_perolehan = b.id and
					a.lanud = c.id and
					c.kotama = d.id and
					c.kotama = '5'
					$whe1
					$whe2
					$whe3
					$whe4
					$whe5
					")->result();
					
		foreach ($query6 as $ruk)
				{
				$jumkoopsa = $ruk->jumkoopsa;
				}
		$data['jumkoopsa'] = $jumkoopsa;
		$query61 = $this->db->query("SELECT 
					a.*,b.*,b.dasar_perolehan as daper,c.*,d.*
				FROM 
					data_aset a,
					dasar_perolehan b,
					m_lanud c,
					kotama d
				WHERE 
					a.dasar_perolehan = b.id and
					a.lanud = c.id and
					c.kotama = d.id and
					c.kotama = '5'
					$whe1
					$whe2
					$whe3
					$whe4
					$whe5
					")->result();
		$data['datakoopsa'] = $query61;
		$query7 = $this->db->query("SELECT 
					count(a.id) as jumkoopda
				FROM 
					data_aset a,
					dasar_perolehan b,
					m_lanud c,
					kotama d
				WHERE 
					a.dasar_perolehan = b.id and
					a.lanud = c.id and
					c.kotama = d.id and
					c.kotama = '6'
					$whe1
					$whe2
					$whe3
					$whe4
					$whe5
					")->result();
					
		foreach ($query7 as $ruk)
				{
				$jumkoopda = $ruk->jumkoopda;
				}
		$data['jumkoopda'] = $jumkoopda;
		
		$query71 = $this->db->query("SELECT 
					a.*,b.*,b.dasar_perolehan as daper,c.*,d.*
				FROM 
					data_aset a,
					dasar_perolehan b,
					m_lanud c,
					kotama d
				WHERE 
					a.dasar_perolehan = b.id and
					a.lanud = c.id and
					c.kotama = d.id and
					c.kotama = '6'
					$whe1
					$whe2
					$whe3
					$whe4
					$whe5
					")->result();
		$data['datakoopda'] = $query71;
		
		$datab = $this->db->query("SELECT 
					a.*,a.id as iddaas,b.*,b.dasar_perolehan as daper
				FROM 
					data_aset a,
					dasar_perolehan b
				WHERE 
					a.dasar_perolehan = b.id
				order by a.id desc
				")->result();
		$data['datanya']=$datab;
		
		$this->load->view('pencarian/view',$data);
		
	}
	
	public function getkabupaten($provinsi='') 
    {   
		//echo $provinsi."asasasas";die();
		$query = $this->db->query("SELECT 
					*
				FROM 
					kabupaten
				WHERE
					provinsi='$provinsi'
				")->result();
		$data['kabupaten'] = $query;
		$this->load->view('pencarian/kabupaten',$data);
	
	}
	
	public function tambah($lanud_id){
		$lanud_id = substr($lanud_id,9,strlen($lanud_id));
		//echo base_url()."assets/halo/jquery.min.js";die();
    	$data['link_aset_tanah'] = 'open';
        $data['link_pemanfaatan'] = 'class="active"';
        $data['link_data_1'] = 'class="start active open"';
		//$data['title'] = "Tambah Permasalahan";
		$data['title'] = "Tambah Pemanfaatan";
		$userz = $this->session->userdata('user_name');
		/* 20160606
		$query3 = $this->db->query("SELECT 
					*
				FROM 
					lanud_flag
				WHERE
					username='$userz'
					
					")->result();
					
		foreach ($query3 as $ris)
				{
				$lanudnya = $ris->lanudnya;				
				}
				
		$query2 = $this->db->query("SELECT 
					*
				FROM 
					m_lanud
				WHERE
					id='$lanudnya'
					
					")->result();
		*/
		
		$query2 = $this->db->query("SELECT 
					*
				FROM 
					m_lanud
				WHERE
					id='".$lanud_id."'
					
					")->result();
					
		foreach ($query2 as $ruk)
				{
				$nama_lanud = $ruk->lanud;
				$id_lanud = $ruk->id;
				}	
				//echo $id_lanud."zzzzzzz";die();
		$data['nama_lanud'] = $nama_lanud;
		$data['id_lanud'] = $id_lanud;
		$query = $this->db->query("SELECT 
					*
				FROM 
					dasar_perolehan
				
				")->result();
		$data['daper']=$query;
    	$this->load->view('pemanfaatan/tambah',$data);
    }
	
	function lookup(){
        $bahasa = $this->input->post('bahasa',TRUE);
        $rows = $this->m_permasalahan->getData($bahasa);
        $json_array = array();
        foreach ($rows as $row)
            $json_array[]=$row->simak;
        echo json_encode($json_array);
	}
	
	public function saveflag($id){
		
		//echo $id."asdada";die();
		$userz = $this->session->userdata('user_name');
		$this->db->query("update lanud_flag set lanudnya='$id' where username='$userz'");
		redirect('data_aset', 'refresh');
		
	}
	
	public function simpan($lanud_id){
    	/*
		//$this->db->query("insert into pemanfaatan (lanud,simak) values ('".$_POST['lanud']."','".$_POST['SIMAK']."')");
			$query = $this->db->query("SELECT 
										MAX(id) as maxd
										FROM pemanfaatan

                    

                    

                    ")->result();
					
				foreach ($query as $ris)
					{
						$maxd = $ris->maxd;
					}
				$img_count2 = count($_POST['pemanfaatan']);
				//echo $img_count."sdfsdfs";die();  
				for ($k=0 ; $k<=$img_count2 ; $k++)
				{
					if (!empty($_POST['pemanfaatan'][$k]))
					{
					$this->db->query("insert into detil_pemanfaatan (t_pemanfaatan,pemanfaatan,keterangan) values ('".$maxd."','".$_POST['pemanfaatan'][$k]."','".$_POST['keterangan'][$k]."')");
					}
				}
			//redirect('pemanfaatan', 'refresh');
		*/
		
		/* 20160606
		$q_lanudnya = $this->db->query("select lanudnya from lanud_flag where username='".$this->session->userdata('user_name')."'")->result();
		
		$lanudnya = "0";
		foreach($q_lanudnya as $dataQLanudnya){
			$lanudnya = $dataQLanudnya->lanudnya;
		}
		
		$this->db->query("insert into pemanfaatan(lanud,simak) values('".$lanudnya."','".$_POST['simak']."')");
		*/
		
		$lanud_id = substr($lanud_id,9,strlen($lanud_id));
		
		$this->db->query("insert into pemanfaatan(lanud,simak) values('".$lanud_id."','".$_POST['simak']."')");
		
		$q_last_id = $this->db->query("select max(id) as id from pemanfaatan")->result();
		
		$last_id = "0";
		foreach($q_last_id as $dataQLastId){
			$last_id = $dataQLastId->id;
		}
		
		$this->db->query("insert into detil_pemanfaatan(t_pemanfaatan,bmn,bangunan,tanah,sewa,menkeu,perjanjian,peruntukan,penyewa,pola_kerjasama,masa_kerjasama) values('".$last_id."','".$_POST['bmn']."','".$_POST['bangunan']."','".$_POST['tanah']."','".str_replace(".","",$_POST['sewa'])."','".$_POST['menkeu']."','".$_POST['perjanjian']."','".$_POST['peruntukan']."','".$_POST['penyewa']."','".$_POST['kerjasama']."','".$_POST['masa']."')");
		
		redirect('/pemanfaatan/index/'.$this->uri->segment(3));
    }
	
	public function detail($id){
		$x = explode("_",$id);
		$data['title'] = "Detail Pemanfaatan";
		$data['link_pemanfaatan'] = 'class="active"';
        $data['link_data_1'] = 'class="start active open"';
		
		// 20160606 $q_label = $this->db->query("select a.lanud from m_lanud a,lanud_flag b where b.username='".$this->session->userdata('user_name')."' and b.lanudnya=a.id")->result();
		$q_label = $this->db->query("select lanud from m_lanud where id='".$x[3]."'")->result();
		
		$data['nama_lanud'] = "";
		foreach($q_label as $dataQLabel){
			$data['nama_lanud'] = $dataQLabel->lanud;
		}
		
		// 20160606 $data['data'] = $this->db->query("select a.simak,a.lokasi,b.simak as simak_id,c.* from data_aset a,pemanfaatan b,detil_pemanfaatan c where c.id='".$id."' and b.simak=cast(a.id as varchar(10)) and c.t_pemanfaatan=b.id")->result();
		$data['data'] = $this->db->query("select a.simak,a.lokasi,b.simak as simak_id,c.* from data_aset a,pemanfaatan b,detil_pemanfaatan c where c.id='".$x[0]."' and b.simak=a.simak and c.t_pemanfaatan=b.id")->result();
    	
		$this->load->view('pemanfaatan/detail',$data);
	}
	
	public function edit($id){
		//echo $id."asasa";die();
		//echo base_url()."assets/halo/jquery.min.js";die();
		$x = explode("_",$id);
		$data['id_edit'] = $x[0];
    	$data['link_aset_tanah'] = 'open';
        $data['link_pemanfaatan'] = 'class="active"';
        $data['link_data_1'] = 'class="start active open"';
		//$data['title'] = "Tambah Permasalahan";
		$data['title'] = "Ubah Pemanfaatan";
		$userz = $this->session->userdata('user_name');
		/* 20160606
		$query3 = $this->db->query("SELECT 
					*
				FROM 
					lanud_flag
				WHERE
					username='$userz'
					
					")->result();
					
		foreach ($query3 as $ris)
				{
				$lanudnya = $ris->lanudnya;				
				}
				
		$query2 = $this->db->query("SELECT 
					*
				FROM 
					m_lanud
				WHERE
					id='$lanudnya'
					
					")->result();
		*/
		
		$query2 = $this->db->query("SELECT 
					*
				FROM 
					m_lanud
				WHERE
					id='".$x[3]."'
					
					")->result();
					
		foreach ($query2 as $ruk)
				{
				$nama_lanud = $ruk->lanud;
				$id_lanud = $ruk->id;
				}	
				//echo $id_lanud."zzzzzzz";die();
		$data['nama_lanud'] = $nama_lanud;
		$data['id_lanud'] = $id_lanud;
		/*
		$query = $this->db->query("SELECT 
					*
				FROM 
					permasalahan
				where id ='$id'
				
				")->result();
		*/
		// 20160606 $query = $this->db->query("select a.simak,a.lokasi,b.simak as simak_id,c.* from data_aset a,pemanfaatan b,detil_pemanfaatan c where c.id='".$id."' and b.simak=cast(a.id as varchar(10)) and c.t_pemanfaatan=b.id")->result();
		$query = $this->db->query("select a.simak,a.lokasi,b.simak as simak_id,c.* from data_aset a,pemanfaatan b,detil_pemanfaatan c where c.id='".$x[0]."' and b.simak=a.simak and c.t_pemanfaatan=b.id")->result();
		$data['daper']=$query;
    	//$this->load->view('permasalahan/edit',$data);
		$this->load->view('pemanfaatan/edit',$data);
    }
	
	public function update($id){
    	/*
		$this->db->query("update permasalahan set simak='".$_POST['SIMAK']."', permasalahan='".$_POST['permasalahan']."', upaya_penyelesaian='".$_POST['upaya_penyelesaian']."', perkembangan_terakhir='".$_POST['perkembangan_terakhir']."' WHERE id='".$_POST['idnya']."'");
			
			redirect('permasalahan', 'refresh');
		*/
		
		$x = explode("_",$id);
		
		$q_id = $this->db->query("select t_pemanfaatan from detil_pemanfaatan where id='".$_POST['id_edit']."'")->result();
		foreach($q_id as $dataQId){
			$id = $dataQId->t_pemanfaatan;
		}
		
		$this->db->query("update pemanfaatan set simak='".$_POST['simak']."' where id='".$id."'");
		$this->db->query("update detil_pemanfaatan set bmn='".$_POST['bmn']."',bangunan='".$_POST['bangunan']."',tanah='".$_POST['tanah']."',sewa='".str_replace(".","",$_POST['sewa'])."',menkeu='".$_POST['menkeu']."',perjanjian='".$_POST['perjanjian']."',peruntukan='".$_POST['peruntukan']."',penyewa='".$_POST['penyewa']."',pola_kerjasama='".$_POST['kerjasama']."',masa_kerjasama='".$_POST['masa']."' where id='".$_POST['id_edit']."'");
		
		redirect('/pemanfaatan/index/'.$x[1]."_".$x[2]."_".$x[3]);
    }
	
	public function hapus($id){
    	/*
		$this->db->query("delete from permasalahan where id='$id'");
	
				
			redirect('permasalahan', 'refresh');
		*/
		
		$x = explode("_",$id);
		
		$q_id_other = $this->db->query("select t_pemanfaatan from detil_pemanfaatan where id='".$x[0]."'");
		
		foreach($q_id_other as $dataQIdOther){
			$id_other = $dataQIdOther->t_pemanfaatan;
		}
		
		$this->db->query("delete from detil_pemanfaatan where id='".$x[0]."'");
		$this->db->query("delete from pemanfaatan where id='".$id_other."'");
		
		redirect('pemanfaatan/index/'.$x[1]."_".$x[2]."_".$x[3]);
    }
	
	public function search(){
		$keyword = str_replace("%20"," ",$this->uri->segment(4));
		
		/* 20160606
		$q_lanudnya = $this->db->query("select lanudnya from lanud_flag where username='".$this->session->userdata('user_name')."'")->result();
		
		$lanudnya = "0";
		foreach($q_lanudnya as $dataQLanudnya){
			$lanudnya = $dataQLanudnya->lanudnya;
		}
		*/

		$q_simak = $this->db->query("select * from ( select id,LOWER(simak) as simak from data_aset where lanud='".$this->uri->segment(3)."' ) a where simak like '%".$keyword."%' limit 10")->result();

		foreach($q_simak as $dataQSimak){
			$q_true_simak = $this->db->query("select simak,lokasi from data_aset where id='".$dataQSimak->id."'")->result();
			foreach($q_true_simak as $dataQTrueSimak){
				$arr['suggestions'][] = array(
					'id' => $dataQSimak->id,
					'value'	=>$dataQTrueSimak->simak,
					'lokasi' => $dataQTrueSimak->lokasi
				);
			}
		}
		
		echo json_encode($arr);
	}
	
	
	public function aturcetak($lanud_id){
		$lanud_id = substr($lanud_id,9,strlen($lanud_id));
    	$data['link_aset_tanah'] = 'open';
        $data['link_data_aset'] = 'class="active"';
        $data['link_data_1'] = 'class="start active open"';
		$data['title'] = "Atur Cetak Pemanfaatan";
		$userz = $this->session->userdata('user_name');
		/* 20160606
		$query3 = $this->db->query("SELECT 
					*
				FROM 
					lanud_flag
				WHERE
					username='$userz'
					
					")->result();
					
		foreach ($query3 as $ris)
				{
				$lanudnya = $ris->lanudnya;				
				}
				
		$query2 = $this->db->query("SELECT 
					*
				FROM 
					m_lanud
				WHERE
					id='$lanudnya'
					
					")->result();
		*/
		
		$query2 = $this->db->query("SELECT 
					*
				FROM 
					m_lanud
				WHERE
					id='".$lanud_id."'
					
					")->result();
					
		foreach ($query2 as $ruk)
				{
				$nama_lanud = $ruk->lanud;
				$id_lanud = $ruk->id;
				}	
				//echo $id_lanud."zzzzzzz";die();
		$data['nama_lanud'] = $nama_lanud;
		$data['id_lanud'] = $id_lanud;
		$query = $this->db->query("SELECT 
					*
				FROM 
					dasar_perolehan
				
				")->result();
		$data['daper']=$query;
		$query3 = $this->db->query("SELECT 
					*
				FROM 
					status_tanah
				
				")->result();
		$data['statan']=$query3;
    	$query4 = $this->db->query("SELECT 
					*
				FROM 
					provinsi
				
				")->result();
		$data['provinsi']=$query4;
		$this->load->view('pemanfaatan/aturcetak',$data);
		
    }
	
	public function cetakdataaset($lanud_id='',$ru2='',$ru3='',$ru4=''){
		//echo "ASDASDA".$_POST['penanggungjwb'];die();
		$lanud_id = substr($lanud_id,9,strlen($lanud_id));
		//echo $ru2;die();
		
		$data['title'] = "Cetak Data Aset";
		if($ru2 == "a"){
			$yoa1 = "";
		}else{
			$yoa1 = str_replace("%20"," ",$ru2);
		}
		//echo $yoa1;die();
		
		if($ru3 == "b"){
			$yoa2 = "";
		}else{
			$yoa2 = str_replace("%20"," ",$ru3);
		}
		
		$query2 = $this->db->query("SELECT 
					*
				FROM 
					m_lanud
				WHERE
					id='".$lanud_id."'
					
					")->result();
					
		foreach ($query2 as $ruk)
				{
				$nama_lanud = $ruk->lanud;
				$id_lanud = $ruk->id;
				}	
				//echo $id_lanud."zzzzzzz";die();
		if($ru4 == "MPDF"){
			$yoa3 = "Laporan Pemanfaatan (".$nama_lanud.")";
		}else{
			$yoa3 = str_replace("%20"," ",$ru4);
		}
		$data['judul'] = $yoa3;
		$data['footera'] = "Laporan Permasalahan (".$nama_lanud.")";
		$query = $this->db->query("select a.*,c.simak,c.lokasi from detil_pemanfaatan a,pemanfaatan b,data_aset c where b.lanud='".$lanud_id."' and b.simak=c.simak and a.t_pemanfaatan=b.id order by b.id desc
				")->result();
		$data['jojo']=$query;
		$data['pena']=$yoa2;
		//$data['judul']=$pegjw2;
		$data['ttc']=$yoa1;
		$this->load->view('pemanfaatan/cetakaset',$data);
		
	}
	
	public function getform(){
		$dat1 = $_GET['urinya'];
		$dat2 = $_GET['pow1'];
		$dat3 = $_GET['pow2'];
		$dat4 = $_GET['pow3'];
		
		$data['ru1']=$dat1;
		$data['ru2']=$dat2;
		$data['ru3']=$dat3;
		$data['ru4']=$dat4;
		
		$this->load->view('pemanfaatan/frame',$data);
	
	}
	
	public function getword($lanud_id=''){
		//$data['judul']="asdasdasd";
		$lanud_id = substr($lanud_id,9,strlen($lanud_id));
		//echo $lanud_id;die();
		$query = $this->db->query("select a.*,c.simak,c.lokasi from detil_pemanfaatan a,pemanfaatan b,data_aset c where b.lanud='".$lanud_id."' and b.simak=c.simak and a.t_pemanfaatan=b.id order by b.id desc")->result();
		$data['datanya']=$query;
		$query2 = $this->db->query("SELECT 
					*
				FROM 
					m_lanud
				WHERE
					id='".$lanud_id."'
					
					")->result();
					
		foreach ($query2 as $ruk)
				{
				$nama_lanud = $ruk->lanud;
				$id_lanud = $ruk->id;
				}	
		$data['judulnya']="Laporan Pemanfaatan (".$nama_lanud.")";
		//$joul = $_POST['judul'];
		
		//echo $joul."asdasd";die();
		
		$this->load->view('pemanfaatan/word',$data);
	
	}
	
	

	
	
}

?>