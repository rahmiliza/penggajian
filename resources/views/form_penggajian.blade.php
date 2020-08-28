
<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-contact" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> &times; </span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="id_penggajian" name="id_penggajian">
                    <input type="hidden" id="id_dosen_input" name="id_dosen">
                    
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="" class="col-md-4 control-label">Dosen</label>
                      <div class="col-md-8">
                           <select id="id_dosen" name="id_dosen" class="form-control">
								 <option value="">ID golongan</option>
								<?php 
								  foreach ($dosen  as $key => $value) {
									echo '<option value="'.$value->id_dosen.'">'.$value->nama.'</option>';
								  }
								 ?>
							</select>
                      </div>
                    </div>
                      <div class="form-group">
                      <label for="" class="col-md-4 control-label">Bulan</label>
                      <div class="col-md-8">
                          <input type="month" id="tanggal" name="tanggal" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="" class="col-md-4 control-label">Jumlah Jam Hadir</label>
                      <div class="col-md-8">
                          <input type="number" id="jml_hadir" name="jml_hadir" class="form-control" min="1" >
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>
                  

              </div>
                      


              </div>

            </div>    
           </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>

            </form>
        </div>
    </div>
</div>



