<?php  $this->extend('layout/template');?>

<?php $this->section('isi');?>


<div class="main-content">
    <section class="section">
        <div class="section-header">
           <div class="container">
           <div class="row">
              <div class="col-10">
                <h1><?php echo $title ?></h1>

              </div>
              <div class="col-2"><button type="submit" class="btn btn-danger" name="submitx"><a class="nostyle" href="<?php  echo site_url('akun1/add') ?>">Add Data</a></button></div>
           </div>
           </div>
        </div>
        <div class="clear"></div>

        <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Tambah Data Akun</h4>
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
                                <p style="cursor:pointer; text-align:right" id="closejs" onclick="closeevn()"><i class="fas fa-times"></i></p>
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
            </div>
            </div>
            <div class="card-body p-0">
                <div class="container">
                    <form action="<?php echo site_url('/akun1/save')?>" method="$_POST">
                        <?php csrf_field() ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kode Akun</label>
                            <input type="text" class="form-control"placeholder="Masukkan Kode" name="kode_akun" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Akun</label>
                            <input type="text" class="form-control"  placeholder="Masukkan Nama" name="nama_akun" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submitx">Submit</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </section>
</div>


<?php $this->endsection();?>