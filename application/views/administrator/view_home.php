            <a style='color:#000' href='<?php echo base_url(); ?>administrator/berita'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-book"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Berita</span>
                  <?php $jmla = $this->model_berita->list_berita()->num_rows(); ?>
                  <span class="info-box-number"><?php echo $jmla; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='<?php echo base_url(); ?>administrator/halamanbaru'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-file"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Halaman</span>
                  <?php $jmlb = $this->model_halaman->halamanstatis()->num_rows(); ?>
                  <span class="info-box-number"><?php echo $jmlb; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='<?php echo base_url(); ?>administrator/agenda'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Agenda</span>
                  <?php $jmlc = $this->model_agenda->agenda()->num_rows(); ?>
                  <span class="info-box-number"><?php echo $jmlc; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <a style='color:#000' href='<?php echo base_url(); ?>administrator/manajemenuser'>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Users</span>
                  <?php $jmld = $this->model_users->users()->num_rows(); ?>
                  <span class="info-box-number"><?php echo $jmld; ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            </a>

            <section class="col-lg-6 connectedSortable">
                <?php include "home_button.php"; ?>
            </section><!-- /.Left col -->

            <section class="col-lg-6 connectedSortable">
                <?php include "home_grafik.php"; ?>
            </section><!-- right col -->
            