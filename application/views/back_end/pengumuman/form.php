<?php

$id_pengumuman  = '';
$judul          = '';
$isi_pengumuman = '';
$gambar_lama    = '';

if (isset($mode) && $mode == 'edit') {

    foreach ($datas->result() as $row) {

        $id_pengumuman  = $row->id_pengumuman;
        $judul          = $row->judul;
        $isi_pengumuman = $row->isi_pengumuman;
        $gambar_lama    = $row->value;
    }
}

$form_action = ($mode == 'add')
    ? base_url('Pengumuman/save')
    : base_url('Pengumuman/edit');

$title = ($mode == 'add')
    ? 'Tambah Pengumuman'
    : 'Edit Pengumuman';

$subtitle = ($mode == 'add')
    ? 'Publikasikan pengumuman baru untuk website sekolah'
    : 'Perbarui informasi pengumuman';
?>

<style>
    .form-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
    }

    .form-header {
        background: linear-gradient(135deg, #1e3c72, #2a5298);
        color: #fff;
        padding: 20px;
    }

    .preview-box {
        padding: 20px;
        text-align: center;
    }

    .preview-img {
        width: 100%;
        max-height: 350px;
        object-fit: cover;
        border-radius: 12px;
        border: 1px solid #eee;
    }

    .preview-label {
        margin-top: 10px;
        color: #888;
        font-size: 13px;
    }

    .form-body {
        padding: 25px;
    }

    .btn-save {
        border-radius: 25px;
        padding: 10px 25px;
    }

    .btn-back {
        border-radius: 25px;
    }

    .custom-upload {
        border: 2px dashed #dcdcdc;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        transition: .3s;
    }

    .custom-upload:hover {
        border-color: #2a5298;
        background: #f8fbff;
    }

    .article-preview {
        margin-top: 15px;
        background: #f8f9fa;
        padding: 15px;
        border-radius: 10px;
    }

    @media(max-width:767px) {

        .preview-img {
            max-height: 220px;
        }

        .form-body {
            padding: 15px;
        }

    }
</style>

<div class="row">

    <div class="col-md-12">

        <div class="form-card">

            <div class="form-header">

                <div class="row">

                    <div class="col-xs-8">

                        <h3 style="margin:0" class="text-white">
                            <i class="fa fa-bullhorn"></i>
                            <?= $title ?>
                        </h3>

                        <small>
                            <?= $subtitle ?>
                        </small>

                    </div>

                    <div class="col-xs-4 text-right">

                        <a href="<?= base_url('Pengumuman') ?>"
                            class="btn btn-default btn-back">

                            <i class="fa fa-arrow-left"></i>
                            Kembali

                        </a>

                    </div>

                </div>

            </div>

            <form
                action="<?= $form_action ?>"
                method="post"
                enctype="multipart/form-data">

                <div class="row">

                    <!-- PREVIEW -->
                    <div class="col-md-4">

                        <div class="preview-box">

                            <?php if (!empty($gambar_lama)) { ?>

                                <img
                                    id="previewImage"
                                    src="<?= base_url('assets/plugins/images/image/' . $gambar_lama) ?>"
                                    class="preview-img">

                            <?php } else { ?>

                                <img
                                    id="previewImage"
                                    src="https://placehold.co/600x400?text=Upload+Gambar"
                                    class="preview-img">

                            <?php } ?>

                            <div class="preview-label">

                                Preview Gambar Pengumuman

                            </div>

                        </div>

                    </div>

                    <!-- FORM -->
                    <div class="col-md-8">

                        <div class="form-body">

                            <div class="form-group">

                                <label>
                                    Judul Pengumuman
                                </label>

                                <input
                                    type="text"
                                    name="judul"
                                    class="form-control"
                                    value="<?= $judul ?>"
                                    required>

                            </div>

                            <div class="form-group">

                                <label>
                                    Isi Pengumuman
                                </label>

                                <textarea
                                    name="isi_pengumuman"
                                    class="textarea_editor form-control"
                                    rows="15"><?= $isi_pengumuman ?></textarea>

                            </div>

                            <div class="form-group">

                                <label>
                                    Upload Gambar
                                </label>

                                <div class="custom-upload">

                                    <i class="fa fa-image fa-2x"></i>

                                    <p style="margin-top:10px">

                                        Pilih gambar pengumuman

                                    </p>

                                    <input
                                        type="file"
                                        id="gambar"
                                        name="userfile"
                                        accept=".jpg,.jpeg,.png,.gif,.bmp"
                                        style="width:100%;">

                                </div>

                            </div>

                            <?php if ($mode == 'edit') { ?>

                                <input
                                    type="hidden"
                                    name="id_pengumuman"
                                    value="<?= $id_pengumuman ?>">

                                <input
                                    type="hidden"
                                    name="gambar_lama"
                                    value="<?= $gambar_lama ?>">

                            <?php } ?>

                            <hr>

                            <button
                                type="submit"
                                class="btn btn-success btn-save">

                                <i class="fa fa-save"></i>

                                <?= ($mode == 'add')
                                    ? 'Publikasikan Pengumuman'
                                    : 'Simpan Perubahan'; ?>

                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
    document
        .getElementById('gambar')
        .addEventListener('change', function(e) {

            const file = e.target.files[0];

            if (!file) return;

            const reader = new FileReader();

            reader.onload = function(event) {

                document
                    .getElementById('previewImage')
                    .src = event.target.result;

            };

            reader.readAsDataURL(file);

        });
</script>