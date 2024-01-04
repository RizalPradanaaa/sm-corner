<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion fixed" id="accordionSidebar" style="postion : {fixed}">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/admin'); ?>">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa fa-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SM Admin <sup>23</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<?php if($judul == 'SM - Corner | Admin') : ?>
    <li class="nav-item active">
<?php else : ?>
    <li class="nav-item">
<?php endif; ?>
    <a class="nav-link" href="<?= base_url('/admin'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<?php if($judul == 'SM - Corner | Barang') : ?>
    <li class="nav-item active">
<?php else : ?>
    <li class="nav-item">
<?php endif; ?>
    <a class="nav-link" href="<?= base_url('/admin/barang'); ?>">
        <i class="fas fa-fw fas fa-box"></i>
        <span>Barang</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<?php if($judul == 'SM - Corner | Kasir') : ?>
    <li class="nav-item active">
<?php else : ?>
    <li class="nav-item">
<?php endif; ?>
    <a class="nav-link" href="<?= base_url('/admin/kasir'); ?>">
    <i class="fas fa-fw fa-desktop"></i>
    <span>Kasir</span>
    </a>
</li>
    

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<?php if($judul == 'SM - Corner | Settings') : ?>
    <li class="nav-item active">
<?php else : ?>
    <li class="nav-item">
<?php endif; ?>
    <a class="nav-link" href="<?= base_url('/admin/settings'); ?>">
        <i class="fas fa-fw fa-user-cog"></i>
        <span>Settings</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->