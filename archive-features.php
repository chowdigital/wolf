<?php
// Redirect archive-features.php to the homepage
wp_redirect( home_url() ); 
exit; // Always call exit after wp_redirect()
?>