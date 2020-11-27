<?php /* donate popup, customizable per page */ ?>

<div class="wt_donate-module">
	<h2 class="wt_donate-module__title"><?php echo $donate_module_header; ?></h2>
	<p class="wt_donate-module__text"><?php echo $donate_module_text; ?></p>
	<p class="wt_donate-module__button"><?php echo $donate_module_code; ?></p>
	<p class="wt_donate-module__learn">Or <a href="<?php bloginfo('url'); ?>/donate">learn more</a>.</p>
	<p class="wt_donate-module__close">
		<a id="close-module" href="#">No thank you, not today.</a>
	</p>

</div>