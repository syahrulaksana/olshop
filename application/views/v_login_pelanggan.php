<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="register-box">
            <div class="card-header text-center">
            </div>
            <div class="card card-outline card-primary">
                <div class="card">
                    <div class="card-body">
                        <h4 class="login-box-msg"><b>LOGIN SEKARANG</b></h4>
                        <br>
                        <?php
                        echo validation_errors('<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');

                        if ($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                            echo $this->session->flashdata('pesan');
                            echo '</div>';
                        }

                        if ($this->session->flashdata('error')) {
                            echo '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                            echo $this->session->flashdata('error');
                            echo '</div>';
                        }

                        echo form_open('pelanggan/login'); ?>
                        <form action="<?= base_url('template/'); ?>index.html" method="post">
                            <div class="input-group mb-3">
                                <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control" placeholder=" Masukan email...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder=" Masukan password...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-8">

                                </div>
                                <!-- /.col -->
                                <br>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                        <?php echo form_close(); ?>
                        <br>
                        <br>
                        <br>
                        <p class="text-center">Belum punya akun? <a href="<?= base_url('pelanggan/register'); ?>">Buat Akun</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
<br>
<br>
<br>
<br>

<!-- /.form-box -->