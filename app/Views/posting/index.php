<?php  $this->extend('layout/template3');?>

<?php $this->section('isi');?>


<div class="main-content">
    <section class="section">
        <div class="section-header">
           <div class="container">
           <div class="row">
              <div class="col-10">
                <h1>Posting</h1>

              </div>
           </div>
           </div>
        </div>
        <div class="clear"></div>

        <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo site_url('posting')?>" method="$_POST">
                <?php csrf_field()?>

                    <div class="row g-5">
                        
                        <div class="col-2">
                            <input type="date" class="form-control" name="tglawal" value="<?php echo $tglawal?>">
                        </div>
                        <div class="col-2">
                            <input type="date" class="form-control" name="tglakhir" value="<?php echo $tglakhir?>" >
                        </div>
                        <div class="col-3">
                        <select class="form-control" name="kode_akun3">
                            <option selected>Pilih Akun</option>
                            <?php foreach ($dtakun3 as $key=>$value):?>
                                <option value="<?php echo $value->kode_akun3?>'selected'"><?php echo $value->kode_akun3?></option>
                            <?php endforeach?>
                        </select>
                        </div>
                        <div class="col-2">
                            <button  type="submit" class="btn btn-primary"> <i class="fas fa-list"></i> Tampilkan</button>
                        </div>
                 
                </form>
                <br>
                        <div class="col-2">
                <button class="btn btn-success"><a style="color:unset" href="<?php echo site_url('posting/cetak')?> " target="_BLANK">Cetak PDF</a></button>
                        </div>
                </div>
            </div>
            
                <div class="card-body p-4">
                 
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                        <thead>  
                            <tr>
                                <td rowspan="2">Tanggal</td>
                                <td rowspan="2">Keterangan</td>
                                <td rowspan="2">Ref</td>
                                <td rowspan="2">Debit</td>
                                <td rowspan="2">Kredit</td>
                                <td rowspan="2">Neraca</td>
                                <td rowspan="2">Kredit</td>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $dbt = 0;
                                $debitnew=0;
                                $kreditnew=0;
                                $dbt1=0;
                                $dbt2=0;
                                
                                ?>
                                <?php $x = 1;
                                foreach($transaksi as $key =>$value) :?>
                                <?php 
                         
                         
                                    $dbt1+= $value->debit;
                          
                                    $dbt2-= $value->kredit;
                           
                                $nbt1 = $dbt1 >=0 ? $dbt1:0;
                                $nbt2 = $dbt2 <=0 ? $dbt2:0;

                                
                                ?>

                            <tr>
                                <td><?php echo $value->tanggal ?></td>
                                <td><?php echo $value->kode_akun3 ?></td>
                                <td><?php echo $value->ketJurnal ?></td>
                                <td><?php echo number_format( $value->debit ,0,'.','.')?></td>
                                <td><?php echo number_format( $value->kredit ,0,'.','.')?></td>
                                <td><?php echo number_format( $nbt1,0,'.','.')?></td>
                                <td><?php echo number_format( $nbt2 ,0,'.','.')?></td>
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