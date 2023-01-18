<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminLaporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pandehvb_model');
		$this->load->library('pdf');
	}

	public function index()
	{
		if ($this->session->userdata("tipe_user") == 'admin') {
			$data = [
				'title' => 'Laporan',
				'heading' => 'Laporan',
				'desc' => ''
			];
			$this->load->view('layouts/header', $data);
			$this->load->view('laporan/index', $data);
			$this->load->view('layouts/footer');
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai admin terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}
			
	}

	public function cetakLaporan()
	{
			
        if ($this->session->userdata("tipe_user") == 'admin') {
			$date = $this->input->post('date');
	        $date1 = date('Y', strtotime($date));
	        $date2 = date('m', strtotime($date));


			if (empty($date)) {
				redirect(base_url("AdminDashboard"));
			}else{

				$this->db->select("id_transaksi, tipe_transaksi, tgl_checkin, tgl_checkout, waktu_transaksi, total_bayar, status_pesanan, customer.nama as nama_customer, villa.nama as nama_villa");
		        $this->db->from('transaksi');
		        $this->db->join('customer', 'transaksi.id_customer = customer.id_customer');
		        $this->db->join('villa', 'transaksi.id_villa = villa.id_villa');
		        $this->db->where('YEAR(waktu_transaksi)', $date1);
		        $this->db->where('MONTH(waktu_transaksi)', $date2);
		        $query = $this->db->get();
		      
		        	
				
				//$img_link = base_url('public/template_user/images/logo.png');
				$pdf = new FPDF('L', 'mm', 'a4'); #ukuran kertas lanscape, 150x90mm
			    $pdf->SetMargins(6, 1, 6); #margin atas, samping
			    $pdf->AddPage();

			    $pdf->SetFont('arial', 'B', 12); #font dan ukuran
			    //$pdf->Image($img_link, 80, 15, 50, 2); 
			    $pdf->Cell(0, 10, ' ', 0, 1); #aslinya 40
			    $pdf->Cell(0,7,'Laporan Transaksi Pande House Villa Bali Periode '.$date,0,1,'C');
			    $pdf->Cell(85,6,'',0,1);

			    $pdf->SetFont('arial', 'B', 10);
			    $pdf->Cell(5,6, ' ', 0, 0);
			    $pdf->Cell(10,6,'No',1,0, 'C');
			    $pdf->Cell(70,6,'Nama Customer',1,0);
			    $pdf->Cell(26,6,'Tipe Transaksi',1,0,'C');
			    $pdf->Cell(23,6,'Check-In',1,0,'C');
			    $pdf->Cell(23,6,'Check-Out',1,0, 'C');
			    $pdf->Cell(30,6,'Nama Villa',1,0, 'C');
			    $pdf->Cell(28,6,'Status Pesanan',1,0, 'C');
			    $pdf->Cell(27,6,'Total Bayar',1,0, 'C');
			    $pdf->Cell(35,6,'Waktu Transaksi',1,1, 'C');

			    $no=0;

			    $pdf->SetFont('arial', '', 10);
			    foreach ($query->result_array() as $rom) {
				    $no++;
				    $pdf->Cell(5,6, " ", 0, 0);
				    $pdf->Cell(10,6,$no,1,0, 'C');
				    $pdf->Cell(70,6,$rom['nama_customer'],1,0);
				    $pdf->Cell(26,6,$rom['tipe_transaksi'],1,0, 'C');
				    $pdf->Cell(23,6,$rom['tgl_checkin'],1,0, 'C');
				    $pdf->Cell(23,6,$rom['tgl_checkout'],1,0, 'C');
				    $pdf->Cell(30,6,$rom['nama_villa'],1,0, 'C');
				    $pdf->Cell(28,6,$rom['status_pesanan'],1,0, 'C');
				    $pdf->Cell(27,6,'Rp.'.$rom['total_bayar'],1,0, 'C');
				    $pdf->Cell(35,6,$rom['waktu_transaksi'],1,1, 'C');
				}

			    
			        


			    $pdf->Output("Laporan Transaksi.pdf", "I");
				
			}
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai customer terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}
	}


}

/* End of file LaporanController.php and path \application\controllers\Laporan\LaporanController.php */
