<?
/* Template Name: Search Results */
 
$search_refer = $_GET["post_type"];
if ($search_refer == 'videos') { load_template('/archive-videos.php'); }
elseif ($search_refer == 'languages') { load_template('/archive-languages.php'); };
 
?>