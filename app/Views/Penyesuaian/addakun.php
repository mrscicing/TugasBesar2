<?php  $this->extend('layout/template3');?>

<?php $this->section('isi');?>


<div class="main-content">
    <section class="section">
        <div class="section-header">
           <div class="container">
           <div class="row">
              <div class="col-10">
                <h1>Penambahan Data Penyesuaian</h1>

              </div>
              <div class="col-2"><button type="submit" class="btn btn-danger" name="submitx"><a class="nostyle" href="<?php  echo site_url('penyesuaian/index') ?>">Back</a></button></div>
           </div>
           </div>
        </div>
        <div class="clear"></div>

        <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Penambahan Data</h4>
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
                    <form action="<?php echo site_url('/penyesuaian/save')?>" method="$_POST">
                        <?php csrf_field() ?>
                   
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal</label>
                            <input type="date" class="form-control"  placeholder="Masukkan Tanggal" name="tanggalx" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Deskripsi</label>
                            <input type="text" class="form-control"  placeholder="Masukkan Deskripsi" name="deskripsix" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nilai yang disesuaikan</label>
                            <input type="text" class="form-control" onkeyup="hitung()" placeholder="Masukkan Keterangan Nilai" name="nilaix" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Waktu disesuaikan</label>
                            <input type="text" class="form-control"  onkeyup="hitung()" placeholder="Masukkan Keterangan Waktu" name="waktux" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah disesuaikan</label>
                            <input type="text" class="form-control"  placeholder="Jumlah" name="jumlahx" required readonly>
                        </div>

                        <table class="table table-bordered" id="tableLoop">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Akun</th>
                                <th scope="col">Debit</th>
                                <th scope="col">Kredit</th>
                                <th scope="col">Status</th>
                                <th scope="col" style="width: 15%;">
                                    <button class="btn btn-danger btn-sm btn-block " id="BarisBaru">Add Baris <i class="fas fa-plus"></i> </button>
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- table jquery --> 
                                </tr>
                            </tbody>
                        </table>
                        
                        
                        <button type="submit" class="btn btn-primary" name="submitx">Submit</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </section>
</div>


<?php $this->endsection();?>