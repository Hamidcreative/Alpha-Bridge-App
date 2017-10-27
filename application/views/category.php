 <section id="content_wrapper">
    <header id="topbar" class="alt">
        <div class="topbar-left">
          <ol class="breadcrumb">
            <li class="crumb-active">
              <a href="dashboard.html">Dashboard</a>
            </li>
           <li class="crumb-trail">Categories</li>
         </ol>
      </div>
</header>
      <!-- End: Topbar -->
      
      
<section id="content" class="table-layout">
    <div class="tray tray-center" style="height: 624px;">
        <div class="mw1000 center-block">
           <div class="admin-form theme-primary">
              <div class="panel heading-border panel-primary">
                <div class="panel-body bg-light">
  <?php if(isset($_SESSION['success_msg'])){  ?>              
 <div class="alert alert-success alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="fa fa-check pr10"></i>
      <?php echo  $_SESSION['success_msg']; ?>
 </div>
 
 <?php 
  unset($_SESSION["success_msg"]);
 } ?>
 <?php if(isset($_SESSION['error_msg'])){?>
  <div class="alert alert-danger alert-dismissable">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <i class="fa fa-check pr10"></i>
      <?php  echo  $_SESSION['error_msg']; ?>
 </div>
<?php  unset($_SESSION["error_msg"]); } ?>

  
     
         <div class="panel-body pn">
<div class="table-responsive">
  
              
                 
                
                
                         
                        
              </div>
            </div>
         </div>
      </div>
    </div>
 </div>
</div>
</section>
</section>


 
 
  
  