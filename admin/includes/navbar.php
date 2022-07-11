<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../admin/admin_index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PNU<sup>=)</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="../admin/admin_index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

       <li class="nav-item">
        <a class="nav-link collapsed" href="../admin/register.php">
          <i class="fas fa-user-tie"></i>
          <span>Admin Profile</span>
        </a>
      </li>
        <!-- Divider -->
      <hr class="sidebar-divider">

       <div class="sidebar-heading">
        Lab
      </div>
       <li class="nav-item">
        <a class="nav-link collapsed" href="../admin/word.php">
         <i class="fas fa-clipboard-list"></i>
          <span>Films</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="../admin/excel.php">
         <i class="fas fa-clipboard-list"></i>
          <span>FeedBack</span>
        </a>
      </li>



      <!-- Divider -->


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->



  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

     <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

            <form action="logout.php" method="post">
              <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>
            </form>

        </div>
      </div>
    </div>
  </div>
