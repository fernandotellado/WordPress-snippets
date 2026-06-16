<?php
/**
 * Plugin Name: Custom Mail Sender (From name and address)
 * Description: Sets the "From" name and address for every email WordPress sends.
 * Author:      Fernando Tellado
 * Author URI:  https://ayudawp.com
 * Version:     1.0.0
 *
 * Useful when your site emails go out as "WordPress <wordpress@yourdomain.com>"
 * and you want them branded instead, e.g. "Customer Care <care@yourdomain.com>".
 *
 * IMPORTANT: this affects EVERY email the site sends through wp_mail()
 * (the EU Withdrawal Compliance plugin, WooCommerce and WordPress core alike).
 * It does not limit the change to a single plugin.
 *
 * HOW TO INSTALL (as a must-use plugin):
 *   1. Save this file as wp-content/mu-plugins/custom-mail-sender.php
 *      (create the mu-plugins folder if it does not exist yet).
 *   2. That's it. Must-use plugins load automatically, there is nothing to activate.
 *   3. Edit the two marked lines below with your own sender details.
 *
 * Deliverability note: changing the "From" does not authenticate your mail. If your
 * emails land in spam, also install an SMTP plugin (WP Mail SMTP, FluentSMTP, Post SMTP)
 * that signs them with SPF/DKIM. That plugin already lets you set the sender, so in that
 * case you won't need this file at all.
 */

defined( 'ABSPATH' ) || exit;

add_filter( 'wp_mail_from', function ( $from ) {
	$address = 'care@yourdomain.com'; // <-- set your sender address here.
	return is_email( $address ) ? $address : $from;
} );

add_filter( 'wp_mail_from_name', function ( $name ) {
	$sender = 'Customer Care'; // <-- set your sender name here.
	return '' !== $sender ? $sender : $name;
} );
