    <div class="page-header">
        <h1>Tambah Kriteria</h1>
    </div>
    <div class="card">
        <div class="col-lg-12">
                <div class="card-body">
                    <div class="errors">
                        <?php
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
                    <?php echo form_open('',array('class' => 'form-horizontal'))?>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <?php echo form_label('Kriteria :', '',array('for' => 'inputKriteria', 'class' => 'col-sm-2 control-label')) ?>
                            <div class="col-sm-10">
                                <?php echo form_input('kriteria', set_value('kriteria'), array('id' => 'inputKriteria', 'class' =>'form-control' )) ?>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <?php echo form_label('Bobot :', '',array('for' => 'inputBobot', 'class' => 'col-sm-2 control-label')) ?>
                            <div class="col-sm-10">
                                <?php echo form_input('bobot', set_value('bobot'), array('id' => 'inputBobot', 'class' =>'form-control' )) ?>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <?php echo form_label('Sifat :', '',array('for' => 'inputSifat', 'class' => 'col-sm-2 control-label')) ?>
                            <div class="col-md-10">
                                <label class="radio-inline">
                                    <?php echo form_radio('sifat','B', true )?> Benefit
                                </label>
                                <label class="radio-inline">
                                    <?php echo form_radio('sifat','C' )?> Cost
                                </label>
        
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                                <?php echo form_label('Item Criteria :', '',array('class' => 'control-label')) ?>
                        </div>
                        <div class="form-group col-md-2">                          
                                <?php echo form_input('itemKriteria1', set_value('itemKriteria1'), array('id' => 'itemKriteria1', 'class' =>'form-control','placeholder'=>'Value 1'  )) ?>
                        </div>

                        <div class="form-group col-md-2">
                                <?php echo form_input('itemKriteria2', set_value('itemKriteria2'), array('id' => 'itemKriteria2', 'class' =>'form-control', 'placeholder'=>'Value 2' )) ?>
                        </div>

                        <div class="form-group col-md-2">
                                <?php echo form_input('itemKriteria3', set_value('itemKriteria3'), array('id' => 'itemKriteria3', 'class' =>'form-control', 'placeholder'=>"Value 3")) ?>

                        </div>

                        <div class="form-group col-md-2">
                                <?php echo form_input('itemKriteria4', set_value('itemKriteria4'), array('id' => 'itemKriteria4', 'class' =>'form-control', 'placeholder'=>"Value 4" )) ?>
                        </div>

                        <div class="form-group col-md-2">
                                <?php echo form_input('itemKriteria5', set_value('itemKriteria5'), array('id' => 'itemKriteria5', 'class' =>'form-control', 'placeholder'=>"Value 5" )) ?>
                        <div class="form-group col-md-2">
                            <div class="col-sm-offset-2 col-sm-10">
                                <?php echo form_submit('simpan', 'Simpan', array('class' => 'btn btn-success')) ?>
                            </div>
                        </div>

                    </div>
                    <?php echo form_close()?>
                </div>
        
        </div>
    </div>
