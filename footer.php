			<!-- footer -->
			<footer class="wt_footer" role="contentinfo">
				
				<!-- logomark -->
				<div class="wt_footer__logo">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo.jpg" alt="Logo" class="logo-img">
					<span>Wikitongues, Inc.</span>
				</div>
				<!-- /logomark -->

				<!-- footer menus -->
				<div class="wt_footer__navigation">
					<?php secondary_footer_menu(); ?>
				</div>
				<!-- /footer menus -->

				<!-- legal -->
				<div class="wt_footer__legal">Wikitongues is a 501(3)(c) non-profit organization based on Lenape land in Brooklyn, NY, USA. <br> Thanks to <a href="https://www.greengeeks.com/track/wikitongues" target="_blank">GreenGeeks</a>, this website's carbon footprint is offset by wind credits.</div> <!-- Lenapehoking -->
				<!-- /legal -->

				<!-- Questions? -->
				<div class="wt_footer__questions">
					<strong>Questions?</strong><br />
					<a href="mailto:hello@wikitongues.org">hello@wikitongues.org</a>
				</div>
				<!-- / Questions -->

			</footer>
			<!-- /footer -->

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
