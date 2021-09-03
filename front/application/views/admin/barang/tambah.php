<?php $this->load->view('admin/_partials/head')?>
<?php $this->load->view('admin/_partials/sidebar')?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                  <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Barang</h6>
                        </div>
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data" action="<?= site_url('user/tambahbarang')?>">
                                <div class="form-group">
                                    <label for="exampleInputnama">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama" id="exampleInputnama" aria-describedby="namaHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Deskripsi</label>
                                    <input type="text-area" name="deskripsi" class="form-control" id="exampleInputdeskripsi">
                                </div>
                               <div class="form-group">
                                    <label for="exampleInputharga">Harga</label>
                                    <input type="number" class="form-control" name="harga" id="exampleInputharga" aria-describedby="hargaHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputnama">Gambar</label>
                                    <input type="file" class="form-control" name="gambar" id="exampleInputnama" aria-describedby="namaHelp">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                
<?php $this->load->view('admin/_partials/footer')?>