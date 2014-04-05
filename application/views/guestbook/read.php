<div id="main-content">
   <?=form_open($action);?> 
   <div class="container-fluid">
       <div class="row-fluid">
           <div class="span12">
               <h3 class="page-title">Kotak Masuk</h3>
           </div>
       </div>
       <?=$message;?>
       <div class="row-fluid">
           <div class="span12">
                <div class="widget">
                     <div class="widget-title">
                          <h4><i class="icon-comments"></i></h4>
                          <span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                          </span>
                     </div>
                     <div class="widget-body">
                          <button class="btn btn-mini btn-danger tooltips" data-placement="top" data-original-title='Delete Permanently'><i class="icon-trash"></i> Delete Permanently</button>
                          <br><br>  
                          <table class="table table-striped table-condensed table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                    <th style="width:8px;">No.</th>
                                    <th>Pesan</th>
                                    <th style="width:25px;">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($query->result() as $row) : ?>
                                <tr class="odd gradeX">
                                    <td><input type="checkbox" class="checkboxes" name="id[]" value="<?=$row->id;?>" /></td>
                                    <td><?=$no;?></td>
                                    <td>
                                    <div class="text-warning"><i class="icon-calendar"></i>&nbsp;<?=$row->date;?>&nbsp;&nbsp;<i class="icon-user"></i> <?=$row->name;?>&nbsp;&nbsp;<i class="icon-envelope-alt"></i> <?=$row->email;?></div>
                                    <?=word_limiter($row->content, 50);?>
                                    </td>
                                    <td>
                                        <?=anchor($this->uri->segment(1).'/reply/'.$row->id, '<i class="icon-share-alt"></i>', array('class' => 'btn btn-mini btn-success tooltips', 'data-placement' => 'top', 'data-original-title' => 'Reply'));?>
                                    </td>
                                </tr>
                                <?php $no++; endforeach;?>
                            </tbody>
                        </table>
                     </div>
                </div>
           </div>
       </div>
   </div>
   <?=form_close();?>
</div>