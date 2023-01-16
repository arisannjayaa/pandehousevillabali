<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VillaPemesanan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pandehvb_model');
		$this->load->library('pdf');

	}

	public function index()
	{
		if ($this->session->userdata("tipe_user") == 'customer') {
			$data['villa'] =  $this->pandehvb_model->getAllVilla();
			$this->load->view('VillaPemesanan', $data);
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai customer terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}
		
	}

	public function LamaMenginap($id)
	{
		if ($this->session->userdata("tipe_user") == 'customer') {
			$data['id'] = $id;
			$this->load->view('VillaPemesanan2', $data);
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai customer terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}
		
	}

	public function CekKetersediaan()
	{
		if ($this->session->userdata("tipe_user") == 'customer') {
			$data['tgl_dari'] = $this->input->post('tgl_dari');
			$data['tgl_sampai'] = $this->input->post('tgl_sampai');
			$data['id'] = $this->input->post('id_villa');
			if (empty($data['id'])) {
				redirect(base_url("VillaPemesanan/index"));
			}else{
				$data['pembayaran'] = $this->pandehvb_model->getMetodePembayaran();
				$data['ketersediaan'] = $this->pandehvb_model->cekKetersediaan();
			
				$this->load->view('VillaPemesanan3', $data);

			}
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai customer terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}
			
		
	}

	public function BuatTransaksi()
	{
		if ($this->session->userdata("tipe_user") == 'customer') {
			$data['tipe_transaksi'] = $this->input->post('tipe_transaksi');
			if (empty($data['tipe_transaksi'])) {
				redirect(base_url("VillaPemesanan/index"));
			}else{
				$this->pandehvb_model->buatTransaksi();
				redirect(base_url("VillaPemesanan/TransaksiSukses"));

			}
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai customer terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}
			
		
	}

	public function TransaksiSukses()
	{
		if ($this->session->userdata("tipe_user") == 'customer') {
			$data['pdftipe_transaksi'] = $this->session->userdata("pdftipe_transaksi");
			if (empty($data['pdftipe_transaksi'])) {
				redirect(base_url("VillaPemesanan/index"));
			}else{
				$this->load->view('VillaPemesanan4');
			}
		}else{
			$data_session = array(
                'alert_home' => 'Harus login sebagai customer terlebih dahulu'
                );
 
            $this->session->set_userdata($data_session);
            redirect(base_url("VillaHome/index"));
		}

		
	}

	public function BuatPDF()
	{
		if ($this->session->userdata("tipe_user") == 'customer') {
			$data['pdftipe_transaksi'] = $this->session->userdata("pdftipe_transaksi");
			if (empty($data['pdftipe_transaksi'])) {
				redirect(base_url("VillaPemesanan/index"));
			}else{

				$tipe_transaksi = $this->session->userdata("pdftipe_transaksi");
				$nama_villa = $this->session->userdata("pdfnama_villa");
				$waktu_transaksi = $this->session->userdata("pdfwaktu_transaksi");
				$nama_pemesan = $this->session->userdata("pdfnama_pemesan");
				$tgl_checkin = $this->session->userdata("pdftgl_checkin");
				$tgl_checkout = $this->session->userdata("pdftgl_checkout");
				$total_bayar = $this->session->userdata("pdftotal_bayar");
				$metode_pembayaran_jenis = $this->session->userdata("pdfmetode_pembayaran_jenis");
				$metode_pembayaran_isi = $this->session->userdata("pdfmetode_pembayaran_isi");
				$max_pembayaran = $this->session->userdata("pdfmax_pembayaran");
				
				//$img_link = base_url('public/template_user/images/logo.png');
				$pdf = new FPDF('P', 'mm', 'a4'); #ukuran kertas lanscape, 150x90mm
			    $pdf->SetMargins(6, 1, 6); #margin atas, samping
			    $pdf->AddPage();

			    $pdf->SetFont('arial', 'B', 12); #font dan ukuran
			    //$pdf->Image($img_link, 80, 15, 50, 2); 
			    $pdf->Cell(0, 10, ' ', 0, 1); #aslinya 40
			    $pdf->Cell(0,7,'Bukti Invoice '.$tipe_transaksi.' '.$nama_villa,0,1,'C');
			    $pdf->Cell(0,7,'Waktu Transaksi '.$waktu_transaksi,0,1,'C');
			    $pdf->Cell(85,6,'',0,1);

			    $pdf->SetFont('arial', 'B', 10);
			    $pdf->Cell(10,6, ' ', 0, 0);
			    $pdf->Cell(96,6,'Nama',1,0);
			    $pdf->Cell(23,6,'Check-In',1,0,'C');
			    $pdf->Cell(23,6,'Check-Out',1,0, 'C');
			    $pdf->Cell(35,6,'Total Bayar',1,1, 'C');

			    $pdf->SetFont('arial', '', 10);
			    $no = 1;
			    $pdf->Cell(10,6, ' ', 0, 0);
			    $pdf->Cell(96,6,$nama_pemesan,1,0);
			    $pdf->Cell(23,6,$tgl_checkin,1,0, 'C');
			    $pdf->Cell(23,6,$tgl_checkout,1,0, 'C');
			    $pdf->Cell(35,6,'Rp.'.$total_bayar,1,1, 'C');

			    $pdf->SetFont('arial', 'B', 15);
			    $pdf->Cell(0, 200, ' ', 0, 1); #aslinya 170
			    $pdf->Cell(0,7,'Lakukan pembayaran ke '.$metode_pembayaran_jenis.' '.$metode_pembayaran_isi." sebelum ".$max_pembayaran,0,1,'C');
			    $pdf->Cell(0,7,'Jika sudah membayar, segera lakukan konfirmasi',0,1,'C');
			    $pdf->Cell(0,7,'ke salah satu contact person di menu contact person',0,1,'C');
			        


			    $pdf->Output("OfficeForm.pdf", "I");
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

/* End of file PemesananController.php and path \application\controllers\Pemesanan\PemesananController.php */
