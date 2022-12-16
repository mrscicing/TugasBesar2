<?php
  $this->extend('layout/template3');?>



<?php $this->section('isi');?>


<div class="main-content">
    <section class="section">
        <div class="section-header">
           <div class="container">
           <div class="row">
              <div class="col-10">
                <h1>Jurnal Penyesuaian</h1>

              </div>
           </div>
           </div>
        </div>
        <div class="clear"></div>

        <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo site_url('jurnalpenyesuaian')?>" method="$_POST">
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
                        <td>                <button class="btn btn-success"><a style="color:unset" href="<?php echo site_url('jurnalpenyesuaian/cetak')?> " target="_BLANK">Cetak PDF</a></button></td>
                        
                        </tr>
                    </table>
                <br>
            </div>
            
                <div class="card-body p-4">
                 
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                        <thead>  
                            <tr>
                                <th rowspan="2">Kode</th>
                                <th rowspan="2">Keterangan</th>
                                <th  colspan="2" style="text-align: center;">Jurnal Penyesuaian</th>
                            </tr>
                            <tr>
                                <th style="text-align: center;">Debit</th>
                                <th style="text-align: center;">Kredit</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            $td=0;
                            $tk=0;
                            ?>

                                <?php $x = 1;
                                foreach($transaksi as $akn) :?>
                                
                                <?php 
                                $d = $akn->jumdebit;
                                $k = $akn->jumkredit;
                                $neraca = $d-$k;

                                if($neraca < 0){
                                    $kreditnew = abs($neraca);
                                    $tk = $tk + $kreditnew;
                                }
                                else{
                                    $kreditnew=0;
                                }

                                
                                if($neraca > 0){
                                    $debitnew =($neraca);
                                    $td = $td + $debitnew;
                                }
                                else{
                                    $debitnew=0;
                                }

                                ?>
                            <tr>
                                <td><?php echo $akn->kode_akun3 ?></td>
                                <td><?php echo $akn->nama_akun3 ?></td>
                                <td><?php echo number_format( $debitnew ,0,'.','.')?></td>
                                <td><?php echo number_format( $kreditnew ,0,'.','.')?></td>
                            </tr>
                                <?php $x ++;
                                endforeach?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-right"><?php echo number_format($td,0,'.','.')?></td>
                                    <td class="text-right"><?php echo number_format($tk,0,'.','.')?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
        </div>
    </section>
</div>


<?php $this->endsection();?>