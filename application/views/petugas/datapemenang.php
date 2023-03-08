<!-- begin page content -->
<div class="container-fluid">
    <!-- page heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="container-fluid">


        <center>
            <h1 class="h2 mb-2 text-primary-800"><strong>data Pemenang</strong></h1>
</center>


    <table class="table table-bordered table-striped alert alert-primary">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama </th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Harga Akhir</th>
        </tr>

        <?php $no = 1;
        
        foreach ($masyarakat as $m) : ?>
        <tr>
            <td class="text-center"><?= $no++ ?></td>
        <td>
            <?php if ($m->nama_lengkap == null): ?>
                <center> - </center>
            <?php else : ?>
                <?= $m->nama_lengkap ?>
            <?php endif; ?>
            </td>

            <td><?= substr($m->nama_barang,0 ,20) ?><h4>...</h4></td>
            <td>Rp. <?= number_format($m->harga_akhir, 2, ',','.') ?></td>
                
            </tr>
            <?php endforeach; ?>
            
        </table>
     </div>
 </div>
</div>
