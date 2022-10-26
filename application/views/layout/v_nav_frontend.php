<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="<?= base_url() ?>" class="navbar-brand">
            <i class="fas fa-store text-blue"></i>
            <span class="brand-text font-weight-light"><b>Toko Online</b></span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url() ?>" class="nav-link">Home</a>
                </li>
                <?php $kategori = $this->m_home->get_all_data_kategori() ?>
                <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <?php foreach ($kategori as $key => $value) : ?>
                            <li><a href="<?= base_url('home/kategori/' . $value->id_kategori) ?>" class="dropdown-item"><?= $value->nama_kategori ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-0 ml-md-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">


            <li class="nav-item">
                <?php if ($this->session->userdata('email') == "") { ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('pelanggan/register'); ?>">
                    <span class="brand-text font-weight-light"><b>Daftar</b></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('pelanggan/login'); ?>">
                    <span class="brand-text font-weight-light"><b>Login</b></span>
                    <img src="<?= base_url('assets/foto/profile_default.jpg'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                </a>
            </li>
        <?php } else { ?>
            <a class="nav-link" data-toggle="dropdown" href="#">
                <span class="brand-text font-weight-light"><?= $this->session->userdata('nama_pelanggan'); ?></span>
                <img src="<?= base_url('assets/foto/' . $this->session->userdata('foto')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('pelanggan/akun'); ?>" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Akun Saya
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('pesanan_saya'); ?>" class="dropdown-item">
                    <i class="fas fa-cart-arrow-down mr-2"></i> Pesanan Saya
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('pelanggan/logout') ?>" class="dropdown-item dropdown-footer">Logout</a>
            </div>
        <?php } ?>
        </li>

        <?php
        $keranjang = $this->cart->contents();
        $jml_item = 0;
        foreach ($keranjang as $key => $value) {
            $jml_item = $jml_item + $value['qty'];
        } ?>
        <!-- Shopping Cart Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-shopping-cart"></i>
                <span class="badge badge-danger navbar-badge"><?= $jml_item; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <?php if (empty($keranjang)) { ?>
                    <a href="#" class="dropdown-item">
                        <p>Keranjang Belanja Anda Kosong!!!</p>
                    </a>
                    <?php } else {
                    foreach ($keranjang as $key => $value) {
                        $gambar = $this->m_home->detail_barang($value['id']); ?>
                        <a href="#" class="dropdown-item">
                            <!-- Barang Start -->
                            <div class="media">
                                <img src="<?= base_url('assets/gambar/' . $gambar->gambar); ?>" alt="User Avatar" class="img-size-50 mr-4">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        <?= $value['name']; ?>
                                    </h3>
                                    <p class="text-sm"><?= $value['qty']; ?> x Rp.<?= number_format($value['price'], 0); ?>.00</p>
                                    <p class="text-sm text-muted"><i class="fas fa-calculator"></i> Rp.<?= $this->cart->format_number($value['subtotal']); ?></p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                    <?php } ?>
                    <a href="#" class="dropdown-item">
                        <!-- Barang Start -->
                        <div class="media">
                            <div class="media-body">
                                <tr>
                                    <td colspan="2"></td>
                                    <td class="right"><strong>Total : </strong></td>
                                    <td class="right"><?= $this->cart->format_number($this->cart->total()); ?></td>
                                </tr>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="<?= base_url('belanja'); ?>" class="dropdown-item dropdown-footer">
                                <div class="text-right">
                                    <div class="btn btn-primary btn-block">
                                        View Cart
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?= base_url('belanja/checkout'); ?>" class="dropdown-item dropdown-footer">
                                <div class="text-left">
                                    <div class="btn btn-success btn-block">
                                        Check Out
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </li>
        </ul>
    </div>
</nav>
<!-- /.navbar -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Toko Online</a></li>
                        <li class="breadcrumb-item"><a href="#"><?= $title ?></a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">