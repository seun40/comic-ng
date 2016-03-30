<?php
/*
Plugin Name: Comix-ngn
Plugin URI:  http://URI_Of_Page_Describing_Plugin_and_Updates
Description: This describes my plugin in a short sentence
Version:     0.2
Author:      Oluwaseun Ogedengbe
Author URI:  http://URI_Of_The_Plugin_Author
License:     MIT
License URI: https://github.com/ogewan/comix-ngn/blob/master/LICENSE.md
*/
function comixngn_init() {
    wp_register_script( 'comix-ngn',
        plugins_url( '/js/comixngn.js', __FILE__ ),
        array( 'cngn-setup' ),
        "1.2.1"
    );
    wp_register_script( 'cngn-patroller',
        plugins_url( '/js/cngnptrl.js', __FILE__ ),
        array( 'comix-ngn' ),
        "0.1"
    );
    wp_enqueue_script('comix-ngn');
    wp_enqueue_script('cngn-patroller');
}

function cset() {  
    $ident = '[cngn';
    $post_id = get_the_ID();
    $pmain = get_post( $post_id )->post_content;
    $self_pos = strpos($pmain,$ident);
    if($self_pos !== false){
        echo "current: $post_id\n";
        echo "cngn found";
        $self_end = strpos($pmain,']',$self_pos);
        $searchstr = substr($pmain, $self_pos+strlen($ident)+1, $self_end-1-($self_pos+strlen($ident)));
        //echo "\n$searchstr";
        $query = explode (" ", $searchstr);
        //print_r($query); 
	    if($query[count($query)-1]=='-'){
            $ow = false;
            array_pop($query);
        }
        else{
            $ow = true;
            if ($query[count($query)-1]=='+')
                array_pop($query);
        }
        //print_r($query); 
        $args = array(
            'nopaging'         => true,
            'offset'           => 0,
            'tag'              => implode(",",$query),
            'category_name'    => '',
            'orderby'          => 'date',
            'order'            => 'DESC',
            'post_type'        => 'post',
            'post_mime_type'   => '',
            'post_parent'      => '',
            'author'	       => '',
            'post_status'      => 'publish',
        );
        $posts_array = get_posts( $args );
        $basearray = array();
        foreach ( $posts_array as $post ) {
            $basearray[] = array("Title"=>$post->post_title, "Content"=>$post->post_content, "Date"=>$post->post_date, "Tags"=>$post->tags);
            //echo "ID: $post->ID \n";
            //echo "CONTENT: $post->post_content \n";
        }
        $PJSON = json_encode($basearray);
        echo "<script>PJSON=$PJSON;</script>";
        //add_action('wp_head','ready');
        wp_enqueue_script( 'cngn-setup',
            plugins_url( '/js/cngnsetp.js', __FILE__ ),
            false,
            "0.1"              
        );
    }
}
add_action( 'wp_enqueue_scripts', 'cset' );
add_action( 'wp_enqueue_scripts', 'comixngn_init');
include 'core_options.php';