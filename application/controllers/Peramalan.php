<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peramalan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_Transaksi','model');
		}
	public function index(){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai' or $this->session->userdata('level')=='owner'  ){
			$data['peramalan']=$this->db->select('peramalan.index_ramal,peramalan.waktu_peramalan,m_bahan.nama_bahan')->distinct()->join('m_bahan','m_bahan.id_bahan=peramalan.id_bahan')->get('peramalan')->result();
			$data['bahan']=$this->model->laporan_detail_bahan_all()->result();
			$this->load->view('layouts/head.php');
			$this->load->view('layouts/nav_admin.php');
			$this->load->view('pages/peramalan/index.php',$data);
			$this->load->view('layouts/foot.php');			
		}
		else{
			$this->load->view('layouts/404.php');			
		}
	}
	public function ramal(){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai' or $this->session->userdata('level')=='owner'  ){
			
			$tgl_awal=$this->input->get('tgl_awal');
			$tgl_akhir=$this->input->get('tgl_akhir');
			$bahan=$this->input->get('bahan');
			
			if (count($this->model->transaksi_ramal($tgl_awal,$tgl_akhir,$bahan)->result())>4) {
				// 1.ambil data dari database kemudian disimpan dalam array data_ramal
				$datas['bahan_id']=$bahan;
				$datas['tgl_awal']=$tgl_awal;
				$datas['tgl_akhir']=$tgl_akhir;
				$data['transaksi']=$this->model->transaksi_ramal($tgl_awal,$tgl_akhir,$bahan)->result();
				foreach ($data['transaksi'] as $key => $valuess) {
					$data_ramal[]= [
						'tahun'=>$valuess->tahun,
						'bulan'=>$valuess->bulan,
						'monthnumber'=>$valuess->monthnumber,
						'jumlah'=>$valuess->jumlah,
					];
				}
				// 1.ambil data dari database kemudian disimpan dalam array data_ramal

				$range=3;
				$jmlahplus=0;
				$blnplus=0;
				$thnplus=0;
				$monthnumberplus=0;
				isset ($data_ramal) ? $data_ramal:[];
				foreach ($data_ramal as $key => $value) {
					$jmlahplus++;
					$blnplus++;
					$thnplus++;
					$monthnumberplus++;
					$jmlah[]=['jml'.$jmlahplus =>$value['jumlah']];
					$bulan[]=['jml'.$blnplus=>$value['bulan']];
					$tahun[]=['jml'.$thnplus=>$value['tahun']];
					$monthnumber[]=['jml'.$monthnumberplus=>$value['monthnumber']];
					$jml[]=$value['jumlah'];
					$bln[]=$value['bulan'];
					$thn[]=$value['tahun'];
					$monthnmbr[]=$value['monthnumber'];
				}
				$sum = array_sum(array_slice($jml, 0, $range));

				$result = array($range - 1 => $sum / $range);
				
				for ($i = $range; $i < count($jml); $i++) {
					$result[$i] = $result[$i - 1] + ($jml[$i] - $jml[$i - $range]) / $range;
				}


				// movinga verage ke2 dengan mengurangi data 3 bulan sebelumnya

				for ($i=2; $i <count($jml)-2 ; $i++) { 
					$res1[$i]=$result[$i]/3;
				}
				for ($i=3; $i <count($jml)-1 ; $i++) { 
					$res2[$i]=$result[$i]/3;
				}
				for ($i=4; $i <count($jml); $i++) { 
					$res3[$i]=$result[$i]/3;
				}
				
				// mencari at
				
				$mav2 = array_map(function () {
					return array_sum(func_get_args());
				}, $res1, $res2, $res3);
				

				for ($i=4; $i <count($jml); $i++) { 
					$otw_at[]=2*$result[$i];
					$otw_bt[]=$result[$i];
				}

				for ($i=0; $i <count($mav2); $i++) { 
					$otw_at2[]=$mav2[$i];
				}


				$subtracted = array_map(function ($x, $y) { return $x-$y; } , $otw_at, $otw_at2);
				$result_at     = array_combine(array_keys($otw_at), $subtracted);

				$subtracted2 = array_map(function ($x, $y) { return $y-$x; } , $otw_at2, $otw_bt);
				$result_bt     = array_combine(array_keys($otw_at), $subtracted2);

				$subtracted3 = array_map(function ($x, $y) { return $x+$y; } , $result_at, $result_bt);
				$result_ft     = array_combine(array_keys($result_at), $subtracted3);

			
				array_unshift($result,0,0);

				$results = array();
				$resplus=0;
				foreach ($result as $key => $value) {
					$resplus++;
					$resultdata[]=['jml'.$resplus => $value];
				}

				array_unshift($mav2,0,0,0,0);
				array_unshift($result_at,0,0,0,0);
				array_unshift($result_bt,0,0,0,0);
				array_unshift($result_ft,0,0,0,0,0);

				$resplus2=0;
				foreach ($mav2 as $key => $value) {
					$resplus2++;
					$resultdata2[]=['jml'.$resplus2 => $value];
				}

				$resplus3=0;
				foreach ($result_at as $key => $value) {
					$resplus3++;
					$resultdata3[]=['jml'.$resplus3 => $value];
				}

				$resplus4=0;
				foreach ($result_bt as $key => $value) {
					$resplus4++;
					$resultdata4[]=['jml'.$resplus4 => $value];
				}
				
				// foreach ($result_bt as $key => $value) {
					// 	$resplus5++;
					// 	$resultdata5[]=['jml'.$resplus5 => $value];
					// }
					
					$resplus5=0;
				for ($i=0; $i <count($result_ft)-1 ; $i++) { 
					$resplus5++;
					$resultdata5[$i]=['jml'.$resplus5 => $result_ft[$i]];
				}

				// masukan kedalam 1 array
				
				array_map(function($a, $b, $c, $d, $e, $f, $g, $h, $i) use (&$results) {

					$key = current(array_keys($a));
					$a[$key] = array('jumlah' => $a[$key]);

					// Obtain the key again as the second array may have a different key.
					$key = current(array_keys($b));
					$b[$key] = array('bulan' => $b[$key]);
				
					$key = current(array_keys($c));
					$c[$key] = array('result' => $c[$key]);

					$key = current(array_keys($d));
					$d[$key] = array('result2' => $d[$key]);

					$key = current(array_keys($e));
					$e[$key] = array('at' => $e[$key]);

					$key = current(array_keys($f));
					$f[$key] = array('bt' => $f[$key]);
					
					$key = current(array_keys($g));
					$g[$key] = array('ft' => $g[$key]);

					$key = current(array_keys($h));
					$h[$key] = array('tahun' => $h[$key]);
					
					$key = current(array_keys($i));
					$i[$key] = array('monthnumber' => $i[$key]);

					$results += array_merge_recursive($a, $b, $c, $d ,$e, $f, $g, $h,$i);

				}, $jmlah, $bulan,$resultdata,$resultdata2, $resultdata3, $resultdata4, $resultdata5,$tahun, $monthnumber);

				// masukan kedalam 1 array

				$datas['data']=$results;
				$datas['last_ft']=end($result_ft);
				$datas['satuan']=$this->db->where('id_bahan',$bahan)->get("m_bahan")->row()->satuan;
				$datas['bahan']=$this->model->laporan_detail_bahan_all()->result();
				$this->load->view('layouts/head.php');
				$this->load->view('layouts/nav_admin.php');
				$this->load->view('pages/peramalan/ramal_data.php',$datas);
				$this->load->view('layouts/foot.php');	
				}
			else{
				echo "<script>
					alert('Data yang diramal kurang, minimal harus 5 bulan');
					window.location.href='/dbmaverage/peramalan/index';
					</script>";			
			}
		}
	}
	public function ramal_detail($id){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai' or $this->session->userdata('level')=='owner'  ){
		$tgl_awal=$this->input->get('tgl_awal');
		$tgl_akhir=$this->input->get('tgl_akhir');
		$bahan=$this->input->get('bahan');
		$datas['bahan_id']=$bahan;
		$datas['tgl_awal']=$tgl_awal;
		$datas['tgl_akhir']=$tgl_akhir;
		$data['transaksi']=$this->db->where('index_ramal',$id)->get('peramalan')->result();
		foreach ($data['transaksi'] as $key => $valuess) {
			$data_ramal[]= [
				'bulan'=>$valuess->tanggal,
				'jumlah'=>$valuess->permintaan,
			];
		}
		$range=3;
		$jmlahplus=0;
		$blnplus=0;
		foreach ($data_ramal as $key => $value) {
			$jmlahplus++;
			$blnplus++;
			$jmlah[]=['jml'.$jmlahplus =>$value['jumlah']];
			$bulan[]=['jml'.$blnplus=>$value['bulan']];
			$jml[]=$value['jumlah'];
			$bln[]=$value['bulan'];
		}
		$sum = array_sum(array_slice($jml, 0, $range));

		$result = array($range - 1 => $sum / $range);
		
		for ($i = $range; $i < count($jml); $i++) {
			$result[$i] = $result[$i - 1] + ($jml[$i] - $jml[$i - $range]) / $range;
			
		}


		// movinga verage ke2

		for ($i=2; $i <count($jml)-2 ; $i++) { 
			$res1[$i]=$result[$i]/3;
		}
		for ($i=3; $i <count($jml)-1 ; $i++) { 
			$res2[$i]=$result[$i]/3;
		}
		for ($i=4; $i <count($jml); $i++) { 
			$res3[$i]=$result[$i]/3;
		}
		
		// mencari at
		
		$mav2 = array_map(function () {
			return array_sum(func_get_args());
		}, $res1, $res2, $res3);
		

		for ($i=4; $i <count($jml); $i++) { 
			$otw_at[]=2*$result[$i];
			$otw_bt[]=$result[$i];
		}

		for ($i=0; $i <count($mav2); $i++) { 
			$otw_at2[]=$mav2[$i];
		}


		$subtracted = array_map(function ($x, $y) { return $x-$y; } , $otw_at, $otw_at2);
		$result_at     = array_combine(array_keys($otw_at), $subtracted);

		$subtracted2 = array_map(function ($x, $y) { return $y-$x; } , $otw_at2, $otw_bt);
		$result_bt     = array_combine(array_keys($otw_at), $subtracted2);

		$subtracted3 = array_map(function ($x, $y) { return $x+$y; } , $result_at, $result_bt);
		$result_ft     = array_combine(array_keys($result_at), $subtracted3);

	
		array_unshift($result,0,0);

		$results = array();
		$resplus=0;
		foreach ($result as $key => $value) {
			$resplus++;
			$resultdata[]=['jml'.$resplus => $value];
		}

		array_unshift($mav2,0,0,0,0);
		array_unshift($result_at,0,0,0,0);
		array_unshift($result_bt,0,0,0,0);
		array_unshift($result_ft,0,0,0,0,0);

		$resplus2=0;
		foreach ($mav2 as $key => $value) {
			$resplus2++;
			$resultdata2[]=['jml'.$resplus2 => $value];
		}

		$resplus3=0;
		foreach ($result_at as $key => $value) {
			$resplus3++;
			$resultdata3[]=['jml'.$resplus3 => $value];
		}

		$resplus4=0;
		foreach ($result_bt as $key => $value) {
			$resplus4++;
			$resultdata4[]=['jml'.$resplus4 => $value];
		}
		
		// foreach ($result_bt as $key => $value) {
			// 	$resplus5++;
			// 	$resultdata5[]=['jml'.$resplus5 => $value];
			// }
			
			$resplus5=0;
		for ($i=0; $i <count($result_ft)-1 ; $i++) { 
			$resplus5++;
			$resultdata5[$i]=['jml'.$resplus5 => $result_ft[$i]];
		}
		
		array_map(function($a, $b, $c, $d, $e, $f, $g) use (&$results) {

			$key = current(array_keys($a));
			$a[$key] = array('jumlah' => $a[$key]);

			// Obtain the key again as the second array may have a different key.
			$key = current(array_keys($b));
			$b[$key] = array('bulan' => $b[$key]);
		
			$key = current(array_keys($c));
			$c[$key] = array('result' => $c[$key]);

			$key = current(array_keys($d));
			$d[$key] = array('result2' => $d[$key]);

			$key = current(array_keys($e));
			$e[$key] = array('at' => $e[$key]);

			$key = current(array_keys($f));
			$f[$key] = array('bt' => $f[$key]);
			
			$key = current(array_keys($g));
			$g[$key] = array('ft' => $g[$key]);

			$results += array_merge_recursive($a, $b, $c, $d ,$e, $f, $g);

		}, $jmlah, $bulan,$resultdata,$resultdata2, $resultdata3, $resultdata4, $resultdata5);

		$datas['data']=$results;
		$datas['last_ft']=end($result_ft);
		$datas['bahan']=$this->model->laporan_detail_bahan_all()->result();
		$datas['satuan']=$this->db->where('id_bahan',$bahan)->get("m_bahan")->row()->satuan;
		$this->load->view('layouts/head.php');
		$this->load->view('layouts/nav_admin.php');
		$this->load->view('pages/peramalan/ramal_detail.php',$datas);
		$this->load->view('layouts/foot.php');	
		}
		else{
			$this->load->view('layouts/404.php');			
		}
	}

	public function save_ramal(){
		if($this->session->userdata('level')=='admin' or $this->session->userdata('level')=='pegawai' or $this->session->userdata('level')=='owner' ){
			$bahan=$this->input->post("bahan");
			$jumlah=$this->input->post("jumlah");
			$tgl_awal=$this->input->post("tgl_awal");
			$tgl_akhir=$this->input->post("tgl_akhir");
			$tgl=$this->input->post("tgl");
			if ($this->db->order_by('index_ramal','asc')->get('peramalan')->row()==null) {
				$cek_index=1;
			}else{
				$cek_index=$this->db->order_by('index_ramal','asc')->get('peramalan')->row()->index_ramal+1;
			}
			for ($i=0; $i<count($bahan);$i++) {
				$data=[
					"id_bahan"=>$bahan[$i],
					"permintaan"=>$jumlah[$i],
					"tanggal"=>$tgl[$i],
					"waktu_peramalan"=>date_format(date_create($tgl_awal[$i]),"M-Y")." hingga ".date_format(date_create($tgl_akhir[$i]),"M-Y"),
					"index_ramal"=>$cek_index,
				];
				$this->db->insert('peramalan',$data);
			}
			redirect('peramalan/index');
		}
		else{
			$this->load->view('layouts/404.php');			
		}
		
	}
	
}
