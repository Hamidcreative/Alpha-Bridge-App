
<!------Footer Start -------->
</section>
 </div><!-- Main div end -->
  <style>
  /* demo page styles */
  .admin-form .panel.heading-border:before,
  .admin-form .panel .heading-border:before {
    transition: all 0.7s ease;
  }
  </style>

  <!-- BEGIN: PAGE SCRIPTS -->

  <!-- jQuery -->
  


  <!-- Theme Javascript -->
  <script src="<?= base_url()?>assets/js/utility/utility.js"></script>
  <script src="<?= base_url()?>assets/js/demo/demo.js"></script>
  <script src="<?= base_url()?>assets/js/main.js"></script>
  <script src="<?= base_url()?>assets/custum.js"></script>

   
  

  <script type="text/javascript">
  
  jQuery(document).ready(function() {

    "use strict";

    // Init Theme Core    
    Core.init();

    // Init Demo JS  
    Demo.init();

    // Demo code - active navigation btns
    $('.animation-nav').click(function() {
      $('.animation-nav').removeClass('btn-primary').addClass('btn-default');
      $(this).addClass('btn-primary');
    });

    // Form switcher nav
    var formSwitches = $('.admin-form-list a');
    formSwitches.on('click', function() {
      formSwitches.removeClass('item-active');
      $(this).addClass('item-active')

      if ($(this).attr('href') === "#contact3") {
        setTimeout(function() {
          initialize();
        }, 100);
      }

    });
	});

	</script>
</body>

</html>
