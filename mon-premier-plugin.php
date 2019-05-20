<?php
/*
Plugin Name: Mon premier Plugin
*/

// fonction qui affiche la balise meta
Function mon_plugin_meta_keywords(){
    echo '<meta name="keywords" content="HTML,CSS,XML,JavaScript">';
    }
 //ajout d'une action sur 'tb_head' qui appellera mon-plugin_meta_keywords()

add_action('tb_head', 'mon_plugin_meta_keywords' );

