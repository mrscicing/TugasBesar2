<?php  $this->extend('layout/template3');?>

<?php $this->section('isi');?>


<div class="main-content">
    <section class="section">
        <div class="section-header">
           <div class="container">
           <div class="row">
              <div class="col-10">
                <h1>Detail Data Transaksi</h1>

              </div>
              <div class="col-2"><button type="submit" class="btn btn-danger" name="submitx"><a class="nostyle" href="<?php  echo site_url('transaksi/index') ?>">Back</a></button></div>
           </div>
           </div>
        </div>
        <div class="clear"></div>

        <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Detail Data</h4>
                
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
                
                        <table >
                        
                                <tr>
                                <td style="width:12% ;" >No Kwitansi</td>
                                <td style="width:5% ;">:</td>
                                <td >
                                    <?php echo $dttransaksi->kwitansi?>
                                </td>
                                </tr>
                                <tr>
                                <td style="width:12% ;" >Tanggal</td>
                                <td style="width:5% ;">:</td>
                                <td >
                                    <?php echo $dttransaksi->tanggal?>
                                </td>
                                </tr>
                                <td style="width:12% ;" >Deskripsi</td>
                                <td style="width:5% ;">:</td>
                                <td >
                                    <?php echo $dttransaksi->deskripsi?>
                                </td>
                                </tr>
                                <td style="width:12% ;" >Keterangan Jurnal</td>
                                <td style="width:5% ;">:</td>
                                <td >
                                    <?php echo $dttransaksi->ketJurnal?>
                                </td>
                                </tr>
                        </table>
                        <table class="table table-striped table-md">
                      <thead>  
                      <tr>
                          <th>No</th>
                          <th>Kode Akun</th>
                          <th>Nama Akun</th>
                          <th>Debit</th>
                          <th>Kredit</th>
                          <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $x = 1;
                         foreach($dtnilai as $key =>$value) :?>
                          <tr>
                          <td><?php echo $key +1?></td>
                          <td><?php echo $value->kode_akun3?></td>
                          <td><?php echo $value->nama_akun3 ?></td>
                          <td><?php echo number_format( $value->debit ,0,'.','.')?></td>
                          <td><?php echo number_format( $value->kredit ,0,'.','.')?></td>
                          <td><?php echo $value->status ?></td>
                          </tr>
                        <?php $x ++;
                         endforeach?>
                        </tbody>
                        
                      </table>
                    <br>
                </div>
            </div>
        </div>
    </section>
</div>


<?php $this->endsection();?>