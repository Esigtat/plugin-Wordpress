<?php
/*
Plugin Name: Mon premier Plugin
*/

// fonction qui affiche la balise meta
Function mon_plugin_meta_keywords(){
    echo '<meta name="keywords" content="HTML,CSS,XML,JavaScript">';
    }
 //ajout d'une action sur 'tb_head' qui appellera mon-plugin_meta_keywords()

add_action('wp_head', 'mon_plugin_meta_keywords' );


//Fonction qui envoie par email les infos d'un email supprimé
function mon_plugin_post_delete_mail($post_id) {
//Récupére les informations de l'article supprimé
    $post = get_post($post_id);
//Création du sujet de l'email
    $sujet = "Article supprimé :" . $post->post_title;
//Création du contenu de l'email
    $message = "Contenu de l'article : " . $post->post_content;
//Envoi de l'email à l'administrateur du site
    wp_mail(get_bloginfo('admin_email'), $sujet, $message);
}

       //ajout d'une actions sur delete poste qui appelera le plugin
add_action('delete_post', 'mon_plugin_post_delete_mail');

//function qui remplace la chaine 'et', '&amp;'

function mon_plugin_the_title($title){
    //remplace et dans le titre
    $title = str_replace('et','&amp;', $title);
    //retourne le titre modifié
    return $title;
    }
    //ajout d'un filte sur the-title qui appelera le plugin

add_filter('the_title', 'mon_plugin_the_title');

//function qui crée une citation
function mon_plugin_yoda_shortcode(){
    return "<blockquote>Que la force soit avec toi jeune padawan!</blockquote>";

}

function mon_plugin_vador_shortcode($atts, $content=""){
    //tag par défaut
    $tag ='blockquote';
    //si $tag valide on le récupère
    if(isset($atts['tag']) AND in_array($atts['tag'], ['p','h1','h2','div'])){
        $tag = $atts['tag'];
    }

    //si contenu vide
    if (empty($content)){
        $content = 'Luke';
    }
    return '<'.$tag.'>'.$content.', Je suis ton père!'.'';
}

//enregistre les shortcodes du plugin

function mon_plugin_register_shortcode(){
    add_shortcode('yoda','mon_plugin_yoda_shortcode');
    add_shortcode('vador','mon_plugin_vador_shortcode');
}

add_action('init', 'mon_plugin_register_shortcode');
