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
        color: #fff;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 25px;
    }

    .article-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
        transition: .3s;
        margin-bottom: 25px;
    }

    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
    }

    .article-image {
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

    .article-body {
        padding: 20px;
    }

    .article-title {
        font-size: 18px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 10px;
        min-height: 50px;
    }

    .article-excerpt {
        color: #666;
        line-height: 1.6;
        min-height: 90px;
    }

    .article-action {
        margin-top: 15px;
    }

    .article-action .btn {
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

        .article-action .btn {
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
                        <i class="fa fa-bullhorn"></i>
                        Data Pengumuman
                    </div>

                    <div class="page-subtitle">
                        Kelola pengumuman dan artikel sekolah
                    </div>

                </div>

                <a href="<?= base_url('Pengumuman/form') ?>">

                    <button class="btn btn-success btn-add">

                        <i class="fa fa-plus"></i>
                        Tambah Pengumuman

                    </button>

                </a>

            </div>

            <div class="stats-card">

                <h2 class="text-white"><?= $data_pengumuman->num_rows(); ?></h2>

                <small>Total Pengumuman</small>

            </div>
            <div class="row">

                <?php foreach ($data_pengumuman->result() as $row) { ?>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">

                        <div class="article-card">

                            <?php if (!empty($row->value)) { ?>

                                <img
                                    src="<?= base_url('assets/plugins/images/image/' . $row->value) ?>"
                                    class="article-image">

                            <?php } else { ?>

                                <div class="no-image">

                                    <i class="fa fa-image fa-4x"></i>

                                </div>

                            <?php } ?>

                            <div class="article-body">

                                <div class="article-title">

                                    <?= $row->judul ?>

                                </div>

                                <div class="article-excerpt">

                                    <?= $row->isi_pengumuman ?>

                                </div>

                                <div class="article-action">

                                    <a href="<?= base_url('Pengumuman/form/' . $row->id_pengumuman) ?>"
                                        class="btn btn-info">

                                        <i class="fa fa-pencil"></i>
                                        Edit

                                    </a>

                                    <a href="<?= base_url('Pengumuman/delete/' . $row->id_pengumuman) ?>"
                                        onclick="return confirm('Yakin ingin menghapus pengumuman ini?')"
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
foreach ($data_pengumuman->result() as $_pengumuman) {
    if ($_pengumuman->value == "") {
        $gambar = '--Tidak Ada Gambar--';
    } else {
        $gambar = "<img src='" . base_url() . "assets/plugins/images/image/" . $_pengumuman->value . "' style='max-width:70%;max-height:70%;'>";
    }
?>

    <!-- MODAL ADD -->
    <div id="ModalGam-<?php echo $no ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Gambar Pengumuman</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 text-center">
                            <?php echo $gambar; ?>
                        </div>
                    </div>
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