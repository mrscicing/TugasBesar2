<?php  $this->extend('layout/template3');?>

<?php $this->section('isi');?>


<div class="main-content">
    <section class="section">
        <div class="section-header">
           <div class="container">
           <div class="row">
              <div class="col-10">
                <h1>Update Data Penyesuaian</h1>

              </div>
              <div class="col-2"><button type="submit" class="btn btn-danger" name="submitx"><a class="nostyle" href="<?php  echo site_url('penyesuaian/index') ?>">Back</a></button></div>
           </div>
           </div>
        </div>
        <div class="clear"></div>

        <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Data Penyesuaian</h4>
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
                    <form action="<?php echo site_url('penyesuaian/editdata')?>" method="$_POST">
                        <?php csrf_field() ?>
                        <!-- <div class="form-group">
                            <label for="exampleInputEmail1">Kwitansi</label>
                            <input type="text" class="form-control"placeholder="Masukkan Kwitansi" name="kwitansix" required>
                        </div> -->
                        
                        <input type="hidden" name="idx" value="<?php echo $dtpenyesuaian->id_penyesuaian?>">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Tanggal</label>
                            <input type="date" class="form-control"  placeholder="Masukkan Tanggal" name="tanggalx" required value="<?php echo $dtpenyesuaian->tanggal ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Deskripsi</label>
                            <input type="text" class="form-control"  placeholder="Masukkan Deskripsi" name="deskripsix" required value="<?php echo $dtpenyesuaian->deskripsi ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nilai</label>
                            <input type="text" class="form-control" onkeyup="hitung()"  placeholder="Masukkan Nilai" name="nilaix" required value="<?php echo $dtpenyesuaian->nilai ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Waktu</label>
                            <input type="text" class="form-control" onkeyup="hitung()"  placeholder="Masukkan Waktu" name="waktux" required value="<?php echo $dtpenyesuaian->waktu ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Jumlah</label>
                            <input type="text" class="form-control"  placeholder="Masukkan Jumlah" name="jumlahx" readonly required value="<?php echo $dtpenyesuaian->jumlah ?>">
                        </div>

                        <table class="table table-bordered" >
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Akun</th>
                                <th scope="col">Debit</th>
                                <th scope="col">Kredit</th>
                                <th scope="col">Status</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php $l = 0;?>
                                <?php foreach($dtnilaipenyesuaian as $item) :?>
                                    <?php $l++;?>
                                    <tr>
                                        <td>
                                            <?php echo $l?>
                                        </td>
                                        <td>
                                            <select class="form-control" name="kode_akun3[]">
                                                <?php foreach($dtakun3 as $akn3) :?>
                                                    <option value="<?php echo $akn3->kode_akun3?>" <?php echo $item->kode_akun3 == $akn3->kode_akun3 ? 'selected': null?> ><?php echo $akn3->kode_akun3?> |<?php echo $akn3->nama_akun3?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="debit[]" required value="<?php echo $item->debit?>">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="kredit[]" required value="<?php echo $item->kredit?>"> 
                                        </td>
                                        <td>
                                            <select class="form-control" name="id_status[]">
                                                <?php foreach($dtstatus as $sts) :?>
                                                    <option value="<?php echo $sts->id_status?>" <?php echo $item->id_status == $sts->id_status ? 'selected': null?> > <?php echo $sts->status?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </td>
                                        <td>
                                        <input type="hidden" class="form-control" id="id" name="id[]" required value="<?php echo $item->id?>"> 

                                        </td>
                                    </tr>
                                <?php endforeach;?>


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