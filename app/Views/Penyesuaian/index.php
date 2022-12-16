<?php  $this->extend('layout/template3');?>

<?php $this->section('isi');?>


<div class="main-content">
    <section class="section">
        <div class="section-header">
           <div class="container">
           <div class="row">
              <div class="col-10">
                <h1>Jurnal Penyesuaian</h1>

              </div>
              <div class="col-2"><button type="submit" class="btn btn-danger" name="submitx"><a class="nostyle" href="<?php  echo site_url('penyesuaian/add') ?>">Add Data</a></button></div>
           </div>
           </div>
        </div>
        <div class="clear"></div>

        <div class="section-body">
        <div class="card">
                     <div class="card-header">
                      <h4>Data Penyesuaian</h4>
                    </div>
                    <div class="container">
            <div class="jshide" id="jshide">
                <?php if(session()->getFlashdata('berhasil')) :?>
                    <div class="alert alert-success" role="alert"> 
                        <div class="row">
                            <div class="col-11">
                            <?php echo session()->getFlashdata('berhasil');?>

                            </div>
                            <div class="col-1">
                                <p style="cursor:pointer; text-align:right" id="closejs" onclick="closeevn()">x</p>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <?php if(session()->getFlashdata('error')) :?>
                    <div class="alert alert-danger" role="alert"> 
                        <div class="row">
                            <div class="col-11">
                            <?php echo session()->getFlashdata('error');?>

                            </div>
                            
                            <div class="col-1">
                                <p style="cursor:pointer; text-align:right" id="closejs" onclick="closeevn()"><i class="fas fa-times"></i></p>
                            </div>
                        </div>
                    </div>
                    
                <?php endif ?>
                <?php if(session()->getFlashdata('delete')) :?>
                    <div class="alert alert-success" role="alert"> 
                        <div class="row">
                            <div class="col-11">
                            <?php echo session()->getFlashdata('delete');?>

                            </div>
                            <div class="col-1">
                                <p style="cursor:pointer; text-align:right" id="closejs" onclick="closeevn()"><i class="fas fa-times"></i></p>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>
            
            </div>
                  <div class="card-body p-4">
                 
                    <div class="table-responsive">
                    <table class="table table-striped table-md" id="myTable">
                      <thead>  
                      <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Deskripsi</th>
                          <th>Nilai</th>
                          <th>Waktu</th>
                          <th style="text-align:center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $x = 1;
                         foreach($penyesuaian as $akn) :?>
                          <tr>
                          <td><?php echo $x?></td>
                          <td><?php echo $akn->tanggal ?></td>
                          <td><?php echo $akn->deskripsi ?></td>
                          <td><?php echo $akn->nilai ?></td>
                          <td><?php echo $akn->waktu ?></td>


                          <td class="text-center" style="width: 20% ">
                            <a href="/penyesuaian/edit/<?php echo $akn->id_penyesuaian?>" class="btn btn-info">Edit</a>                          
                            <a href="/penyesuaian/show/<?php echo $akn->id_penyesuaian?>" class="btn btn-info">Detail</a>                          
                            <a href="/penyesuaian/delete/<?php echo $akn->id_penyesuaian?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin data menghapus ini?') ">Delete</a>
                          </td>
                          </tr>
                        <?php $x ++;
                         endforeach?>
                        </tbody>
                        
                      </table>
               
                        </div>

                      
                    </div>
                    

        </div>
    </section>
</div>


<?php $this->endsection();?>