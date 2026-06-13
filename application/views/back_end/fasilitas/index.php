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
        border-radius: 25px;
        padding: 10px 20px;
    }

    .stats-card {
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        color: #fff;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 25px;
    }

    .fasilitas-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
        transition: .3s;
        margin-bottom: 25px;
    }

    .fasilitas-card:hover {
        transform: translateY(-5px);
    }

    .fasilitas-img {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .no-image {
        height: 220px;
        background: #f4f6f9;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #999;
    }

    .fasilitas-body {
        padding: 15px;
    }

    .fasilitas-title {
        font-size: 18px;
        font-weight: 700;
        color: #2c3e50;
    }

    .fasilitas-school {
        color: #7f8c8d;
        margin-top: 5px;
    }

    .fasilitas-action {
        margin-top: 15px;
    }

    .fasilitas-action .btn {
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

        .page-title {
            font-size: 24px;
        }

        .stats-card {
            text-align: center;
        }

        .fasilitas-img,
        .no-image {
            height: 180px;
        }

        .fasilitas-action .btn {
            width: 100%;
            margin-bottom: 8px;
        }

    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">

            <div class="page-header-custom">

                <div>
                    <div class="page-title">
                        <i class="fa fa-building"></i>
                        Master Data <?= $title ?>
                    </div>

                    <div class="page-subtitle">
                        Kelola seluruh fasilitas sekolah
                    </div>
                </div>

                <a href="<?= base_url($title.'/form') ?>">
                    <button class="btn btn-success btn-add">
                        <i class="fa fa-plus"></i>
                        Tambah <?= $title ?>
                    </button>
                </a>

            </div>

            <div class="stats-card">
                <h2 class="text-white"><?= $datas->num_rows(); ?></h2>
                <small>Total <?= $title ?> Terdaftar</small>
            </div>

            <div class="visible-xs">

                <?php foreach ($datas->result() as $row) { ?>

                    <div class="panel panel-default">
                        <div class="panel-body">

                            <center>

                                <?php if ($row->value != "") { ?>
                                    <a href="<?= base_url('assets/plugins/images/image/' . $row->value) ?>"
                                        target="_blank">

                                        <img src="<?= base_url('assets/plugins/images/image/' . $row->value) ?>"
                                            class="fasilitas-img">

                                    </a>

                                <?php } ?>

                            </center>

                            <h4 style="margin-top:15px">
                                <?= $row->nama_fasilitas ?>
                            </h4>

                            <small>
                                <?= $row->nama_sekolah ?>
                            </small>

                            <hr>

                            <a href="<?= base_url($title.'/form/' . $row->id_fasilitas) ?>"
                                class="btn btn-info btn-block">
                                Edit
                            </a>

                            <a href="<?= base_url($title.'/delete/' . $row->id_fasilitas) ?>"
                                class="btn btn-danger btn-block"
                                onclick="return confirm('Hapus data?')">
                                Hapus
                            </a>

                        </div>
                    </div>

                <?php } ?>

            </div>

            <div class="row">

                <?php foreach ($datas->result() as $row) { ?>

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">

                        <div class="fasilitas-card">

                            <?php if ($row->value != '') { ?>
                                <a href="<?= base_url('assets/plugins/images/image/' . $row->value) ?>"
                                    target="_blank">

                                    <img src="<?= base_url('assets/plugins/images/image/' . $row->value) ?>"
                                        class="fasilitas-img">

                                </a>

                            <?php } else { ?>

                                <div class="no-image">
                                    Tidak Ada Gambar
                                </div>

                            <?php } ?>

                            <div class="fasilitas-body">

                                <div class="fasilitas-title">
                                    <?= $row->nama_fasilitas ?>
                                </div>

                                <div class="fasilitas-school">
                                    <i class="fa fa-university"></i>
                                    <?= $row->nama_sekolah ?>
                                </div>

                                <div class="fasilitas-action">

                                    <a href="<?= base_url($title.'/form/' . $row->id_fasilitas) ?>"
                                        class="btn btn-info">
                                        <i class="fa fa-pencil"></i>
                                        Edit
                                    </a>

                                    <a href="<?= base_url($title.'/delete/' . $row->id_fasilitas) ?>"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                        class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                        Hapus
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</div>

<?php
$no = 1;
// LOOPING MODAL ================================================
foreach ($datas->result() as $_fasilitas) {
    if ($_fasilitas->value == "") {
        $gambar = '--Tidak Ada Gambar--';
    } else {
        $gambar = "<img src='" . base_url() . "assets/plugins/images/image/" . $_fasilitas->value . "' style='max-width:70%;max-height:70%;'>";
    }
?>

    <!-- MODAL ADD -->
    <div id="ModalGam-<?php echo $no ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button"
                        class="close"
                        data-dismiss="modal">
                        ×
                    </button>

                    <h4 class="modal-title text-white">
                        <?= $_fasilitas->nama_fasilitas ?>
                    </h4>
                </div>

                <div class="modal-body text-center">

                    <?php if ($_fasilitas->value != "") { ?>

                        <img src="<?= base_url('assets/plugins/images/image/' . $_fasilitas->value) ?>"
                            class="img-responsive img-rounded">

                    <?php } ?>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- MODAL ADD END -->

<?php
    // LOOPING MODAL ================================================
    $no++;
}
?>