<?php
  $this->extend('layout/template3');?>



<?php $this->section('isi');?>


<div class="main-content">
    <section class="section">
        <div class="section-header">
           <div class="container">
           <div class="row">
              <div class="col-10">
                <h1>Jurnal Umum</h1>

              </div>
           </div>
           </div>
        </div>
        <div class="clear"></div>

        <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo site_url('jurnalumum')?>" method="$_POST">
                    <?php csrf_field()?>       
                    <div class="row g-3">
                    
                        <table  class="table table-striped table-md">

                        <tr>
                            <td><div class="col">
                            <input type="date" class="form-control" name="tglawal" value="<?php echo $tglawal?>">
                        </div></td>
                            <td><div class="col">
                            <input type="date" class="form-control" name="tglakhir" value=" <?php echo $tglakhir?>">
                        </div></td>
                        <td><div class="col">
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-list"></i> Tampilkan</button>
                        </div></td>
                    </div>
                </form>
                        <td>                <button class="btn btn-success"><a style="color:unset" href="<?php echo site_url('jurnalumum/cetak')?> " target="_BLANK">Cetak PDF</a></button></td>
                        
                        </tr>
                    </table>
                <br>
            </div>
            
                <div class="card-body p-4">
                 
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                        <thead>  
                            <tr>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Ref</th>
                                <th>Debit</th>
                                <th>Kredit</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $x = 1;
                                foreach($transaksi as $akn) :?>
                            <tr>
                                <td><?php echo $akn->tanggal ?></td>
                                <td><?php echo $akn->nama_akun3 ?></td>
                                <td><?php echo $akn->kode_akun3 ?></td>
                                <td><?php echo number_format( $akn->debit ,0,'.','.')?></td>
                                <td><?php echo number_format( $akn->kredit ,0,'.','.')?></td>
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