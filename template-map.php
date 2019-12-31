<?php /* Template name: Map */ get_header(); ?>

<?php
	// Set up video query
	$args = array(
		'post_type' => 'videos'
	);
	$query = new WP_Query($args);
	$temp_query = $wp_query;
	$wp_query = NULL;
	$wp_query = $query;

	// Run video loop
	$markers = array();
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$location = get_field('geotag');
			if ($location) {
				$markers[] = $location;
			}
		}
	}
	wp_reset_postdata(); 

	// Reset main query object
	$wp_query = NULL;
	$wp_query = $temp_query; 
?>

	<main role="main">
		<div id="map" class="map"></div>
		<script type="text/javascript">

		// Country boundaries layer
		var countries = new ol.layer.Vector({
			source: new ol.source.Vector({
				url: 'https://openlayers.org/en/v5.1.3/examples/data/geojson/countries.geojson',
				format: new ol.format.GeoJSON()
			})
		});

		// Map markers for videos
		var markers = <?php echo json_encode($markers); ?>;

		// Marker style
		var stroke = new ol.style.Stroke({color: 'black', width: 2});
		var fill = new ol.style.Fill({color: 'red'});
		var selectedFill = new ol.style.Fill({color: 'yellow'});

		var style = new ol.style.Style({
			image: new ol.style.RegularShape({
				fill: fill,
				stroke: stroke,
				points: 5,
				radius: 10,
				radius2: 4,
				angle: 0
			})
		});

		var selectedStyle = new ol.style.Style({
			image: new ol.style.RegularShape({
				fill: selectedFill,
				stroke: stroke,
				points: 5,
				radius: 15,
				radius2: 6,
				angle: 0
			})
		});

		// OpenLayers Feature objects for markers
		var features = new Array(markers.length);

		for (var i = 0; i < markers.length; i++) {
			var coordinates = [parseFloat(markers[i].lng), parseFloat(markers[i].lat)];
			// Convert projection of coordinates
			coordinates = ol.proj.transform(coordinates, 'EPSG:4326', 'EPSG:3857');
			features[i] = new ol.Feature(new ol.geom.Point(coordinates));
			features[i].setStyle(style);
		}

		var source = new ol.source.Vector({
			features: features
		});

		var vectorLayer = new ol.layer.Vector({
			source: source
		});

		var map = new ol.Map({
			target: 'map',
			layers: [
				new ol.layer.Tile({
					source: new ol.source.OSM()
				}),
				countries,
				vectorLayer
			],
			view: new ol.View({
				center: ol.proj.fromLonLat([0, 0]),
				zoom: 0
			})
		});

		// Hover interaction
		var countrySelect = new ol.interaction.Select({
			condition: ol.events.condition.pointerMove,
			filter: function (feature, layer) {
				return layer.ol_uid === countries.ol_uid;
			}
		});
		map.addInteraction(countrySelect);
		countrySelect.on('select', function (e) {
			// do something
		});

		var markerSelect = new ol.interaction.Select({
			condition: ol.events.condition.pointerMove,
			filter: function (feature, layer) {
				return layer.ol_uid === vectorLayer.ol_uid;
			},
			style: selectedStyle
		});
		map.addInteraction(markerSelect);
		markerSelect.on('select', function (e) {
			// do something
		});

		</script>
	</main>
	    
<!-- 
/* ================= *\
 *   Donate Banner   *
\* ================= */ -->
<?php 
// define variables for donate CTA at bottom of layout
$donate_banner_header = get_field('donate_banner_header');
$donate_banner_copy = get_field('donate_banner_copy');
$donate_banner_form_embed = get_field('donate_banner_form_embed');

// load donate CTA ?>
<div class="wt_donate-banner banner_element">
	<div class="inner-wrap">
		<aside class="wt_donate-banner-header">
			<h1>For $250, you can help save a language</h1>
			<p>
				<strong>*</strong> That's just <strong>$20.84 per month</strong>!
			</p>
		</aside>
		<aside class="wt_donate-banner-form">
			<script src="https://donorbox.org/widget.js" paypalExpress="false"></script><iframe src="https://donorbox.org/embed/wikitongues?amount=20.84&default_interval=m" height="685px" width="100%" style="max-width:500px; min-width:310px; max-height:none!important" seamless="seamless" name="donorbox" frameborder="0" scrolling="no" allowpaymentrequest></iframe>
		</aside>
		<div class="clear"></div>
	</div>
</div>

<?php get_footer(); ?>
