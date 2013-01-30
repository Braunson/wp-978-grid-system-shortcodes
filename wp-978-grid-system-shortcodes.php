<?php
/*
Plugin Name: Wordpress 978 Grid System Shortcodes!
Plugin URI: http://www.geekybeaver.ca/?ref=wp-978gs
Description: 978 Grid System is an effort to streamline web development workflow by providing commonly used dimensions, based on a width of 960 pixels and this plugin helps you format your wordpress posts and pages easily by providing shortcodes. Your WordPress theme must be 978gs ready for this plugin to work effeciently.
Version: 1.0
Author: geekybeaver
Author URI: http://www.geekybeaver.ca/?ref=wp-978gs
License: GPL2
*/
?>

<?php

/*  Copyright 2013  geekybeaver (email : support@geekybeaver.ca)

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


/**
 * Very simple. Provides a function that serves as a callback for two actions we can see in line 66 and line 67.
 *
 * @return string html format of the content wrapped in shortcode
 */
 
function gb_978shortCode($atts, $content){
    
    /**
     * no defaults for this chokes
     */
    $collection = array(
        'col' =>  '', 
    );
    
    extract(shortcode_atts($collection, $atts));
    
    foreach($collection as $attr => $val){
        
        $attribute = $$attr;
        
        if(!empty($attribute))
            
            $str.= ($attr == 'col') ? $attribute : $attr . '_' . $attribute . ' ';
        
    }
    
    $gridFormatted = sprintf('<div class="%s">%s<div class="row-end">&nbsp;</div></div>', rtrim($str), do_shortcode($content));
    
    return $gridFormatted;
    
}

add_shortcode( '978', 'gb_978shortCode' );
add_shortcode( 'container', 'gb_978shortCode' );

?>