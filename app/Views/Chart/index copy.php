<?php  $this->extend('layout/templatecopy');?>

<?php $this->section('isi')?>


<div class="main-content">
    <section class="section">
        <div class="section-header">
           <div class="container">
           <div class="row">
              <div class="col-10">
                <h1>Home Page</h1>

              </div>
           </div>
           </div>
        </div>
        <div class="clear"></div>

        <div class="section-body">
        <div class="card">
                     <div class="card-header">
                     
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
                  <?php 
                        $kuartal1 = 0;
                        $kuartal2 = 0;
                        $kuartal3 = 0;
                        $kuartal4 = 0;
                        $kuartal1_2 = 0;
                        $kuartal2_2 = 0;
                        $kuartal3_2 = 0;
                        $kuartal4_2 = 0;
                        $kuartald1 = 0;
                        $kuartald2 = 0;
                        $kuartald3 = 0;
                        $kuartald4 = 0;
                        ?>
                        <!-- Chart Jurnal umum 2021 -->
                        <?php foreach($q1 as $k1){
                            $kuartal1++;
                        }
                        ?>
                        <?php foreach($q2 as $k2){
                            $kuartal2++;
                        }
                        ?>
                        <?php foreach($q3 as $k3){
                            $kuartal3++;
                        }
                        ?>
                        <?php foreach($q4 as $k4){
                            $kuartal4++;
                        }
                        ?>
                        <!-- Chart Jurnal umum 2022 -->
                        <?php foreach($q1_2 as $k1_2){
                            $kuartal1_2++;
                        }
                        ?>
                        <?php foreach($q2_2 as $k2_2){
                            $kuartal2_2++;
                        }
                        ?>
                        <?php foreach($q3_2 as $k3_2){
                            $kuartal3_2++;
                        }
                        ?>
                        <?php foreach($q4_2 as $k4_2){
                            $kuartal4_2++;
                        }
                        ?>

                        <!-- Chart Debit per Kuartal -->
                        <?php foreach($q1 as $k1){  
                             $kuartald1 = $kuartald1 + $k1->debit;
                        }
                        ?>
                        <?php foreach($q2 as $k2){
                            $kuartald2 = $kuartald2 + $k2->debit;
                        }
                        ?>
                        <?php foreach($q3 as $k3){
                            $kuartald3 = $kuartald3 + $k3->debit;
                        }
                        ?>
                        <?php foreach($q4 as $k4){
                            $kuartald4 = $kuartald4 + $k4->debit;
                        }
                        ?>
                    <div class="container">
                      
                    <div class="card-body">
                    <div class="row g-1">
                    <?php

                        if (isset($_GET['query']) && $_GET['query'] != '') {
                                $url = 'https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/search/NewsSearchAPI';
                                $query_fields = [
                                        'autoCorrect' => 'true',
                                        'pageNumber' => 1,
                                        'pageSize' => 4,
                                        'safeSearch' => 'false',
                                        'q' => $_GET['query'],
                                        'withThumbnails' => 'true'
                                ];
                                $curl = curl_init($url . '?' . http_build_query($query_fields));
                                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($curl, CURLOPT_HTTPHEADER, [
                                        'X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com',
                                        'X-RapidAPI-Key: 3853bcf7a3mshbe1cfd9aa6f24acp1ea6aajsneee8a5511448'
                                ]);
                                $response = json_decode(curl_exec($curl), true);
                                curl_close($curl);
                                $news = $response['value'];
                        }?>
                        <div class="col"> <h4>Temukan berita terkini dibawah ini..</h4><br></div>
                        </div>
                        <div class="row g-1">
                       <div class="col">
                        
                       <form action="" method="get">
                                <label for="query">Pencarian Berita Terkini</label>
                                <input id="query" type="text" name="query" />
                                <br />
                                <button  class="btn btn-danger" type="submit" name="submit">Search</button>
                        </form>
                        <br />
                        <?php
                        
                        if (!empty($news)) {
                                echo '<b>Berita berdasarkan pencarian:</b>';
                                foreach ($news as $post => $key) {
                                    echo '<h3>' . $key['title'] . '</h3>';
                                    echo '<img height="400px" width"650px" align="center"src="'.$key['image']['url'].'"></img> <br>';
                                    echo '<a href="' . $key['url'] . '">Source</a>';
                                    echo '<p>Date Published: ' . $key['datePublished'] . '</p>';
                                    echo '<p>' . $key['body'] .'</p>';
                                    echo '<hr>';
                                }
                        }
                        ?>
                        </div>
                        </div>
                        <hr>
                    
                    <div class="row g-2">
                        
                    <div class="col-6">
                    <h2>Chart Jurnal Transaksi 2021</h2>
                    <canvas id="Chart"></canvas>
           
                                            
                        

                        <script>
                        var ctx = document.getElementById('Chart');

                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                
                                labels: ['2021-Q1', '2021-Q2', '2021-Q3', '2021-Q4'],
                                datasets: [{
                                label: 'Jumlah Transaksi',
                                data: [<?php echo $kuartal1?>, <?php echo $kuartal2?>, <?php echo $kuartal3?>, <?php echo $kuartal4?>],
                                borderWidth: 1,
                                backgroundColor: 'lightblue'
                                
                            }]
                            },
                            options: {
                            scales: {
                                y: {
                                beginAtZero: true
                                }
                            }
                            }
                        });
                        </script>
                        </div>
                       
                        <div class="col-6">
                        <h2 >Chart Jurnal Transaksi 2022</h2>

                        
                            <canvas id="Chart2"></canvas>
                        </div>
                        </div>
                        <script>

                        var ctx2 = document.getElementById('Chart2');

                        var myChart2 = new Chart(ctx2, {
                            type: 'doughnut',
                            data: {
                                
                                labels: ['2022-Q1', '2022-Q2', '2022-Q3', '2022-Q4'],
                                datasets: [{
                                label: 'Jumlah Transaksi 2022',
                                data: [<?php echo $kuartal1_2?>, <?php echo $kuartal2_2?>, <?php echo $kuartal3_2?>, <?php echo $kuartal4_2?>],
                                borderWidth: 1,
                                backgroundColor: ['red','green','blue','yellow']
                                
                            }]
                            },
                            options: {
                            scales: {
                                y: {
                                beginAtZero: true
                                }
                            }
                            }
                        });
                        </script>
         
                        <script>

                        var ctx2 = document.getElementById('Chart2');

                        var myChart2 = new Chart(ctx2, {
                            type: 'doughnut',
                            data: {
                                
                                labels: ['2022-Q1', '2022-Q2', '2022-Q3', '2022-Q4'],
                                datasets: [{
                                label: 'Jumlah Transaksi 2022',
                                data: [<?php echo $kuartal1_2?>, <?php echo $kuartal2_2?>, <?php echo $kuartal3_2?>, <?php echo $kuartal4_2?>],
                                borderWidth: 1,
                                backgroundColor: ['red','green','blue','yellow']
                                
                            }]
                            },
                            options: {
                            scales: {
                                y: {
                                beginAtZero: true
                                }
                            }
                            }
                        });
                        </script>
                       
                            <canvas id="Chart2"></canvas>
                        
                        <script>

                        var ctx2 = document.getElementById('Chart2');

                        var myChart2 = new Chart(ctx2, {
                            type: 'doughnut',
                            data: {
                                
                                labels: ['2022-Q1', '2022-Q2', '2022-Q3', '2022-Q4'],
                                datasets: [{
                                label: 'Jumlah Transaksi 2022',
                                data: [<?php echo $kuartal1_2?>, <?php echo $kuartal2_2?>, <?php echo $kuartal3_2?>, <?php echo $kuartal4_2?>],
                                borderWidth: 1,
                                backgroundColor: ['red','green','blue','yellow']
                                
                            }]
                            },
                            options: {
                            scales: {
                                y: {
                                beginAtZero: true
                                }
                            }
                            }
                        });
                        </script>
                   
                  
                        <h2 align="center">Chart Jumlah Debit 2022</h2>
                            <canvas id="Chart3"></canvas>
                    
                        <script>

                        var ctx3 = document.getElementById('Chart3');

                        var myChart3 = new Chart(ctx3, {
                            type: 'bar',
                            data: {
                                
                                labels: ['2021-Q1', '2021-Q2', '2021-Q3', '2021-Q4'],
                                datasets: [{
                                label: 'Jumlah Debit 2021',
                                data: [<?php echo $kuartald1?>, <?php echo $kuartald2?>, <?php echo $kuartald3?>, <?php echo $kuartald4?>],
                                borderWidth: 1,
                                backgroundColor: ['red','green','blue','yellow']
                                
                            }]
                            },
                            options: {
                            scales: {
                                y: {
                                beginAtZero: true
                                }
                            }
                            }
                        });
                        </script>
                        
                       


                      </div>
                        </div>
                    </div>
                    

        </div>

    </section>
</div>
<?php $this->endsection();?>

