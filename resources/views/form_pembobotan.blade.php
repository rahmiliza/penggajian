


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
                    <input type="hidden" id="id_pembobotan" name="id_pembobotan">
                    

            <div class="row">
             
                <div class="col-md-4">
                </div>
              <div class="form-group">
                      <label for="" class="col-md-4 control-label">Nama Proyek</label>
                      <div class="col-md-8">
                           <select id="id_proyek" name="id_proyek">
                                     <option value="">Pilih Proyek</option>
                                    <?php 
                                      foreach ($proyek  as $key => $value) {
                                        echo '<option value="'.$value->id_proyek.'">'.$value->proyek.'</option>';
                                      }
                                     ?>
                                      
                                     
                                    </select>
                      </div>
                    </div>
                <div class="col-md-4">

                      <div class="form-group">
                      <label for="" class="col-md-4 control-label">Wilayah</label>
                      <div class="col-md-8">
                          <input type="text" id="wilayah" name="wilayah" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>
                     

              </div> 
     

              </div> 
                <div class="col-md-4">

                      <div class="form-group">
                      <label for="" class="col-md-4 control-label">Jangka Waktu</label>
                      <div class="col-md-8">
                          <input type="text" id="jangkawaktu" name="jangkawaktu" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>
                     

              </div> 
                <div class="col-md-4">

                      <div class="form-group">
                      <label for="" class="col-md-4 control-label">Harga</label>
                      <div class="col-md-8">
                          <input type="text" id="harga" name="harga" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>
                     

              </div> 
                <div class="col-md-4">

                      <div class="form-group">
                      <label for="" class="col-md-4 control-label">Uang DP</label>
                      <div class="col-md-8">
                          <input type="text" id="dp" name="dp" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>
                     

              </div> 
                <div class="col-md-4">

                      <div class="form-group">
                      <label for="" class="col-md-4 control-label">Pembayaran</label>
                      <div class="col-md-8">
                          <input type="text" id="pembayaran" name="pembayaran" class="form-control" >
                          <span class="help-block with-errors"></span>
                      </div>
                    </div>
                     

              </div> 
              <div class="col-md-4">
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



