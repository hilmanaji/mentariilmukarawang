<?php

$id_file      = '';
$id_sekolah   = '';
$keterangan   = '';
$file_lama    = '';

if (isset($mode) && $mode == 'edit') {
    foreach ($datas->result() as $row) {
        $id_file    = $row->id_file;
        $id_sekolah = $row->id_sekolah;
        $keterangan = $row->keterangan;
        $file_lama  = $row->value;
    }
}

$form_action = ($mode == 'add')
    ? base_url('Berkas/save')
    : base_url('Berkas/edit');

$title = ($mode == 'add')
    ? 'Tambah File Download'
    : 'Edit File Download';

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
        color: white;
        padding: 20px;
    }

    .file-preview {
        text-align: center;
        padding: 30px;
    }

    .file-preview i {
        font-size: 120px;
        color: #1e3c72;
    }

    .form-body {
        padding: 25px;
    }

    .btn-save {
        border-radius: 25px;
        padding: 10px 25px;
    }

    .file-info {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 10px;
        margin-top: 15px;
    }

    .file-preview {
        padding: 20px;
    }

    #pdfPreview {
        border: 1px solid #ddd;
        border-radius: 12px;
        overflow: hidden;
    }

    #emptyPreview {
        padding: 40px 20px;
        text-align: center;
    }

    #emptyPreview i {
        font-size: 90px;
        color: #dc3545;
        margin-bottom: 15px;
    }

    .file-info {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 15px;
        margin-top: 15px;
        word-break: break-all;
    }
</style>

<div class="form-card">

    <div class="form-header">

        <h3 style="margin:0" class="text-white">
            <i class="fa fa-folder-open"></i>
            <?= $title ?>
        </h3>

    </div>

    <form
        action="<?= $form_action ?>"
        method="post"
        enctype="multipart/form-data">

        <div class="row">

            <div class="col-md-4">
                <div class="file-preview">

                    <div id="pdfPreviewContainer">

                        <?php if (!empty($file_lama)) { ?>
                            <?php

                            $pdf_url = base_url('assets/plugins/file/' . $file_lama);

                            ?>

                            <iframe
                                id="pdfPreview"
                                src="<?= $pdf_url ?>"
                                width="100%"
                                height="500"
                                style="border:none;border-radius:12px;">
                            </iframe>

                        <?php } else { ?>

                            <div id="emptyPreview">

                                <i class="fa fa-file-pdf-o"></i>

                                <h4>Belum Ada File PDF</h4>

                                <small>
                                    Upload file PDF untuk melihat preview
                                </small>

                            </div>

                        <?php } ?>

                    </div>

                    <div class="file-info">

                        <strong id="fileName">

                            <?= !empty($file_lama) ? $file_lama : 'Belum ada file'; ?>

                        </strong>

                    </div>

                </div>

            </div>

            <div class="col-md-8">

                <div class="form-body">

                    <?php if ($id_sekolah_sess != '0') { ?>

                        <input
                            type="hidden"
                            name="id_sekolah"
                            value="<?= $id_sekolah ?>">

                    <?php } else { ?>

                        <div class="form-group">

                            <label>Sekolah</label>

                            <select
                                name="id_sekolah"
                                class="form-control"
                                required>

                                <option value="">
                                    -- Pilih Sekolah --
                                </option>

                                <?php foreach ($data_sekolah->result() as $s) { ?>

                                    <option
                                        value="<?= $s->id_sekolah ?>"
                                        <?= ($s->id_sekolah == $id_sekolah) ? 'selected' : '' ?>>

                                        <?= $s->nama ?>

                                    </option>

                                <?php } ?>

                            </select>

                        </div>

                    <?php } ?>

                    <div class="form-group">

                        <label>Keterangan</label>

                        <input
                            type="text"
                            name="keterangan"
                            class="form-control"
                            value="<?= $keterangan ?>"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Upload File</label>

                        <input
                            type="file"
                            id="pdfFile"
                            name="userfile"
                            accept=".pdf"
                            class="form-control">

                    </div>

                    <?php if ($mode == 'edit') { ?>

                        <input
                            type="hidden"
                            name="id_file"
                            value="<?= $id_file ?>">

                        <input
                            type="hidden"
                            name="file_lama"
                            value="<?= $file_lama ?>">

                    <?php } ?>

                    <hr>

                    <button
                        class="btn btn-success btn-save"
                        type="submit">

                        <i class="fa fa-save"></i>

                        <?= ($mode == 'add')
                            ? 'Simpan File'
                            : 'Simpan Perubahan'; ?>

                    </button>

                    <a href="<?= base_url('Berkas') ?>"
                        class="btn btn-default">

                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </form>

</div>

<script>
    document.getElementById('pdfFile').addEventListener('change', function(e) {

        const file = e.target.files[0];

        if (!file) return;

        if (file.type !== 'application/pdf') {
            alert('File harus PDF');
            this.value = '';
            return;
        }

        const fileURL = URL.createObjectURL(file);

        document.getElementById('pdfPreviewContainer').innerHTML = `
        <embed
            id="pdfPreview"
            src="${fileURL}"
            type="application/pdf"
            width="100%"
            height="400px">
    `;

        document.getElementById('fileName').innerHTML =
            file.name;

    });
</script>