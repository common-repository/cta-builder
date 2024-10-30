<?php
 if(!function_exists('trs_cta_cpt')){
function trs_cta_cpt() {
    /**
     * Post Type: CTA.
     */
    $labels = [
        "name" => __( "CTA" ),
        "singular_name" => __( "CTA" ),
        "all_items" => __( "All CTA" ),
        "add_new" => __( "Add New CTA" ),
        "add_new_item" => __( "Add New CTA" ),
        "edit_item" => __( "Edit CTA" ),
        "new_item" => __( "New CTA" ),
        "view_item" => __( "View CTA" ),
        "view_items" => __( "View CTA" ),
        "search_items" => __( "Search CTA" ),
        "not_found" => __( "No CTA Found" ),
        "not_found_in_trash" => __( "No CTA Found in Trash" ),
        "parent" => __( "Parent CTA" ),
        "featured_image" => __( "Banner Image for CTA" ),
        "set_featured_image" => __( "Set Banner Image for CTA" ),
        "remove_featured_image" => __( "Remove Banner Image for CTA" ),
        "use_featured_image" => __( "Use Banner Image for CTA" ),
        "uploaded_to_this_item" => __( "Uploaded to this CTA" ),
        "items_list" => __( "CTA List" ),
        "name_admin_bar" => __( "CTA" ),
        "item_published" => __( "CTA Published" ),
        "item_updated" => __( "CTA Updated" ),
        "parent_item_colon" => __( "Parent CTA" ),
    ];

    $args = [
        "label" => __( "CTA" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "cta", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-button",
        "supports" => [ "title", "thumbnail" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "cta", $args );
}

add_action( 'init', 'trs_cta_cpt' );
 }