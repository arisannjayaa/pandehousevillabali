<div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                            <form class="form form-horizontal" action="<?php echo base_url('AdminMetodePembayaran/aksi_edit')?>" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <input type="text" id="first-name" class="form-control" name="id_metode_pembayaran"
                                                placeholder="Nama Fasilitas" value="<?php foreach ($pembayaran->result_array() as $pembayaran_data){
                                                echo $pembayaran_data['id_metode_pembayaran']; 
                                                }?>" hidden>
                                        <div class="col-md-4">
                                            <label>Jenis Pembayaran</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name" class="form-control" name="jenis_pembayaran"
                                                placeholder="Jenis Pembayaran" value="<?php foreach ($pembayaran->result_array() as $pembayaran_data){
                                                echo $pembayaran_data['jenis_pembayaran']; 
                                                }?>"   required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Isi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="email-id" class="form-control" name="isi"
                                                placeholder="Isi" value="<?php foreach ($pembayaran->result_array() as $pembayaran_data){
                                                echo $pembayaran_data['isi']; 
                                                }?>"   required>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
