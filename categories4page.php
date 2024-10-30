<?php

/*
Plugin Name: categories4page
Plugin URI: http://www.g-innova.com.ar/comunidad/aporte/wordpress-plugins-categories4page/
Description: Now you can add cats to pages too  (whitout add new category)
Version: 1.0
Author: Juan Manuel Hlawatsch
Author URI: http://www.g-innova.com.ar/cooperativa/juan-manuel-hlawatsch/

Copyright (c) 2008 Juan Manuel Hlawatsch
Released under the GNU General Public License (GPL)
http://www.gnu.org/licenses/gpl.txt
*/

add_action('edit_page_form', 'addmenucategories');

function addmenucategories() {
	print  "
        <script type='text/javascript' src='";
    bloginfo('url');
    print  "/wp-includes/js/jquery/suggest.js?ver=1.1b'></script>
        <script type='text/javascript' src='";
    bloginfo('url');
    print  "/wp-includes/js/jquery/ui.core.js?ver=1.5.1'></script>
        <script type='text/javascript' src='";
    bloginfo('url');
    print  "/wp-includes/js/jquery/ui.tabs.js?ver=1.5.1'></script>
        <script type='text/javascript' src='";
    bloginfo('url');
    print  "/wp-admin/js/post.js?ver=20080629'></script>
        ";
     print '<div id="categorydiv" class="postbox ';
    postbox_classes('categorydiv', 'post');
     print '">
<h3>';
    _e('Categories');
    print '</h3>
<div class="inside">';

    print '<!-- <div id="category-adder" class="wp-hidden-children">
    <h4><a id="category-add-toggle" href="#category-add" class="hide-if-no-js" tabindex="3">';
    _e( '+ Add New Category' );
    print '</a></h4>
    <p id="category-add" class="wp-hidden-child">
    <input type="text" name="newcat" id="newcat" class="form-required form-input-tip" value="';
    _e( 'New category name' );
    print '" tabindex="3" />';
    wp_dropdown_categories( array( 'hide_empty' => 0, 'name' => 'newcat_parent', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => __('Parent category'), 'tab_index' => 3 ) );
    print '<input type="button" id="category-add-sumbit" class="add:categorychecklist:categorydiv button" value="';
    _e( 'Add' );
    print '" tabindex="3" />';
    wp_nonce_field( 'add-category', '_ajax_nonce', false );
    print '<span id="category-ajax-response"></span>
    </p>
</div>-->';
    print '<ul id="category-tabs">
<li class="ui-tabs-selected"><a href="#categories-all" tabindex="3">';
    _e( 'All Categories' );
    print '</a></li>
<li class="wp-no-js-hidden"><a href="#categories-pop" tabindex="3">';
    _e( 'Most Used' );
    print '</a></li>
</ul>

<div id="categories-all" class="ui-tabs-panel">
<ul id="categorychecklist" class="list:category categorychecklist form-no-clear">';
    dropdown_categories();
    print '
</ul>
</div>

<div id="categories-pop" class="ui-tabs-panel" style="display: none;">
<ul id="categorychecklist-pop" class="categorychecklist form-no-clear" >';
    wp_popular_terms_checklist('category');
    print '
</ul>
</div>

</div>
</div>';

}


?>
