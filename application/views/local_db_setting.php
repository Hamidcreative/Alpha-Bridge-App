 <section id="content_wrapper">
    <header id="topbar" class="alt">
        <div class="topbar-left">
          <ol class="breadcrumb">
            <li class="crumb-active">
              <a href="dashboard.html">Dashboard</a>
            </li>
           <li class="crumb-trail">Data Base Settings</li>
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
               
<form method="post" action="<?= base_url()?>index.php/admin/update_local_db_settings" id="" enctype="multipart/form-data">
      <div class="section-divider mb40" id="spy1">
          <span>Data Base Connection Settings</span>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="section">
             <label class="field">
                 <?php echo form_error('db_user_name'); ?>
                <input type="text" name="db_user_name"   class="gui-input" placeholder="Data Base User Name" 
                value="<?php  if(isset($data->db_user_name)){echo $data->db_user_name ;}else{echo set_value('db_user_name'); }?>">
            </label>
          </div>
       </div>
       <div class="col-md-6">
         <div class="section">
          <label class="field">
          
        
          
              <?php echo form_error('db_user_password'); ?>
             <input type="text" name="db_user_password"   class="gui-input" placeholder="Data Base Password"
             value="<?php  if(isset($data->db_user_password)){echo $data->db_user_password ;}else{echo set_value('db_user_password'); }?>">
           </label>
         </div>
       </div>
     </div>
      <div class="row">
        <div class="col-md-6">
          <div class="section">
             <label class="field">
                 <?php echo form_error('db_host_name'); ?>
                <input type="text" name="db_host_name"   class="gui-input" placeholder="Data Base Host Name"
                value="<?php  if(isset($data->db_host_name)){echo $data->db_host_name ;}else{echo set_value('db_host_name'); }?> ">
            </label>
          </div>
       </div>
       <div class="col-md-6">
         <div class="section">
          <label class="field">
              <?php echo form_error('db_name'); ?>
             <input type="text" name="db_name"   class="gui-input" placeholder="Data Base Name"
             value="<?php  if(isset($data->db_name)){echo $data->db_name ;}else{echo set_value('db_name'); }?>">
           </label>
         </div>
       </div>
     </div>                  
     <div class="panel-footer ">
       <button type="submit" class="button btn-primary">Submit</button>
     </div>
</form>
        </div>
      </div>
    </div>
 </div>
</div>
</section>


<!-- page content End -->

</section>  <!--top Section End -->
  