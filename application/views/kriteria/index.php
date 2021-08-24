<div class="page-header">
    <h1>Halaman Olah Kriteria</h1>
    <div class="form-group d-flex justify-content-end">
            <a href="<?php echo site_url('kriteria/tambah') ?>" type="button" class="btn btn-info">
            <i class="fas fa-plus-circle"></i> Tambah Kriteria</a>
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
                <!-- Default panel contents -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">List Kriteria</h4>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="text-center col-sm-1">No</th>
                                <th class="col-sm-2">Kriteria</th>
                                <th class="text-center col-sm-1">Sifat</th>
                                <th class="text-center col-sm-1">Bobot</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $no = 1;
                            foreach ($kriteria as $item) :?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $item->kriteria ?></td>
                                    <td class="text-center"><?= $item->sifat ?></td>
                                    <td class="text-center"><?= $item->bobot ?></td>
                                    <td class="text-center">

                                        <!-- Contextual button for informational alert messages -->
                                        <button type="button" class="btn btn-info btn-round btn-sm"
                                                onclick="lihat_kriteria(<?= $item->kdKriteria; ?>)" data-toggle="modal">
                                                <i class="fas fa-info-circle"></i> Lihat
                                        </button>

                                        <!-- Indicates caution should be taken with this action -->
                                        <button type="button" class="btn btn-warning btn-round btn-sm"
                                                onclick="edit_kriteria(<?= $item->kdKriteria; ?>)">
                                            <i class="far fa-edit"></i> Ubah Kriteria
                                        </button>

                                        <button type="button" class="btn btn-primary btn-round btn-sm"
                                                onclick="edit_item_kriteria(<?= $item->kdKriteria; ?>)">
                                            <i class="far fa-edit"></i> Ubah Subkriteria
                                        </button>

                                        <!-- Indicates a dangerous or potentially negative action -->
                                        <button type="button" data-toggle="modal" class="btn btn-danger btn-round btn-sm"
                                                data-target="#modalDelete">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                        </button>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="form-group">
            </div>

        </div>



<!-- MODAL AREA -->

<!-- Bootstrap modal -->
<div class="modal fade modal-black" id="form_kriteria" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Ubah Kriteria Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="formKriteria" class="form-horizontal">
                    <div id="errors">

                    </div>
                    <div class="form-body">
                        <input name="kdKriteria" placeholder="Kode Kriteria" class="form-control" type="hidden">

                        <div class="form-group">
                            <label class="control-label col-md-3">Kriteria</label>
                            <div class="col-md-9">
                                <input name="kriteria" placeholder="Kriteria" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSifat" class="control-label col-md-3">Sifat </label>
                            <div class="col-sm-9">
                                <label class="radio-inline">
                                    <input type="radio" name="sifat" id="benefit" value="B" checked="checked"/>
                                    Benefit
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sifat" id="cost" value="C"/>
                                    Cost
                                </label>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Bobot</label>
                            <div class="col-md-9">
                                <input name="bobot" placeholder="Bobot" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_kriteria()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Bootstrap modal -->
<div class="modal fade modal-black" id="form_item_kriteria" role="dialog">
    <div class="modal-dialog modal-lg modal-item-kriteria">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="formItemKriteria">
                    <div id="errors"></div>
                    <div class="form-row">
                        <input id="kdKriteriaSub" name="kdKriteria" placeholder="Kode Kriteria" class="form-control"
                               type="hidden">
                        <?php
                        $no = 1;
                        for ($no; $no <= 5; $no++) : ?>

                            <label class="control-label col-md-3">Item Kriteria <?php echo $no ?></label>
                            <div class="form-group col-md-5">
                                        <input name="itemKriteria<?php echo $no ?>"
                                               placeholder="Item Kriteria <?php echo $no ?>" class="form-control"
                                               type="text" autofocus="true">
                                        <input name="kdSubKriteria<?php echo $no ?>" type="hidden">
                            </div>
                            <label class="control-label col-md-2">Value</label>
                            <div class="form-group col-md-2">
                                            <input name="value<?php echo $no ?>" placeholder="" class="form-control text-primary"
                                                   type="text" readonly>
                            </div>

                        <?php endfor;?>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" id="btnSave" onclick="save_item_kriteria()" class="btn btn-primary">Save</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
                <button type="button" class="btn btn-danger" onclick="hapus_kriteria(<?php echo $item->kdKriteria; ?>)">
                    Hapus
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Bootstrap modal -->
<div class="modal fade modal-black" id="view_kriteria" role="dialog">
    <div class="modal-dialog modal-lg view-detail-kriteria" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body">
                        <div class="col-md-12">
                        <table class="table">
                            <tr>
                                <td><b>Kode Kriteria</b></td>
                                <td><div id="viewKodeKriteria"></div></td>
                            </tr>
                            <tr>
                                <td><b>Nama Kriteria</b></td>
                                <td><div id="viewKriteria"></div></td>
                                <td><b>Sifat</b></td>
                                <td><div id="viewSifat"></div></td>
                                <td><b>Bobot</b></td>
                                <td><div id="viewBobot"></div></td>
                            </tr>
                        </table>
                        </div>

                    <h3 class="title mt-3">List SubKriteria</h3>
                    <table class="table">
                    <?php
                    $no = 1;
                    for ($no; $no <= 5; $no++) :?>
                        <tr>
                            <td><b>SubKriteria  <?php echo $no ?> :</b></td>  
                                <td>
                                    <div id="viewItemKriteria<?php echo $no ?>"></div>
                                </td>
                            <td><b>Value :</b>
                                <td>
                                    <div id="viewValue<?php echo $no ?>"></div>
                                </td>
                            </td>
                        </tr>

                    <?php endfor; ?>
                    </table>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- END MODAL AREA -->