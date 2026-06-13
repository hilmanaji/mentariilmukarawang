<style>
    .edit-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .08);
    }

    .header-add {
        background: linear-gradient(135deg, #11998e, #38ef7d);
    }

    .header-edit {
        background: linear-gradient(135deg, #1e3c72, #2a5298);
    }

    .edit-header {
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

    .form-section {
        padding: 25px;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-save {
        border-radius: 25px;
        padding: 10px 25px;
    }

    .btn-back {
        border-radius: 25px;
    }

    .custom-file-upload {
        border: 2px dashed #dcdcdc;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        transition: .3s;
    }

    .custom-file-upload:hover {
        border-color: #2a5298;
        background: #f8fbff;
    }

    @media(max-width:767px) {

        .preview-img {
            max-height: 220px;
        }

        .form-section {
            padding: 15px;
        }

    }
</style>
<?php

$id_fasilitas   = '';
$nama_fasilitas = '';
$id_sekolah     = '';
$gambar_lama    = '';

if (isset($mode) && $mode == 'edit') {

    foreach ($datas->result() as $row) {

        $id_fasilitas   = $row->id_fasilitas;
        $nama_fasilitas = $row->nama_fasilitas;
        $id_sekolah     = $row->id_sekolah;
        $gambar_lama    = $row->value;
    }
}

$form_action = ($mode == 'add')
    ? base_url('Fasilitas/save')
    : base_url('Fasilitas/edit');

$title = ($mode == 'add')
    ? 'Tambah Fasilitas'
    : 'Edit Fasilitas';

$subtitle = ($mode == 'add')
    ? 'Tambahkan fasilitas baru sekolah'
    : 'Perbarui informasi fasilitas sekolah';

?>

<div class="row">

    <div class="col-md-12">

        <div class="edit-card">

            <div class="edit-header <?= ($mode == 'add') ? 'header-add' : 'header-edit'; ?>">

                <div class="row">

                    <div class="col-xs-8">

                        <h3 style="margin:0" class="text-white">
                            <i class="fa fa-building"></i>
                            <?= $title ?>
                        </h3>

                        <small>
                            <?= $subtitle ?>
                        </small>

                    </div>

                    <div class="col-xs-4 text-right">

                        <a href="<?= base_url('Fasilitas') ?>"
                            class="btn btn-default btn-back">

                            <i class="fa fa-arrow-left"></i>
                            Kembali

                        </a>

                    </div>

                </div>

            </div>

            <form
                enctype="multipart/form-data"
                action="<?= $form_action ?>"
                method="post">

                <div class="row">

                    <!-- PREVIEW -->
                    <div class="col-md-5">

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
                                Preview Gambar Fasilitas
                            </div>

                        </div>

                    </div>

                    <!-- FORM -->
                    <div class="col-md-7">

                        <div class="form-section">

                            <?php if ($id_sekolah_sess != '0') { ?>

                                <input
                                    type="hidden"
                                    name="id_sekolah"
                                    value="<?= $id_sekolah ?>">

                            <?php } else { ?>

                                <div class="form-group">

                                    <label>Sekolah</label>

                                    <select
                                        class="form-control"
                                        name="id_sekolah"
                                        required>

                                        <option value="">
                                            -- Pilih Sekolah --
                                        </option>

                                        <?php foreach ($data_sekolah->result() as $_sekolah) { ?>

                                            <option
                                                value="<?= $_sekolah->id_sekolah ?>"
                                                <?= ($_sekolah->id_sekolah == $id_sekolah) ? 'selected' : '' ?>>

                                                <?= $_sekolah->nama ?>

                                            </option>

                                        <?php } ?>

                                    </select>

                                </div>

                            <?php } ?>

                            <div class="form-group">

                                <label>Nama Fasilitas</label>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="nama_fasilitas"
                                    value="<?= $nama_fasilitas ?>"
                                    required>

                            </div>

                            <div class="form-group">

                                <label>Upload Gambar</label>

                                <div class="custom-file-upload">

                                    <i class="fa fa-image fa-2x"></i>

                                    <p style="margin-top:10px">
                                        Pilih gambar fasilitas
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
                                    name="id_fasilitas"
                                    value="<?= $id_fasilitas ?>">

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
                                    ? 'Simpan Fasilitas'
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
    document.getElementById('gambar').addEventListener('change', function(e) {

        if (e.target.files.length > 0) {

            const reader = new FileReader();

            reader.onload = function(event) {

                document.getElementById('previewImage').src =
                    event.target.result;

            };

            reader.readAsDataURL(e.target.files[0]);
        }

    });
</script>