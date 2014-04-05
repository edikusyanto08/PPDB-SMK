<div id="main-content">
   <div class="container-fluid">
       <div class="row-fluid">
           <div class="span12">
               <h3 class="page-title">PPDB Online <?=config('nama_sekolah');?> Tahun <?=config('ppdb_tahun');?></h3>
           </div>
       </div>
       <?=$message;?>
       <div class="square-state">
           <div class="row-fluid">
               
               <?php if ($this->session->userdata('user_level') == 1) { ?>
               <?=anchor('users', '<i class="icon-user"></i> <div>Users</div>', array('class' => 'icon-btn span2'));?> 
               <?php } ?>
               
               <?=anchor('laporan', '<i class="icon-bar-chart"></i> <div>Laporan</div>', array('class' => 'icon-btn span2'));?>
               <?=anchor('guestbook/read', '<i class="icon-envelope"></i> <div>Kotak Masuk</div>', array('class' => 'icon-btn span2'));?>
               <?=anchor('post/read', '<i class="icon-edit"></i> <div>Posts</div>', array('class' => 'icon-btn span2'));?>
               <?=anchor('configuration/index/1', '<i class="icon-wrench"></i> <div>Configuration</div>', array('class' => 'icon-btn span2'));?>
               <?=anchor('dashboard/user_guide', '<i class="icon-book"></i> <div>User Guide</div>', array('class' => 'icon-btn span2'));?>
            </div>
       </div>
       
       <div class="row-fluid">
           <div class="span6">
               <div class="widget">
                  <div class="widget-title">
                     <h4><i class="icon-bar-chart"></i> <?=$title;?></h4>
                  </div>
                  <div class="widget-body">
                     <table class="table table-striped">
                        <tbody>
                           <tr>
                              <td>Jumlah Pendaftar</td>
                              <td><span class="badge badge-success"><?=$a;?></span></td>
                           </tr>
                           <tr>
                              <td>Jumlah Siswa Diterima</td>
                              <td><span class="badge badge-success"><?=$b;?></span></td>
                           </tr>
                           <tr>
                              <td>Jumlah Siswa Tidak Diterima</td>
                              <td><span class="badge badge-success"><?=$c;?></span></td>
                           </tr>
                           <tr>
                              <td>Jumlah Siswa Belum Diseleksi</td>
                              <td><span class="badge badge-success"><?=$d;?></span></td>
                           </tr>
                           <tr>
                              <td>Pendaftar Jalur SKHUN</td>
                              <td><span class="badge badge-success"><?=$e;?></span></td>
                           </tr>
                           <tr>
                              <td>Pendaftar Jalur Tes Tulis</td>
                              <td><span class="badge badge-success"><?=$f;?></span></td>
                           </tr>
                           <tr>
                              <td>Pendaftar Jalur Prestasi</td>
                              <td><span class="badge badge-success"><?=$g;?></span></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
           </div>
           <div class="span6">
               <div class="widget">
                   <div class="widget-title">
                       <h4><i class=" icon-signin"></i> Recent Log</h4>
                       <?php if ($logs->num_rows() > 0 && $this->session->userdata('user_level') == 1) { ?>
                       
                       <div class="actions">
                           <div class="btn-group">
                               <?=anchor('dashboard/clear_recent_history', '<i class="icon-trash"></i> Clear Log', array('class' => 'btn btn-mini btn-warning'));?>
                           </div>
                       </div>
                       
                       <?php } ?>
                   </div>
                   <div class="widget-body">
                       <?php if ($logs->num_rows() > 0) { ?>
                       <table class="table table-striped table-hover">
                           <thead>
                               <tr>
                                   <?php if ($this->session->userdata('user_level') == 1) { ?> 
                                   <th>Name</th>
                                   <?php } ?>
                                   <th>Last Login</th>
                                   <th>IP Address</th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php foreach ($logs->result() as $log) { ?>
                               <tr>
                                   <?php if ($this->session->userdata('user_level') == 1) { ?> 
                                   <td><?=$log->user_display;?></td>
                                   <?php } ?>
                                   <td><?=$log->last_login;?></td>
                                   <td><?=$log->last_login_ip;?></td>
                              </tr>
                              <?php } ?>
                           </tbody>
                       </table>
                       <?php } ?>
                   </div>
               </div>
            </div>
        </div>
   </div>
</div>