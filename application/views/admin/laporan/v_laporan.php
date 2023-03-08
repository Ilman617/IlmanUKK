<div class="container-fluid">

    <div class="card mx-auto" style="width: 35%;">
        <div class="card-header bg-dark text-white text-center">
            Laporan Pelelangan
        </div>

        <form method="POST" action="<?= base_url('admin/laporan/cetak_laporan') ?>">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <input type="date" name="tgl_lelang_awal" id="tgl_lelang_awal" class="form-control" placeholder="Enter .." />
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Tanggal Akhir</label>
                    <div class="col-sm-9">
                    <input type="date" name="tgl_lelang_akhir" id="tgl_lelang_akhir" class="form-control" placeholder="Enter .." />
                    </div>
                </div>

                <button style="width: 100%" type="submit" class="btn btn-dark"><i class="fas fa-print"></i> Cetak Laporan</button>
            </div>
        </form>
    </div>
</div>