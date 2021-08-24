<div class="page-header">
    <h1>Tambah Alternatif</h1>
</div>
    <?php echo form_open() ?>
    <div class="row">
        <div class="errors">
            <?php
        //    dump($nilaiAlternatif);
        //    dump($dataView);
        //    foreach ($nilaiAlternatif as $item => $value) {
        //        echo $value->nilai;
        //    }
            $errors = $this->session->flashdata('errors');
            if (isset($errors)) {
                foreach ($errors as $error) {
                    ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <?php echo $error; ?>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                        <div class="form-group">
                            <label for="alternatif">Nama Alternatif</label>
                            <input name="alternatif" type="text" class="form-control" id="alternatif"
                                value="<?php echo isset($nilaiAlternatif[0]->alternatif) ? $nilaiAlternatif[0]->alternatif : ''?>"
                                placeholder="Nama Alternatif" autofocus="true">
                        </div>
                </div>
            </div>
        </div>

        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-2">Kriteria</th>
                                <th colspan="5" class="text-center col-md-9">Nilai</th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($dataView as $item) {
                        ?>
                        <tr>
                            <td><?php echo $item['nama']; ?></td>
                            <?php
                            $no = 1;
                            foreach ($item['data'] as $dataItem) {
                                ?>
                                <td>
                                    <input type="radio" name="nilai[<?php echo $dataItem->kdKriteria ?>]"
                                           value="<?php echo $dataItem->value ?>"
                                            <?php
                                            if(isset($nilaiAlternatif)){
                                                foreach ($nilaiAlternatif as $item => $value) :
                                                    // var_dump($value);
                                                    if($dataItem->kdKriteria == $value->kdKriteria && $dataItem->value == $value->nilai):?>
                                                    checked
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php
                                            }else{
                                                if($no == 3){
                                                    ?>
                                                    checked
                                                    <?php
                                                }
                                            }
                                            ?>
                                    /> 
                                    <?php echo $dataItem->subKriteria;
                                    $no++;
                                   ?>
                                </td>
        
                                <?php
                            }
                            echo '</tr>';
                            }
                            ?>
                    </table>
                    <div class="card-footer d-flex justify-content-end">
                        <button class="btn btn-primary btn-round mr-2" type="submit">Save</button>
                        <a class="btn btn-danger btn-round" href="<?= site_url('alternatif') ?>" role="button">Batal</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php echo form_close() ?>
