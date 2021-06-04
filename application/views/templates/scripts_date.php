</section>
<!-- container section end -->
<!-- javascripts -->
<script src="<?php echo base_url()?>/assets/js/jquery.js"></script>
  <script src="<?php echo base_url()?>/assets/js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="<?php echo base_url()?>/assets/js/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url()?>/assets/js/jquery.nicescroll.js" type="text/javascript"></script>

  <!-- jquery ui -->
  <script src="<?php echo base_url()?>/assets/js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="<?php echo base_url()?>/assets/js/ga.js"></script>
  <!--custom switch-->
  <script src="<?php echo base_url()?>/assets/js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="<?php echo base_url()?>/assets/js/jquery.tagsinput.js"></script>

  <!-- colorpicker -->

  <!-- bootstrap-wysiwyg -->
  <script src="<?php echo base_url()?>/assets/js/jquery.hotkeys.js"></script>
  <script src="<?php echo base_url()?>/assets/js/bootstrap-wysiwyg.js"></script>
  <script src="<?php echo base_url()?>/assets/js/bootstrap-wysiwyg-custom.js"></script>
  <script src="<?php echo base_url()?>/assets/js/moment.js"></script>
  <script src="<?php echo base_url()?>/assets/js/bootstrap-colorpicker.js"></script>
  <script src="<?php echo base_url()?>/assets/js/daterangepicker.js"></script>
  <script src="<?php echo base_url()?>/assets/js/bootstrap-datepicker.js"></script>
  <!-- ck editor -->
  <script type="text/javascript" src="<?php echo base_url()?>/assets/assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="<?php echo base_url()?>/assets/js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="<?php echo base_url()?>/assets/js/scripts.js"></script>
  
  <script>
     $('#quantite').on('change', function(){
         $('input[name*="num_serie"]').parent().remove();
         for (let i = 0; i < $('#quantite').val(); i++){
             if (i == 0){
                 $('#source').parent().after(function(){
                 return '<div class="form-group"><label for="num_serie' + (i+1) + '">Numéro de série ' + (i+1) + '</label><input type="text" name="num_serie' + (i+1) + '" class="form-control" id="num_serie' + (i+1) + '" placeholder="Numéro Série"></div>'
             })
             }else{
                $('#num_serie'+ i).parent().after(function(){
                 return '<div class="form-group"><label for="num_serie' + (i+1) + '">Numéro de série ' + (i+1) + '</label><input type="text" name="num_serie' + (i+1) + '" class="form-control" id="num_serie' + (i+1) + '" placeholder="Numéro Série"></div>'
             })
             }            
         }
         
     })
  </script>
</body>

</html>

