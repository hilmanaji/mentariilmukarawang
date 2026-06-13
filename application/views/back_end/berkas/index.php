<style>
    .page-header-custom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }

    .page-title {
        font-size: 28px;
        font-weight: 700;
        color: #2c3e50;
    }

    .page-subtitle {
        color: #7f8c8d;
    }

    .btn-add {
        border-radius: 30px;
        padding: 10px 20px;
    }

    .stats-card {
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        color: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 25px;
    }

    .berkas-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
        transition: .3s;
        margin-bottom: 25px;
    }

    .berkas-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, .12);
    }

    .berkas-icon {
        height: 140px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        color: #fff;
        font-size: 60px;
    }

    .berkas-body {
        padding: 15px;
    }

    .berkas-title {
        font-size: 16px;
        font-weight: 700;
        color: #2c3e50;
        min-height: 50px;
    }

    .berkas-school {
        color: #7f8c8d;
        font-size: 13px;
        margin-top: 10px;
    }

    .berkas-action {
        margin-top: 15px;
    }

    .berkas-action .btn {
        width: 48%;
    }

    @media(max-width:767px) {

        .page-header-custom {
            flex-direction: column;
            align-items: flex-start;
        }

        .btn-add {
            width: 100%;
            margin-top: 15px;
        }

        .berkas-action .btn {
            width: 100%;
            margin-bottom: 8px;
        }

    }
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <!-- <p class="text-muted m-b-30">Master Data Sekolah</p> -->
            <div class="page-header-custom">

                <div>

                    <div class="page-title">
                        <i class="fa fa-folder-open"></i>
                        Master Data File Download
                    </div>

                    <div class="page-subtitle">
                        Kelola seluruh file download sekolah
                    </div>

                </div>

                <a href="<?= base_url('Berkas/form') ?>">

                    <button class="btn btn-success btn-add">

                        <i class="fa fa-plus"></i>
                        Tambah File

                    </button>

                </a>

            </div>

            <div class="stats-card">

                <h2 style="margin:0" class="text-white">
                    <?= $datas->num_rows(); ?>
                </h2>

                <small>Total File Download</small>

            </div>
            <div class="row">

                <?php foreach ($datas->result() as $row) { ?>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">

                        <div class="berkas-card">

                            <div class="berkas-icon">

                                <i class="fa fa-file-pdf-o"></i>

                            </div>

                            <div class="berkas-body">

                                <div class="berkas-title">

                                    <?= $row->keterangan ?>

                                </div>

                                <div class="berkas-school">

                                    <i class="fa fa-university"></i>
                                    <?= $row->nama_sekolah ?>

                                </div>

                                <div class="berkas-action">

                                    <a href="<?= base_url('Berkas/form/' . $row->id_file) ?>"
                                        class="btn btn-info">

                                        <i class="fa fa-pencil"></i>
                                        Edit

                                    </a>


                                    <button
                                        class="btn btn-warning"
                                        data-toggle="modal"
                                        data-target="#pdfModal<?= $row->id_file ?>">

                                        <i class="fa fa-eye"></i>
                                        Preview

                                    </button>

                                    <a href="<?= base_url('Berkas/delete/' . $row->id_file) ?>"
                                        class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">

                                        <i class="fa fa-trash"></i>
                                        Hapus

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php } ?>

                <?php foreach ($datas->result() as $row) { ?>

                    <div
                        class="modal fade"
                        id="pdfModal<?= $row->id_file ?>"
                        tabindex="-1">

                        <div class="modal-dialog modal-lg">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <button
                                        type="button"
                                        class="close"
                                        data-dismiss="modal">

                                        &times;

                                    </button>

                                    <h4 class="modal-title">

                                        <?= $row->keterangan ?>

                                    </h4>

                                </div>

                                <div class="modal-body">

                                    <iframe
                                        src="<?= base_url('assets/plugins/file/' . $row->value) ?>"
                                        width="100%"
                                        height="600"
                                        style="border:none;">

                                    </iframe>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</div>