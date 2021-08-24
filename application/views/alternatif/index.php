<div class="page-header">
    <h1>Halaman Alternatif</h1>
    <div class="form-group d-flex justify-content-end">
            <a href="<?php echo site_url('alternatif/tambah') ?>" type="button" class="btn btn-info">
            <i class="fas fa-plus-circle"></i> Tambah Alternatif</a>
    </div>
</div>
    <?php
    $msg = $this->session->flashdata('message');
    if (isset($msg)) {
        ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?php echo $msg; ?>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List Alternatif</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="bg-info">
                            <tr>
                                <th class="col-sm-1 text-center">No</th>
                                <th class="col-sm-6">Alternatif</th>
                                <th class="col-sm-5 text-center ">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            if (isset($alternatif)) {
                                if(count($alternatif) == 0){
                                    echo '<tr><td colspan="3" class="text-center"><h3>No Data Input</h3></td></tr>';
                                }
                                foreach ($alternatif as $item) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no++ ?></td>
                                        <td><?php echo $item->alternatif ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-primary btn-sm btn-round"
                                            href="<?= site_url('alternatif/tambah/' . $item->kdAlternatif) ?>"
                                            role="button">
                                            <i class="far fa-edit"></i> Ubah
                                            </a>

                                            <!-- Indicates a dangerous or potentially negative action -->
                                            <button type="button" data-toggle="modal" class="btn btn-danger btn-sm btn-round"
                                                    data-target="#modalDelete">
                                                    <i class="far fa-trash-alt"></i> Hapus
                                            </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
    </div>


<div class="modal fade" tabindex="-1" role="dialog" id="modalDelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi hapus data</h4>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin menghapus data ini ? </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger"
                        onclick="hapus_alternatif(<?= $item->kdAlternatif ?>)">
                    Hapus
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
