		<!-- Cierra ventana modal -->
		<script type = "text/javascript">
			$(document).ready(function() {
				$('.close').click(function(e) {
					$('#cuerpo').css('overflow', 'scroll');				
				});
			});
		</script>
		
		
		<!-- Ventana modal pago en efectivo -->
		<script type = "text/javascript">
			$(document).ready(function() {
				$(".pagoEfectivo").mouseenter(function(){									
					$("#modalPagoEfectivo").on("show", function() {    // wire up the OK button to dismiss the modal when shown
						$("#modalPagoEfectivo a.btn").on("click", function(e) {							
							$("#modalPagoEfectivo").modal('hide');     // dismiss the dialog
						});
					});
							
					$("#modalPagoEfectivo").on("hide", function() {    	// remove the event listeners when the dialog is dismissed
						$("#modalPagoEfectivo a.btn").off("click");
					});
							
					$("#modalPagoEfectivo").on("hidden", function() {  	// remove the actual elements from the DOM when fully hidden
						$("#modalPagoEfectivo").remove();
					});
							
					$("#modalPagoEfectivo").modal({                    	// wire up the actual modal functionality and show the dialog
						"backdrop"  : "static",
						"keyboard"  : true,
						"show"      : true                     			// ensure the modal is shown immediately
					});								
				});				
			});
		</script>
		
		
		<a class="pagoEfectivo" href="">¿Cómo realizar su pago?</a><span></span>