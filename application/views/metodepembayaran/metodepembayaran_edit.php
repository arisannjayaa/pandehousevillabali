<div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                            <form class="form form-horizontal" action="<?php echo base_url('AdminContactPerson/aksi_edit')?>" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <input type="text" id="first-name" class="form-control" name="id_contact_person"
                                                placeholder="Nama Fasilitas" value="<?php foreach ($kontak->result_array() as $kontak_data){
                                                echo $kontak_data['id_contact_person']; 
                                                }?>" hidden>
                                        <div class="col-md-4">
                                            <label>Jenis Kontak</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name" class="form-control" name="jenis_cp"
                                                placeholder="Nama Fasilitas" value="<?php foreach ($kontak->result_array() as $kontak_data){
                                                echo $kontak_data['jenis_cp']; 
                                                }?>"   required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Isi Kontak</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="email-id" class="form-control" name="isi_cp"
                                                placeholder="Deskripsi" value="<?php foreach ($kontak->result_array() as $kontak_data){
                                                echo $kontak_data['isi_cp']; 
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
