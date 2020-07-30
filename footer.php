			<!-- footer -->
			<footer class="footer" role="contentinfo">
				
				<!-- logomark -->
				<div class="footer-logo">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo.jpg" alt="Logo" class="logo-img">
					<span>Wikitongues, Inc.</span>
				</div>
				<!-- /logomark -->

				<!-- footer menus -->
				<div class="footer-navigation">
					<?php main_footer_menu(); ?>
					<?php secondary_footer_menu(); ?>
					<!-- <div class="clear"></div> -->
				</div>
				<!-- /footer menus -->

				<!-- legal -->
				<p class="legal">Wikitongues is a 501(3)(c) non-profit organization based on Lenape land in Brooklyn, NY, USA. <br> Thanks to <a href="https://www.greengeeks.com/track/wikitongues" target="_blank">GreenGeeks</a>, this website's carbon footprint is offset by wind credits.</p>
				<!-- /legal -->

			</footer>
			<!-- /footer -->

			<div style="opacity:0; background: rgba(0,0,0,.8); position: fixed; top: 0; left: 0; width: 100%; height:100vh; z-index: 100;" id="wt_birthdaypopup"><!-- birthday popup -->
				<div style="width: 100%; height: 100%; position: relative;" id="wt_birthdaypopup--wrap">
					<div style="position: absolute; width: 90%; height: 90vh; overflow: scroll; top: 50%; left: 50%; transform: translate(-50%,-50%);" id="wt_birthdaypopup--widget">	
						<script src="https://app.giveforms.com/widget.js" type="text/javascript"></script><iframe src="https://wikitonguesorg.giveforms.com/wikitongues" id="giveforms-form-embed" name="giveforms" height="1200px" width="100%" style="min-width: 320px; border: 0;" allowpaymentrequest="true"></iframe>
					</div>
				</div>
			</div><!-- /popup -->

			<style>
				#wt_birthdaypopup.fadein {
					opacity:1 !important;
				}
			</style>

			<script type="text/javascript">
				var $ = jQuery;

				$(document).ready(function(){
					setTimeout(function(){
						$('#wt_birthdaypopup').addClass('fadein');
					}, 2000);

					$('body').on('click', function(e){
						if ( e.target.id !== "wt_birthdaypopup--widget") {
							$('#wt_birthdaypopup').hide();
						}
					});

					$('body').on('keyup',function(e){
					    if(e.which == 27){
					        $('#wt_birthdaypopup').hide();
					    }
					});
				});
			</script>

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-48869719-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-48869719-1');
		</script>

	</body>
</html>
