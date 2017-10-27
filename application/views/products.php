 <section id="content_wrapper">
    <header id="topbar" class="alt">
        <div class="topbar-left">
          <ol class="breadcrumb">
            <li class="crumb-active">
              <a href="dashboard.html">Dashboard</a>
            </li>
           <li class="crumb-trail">Live Products</li>
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

 <div class="section-divider mb10" id="spy1">
          <span>Live Products</span>
      </div>
      
<div class="panel-body pn">
<div class="table-responsive">
  
              
                 
                
                <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product SKU</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                            
                            <?php if($data){
							 
								foreach($data as $datas){
								?>
                            <tr>
                                <td><?= $datas['id']?></th>
                                <td><?= $datas['product_sku']?></td>
                                <td><?= number_format($datas['product_price'],3)?></td>
                                <td><?= $datas['product_quantity']?></td>
                                <td><?php if($datas['published']==1){echo 'Published'; }else{ echo 'Pending'; }?></td>
                            </tr>
                            <?php }} ?>
                            </tbody>
                            <tfoot>
                            <tr>
                               <th>ID</th>
                                <th>Product SKU</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Status</th>
                           </tr>
                            </tfoot>
                        </table>
                         
                        
              </div>
            </div>
         </div>
      </div>
    </div>
 </div>
</div>
</section>


<!-- page content End -->

</section>  <!--top Section End -->
<script>
jQuery(document).ready(function($){
    $('#myTable').DataTable();
});
</script>
<style>
    input[type="search"] {
    display: -moz-inline-stack;
    height: 32px;
    border: 1px solid #DDD;
    margin-bottom: 10px;
    }
</style>
  
  