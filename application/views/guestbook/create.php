<div id="main-content">
   <div class="container-fluid">
       <div class="row-fluid">
           <div class="span12">
               <h3 class="page-title">Hubungi Kami</h3>
           </div>
       </div>
       <br>
       <?=$message;?>
       <div class="row-fluid">
           <div class="span12">
                <div class="widget">
                     <div class="widget-title">
                          <h4><i class="icon-comments"></i></h4>
                     </div>
                     <div class="widget-body form">
                        <?=form_open($action, 'class="form-horizontal"');?>

                            <div class="row-fluid blog">
                               <div class="span12 news">
                                   <h4><?=config('nama_sekolah');?></h4>
                                   <p>Alamat : <?=config('alamat');?></p>
                                   <p>Email : <?=config('email');?></p>
                                   <p>Website : <?=config('website');?></p>
                               </div>
                            </div>
                            <div class="space20"></div>

                            <div class="control-group">
                                 <label class="control-label">Nama</label>
                                 <div class="controls">
                                     <input type="text" name="name" required="true" value="<?=set_value('name') ? set_value('name') : $query['name']?>" class="span12" autocomplete="off" autofocus="true" />
                                 </div>
                            </div>
                            <div class="control-group">
                                 <label class="control-label">Email</label>
                                 <div class="controls">
                                     <input type="email" name="email" required="true" value="<?=set_value('email') ? set_value('email') : $query['email']?>" class="span12" autocomplete="off" placeholder="Pesan akan kami balas melalui email Anda!"/>
                                 </div>
                            </div>
                            <div class="control-group">
                                 <label class="control-label">Pesan</label>
                                 <div class="controls">
                                     <textarea name="content" class="span12" required="true" rows="8"><?=set_value('content') ? set_value('content') : $query['content']?></textarea>
                                 </div>
                            </div>
                            
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
                                                                                                                
                            <div class="form-actions">
                                 <button type="submit" class="btn btn-success"><i class="icon-save"></i> Submit</button>
                            </div>
                          <?=form_close();?>
                          </div>
                     </div>
                </div>
           </div>
       </div>
   </div>
</div>