<div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">

                            <form class="form form-horizontal" action="<?php echo base_url('AdminVilla/aksi_tambahvilla')?>" method="post" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama Villa</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name" class="form-control" name="nama"
                                                placeholder="Nama Villa" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Deskripsi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="email-id" class="form-control" name="deskripsi"
                                                placeholder="Deskripsi" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Harga</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="number" id="contact-info" class="form-control" name="harga"
                                                placeholder="Harga" required>
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