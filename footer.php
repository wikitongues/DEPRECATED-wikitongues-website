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
				<p class="legal">Wikitongues is a 501(3)(c) non-profit organization based in Brooklyn, NY, USA. <br> Thanks to GreenGeeks, this website's carbon footprint is offset by wind credits.</p>
				<!-- /legal -->

			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

	</body>
</html>
