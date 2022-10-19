<?php  $this->extend('layout/template2');?>

<?php $this->section('isi');?>


<div class="main-content">
    <section class="section">
        <div class="section-header">
           <div class="container">
           <div class="row">
              <div class="col-10">
                <h1><?php echo $title ?></h1>

              </div>
              <div class="col-2"><button type="submit" class="btn btn-danger" name="submitx"><a class="nostyle" href="<?php  echo site_url('akun2/add') ?>">Add Data</a></button></div>
           </div>
           </div>
        </div>
        <div class="clear"></div>

        <div class="section-body">
        <div class="card">
                     <div class="card-header">
                      <h4>Table</h4>
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
                                <p style="cursor:pointer; text-align:right" id="closejs" onclick="closeevn()">x</p>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>
            
            </div>
                  <div class="card-body p-0">
                    <div class="container">
                    <div class="table-responsive">
                      <table class="table table-striped table-md" id="myTable">
                      <thead>  
                      <tr>
                          <th>No</th>
                          <th>Kode Akun 2</th>
                          <th>Nama Akun</th>
                          <th>Nama Akun 1</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $x = 1;
                         foreach($akun2 as $akn) :?>
                          <tr>
                          <td><?php echo $x?></td>
                          <td><?php echo $akn->kode_akun2 ?></td>
                          <td><?php echo $akn->nama_akun2 ?></td>
                          <td><?php echo $akn->nama_akun1 ?></td>
                          <td><div class="badge badge-success">Active</div></td>
                          <td>
                            <a href="/akun2/edit/<?php echo $akn->id_akun2?>" class="btn btn-info">Edit</a>                          
                            <a href="/akun2/delete/<?php echo $akn->id_akun2?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin data menghapus ini?') ">Delete</a>
                          </td>
                          </tr>
                        <?php $x ++;
                         endforeach?>
                        </tbody>
                        
                      </table>
                      </div>
                      </div>
                     
                    </div>
                    
        </div>
        </div>
    </section>
</div>


<?php $this->endsection();?>