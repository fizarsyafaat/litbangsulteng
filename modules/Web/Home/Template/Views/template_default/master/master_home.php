<?php $this->extend('Master\Views\master\master') ?>

<?= $this->section('body') ?>
	<?= $this->include('HomeTemplateFolder\Views\template_default\layout\header') ?>
	<?= $this->renderSection('main') ?>
	<?= $this->include('HomeTemplateFolder\Views\template_default\layout\footer') ?>
<?= $this->endSection() ?>