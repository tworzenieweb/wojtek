<?php 
/* 
Plugin Name: Simple Lightbox
Plugin URI: http://archetyped.com/lab/slb-2-0rc2/
Description: The highly customizable lightbox for WordPress
Version: 2.0RC2.1 (BETA)
Author: Archetyped
Author URI: http://archetyped.com
*/
/* 
Copyright 2013 Solomon Marchessault (sol@archetyped.com)

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
require_once 'model.php';

$slb = new SLB_Lightbox();

function slb_register_theme($name, $title, $stylesheet_url, $layout) {
	global $slb;
	$slb->register_theme($name, $title, $stylesheet_url, $layout);
}

?>
