
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<footer class="text-center" style="padding-top:0px;">

        
        <div class="footer-below" style="background:#0071ba;">
                    <div class="col-lg-12">
                         @ Company Name  <%= new java.text.SimpleDateFormat("yyyy").format(new java.util.Date()) %>, All rights reserved.
                         
                    </div>
            </div>
      
    
    
 </footer>
    
	<!-- jQuery -->
    <script src="controller/js/jquery.min.js"></script>
	
	<!--Bootstrap DateTime Picker JS Files-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
	
	
    <!-- Bootstrap Core JavaScript -->
    <script src="controller/js/bootstrap.min.js"></script>
	
	<!-- Initialize Bootstrap Datetime Picker for ID "datetimepicker1" -->
	<script>
		$(function() {
			$('#datetimepicker1').datetimepicker({
				format: 'L'
			});
		});
	</script>
	
	<!----------- Tooltip & popover initialization ------->
	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip(); 
			$('[data-toggle="popover"]').popover();
			
			//--Enable HTML inside POPOVER Content
			$(function(){
				$('[rel="popover"]').popover({
					container: 'body',
					html: true,
					content: function () {
						var clone = $($(this).data('popover-content')).clone(true).removeClass('hide');
						return clone;
					}
				}).click(function(e) {
					e.preventDefault();
				});
			});
			
			//--Change state of chevron 
			$('#collapse1').on('shown.bs.collapse', function() {
				$(".servicedrop1").addClass('glyphicon-chevron-up').removeClass('glyphicon-chevron-down');
			  });

			$('#collapse1').on('hidden.bs.collapse', function() {
				$(".servicedrop1").addClass('glyphicon-chevron-down').removeClass('glyphicon-chevron-up');
			  });
			
			$('#collapse2').on('shown.bs.collapse', function() {
				$(".servicedrop2").addClass('glyphicon-chevron-up').removeClass('glyphicon-chevron-down');
			  });

			$('#collapse2').on('hidden.bs.collapse', function() {
				$(".servicedrop2").addClass('glyphicon-chevron-down').removeClass('glyphicon-chevron-up');
			  });
			  
			$('#collapse3').on('shown.bs.collapse', function() {
				$(".servicedrop3").addClass('glyphicon-chevron-up').removeClass('glyphicon-chevron-down');
			  });

			$('#collapse3').on('hidden.bs.collapse', function() {
				$(".servicedrop3").addClass('glyphicon-chevron-down').removeClass('glyphicon-chevron-up');
			  });
		});
		
		
	

	</script>
	
</body>



    	
<script>
	$(document).ready(function() {
		$(".my_close").click(function(){
			$(".my_popup").addClass("my_popup_closed");
		});
	});
</script>