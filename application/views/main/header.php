 <?php ?>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>AdminDesigns - A Responsive HTML5 Admin UI Framework</title>
  <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
  <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
  <meta name="author" content="AdminDesigns">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font CSS (Via CDN) -->
  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/skin/default_skin/css/theme.css">
 

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/admin-tools/admin-forms/css/admin-forms.css">
 
   

  <link rel="stylesheet" href="<?= base_url() ?>assets/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/datatables/responsive.bootstrap.css">
   <link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/custum.css">


  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= base_url()?>assets/img/favicon.ico">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<style>
a.paginate_button {
    display: inline-block;
    padding: 3px 11px;
    margin-right: 4px;
    border-radius: 3px;
    border: solid 1px #c0c0c0;
    background: #e9e9e9;
    box-shadow: inset 0px 1px 0px rgba(255,255,255, .8), 0px 1px 3px rgba(0,0,0, .1);
    font-size: .875em;
    font-weight: bold;
    text-decoration: none;
    color: #717171;
    text-shadow: 0px 1px 0px rgba(255,255,255, 1);

}
a.paginate_button.current {
    border: none;
    background: #616161;
    box-shadow: inset 0px 0px 8px rgba(0,0,0, .5), 0px 1px 0px rgba(255,255,255, .8);
    color: #f0f0f0;
    text-shadow: ;
    padding: 3px 11px;
}
a.paginate_button.current:hover {
   background: #fefefe;
   background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#FEFEFE), to(#f0f0f0));
   background: -moz-linear-gradient(0% 0% 270deg,#FEFEFE, #f0f0f0);
   color: #000;
}
a.paginate_button:hover {
    background: #fefefe;
   background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#FEFEFE), to(#f0f0f0));
    background: -moz-linear-gradient(0% 0% 270deg,#FEFEFE, #f0f0f0);
}
 .sidebar-menu > li > a:hover, 
 .sidebar-menu > li > a:focus,
  .sidebar-menu > li > a:active 
  {
    background-color: rgba(0, 0, 2, 0.21) !important;
   }
 .sidebar-menu > li > a:active 
  {
    background-color: rgba(0, 0, 2, 0.21) !important;
   }
</style>

</head>

<body class="admin-layout-page">

  <!-- Start: Theme Preview Pane -->
   
  <!-- End: Theme Preview Pane -->

  <!-- Start: Main -->
  <div id="main">

    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top navbar-shadow">
      <div class="navbar-branding">
        <a class="navbar-brand" href="dashboard.html">
          <b>Admin</b> 
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
      </div>
       
       
      <ul class="nav navbar-nav navbar-right">
		 <li class="dropdown menu-merge">
          <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
          	<img src="<?= base_url()?>assets/img/avatars/1.jpg" alt="avatar" class="mw30 br64">
          	<span class="hidden-xs pl15">Admin</span>
            <span class="caret caret-tp hidden-xs"></span>
          </a>
          <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
            <li class="dropdown-header clearfix">
              <div class="pull-left ml10">
                <select id="user-status">
                  <optgroup label="Current Status:">
                    <option value="1-1">Away</option>
                    <option value="1-2">Offline</option>
                    <option value="1-3" selected="selected">Online</option>
                  </optgroup>
                </select>
              </div>

              <div class="pull-right mr10">
                <select id="user-role">
                  <optgroup label="Logged in As:">
                    <option value="1-1">Client</option>
                    <option value="1-2">Editor</option>
                    <option value="1-3" selected="selected">Admin</option>
                  </optgroup>
                </select>
              </div>
            </li>
            <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-envelope"></span> Messages
                <span class="label label-warning">2</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-user"></span> Friends
                <span class="label label-warning">6</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-bell"></span> Notifications </a>
            </li>
            <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-gear"></span> Settings </a>
            </li>
            <li class="dropdown-footer">
              <a href="<?php base_url()?>admin/logout" class="">
              <span class="fa fa-power-off pr5"></span> Logout </a>
            </li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- End: Header -->

    <!-- Start: Sidebar -->
    <aside id="sidebar_left" class="nano nano-light affix">

      <!-- Start: Sidebar Left Content -->
      <div class="sidebar-left-content nano-content">

        <!-- Start: Sidebar Header -->
        <header class="sidebar-header">

          <!-- Sidebar Widget - Author -->
          <div class="sidebar-widget author-widget">
            <div class="media">
              <a class="media-left" href="#">
                <img src="<?= base_url()?>assets/img/avatars/3.jpg" class="img-responsive">
              </a>
              <div class="media-body">
                 
                <div class="media-author mt15">admin</div>
              </div>
            </div>
          </div>

          <!-- Sidebar Widget - Menu (slidedown) -->
          <div class="sidebar-widget menu-widget">
            <div class="row text-center mbn">
              <div class="col-xs-4">
                <a href="dashboard.html" class="text-primary" data-toggle="tooltip" data-placement="top" title="Dashboard">
                  <span class="glyphicon glyphicon-home"></span>
                </a>
              </div>
              <div class="col-xs-4">
                <a href="pages_messages.html" class="text-info" data-toggle="tooltip" data-placement="top" title="Messages">
                  <span class="glyphicon glyphicon-inbox"></span>
                </a>
              </div>
              <div class="col-xs-4">
                <a href="pages_profile.html" class="text-alert" data-toggle="tooltip" data-placement="top" title="Tasks">
                  <span class="glyphicon glyphicon-bell"></span>
                </a>
              </div>
              <div class="col-xs-4">
                <a href="pages_timeline.html" class="text-system" data-toggle="tooltip" data-placement="top" title="Activity">
                  <span class="fa fa-desktop"></span>
                </a>
              </div>
              <div class="col-xs-4">
                <a href="pages_profile.html" class="text-danger" data-toggle="tooltip" data-placement="top" title="Settings">
                  <span class="fa fa-gears"></span>
                </a>
              </div>
              <div class="col-xs-4">
                <a href="pages_gallery.html" class="text-warning" data-toggle="tooltip" data-placement="top" title="Cron Jobs">
                  <span class="fa fa-flask"></span>
                </a>
              </div>
            </div>
          </div>

          <!-- Sidebar Widget - Search (hidden) -->
          <div class="sidebar-widget search-widget hidden">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-search"></i>
              </span>
              <input type="text" id="sidebar-search" class="form-control" placeholder="Search...">
            </div>
          </div>

        </header>
        <!-- End: Sidebar Header -->

        <!-- Start: Sidebar Menu -->
        <ul class="nav sidebar-menu">
          <li class="active"><a href="<?= base_url()?>admin/category"><span class="glyphicon glyphicon-tags"> </span><span class="sidebar-title">Import Products Categories</span></a></li>
          <li class="active"><a href="<?= base_url()?>admin/console"><span class="glyphicon glyphicon-tags"></span><span class="sidebar-title"> Import Products </span></a></li>
          <li class="active"><a href="<?= base_url()?>admin/live_products"><span class="glyphicon glyphicon-tagsglyphicon glyphicon-tags"></span><span class="sidebar-title">Live Products</span></a></li>
          <li class="active"><a href="<?= base_url()?>admin/local_products"><span class="glyphicon glyphicon-tags"></span><span class="sidebar-title">Local Products</span></a></li>
          <li class="active"><a href="<?= base_url()?>admin/console_products"><span class="glyphicon glyphicon-tags"></span><span class="sidebar-title">View App Products</span></a></li>
          <li class="active"><a href="<?= base_url()?>admin/history"><span class="fa fa-history"></span><span class="sidebar-title">Histery</span></a></li>
          <li class="active"><a href="<?= base_url()?>admin/live_connection_setting"><span class="fa fa-gear"></span>
                 <span class="sidebar-title">Live Data Base Connection </span></a>
          </li>
          <li class="active">
                 <a href="<?= base_url()?>admin/local_connection_setting"><span class="fa fa-gear"></span>
                 <span class="sidebar-title">Local Data Base Connection </span></a>
          </li>
          <li class="active">
            <a href="<?= base_url()?>admin/logout"><span class="fa fa-power-off"></span>
               <span class="sidebar-title">Logout</span>
            </a>
          </li>
          </ul>
        <!-- End: Sidebar Menu -->

	      <!-- Start: Sidebar Collapse Button -->
	      <div class="sidebar-toggle-mini">
	        <a href="#">
	          <span class="fa fa-sign-out"></span>
	        </a>
	      </div>
	      <!-- End: Sidebar Collapse Button -->

      </div>
      <!-- End: Sidebar Left Content -->

    </aside>

<script src="http://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="<?= base_url()?>vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
<!---
  <script src="<?= base_url()?>assets/datatables/jquery.dataTables.min.js"></script>
   <script src="<?= base_url()?>assets/datatables/dataTables.bootstrap.min.js"></script>
   <script src="<?= base_url()?>assets/datatables/dataTables.responsive.js"></script>
   -->

   <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
   <script src="<?= base_url()?>assets/datatables/customScripting.js"></script>
