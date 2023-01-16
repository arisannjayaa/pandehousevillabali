<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pandehvb_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
    public function getAllVilla()
    {
        $result = $this->db->get('villa');
        return $result;
    }

    public function getSelectedVilla($id)
    {
        $this->db->where('id_villa', $id);
        $result = $this->db->get('villa');
        return $result;
    }

    public function getSelectedProfil()
    {
        $this->db->where('id_customer', $this->session->userdata("id_customer"));
        $result = $this->db->get('customer');
        return $result;
    }

    public function getSelectedKetersediaan($id)
    {
        $this->db->where('id_villa', $id);
        $this->db->order_by('tanggal','asc');
        $result = $this->db->get('ketersediaan');
        return $result;
    }

    public function getSelectedGallery($id)
    {
        $this->db->where('id_villa', $id);
        $result = $this->db->get('galeri');
        return $result;
    }

    public function getSelectedFasilitas($id)
    {
        $this->db->where('id_villa', $id);
        $result = $this->db->get('detail_villa');
        return $result;
    }

    public function getContactPerson()
    {
        $result = $this->db->get('contact_person');
        return $result;
    }

    public function getMetodePembayaran()
    {
        $result = $this->db->get('metode_pembayaran');
        return $result;
    }

    public function cek_login($input_akun)
    {     
        $result = $this->db->get_where('customer', $input_akun);
        return $result;
    }

    public function cek_login2($input_akun)
    {     
        $result = $this->db->get_where('pemilik', $input_akun);
        return $result;
    }

    public function cek_register($input_akun)
    {     
        $result = $this->db->get_where('customer', $input_akun);
        return $result;
    } 

    public function cek_register2($input_akun)
    {     
        $result = $this->db->get_where('pemilik', $input_akun);
        return $result;
    }

    public function cekKetersediaan()
    {
        $dari = $this->input->post('tgl_dari');
        $dari1 = date('Y-m-d', strtotime($dari));

        $sampai = $this->input->post('tgl_sampai');
        $sampai1 = date('Y-m-d', strtotime($sampai));

        $tgl_now = date('Y-m-d');
        $tgl_now1 = date('Y-m-d', strtotime($tgl_now));

        if ($dari1 > $sampai1) {
            $e = 'tgl_salah';
        }elseif ($dari1 < $tgl_now1 || $sampai1 < $tgl_now1){
            $e = 'tgl_salah';
        }else{
            $x= -1;
            for ($i=0; $i < 8; $i--) { 
                $x= $x+1;

                $tgl_dari = $this->input->post('tgl_dari');
                $tgl_dari1 = strtotime($tgl_dari);
                $tgl_dari2 = date('Y-m-d', strtotime("+$x day", $tgl_dari1));

                $tgl_sampai = $this->input->post('tgl_sampai');
                $tgl_sampai1 = date('Y-m-d', strtotime($tgl_sampai));
                

                $this->db->where('id_villa', $this->input->post('id_villa'));
                $this->db->where('tanggal', $tgl_dari2);
                $this->db->where('status', 'tersedia');
                //$this->db->where('banyak_stok >=', $this->input->post('banyak'));
                $data = $this->db->get('ketersediaan');
                $filter = $data->num_rows();


                if ($filter > 0) {
                    $e = 'ada';
                    if ($tgl_dari2 == $tgl_sampai1) {
                        $i = 10;
                    }
                }else{
                    $e = 'tidak_ada';
                    $i = 10;
                }

            }

        }
            
        return $e;
    }

    public function autoCreateKetersediaan()
    {
        for ($i=0; $i < 61; $i++) { 
            $tgl_now = date('Y-m-d');
            $tgl = strtotime($tgl_now);
            $tgl_1    =date('Y-m-d', strtotime("+$i day", $tgl));

            $hasil = $this->db->get('villa');
            foreach ($hasil->result_array() as $row) {
                $this->db->where('id_villa', $row['id_villa']);
                $this->db->where('tanggal', $tgl_1);
                $data = $this->db->get('ketersediaan');
                $filter = $data->num_rows();
                if($filter > 0){
            
 
                }else{
                    $insert = array(
                     'id_villa' => $row['id_villa'],
                     'id_pemilik' => 1,
                     'tanggal' => $tgl_1,
                     'status' => 'tersedia'
                    );
                    $result = $this->db->insert('ketersediaan', $insert);
            
                }
        
            }
        }
    
    return;
    }


    public function buatTransaksi()
    {
        $dari = $this->input->post('tgl_dari');
        $dari1 = date('Y-m-d', strtotime($dari));

        $sampai = $this->input->post('tgl_sampai');
        $sampai1 = date('Y-m-d', strtotime($sampai));

        $kode_unik = rand(100 , 999);

        $tipe_transaksi = $this->input->post('tipe_transaksi');


        $datenow = date('Y-m-d H:i');
        $max_pembayaran = strtotime($datenow);
        $max_pembayaran1 = date('Y-m-d H:i', strtotime("+12 hours", $max_pembayaran));

        $this->db->where('id_customer', $this->session->userdata("id_customer"));
        $customer_data = $this->db->get('customer');
        foreach ($customer_data->result_array() as $row) {
        $nama_customer = $row['nama'];
        $id_cust = $row['id_customer'];
        }

        $this->db->where('id_metode_pembayaran', $this->input->post('pembayaran'));
        $mtd_pembayaran = $this->db->get('metode_pembayaran');
        foreach ($mtd_pembayaran->result_array() as $row2) {
        $pembayaran_jenis = $row2['jenis_pembayaran'];
        $pembayaran_isi = $row2['isi'];
        }

        $this->db->where('id_villa', $this->input->post('id_villa'));
        $villa_data = $this->db->get('villa');
        foreach ($villa_data->result_array() as $row3) {
        $villa_harga = $row3['harga'];
        $villa_nama = $row3['nama'];
        }


        $x= -1;
            for ($i=0; $i < 8; $i--) { 
                $x= $x+1;

                $tgl_dari = $this->input->post('tgl_dari');
                $tgl_dari1 = strtotime($tgl_dari);
                $tgl_dari2 = date('Y-m-d', strtotime("+$x day", $tgl_dari1));

                $tgl_sampai = $this->input->post('tgl_sampai');
                $tgl_sampai1 = date('Y-m-d', strtotime($tgl_sampai));
                
                if ($tgl_dari2 == $tgl_sampai1) {
                        $i = 10;
                }
                $counthari = $x+1;

            }
        
        if ($tipe_transaksi == 'Sewa') {
            $total_bayar = ($counthari * $villa_harga) + $kode_unik;
        }elseif (($tipe_transaksi == 'Booking')){
            $total_bayar = (($counthari * $villa_harga) / 2) + $kode_unik;
        }

        $insert_datanya = array(
             'tipe_transaksi' => $this->input->post('tipe_transaksi'),
             'status_pembayaran' => 'Belum Dibayar',
             'status_pesanan' => 'Dibuat',
             'kode_unik' => $kode_unik,
             'id_customer' => $this->session->userdata("id_customer"),
             'id_pemilik' => '1',
             'tgl_checkin' => $this->input->post('tgl_dari'),
             'tgl_checkout' => $this->input->post('tgl_sampai'),
             'waktu_transaksi' => $datenow,
             'metode_pembayaran' => $pembayaran_jenis,
             'id_villa' => $this->input->post('id_villa'),
             'total_bayar' => $total_bayar,
             'max_pembayaran' => $max_pembayaran1

        );
        $this->db->insert('transaksi', $insert_datanya);

       

        for ($i=0; $i < $x+1; $i++) { 
            $id_villa = $this->input->post('id_villa');
            $tgl_now = $this->input->post('tgl_dari');
            $tgl = strtotime($tgl_now);
            $tgl_1  =date('Y-m-d', strtotime("+$i day", $tgl));

            $edit = array(
                'status' => 'Menunggu Pembayaran'
            );
            

            $this->db->where('id_villa', $id_villa);
            $this->db->where('tanggal', $tgl_1);
            $this->db->update('ketersediaan', $edit);
        }

        

        $data_session = array(
                'pdftipe_transaksi' => $this->input->post('tipe_transaksi'),
                'pdfnama_villa' => $villa_nama,
                'pdfwaktu_transaksi' => $datenow,
                'pdfnama_pemesan' => $nama_customer,
                'pdftgl_checkin' => $this->input->post('tgl_dari'),
                'pdftgl_checkout' => $this->input->post('tgl_sampai'),
                'pdftotal_bayar' => $total_bayar,
                'pdfmetode_pembayaran_jenis' => $pembayaran_jenis,
                'pdfmetode_pembayaran_isi' => $pembayaran_isi,
                'pdfmax_pembayaran' => $max_pembayaran1

        );
        $this->session->set_userdata($data_session);



        return;
    
    }

    public function autoCancelPemesanan()
    {
        $datenow = date('Y-m-d H:i');

        $this->db->where('status_pembayaran', 'Belum Dibayar');
        $this->db->where('max_pembayaran <', $datenow);
        $data = $this->db->get('transaksi');
        foreach ($data->result_array() as $row) {
            $edit = array(
                'status_pembayaran' => 'Tidak_dibayar',
                'status_pesanan' => 'Dibatalkan'
            );
            

            $this->db->where('id_transaksi', $row['id_transaksi']);
            $this->db->update('transaksi', $edit);

            $x= -1;
            for ($i=0; $i < 8; $i--) { 
                $x= $x+1;

                $tgl_dari = $row['tgl_checkin'];
                $tgl_dari1 = strtotime($tgl_dari);
                $tgl_dari2 = date('Y-m-d', strtotime("+$x day", $tgl_dari1));

                $tgl_sampai = $row['tgl_checkout'];
                $tgl_sampai1 = date('Y-m-d', strtotime($tgl_sampai));
                
                if ($tgl_dari2 == $tgl_sampai1) {
                        $i = 10;
                }
                $edit = array(
                    'status' => 'Tersedia'
                );
                

                $this->db->where('tanggal', $tgl_dari2);
                $this->db->where('id_villa', $row['id_villa']);
                $this->db->update('ketersediaan', $edit);

            }
        
        }
        return;

        
    }























    public function cek()
  	{
    	$insert = array(
         	 'nim' => $this->input->post('nim'),
         	 'nama' => $this->input->post('nama'),
         	 'username' => $this->input->post('username'),
         	 'sandi' => $this->input->post('password'),
         	 'telp' => $this->input->post('telp'),
         	 'roles' => $this->input->post('roles')
    	);
    	$result = $this->db->insert('siboba_akun', $insert);
    	return;
    
 	}

 	public function tambahbarang()
  	{
    	$insert = array(
         	 'nama_barang' => $this->input->post('nama_barang'),
         	 'stok' => $this->input->post('stok')
    	);
    	$result = $this->db->insert('siboba_barang', $insert);
    	return $result;
    }


 	public function getBarang()
  	{
    	$result = $this->db->get('siboba_barang');
    	return $result;
  	}
  	public function getBarangWhere()
  	{
  		$this->db->where('id_barang', $this->input->post('id_barang'));
    	$result = $this->db->get('siboba_barang');
    	return $result;
  	}	

    public function getBookinganSaya()
    {

        $this->db->where('nim', $this->session->userdata("nim"));
        $this->db->order_by('id_booking','desc');
        $result = $this->db->get('siboba_bookingan');
        return $result;
    }

    public function getBookinganKeseluruhan()
    {
        $this->db->order_by('id_booking','desc');
        $result = $this->db->get('siboba_bookingan');
        return $result;
    }

    public function getjadwalbooking()
    {

        $this->db->where('id_barang', $this->input->post('id_barang'));
        $result = $this->db->get('siboba_stok_harian');
        return $result;
    }

    public function getLamaWaktuBooking()
    {
        $e = 0;
        

        for ($i=0; $i < 8; $i++) { 
            $tgl_now = $this->input->post('tgl_mulai');
            $tgl = strtotime($tgl_now);
            $tgl_1    =date('Y-m-d', strtotime("+$i day", $tgl));
            

            $this->db->where('id_barang', $this->input->post('id_barang'));
            $this->db->where('tanggal', $tgl_1);
            $this->db->where('banyak_stok >=', $this->input->post('banyak'));
            $data = $this->db->get('siboba_stok_harian');
            $filter = $data->num_rows();

            if ($filter > 0) {
                $e = $e + 1;
            }
            else{
                $i = 8;
            }
            
        }

        
        return $e;
    }
  

    public function getDetailStokHarian()
    {
        $this->db->where('id_harian', $this->input->post('id_harian'));
        $result = $this->db->get('siboba_stok_harian');
        return $result;
    }


    public function getBookinganMasuk()
    {
        $this->db->where('status_ket', "Dibuat");
        $this->db->order_by('id_booking','desc');
        $result = $this->db->get('siboba_bookingan');
        return $result;
    }

    public function getBookinganKembali()
    {

        $this->db->where('status_ket', "Diambil");
        $this->db->order_by('id_booking','desc');
        $result = $this->db->get('siboba_bookingan');
        return $result;
    }	

  	public function editStokHarian()
 	{
 		$a = $this->input->post('durasi');
  		

  		for ($i=0; $i < $a; $i++) { 


  			$tgl_now = $this->input->post('tgl_mulai');
 			$tgl = strtotime($tgl_now);
 			$tgl_1    =date('Y-m-d', strtotime("+$i day", $tgl));
 			

  			$this->db->where('id_barang', $this->input->post('id_barang'));
    		$this->db->where('tanggal', $tgl_1);
    		$data = $this->db->get('siboba_stok_harian');
    		foreach ($data->result_array() as $key);

    		$edit = array(
         		'banyak_stok' => $key['banyak_stok'] - $this->input->post('banyak')
   			);

   			$this->db->where('id_barang', $this->input->post('id_barang'));
    		$this->db->where('tanggal', $tgl_1);
    		$data = $this->db->update('siboba_stok_harian', $edit);
  		}
    	return;
  	}

  	public function kembalikan_cancel_booking_edit_stok()
 	{
 		$a = $this->input->post('lama');
  		

  		for ($i=0; $i < $a; $i++) { 


  			$tgl_now = $this->input->post('tgl_booking');
 			$tgl = strtotime($tgl_now);
 			$tgl_1    =date('Y-m-d', strtotime("+$i day", $tgl));
 			

  			$this->db->where('id_barang', $this->input->post('id_barang'));
    		$this->db->where('tanggal', $tgl_1);
    		//$this->db->where('banyak_stok >=', $this->input->post('banyak'));
    		$data = $this->db->get('siboba_stok_harian');
    		foreach ($data->result_array() as $key);

    		$edit = array(
         		'banyak_stok' => $key['banyak_stok'] + $this->input->post('banyak')
   			);

   			$this->db->where('id_barang', $this->input->post('id_barang'));
    		$this->db->where('tanggal', $tgl_1);
    		//$this->db->where('banyak_stok >=', $this->input->post('banyak'));
    		$data = $this->db->update('siboba_stok_harian', $edit);
  		}
  		return;
  	}

  	public function tambahBooking()
  	{
  		$a = $this->input->post('durasi') - 1;
  		$tgl_now = $this->input->post('tgl_mulai');
  		$tgl = strtotime($tgl_now);
 		$tgl_1    =date('Y-m-d', strtotime("0 day", $tgl));
 		$tgl_2    =date('Y-m-d', strtotime("+$a day", $tgl));
 		
  		$this->db->where('id_barang', $this->input->post('id_barang'));
    	$data = $this->db->get('siboba_barang');
    	foreach ($data->result_array() as $key);

    	$insert = array(
         	'nama_barang' => $key['nama_barang'],
         	'id_barang' => $this->input->post('id_barang'),
         	'banyak' => $this->input->post('banyak'),
         	'lama' => $this->input->post('durasi'),
         	'tgl_mulai' => $this->input->post('tgl_mulai'),
         	'tgl_selesai' => $tgl_2 ,
         	'nim' => $this->input->post('nim'),
         	'status_ket' => $this->input->post('status_ket')
    	);
    	$result = $this->db->insert('siboba_bookingan', $insert);
    	return $result;
    }

    

  	public function konfirmasi_booking($id)
 	{
    	$edit = array(
       	   	'status_ket' => 'Diambil'
         	
   		);
   	$this->db->where('id_booking', $id);
   	$result = $this->db->update('siboba_bookingan', $edit);
   	return $result;
    
  	}

  	public function kembalikan_booking_set_status()
 	{
 		$tgl_now = date('Y-m-d');
 		$tgl_selesai = $this->input->post('tgl_selesai');

 		if ($tgl_now > $tgl_selesai) {
 			$status = 'Terlambat';
 		} else {
 			$status = 'Dikembalikan';
 		}
 		
    	$edit = array(
       	   	'status_ket' => $status
         	
   		);
   	$this->db->where('id_booking', $this->input->post('id_booking'));
   	$result = $this->db->update('siboba_bookingan', $edit);
   	return $result;
    
  	}

  	public function cancel_booking_set_status()
 	{
    	$edit = array(
       	   	'status_ket' => 'Dibatalkan'
         	
   		);
   	$this->db->where('id_booking', $this->input->post('id_booking'));
   	$result = $this->db->update('siboba_bookingan', $edit);
   	return $result;
    
  	}

  	public function create_jadwal()
 	{

 		$tgl_now = date('Y-m-d');
 		$tgl = strtotime($tgl_now);
 		$tgl_1    =date('Y-m-d', strtotime("+0 day", $tgl));
 		$tgl_2    =date('Y-m-d', strtotime("+1 day", $tgl));
 		$tgl_3    =date('Y-m-d', strtotime("+2 day", $tgl));
 		$tgl_4    =date('Y-m-d', strtotime("+3 day", $tgl));
 		$tgl_5    =date('Y-m-d', strtotime("+4 day", $tgl));
 		$tgl_6    =date('Y-m-d', strtotime("+5 day", $tgl));
 		$tgl_7    =date('Y-m-d', strtotime("+6 day", $tgl));

 		#1111111111111111111111111111111111111111111111111111111

 		$this->db->where('id_barang', $this->input->post('id_barang'));
 		$this->db->where('tanggal', $tgl_1);
    	$data = $this->db->get('siboba_stok_harian');
    	$filter = $data->num_rows();
    	if($filter > 0){
            
 
        }else{
        	$insert = array(
         	 'id_barang' => $this->input->post('id_barang'),
         	 'tanggal' => $tgl_1,
         	 'banyak_stok' => $this->input->post('stok')
    		);
    		$result = $this->db->insert('siboba_stok_harian', $insert);
    		
        }

        #22222222222222222222222222222222222222222222222222222222

        $this->db->where('id_barang', $this->input->post('id_barang'));
 		$this->db->where('tanggal', $tgl_2);
    	$data = $this->db->get('siboba_stok_harian');
    	$filter = $data->num_rows();
    	if($filter > 0){
            
 
        }else{
        	$insert = array(
         	 'id_barang' => $this->input->post('id_barang'),
         	 'tanggal' => $tgl_2,
         	 'banyak_stok' => $this->input->post('stok')
    		);
    		$result = $this->db->insert('siboba_stok_harian', $insert);
    		
        }

        #3333333333333333333333333333333333333333333333333333333333

        $this->db->where('id_barang', $this->input->post('id_barang'));
 		$this->db->where('tanggal', $tgl_3);
    	$data = $this->db->get('siboba_stok_harian');
    	$filter = $data->num_rows();
    	if($filter > 0){
            
 
        }else{
        	$insert = array(
         	 'id_barang' => $this->input->post('id_barang'),
         	 'tanggal' => $tgl_3,
         	 'banyak_stok' => $this->input->post('stok')
    		);
    		$result = $this->db->insert('siboba_stok_harian', $insert);
    		
        }

        #444444444444444444444444444444444444444444444444444444444

        $this->db->where('id_barang', $this->input->post('id_barang'));
 		$this->db->where('tanggal', $tgl_4);
    	$data = $this->db->get('siboba_stok_harian');
    	$filter = $data->num_rows();
    	if($filter > 0){
            
 
        }else{
        	$insert = array(
         	 'id_barang' => $this->input->post('id_barang'),
         	 'tanggal' => $tgl_4,
         	 'banyak_stok' => $this->input->post('stok')
    		);
    		$result = $this->db->insert('siboba_stok_harian', $insert);
    		
        }

        #5555555555555555555555555555555555555555555555555555555555

        $this->db->where('id_barang', $this->input->post('id_barang'));
 		$this->db->where('tanggal', $tgl_5);
    	$data = $this->db->get('siboba_stok_harian');
    	$filter = $data->num_rows();
    	if($filter > 0){
            
 
        }else{
        	$insert = array(
         	 'id_barang' => $this->input->post('id_barang'),
         	 'tanggal' => $tgl_5,
         	 'banyak_stok' => $this->input->post('stok')
    		);
    		$result = $this->db->insert('siboba_stok_harian', $insert);
    		
        }

        #6666666666666666666666666666666666666666666666666666666666

        $this->db->where('id_barang', $this->input->post('id_barang'));
 		$this->db->where('tanggal', $tgl_6);
    	$data = $this->db->get('siboba_stok_harian');
    	$filter = $data->num_rows();
    	if($filter > 0){
            
 
        }else{
        	$insert = array(
         	 'id_barang' => $this->input->post('id_barang'),
         	 'tanggal' => $tgl_6,
         	 'banyak_stok' => $this->input->post('stok')
    		);
    		$result = $this->db->insert('siboba_stok_harian', $insert);
    		
        }

        #77777777777777777777777777777777777777777777777777777777777

        $this->db->where('id_barang', $this->input->post('id_barang'));
 		$this->db->where('tanggal', $tgl_7);
    	$data = $this->db->get('siboba_stok_harian');
    	$filter = $data->num_rows();
    	if($filter > 0){
            
 
        }else{
        	$insert = array(
         	 'id_barang' => $this->input->post('id_barang'),
         	 'tanggal' => $tgl_7,
         	 'banyak_stok' => $this->input->post('stok')
    		);
    		$result = $this->db->insert('siboba_stok_harian', $insert);
    		
        }

        #delete tanggal kemarinnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn

        $this->db->where('tanggal <', $tgl_now);
    	$result = $this->db->delete('siboba_stok_harian');
    
    return;
    }

    public function validation()
    {
        return [
        [
            'field' => 'nim',
            'label' => 'NIM',
            'rules' => 'required|integer|max_length[15]'
        ],
        [
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required|max_length[60]'
        ],
        [
            'field' => 'telp',
            'label' => 'Telepon',
            'rules' => 'required|integer|max_length[15]'
        ],
        [
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|max_length[30]'
        ],
        [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|max_length[30]'
        ]
        ];
    }

    public function validation2()
    {
        return [
        [
            'field' => 'nama_barang',
            'label' => 'Nama Barang',
            'rules' => 'required|max_length[60]'
        ],
        [
            'field' => 'stok',
            'label' => 'Stok',
            'rules' => 'required|integer|max_length[11]'
        ]
        ];
    }


    
  	


}

/* End of file login_coba2_m.php */
/* Location: ./application/models/login_coba2_m.php */