<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <div class="container-fluid">


         <center>
             <h1 class="h3 mb-2 text-primary-800"><?= $title ?></h1>
</center>

        <!-- <?= $this->session->flashdata('message'); ?> -->


    <table class="table table-bordered table-striped alert alert--primary">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama </th>
                <th class="text-center">Username</th>
                <th class="text-center">Level</th>
            </tr>


        <?php $no = 1; 
        foreach ($masyarakat as $m) : ?> 
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-center"><?= $m->nama_lengkap?></td>
                <td class="text-center"><?= $m->username ?></td>
                <td class="text-center"><?= $m->id_level ?></td>


               
            </tr>
            <?php endforeach; ?> 
      </table>


      </div>
    </div>
   </div>

   