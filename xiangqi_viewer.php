<?php
/*
Plugin Name: xiangqi_viewer
Plugin URI: https://github.com/zu2/xiangqi_viewer
Description: display xiangqi board by SVG.
Version: 0.01
Author: ZUKERAN, shin (zu2)
Author URI: https://github.com/zu2/xiangqi_viewer
License: GPL2
*/
/*  Copyright 2017 ZUKERAN, shin

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function xiangqi_viewer($atts,$content=null) {
	static $num=0;
	$html = '';
	$dir = "wp-content/plugins/xiangqi_viewer";
    if($num==0){
		$html = "<script type=\"text/javascript\" src=\"$dir/snap.svg-min.js\"></script>" . "\n"
			.	"<script type=\"text/javascript\" src=\"$dir/xiangqi_viewer.js\"></script>" . "\n";
    }
	$num++;
	$content = do_shortcode($content);
	return $html
		. "<div id=\"xiangqi-viewer-$num\" align=\"center\"></div>"
		. "<script>\n"
		. "window.board$num = new XiangqiViewer.Board('#xiangqi-viewer-$num', 35, 2.5, false);\n"
		. "board$num.fenSetup(\"$content\");\n"
		. "</script>\n";
}

add_shortcode('xiangqi_viewer','xiangqi_viewer');
?>
