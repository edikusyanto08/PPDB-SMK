<div id="main-content">
   <div class="container-fluid">
       <div class="row-fluid">
           <div class="span12">
               <h3 class="page-title">Kotak Masuk</h3>
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
                     <div class="widget-body">
                        <?=form_open($action, 'class="form-horizontal"');?>
                            <input type="hidden" name="email" value="<?=$query['email'];?>"/>
                            <table class="table table-striped">
                                <tbody>
                                   <tr>
                                      <td style="width:25%;">Dari</td>
                                      <td><?=config('email');?></td>
                                   </tr>
                                   <tr>
                                      <td>Kepada</td>
                                      <td><?=$query['email'];?></td>
                                   </tr>
                                   <tr>
                                      <td>Subjek</td>
                                      <td><?=config('meta_description');?></td>
                                   </tr>
                                   <tr>
                                      <td>Pesan Masuk</td>
                                      <td><?=$query['content'];?></td>
                                   </tr>
                                   <tr>
                                      <td>Pesan Balasan</td>
                                      <td><textarea name="reply" class="span12" required="true" rows="8"></textarea></td> 
                                   </tr>
                                </tbody>
                            </table>

                            <div class="form-actions">
                                 <button type="submit" class="btn btn-success"><i class="icon-share-alt"></i> Kirim Pesan Balasan</button>
                                 <?=anchor($this->uri->segment(1), '<i class="icon-undo"></i> Cancel', array('class' => 'btn'));?>
                            </div>
                          <?=form_close();?>
                          </div>
                     </div>
                </div>
           </div>
       </div>
   </div>
</div>