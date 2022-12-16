<?php  $this->extend('layout/template2');?>
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
                      <h2>Transaksi Chart</h2>
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
                    <div>
                        </div>
                        

<canvas id="myChart"></canvas>


<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['2020-Q1', '2020-Q2', '2020-Q3', '2020-Q4', '2021-Q1', '2021-Q2'],
      datasets: [{
        label: 'Jumlah Transaksi',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
        
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


<br>
<br>
<br>
                      <table class="table table-striped table-md" id="myTable">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>Kode Akun</th>
                          <th>Nama Akun</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($akun1 as $akn) :?>
                        <tr>
                          <td><?php echo $akn->id_akun1?></td>
                          <td><?php echo $akn->kode_akun1 ?></td>
                          <td><?php echo $akn->nama_akun1 ?></td>
                          <td><div class="badge badge-success">Active</div></td>
                          <td>
                            <a href="/akun1/edit/<?php echo $akn->id_akun1?>" class="btn btn-info">Edit</a>                          
                            <a href="/akun1/delete/<?php echo $akn->id_akun1?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin data menghapus ini?') ">Delete</a>
                          </td>
                          </tr>
                        <?php endforeach?>
                        </tbody>
                      </table>
                      </div>
                        </div>
                    </div>
                    

        </div>
    </section>
</div>
  


<?php $this->endsection();?>