<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url() ?>assets/data.png" rel="icon">
    <link href="<?php echo base_url() ?>assets/data.png" rel="apple-touch-icon">
    <!-- LINEARICONS -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/register/fonts/linearicons/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/daterangepicker/daterangepicker.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets') ?>/register/css/style.css">
</head>

<body>

    <div class="wrapper">
        <div class="inner">
            <img src="<?php echo base_url('assets') ?>/register/images/image-1.png" alt="" class="image-1">
            <form action="<?php echo base_url() ?>register/register" method="POST">
                <h3>Register Penduduk</h3>
                <?php echo $this->session->flashdata('message'); ?>
                <div class="form-holder">
                    <span class="lnr lnr-users"></span>
                    <input type="text" id="kk" name="kk" required class="form-control" placeholder="No KK Penduduk">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-home"></span>
                    <input type="text" name="nik" required class="form-control" placeholder="NIK Penduduk">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-user"></span>
                    <input type="text" name="nama" required class="form-control" placeholder="Nama Penduduk">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-home"></span>
                    <input type="text" name="tmpt_lahir" required class="form-control" placeholder="Tempat Lahir">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-calendar-full"></span>
                    <input type="date" name="tgl_lahir" required class="form-control datetimepicker-input" placeholder="Tanggal Lahir" />
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-map"></span>
                    <textarea type="text" name="alamat" required class="form-control" placeholder="Alamat Penduduk"></textarea>
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-location"></span>
                    <input type="number" name="no_rt" required class="form-control" placeholder="No RT Penduduk">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-phone-handset"></span>
                    <input type="text" name="no_telepon" required class="form-control" placeholder="No Telepon Penduduk">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-flag"></span>
                    <select name="jk" id="jk" required class="form-control" placeholder="Jenis Kelamin Penduduk">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Lelaki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-sun"></span>
                    <select name="id_agama" required id="id_agama" class="form-control" placeholder="Agama Penduduk">
                        <option value="">Pilih Agama</option>
                        <?php
                        foreach ($agama as $d) { ?>
                            <option value="<?php echo $d['id_agama'] ?>"><?php echo $d['agama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-briefcase"></span>
                    <input type="text" required name="pekerjaan" class="form-control" placeholder="Pekerjaan Penduduk">
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-graduation-hat"></span>
                    <select name="id_pendidikan" required id="id_pendidikan" class="form-control" placeholder="Pendidikan Penduduk">
                        <option value="">Pilih Pendidikan</option>
                        <?php
                        foreach ($pendidikan as $d) { ?>
                            <option value="<?php echo $d['id_pendidikan'] ?>"><?php echo $d['nama_pendidikan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-heart"></span>
                    <select name="status_perkawinan" required id="status_perkawinan" class="form-control" placeholder="Pendidikan Penduduk">
                        <option value="">Pilih Status Perkawinan</option>
                        <option value="1">Belum Menikah</option>
                        <option value="2">Menikah</option>
                        <option value="3">Cerai Hidup</option>
                        <option value="4">Cerai Mati</option>
                    </select>
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-star"></span>
                    <select name="kewarganegaraan" required id="kewarganegaraan" class="form-control" placeholder="Pendidikan Penduduk">
                        <option value="">Pilih Kewarganegaraan</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Asing">Asing</option>
                    </select>
                </div>
                <div class="form-holder">
                    <span class="lnr lnr-lock"></span>
                    <input type="password" required class="form-control" name="password" placeholder="Password">
                </div>
                <button>
                    <span>Register</span>
                </button>
            </form>

            <img src="<?php echo base_url('assets') ?>/register/images/image-2.png" alt="" class="image-2">
        </div>

    </div>

    <script src="<?php echo base_url('assets') ?>/register/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/register/js/main.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>




</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>