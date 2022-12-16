<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SIA | Akuntansi</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php base_url()?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php base_url()?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css">
  <link rel="stylesheet" href="<?php base_url()?>/template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css"> -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">   -->
  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php base_url()?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?php base_url()?>/template/assets/css/style2.css">
  <link rel="stylesheet" href="<?php base_url()?>/template/assets/css/components.css">
</head>
<script>window.print();</script>
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


