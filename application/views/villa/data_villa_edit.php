<div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                            <form class="form form-horizontal" action="<?php echo base_url('AdminVilla/aksi_editvilla')?>" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        
                                        <input type="text" id="first-name" class="form-control" name="id_villa" placeholder="Nama Villa" value="<?php foreach ($villa->result_array() as $villa_data){
                                            echo $villa_data['id_villa']; 
                                            }?>" hidden>
                                        
                                        <div class="col-md-4">
                                            <label>Nama Villa</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name" class="form-control" name="nama"
                                                placeholder="Nama Villa" value="<?php foreach ($villa->result_array() as $villa_data){
                                                echo $villa_data['nama']; 
                                                }?>"   required>
                                        </div>


                                        <div class="col-md-4">
                                            <label>Deskripsi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="email-id" class="form-control" name="deskripsi"
                                                placeholder="Deskripsi" value="<?php foreach ($villa->result_array() as $villa_data){
                                                echo $villa_data['deskripsi']; 
                                                }?>"   required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Harga</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="contact-info" class="form-control" name="harga"
                                                placeholder="Harga" value="<?php foreach ($villa->result_array() as $villa_data){
                                                echo $villa_data['harga']; 
                                                }?>"   required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Foto Sampul</label><br>
                                            <label>*File harus JPG / PNG</label><br>
                                            <label>*Nama file harus selalu berbeda</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="file" id="password" class="form-control" name="filegambar"
                                                placeholder="Foto Sampul" value="Upload" required>
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
