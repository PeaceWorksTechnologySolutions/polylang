<?php

$_tests_dir = getenv( 'WP_TESTS_DIR' );
if ( ! $_tests_dir ) {
	$_tests_dir = '/tmp/wordpress-tests-lib';
}

require_once $_tests_dir . '/includes/functions.php';

// load the plugin however *no* Polylang instance is created as no languages exist in DB
function _manually_load_plugin() {
	require dirname( __FILE__ ) . '/../../../polylang.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

require $_tests_dir . '/includes/bootstrap.php';
require dirname( __FILE__ ) . '/testcase.php';
require dirname( __FILE__ ) . '/testcase-ajax.php';
require dirname( __FILE__ ) . '/testcase-canonical.php';
require dirname( __FILE__ ) . '/testcase-domain.php';

if ( defined( 'POLYLANG_PRO' ) && POLYLANG_PRO ) {
	echo 'Testing Polylang Pro...' . PHP_EOL;
} else {
	echo 'Testing Polylang Free...' . PHP_EOL;
}