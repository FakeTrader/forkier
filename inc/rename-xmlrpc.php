<?php
/**
 * Rename xmlrpc.php and remove rsd_link from wp_head
 * Based on plugin 'Rename XMLRPC' made by Jorge Bernal
 * Plugin URI: http://wordpress.org/extend/plugins/rename-xml-rpc/
 */

remove_action('wp_head','rsd_link');
function renamed_rsd_link() {
  $renamed_xml_rpc_filename = 'zblog.php'; //CHANGE THIS pointing to the renamed file
  echo '<link rel="EditURI" type="application/rsd+xml" title="RSD" href="' . get_bloginfo('wpurl') . "/$renamed_xml_rpc_filename?rsd\" />\n";
}

function rx_site_url( $url, $path, $orig_scheme, $blog_id ) {
  if ( defined( 'XMLRPC_REQUEST' )  && $path == 'xmlrpc.php' ) {
    return preg_replace( '/xmlrpc.php$/', basename( $_SERVER['PHP_SELF'] ), $url );
  } else {
    return $url;
  }
}
add_filter( 'site_url', 'rx_site_url', 10, 4 );
?>
