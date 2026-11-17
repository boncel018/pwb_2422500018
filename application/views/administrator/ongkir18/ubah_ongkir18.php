<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ubah Ongkir18</h5>
                            
                            <p class="card-text">
                                <form method="post">
                                    <div class="mb-3">
                                        <label for="nama_ekspedisi018" class="form-label">Nama ekspedisi18</label>
                                        <input type="text" class="form-control" name="nama_ekspedisi018" id="nama_ekpedisi018" value="<?= $ongkir18['nama_ekspedisi018'] ?>" aria-describedby="Nama Ekspedisi018">
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis_layanan018" class="form-label">Jenis Layanan018</label>
                                        <textarea name="jenis_layanan018" id="jenis_layanan018" cols="30" rows="10" class="form-control"><?= $ongkir18['jenis_layanan018'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tarif_per_kg018" class="form-label">Tarif Per Kg018</label>
                                        <input type="text" class="form-control" name="tarif_per_kg018" id="tarif_per_kg018" value="<?= $ongkir18['tarif_per_kg018'] ?>" aria-describedby="Tarif Per Kg018">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status018" class="form-label">Status018</label>
                                        <input type="text" class="form-control" name="status018" id="status018" value="<?= $ongkir18['status018'] ?>" aria-describedby="status018">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                    <a href="<?= base_url('admin/ongkir18') ?>" class="btn btn-danger">Kembali</a>
                                </form>
                            </p>
                        </div>
                    </div>

                </div>
                <!-- /.col-md-6 -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->