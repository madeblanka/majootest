<?php $this->load->view('admin/_partials/head')?>
<?php $this->load->view('admin/_partials/sidebar')?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><a href="<?= site_url('user/formtambahbarang')?>"> Tambah barang</a></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($barang as $b):?>
                                        <tr>
                                            <td><a href="<?= site_url('user/formeditbarang/'.$b->nama)?>"><?= $b->nama?></a></td>
                                            <td><?= $b->deskripsi?></td>
                                            <td><?= $b->harga?></td>
                                            <td><img width="120 " src="<?php echo base_url(); ?>uploads/<?= $b->gambar?>"/></td>
                                            <td> <a href="<?php echo site_url('user/deletebarang/'.$b->nama) ?>"
                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?');" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a></td>
                                        </tr>
                                        <?php endforeach?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php $this->load->view('admin/_partials/footer')?>