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


//function qui envoie par email les infos lors d'un mail supprimé

function mon_plugin_post_delete_mail($post_id)
{
    //récupére les infos de l'article supprimé
    $post = get_post($post_id);
    //création du sujet de l'email
    $sujet= "article supprimé : ".$post->post_title;
    //création du contenu du mail
    $message = "contenu de l'article : ".$post->post_content;
    //envoie mail a l'admistrateur du site
    wp_mail(get_bloginfo('admin_email'),$sujet, $message);
       }


       //ajout d'une actions sur delete poste qui appelera le plugin

add_action('delete_post', 'mon_plugin_post_delete_mail' );

