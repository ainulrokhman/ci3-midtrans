<?php $url = $this->uri->segment(1); ?>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link <?= $url == "siswa" ? "active" : ""; ?>" href="<?= base_url('siswa') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Siswa
                    </a>
                    <a class="nav-link <?= $url == "siswa" ? "active" : ""; ?>" href="<?= base_url('kelas') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Kelas
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <h5>Admin</h5>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 py-3">