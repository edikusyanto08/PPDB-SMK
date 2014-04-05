<div id="main-content">
   <div class="container-fluid">
       <div class="row-fluid">
           <div class="span12">
               <h3 class="page-title">Penerimaan Siswa Baru Tahun <?=config('ppdb_tahun');?></h3>
               <?php
               if ($this->uri->segment(2) == 'update')
               {
                   echo anchor('siswa/read', '<i class="icon-th-list"></i>', array('class' => 'btn btn-mini btn-success'));
               }
               ?>
               
           </div>
       </div>
       <br>
       <?=$message;?>
       <div class="row-fluid">
           <div class="span12">
                <div class="widget">
                     <div class="widget-title">
                          <h4><i class="icon-signin"></i> Form Pendaftaran</h4>
                     </div>
                     <div class="widget-body form">
                          <?=form_open_multipart($action, 'class="form-horizontal"');?>
                              
                              <?php if ($this->uri->segment(2) == 'update') { ?>
                              <div class="control-group">
                                   <label class="control-label">No. Pendaftaran</label>
                                   <div class="controls">
                                       <input type="text" value="<?=$query['no_daftar'];?>" class="span12" readonly="true"/>
                                   </div>
                              </div>
                              <?php } ?>
                                                            
                              <div class="control-group">
                                   <label class="control-label">Nama</label>
                                   <div class="controls">
                                       <input type="text" name="nama" required="true" value="<?=set_value('nama') ? set_value('nama') : $query['nama']?>" class="span12" autocomplete="off"/>
                                   </div>
                              </div>
                              
                              <div class="control-group">
                                  <label class="control-label">Jalur Pendaftaran</label>
                                  <div class="controls">
                                     <?php
                                     $jalur = array('1' => 'Umum', '2' => 'Prestasi');
                                     echo form_dropdown('jalur_id', $jalur, $query['jalur_id'], "class='span12 chosen'");?>
                                  </div>
                              </div>
                              
                              <div class="control-group">
                                  <label class="control-label">Pilihan I</label>
                                  <div class="controls">
                                     <?=form_dropdown('pil_1', $prodi, $query['pil_1'], "class='span12 chosen'");?>
                                  </div>
                              </div>
                              
                              <div class="control-group">
                                  <label class="control-label">Pilihan II</label>
                                  <div class="controls">
                                     <?=form_dropdown('pil_2', $prodi, $query['pil_2'], "class='span12 chosen'");?>
                                  </div>
                              </div>

                              <div class="control-group">
                                   <label class="control-label">Tempat Lahir</label>
                                   <div class="controls">
                                       <input type="text" name="tmp_lahir" required="true" value="<?=set_value('tmp_lahir') ? set_value('tmp_lahir') : $query['tmp_lahir']?>" class="span12" autocomplete="off"/>
                                   </div>
                              </div>
                              
                              <div class="control-group">
                                   <label class="control-label">Tanggal Lahir</label>
                                   <div class="controls">
                                       <input name="tgl_lahir" required="true" class="span5" type="text" data-mask="99-99-9999" value="<?=$this->uri->segment(2) == 'create' ? '' : extract_date($query['tgl_lahir']);?>">
                                       <span class="help-inline">Day-Month-Year</span>
                                   </div>
                              </div>
                                                            
                              <div class="control-group">
                                  <label class="control-label">Jenis Kelamin</label>
                                  <div class="controls">
                                     <?php
                                     $jk = array('L' => 'Laki-Laki', 'P' => 'Perempuan');
                                     echo form_dropdown('jns_kelamin', $jk, $query['jns_kelamin'], "class='span12 chosen'");?>
                                  </div>
                              </div>
                              
                              <div class="control-group">
                                  <label class="control-label">Agama</label>
                                  <div class="controls">
                                     <?php
                                     $ag = array('1' => 'Islam', '2' => 'Kristen', '3' => 'Katolik', '4' => 'Hindu', '5' => 'Budha');
                                     echo form_dropdown('agama', $ag, $query['agama'], "class='span12 chosen'");?>
                                  </div>
                              </div>
                              
                              <div class="control-group">
                                  <label class="control-label">Alamat</label>
                                  <div class="controls">
                                     <textarea name="alamat" required="true" class="span12" rows="4"><?=set_value('alamat') ? set_value('alamat') : $query['alamat']?></textarea>
                                  </div>
                              </div>
                              
                              <div class="control-group">
                                   <label class="control-label">Telp</label>
                                   <div class="controls">
                                       <input type="text" name="telp" required="true" value="<?=set_value('telp') ? set_value('telp') : $query['telp']?>" class="span12" autocomplete="off"/>
                                   </div>
                              </div>
                              
                              <div class="control-group">
                                   <label class="control-label">Email</label>
                                   <div class="controls">
                                       <input type="email" name="email" value="<?=set_value('email') ? set_value('email') : $query['email']?>" class="span12" autocomplete="off"/>
                                   </div>
                              </div>
                              
                              <div class="control-group">
                                   <label class="control-label">Asal Sekolah</label>
                                   <div class="controls">
                                       <input type="text" name="asal_sekolah" required="true" value="<?=set_value('asal_sekolah') ? set_value('asal_sekolah') : $query['asal_sekolah']?>" class="span12" autocomplete="off"/>
                                   </div>
                              </div>

                              <div class="control-group">
                                   <label class="control-label">Nama Orang Tua</label>
                                   <div class="controls">
                                       <input type="text" name="nama_ortu" value="<?=set_value('nama_ortu') ? set_value('nama_ortu') : $query['nama_ortu']?>" class="span12" autocomplete="off"/>
                                   </div>
                              </div>
                              
                              <div class="control-group">
                                   <label class="control-label">Pekerjaan Orang Tua</label>
                                   <div class="controls">
                                       <?php
                                       echo form_dropdown('pekerjaan_ortu', $pekerjaan, $query['pekerjaan_ortu'], "class='span12 chosen'");
                                       ?>
                                   </div>
                              </div>

                              <div class="control-group">
                                   <label class="control-label">Telp Orang Tua</label>
                                   <div class="controls">
                                       <input type="text" name="telp_ortu" required="true" value="<?=set_value('telp_ortu') ? set_value('telp_ortu') : $query['telp_ortu']?>" class="span12" autocomplete="off"/>
                                   </div>
                              </div>
                              
                              <div class="control-group">
                                  <label class="control-label">Photo</label>
                                  <div class="controls">
                                      <div class="fileupload fileupload-new" data-provides="fileupload">
                                          <div class="fileupload-new thumbnail" style="width: auto; height: auto;">
                                              <img src="<?=$photo;?>"/>
                                          </div>
                                          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width:113px; max-height:170px; line-height: 20px;"></div>
                                          <div>
                                             <span class="btn btn-file">
                                                <span class="fileupload-new">Browse</span>
                                                <span class="fileupload-exists">Change</span>
                                                <input type="file" class="default" name="file"/>
                                             </span>
                                             <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                          </div>
                                      </div>
                                      <div class="text-warning">Catatan ! Hanya file dengan type .JPG dan ukuran file maksimal 2 Mb.</div>
                                  </div>
                              </div>
                              
                              <?php if ($this->uri->segment(2) == 'create') { ?>
                              <div class="control-group">
                                 <label class="control-label">Kode Keamanan</label>
                                 <div class="controls">
                                     <?php echo $captcha['image'];?>
                                 </div>
                              </div>
                              <div class="control-group">
                                 <div class="controls">
                                     <input type="text" name="captcha" required="true" class="span5" autocomplete="off" placeholder="Masukan 6 digit angka diatas"/>
                                 </div>
                              </div>
                              <?php } ?>
                              
                              <div class="form-actions">
                                   <?php
                                   if ($this->uri->segment(2) == 'update')
                                   {
                                       echo '<button type="submit" class="btn btn-success"><i class="icon-save"></i> Update</button>&nbsp;'; 
                                       echo anchor($this->uri->segment(1), '<i class="icon-undo"></i> Cancel', array('class' => 'btn'));
                                   }
                                   else
                                   {
                                       echo '<button type="submit" class="btn btn-success"><i class="icon-save"></i> Daftar</button>'; 
                                   }
                                   ?>
                              </div>
                          </form>
                     </div>
                </div>
           </div>
       </div>
   </div>
</div>