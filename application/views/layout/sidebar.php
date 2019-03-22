<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $username?></p>
      </div>
    </div>
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN NAVIGATION</li>
  <?php
        $status = $this->M_System->getStatus();

      ?>
  <li class="<?php echo ($menu == 0?'active': ''); ?>">
    <a href="<?php echo base_url(($status == 1 ? "admin" : "bendahara")); ?>">
      <i class="fa fa-home"></i> <span>Dashboard</span>
    </a>
  </li>
    <?php
      if ($status != 3){
    ?>
  <li class="<?php echo ($menu == 1?'active': ''); ?>">
    <a href="<?php echo base_url(($status == 1 ? "admin" : "bendahara"). "/pemasukan"); ?>">
      <i class="fa fa-line-chart"></i> <span>Data Pemasukan</span>
      <span class="pull-right-container">
      </span>
    </a>
  </li>
  <li class="<?php echo ($menu == 2?'active': ''); ?>">
    <a href="<?php echo base_url(($status == 1 ? "admin" : "bendahara"). "/pengeluaran"); ?>">
      <i class="fa fa-bar-chart"></i> <span>Data Pengeluaran</span>
      <span class="pull-right-container">
      </span>
    </a>
  </li>
  <?php
      }
      if ($status== 1) {
    ?>
  <li class="treeview <?php echo ($menu == 3 || $menu == 4 ? 'active ' : ''); ?>">
          <a href="#">
            <i class="fa fa-book"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo ($menu == 3 ?'active': ''); ?>"><a href="<?php echo base_url('admin/profit'); ?>"><i class="fa fa-circle-o"></i> Profit</a></li>
            <li class="<?php echo ($menu == 4 ?'active': ''); ?>"><a href="<?php echo base_url('admin/flow'); ?>"><i class="fa fa-circle-o"></i> Arus Kas </a></li>
          </ul>
        </li>
        <li class="treeview <?php echo ($menu == 5 || $menu == 6 ? 'active' : ''); ?>">
                <a href="#">
                  <i class="fa fa-cog"></i> <span>Pengaturan</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo ($menu == 5 ?'active': ''); ?>"><a href="<?php echo base_url('admin/user'); ?>"><i class="fa fa-circle-o"></i> User</a></li>
                  <li class="<?php echo ($menu == 6 ?'active': ''); ?>"><a href="<?php echo base_url('admin/kategori'); ?>"><i class="fa fa-circle-o"></i> Kategori</a></li>
                </ul>
              </li>
              <?php
                  } // else {
                  if ($status == 1) $link = base_url('admin/profil');

                  else if ($status == 2) $link = base_url('bendahara/profil');

                  else if ($status == 3) $link = base_url('user/profil')
                ?>
    <li class="header">LAINNYA</li>
    <li class="<?php echo ($menu == 7?'active': ''); ?>">
      <a href="<?= $link; ?>">
        <i class="fa fa-user"></i> <span>Profil</span>
        <span class="pull-right-container">
        </span>
      </a>
    </li>
    <li class="<?php echo ($menu == 8?'active': ''); ?>">
      <a href="<?php echo base_url('dAuth/logout'); ?>">
        <i class="fa fa-sign-out"></i> <span>Keluar</span>
        <span class="pull-right-container">
        </span>
      </a>
    </li>
</section>
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
</section>
