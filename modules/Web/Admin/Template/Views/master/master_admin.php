<?php $this->extend('Master\Views\master\master') ?>

<?= $this->section('body') ?>
    <div class="wrapper">
        <input type="hidden" class="csrf-header-master" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60" />
        </div>

		<?= $this->include('Admin\Template\Views\layout\navbar') ?>
		<?= $this->include('Admin\Template\Views\layout\sidebar') ?>
		<?= $this->renderSection('main') ?>
		<?= $this->include('Admin\Template\Views\layout\footer') ?>

		<?= $this->include('Admin\Template\Views\layout\control_sidebar') ?>
    </div>
    <!-- ./wrapper -->
    <script>
        $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
<?= $this->endSection() ?>

<?= $this->section('master.header_helper') ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
<?= $this->endSection() ?>

