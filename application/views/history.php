<section id="content_wrapper">
  <header id="topbar" class="alt">
    <div class="topbar-left">
      <ol class="breadcrumb">
        <li class="crumb-active">
          <a href="dashboard.html">Dashboard</a>
        </li>
        <li class="crumb-trail">History</li>
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
              <?php 
              if(isset($_SESSION['success_msg'])){  ?>              
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="fa fa-check pr10"></i>
                  <?php echo  $_SESSION['success_msg']; ?>
                </div>
                <?php unset($_SESSION["success_msg"]);
              } 
              if(isset($_SESSION['error_msg'])){?>
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="fa fa-check pr10"></i>
                  <?php  echo  $_SESSION['error_msg']; ?>
                </div>
                <?php  unset($_SESSION["error_msg"]); 
              } ?>
              <div class="section-divider mb40" id="spy1">
                <span>History</span>
              </div>
              <div class="panel-body pn">
                <div class="table-responsive">
                  <div class="row"> 
                    <div class="col-md-8 col-sm-12">           
                    </div>               
                    <div class="col-md-4 col-sm-12">           
                      <input type="text" id="search-input" placeholder="Search" class="form-control gui-input"  >
                    </div>  
                  </div>
                 <table id="statusList" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Last Updated</th>
                       <!--  <th>Total Products Updated</th> -->
                        <th class="">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                     <tr>
                        <th>ID</th>
                        <th>Last Updated</th>
                        <!-- <th>Total Products Updated</th> -->
                        <th class="">Action</th>
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
</section>  <!--top Section End -->
<script>
  jQuery(document).ready(function($){
    oTable = "";
      var regTableSelector = $("#statusList");
      var baseUrl          = "<?= base_url();?>";
      var url_DT           = baseUrl + "admin/get_history/listing";
      var aoColumns_DT     = [
                                /* ID */ {
                                "mData": "ID",
                                "bVisible": true,
                                "bSortable": true,
                                "bSearchable": true
                                },
                                {
                                  "mData": "Date"
                                },
                                // {
                                //   "mData": "Tottal_products_updated"
                                // },
                                {
                                  "mData": "ViewEditActionButtons"
                                }
                              ];
      var HiddenColumnID_DT = "ID";
      var sDom_DT = '<"H"r>t<"F"<"row"<"col-lg-6 col-xs-12" i> <"col-lg-6 col-xs-12" p>>>';
      commonDataTables(regTableSelector, url_DT, aoColumns_DT, sDom_DT, HiddenColumnID_DT);
      
      $("#search-input").on("keyup", function (e) {
      oTable.fnFilter($(this).val());
    });
      

         
     
       $(document).on("click",".delete",function() {
          var ID = $(this).parents("tr").attr("data-id");
                var postData = {id: ID, value: "delete"};
        $.ajax({
                    url: baseUrl + "admin/get_history/delete",
                    data: postData,
                    type: "POST",
                    success: function (output) {
                        var data = output.split("::");
                        if (data[0] == 'OK') {
                           oTable.fnDraw(false);
                        }
                    }
                });
            });
   setTimeout(function() {
    $('#mydiv').fadeOut(5000);
    }, 2000); 
    });
 
 </script>

  