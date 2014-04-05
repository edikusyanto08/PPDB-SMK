<div id="main-content">
   <div class="container-fluid">
       <div class="row-fluid">
           <div class="span12">
               <h3 class="page-title">Statistik PPDB Online Tahun <?=config('ppdb_tahun');?></h3>
           </div>
       </div>
       <div class="row-fluid">
           <div class="span12">
                <div class="widget">
                     <div class="widget-title">
                          <h4><i class="icon-bar-chart"></i></h4>
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
                                  <td>Pendaftar Jalur Umum</td>
                                  <td><span class="badge badge-success"><?=$e;?></span></td>
                               </tr>
                               <tr>
                                  <td>Pendaftar Jalur Prestasi</td>
                                  <td><span class="badge badge-success"><?=$f;?></span></td>
                               </tr>
                            </tbody>
                         </table>
                     </div>
                </div>
           </div>
       </div>
   </div>
</div>