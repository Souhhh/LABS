<?php
/**
 * fonction pour rendre une view
 * 
 * @param string $path chemin du fichier à partir du dossier views sans l'extension .html.php
 * @return void
 */

 // Rajout d'un second paramètre qui par défaut vaut un tableau vide.
function view($path, $data = array())
{
    extract($data);
    // Cette fonction = helper me permet de faire un include plus rapidement. Je récupère juste le chemin du fichier à partir du dossier views sans l'extension dans le fichier ServicesDetailsMetabox.php ligne 31 que j'envoi en paramètre. Ce chemin est envoyé dans la variable $path, puis je complète le chemin avec ma variable globale et l'extension.
    include(LABS_VIEW_DIR . $path . '.html.php');
}

/**
 * Extrait la valeur dans un tableau. Si la valeur existe dans ce tableai, cela permet de ne pas avoir d'erreur lorsque l'on crée un nouveau post.
 * 
 * @param string $key la meta key dans la base de données
 * @param array $data le tableau résultant de get_post_meta
 * @return void
 */
function extract_data_attr(string $key, array $data)
{
    // Vérification que la clé existe bien dans le tableau
    if (array_key_exists($key, $data)){
        // On renvoie la valeur et on en profite pour échapper la valeur pour la sécurité.
        return esc_attr($data[$key][0]);
    }
    return '';
}

// Je crée un helper qui attend deux paramètres que j'ai nommé $post_id et $data et qui sont remplis par la function save du fichier ServicesDetailsMetabox.php
function update_post_metas($post_id, $data){
    // je fais un foreach pour chaque donnée dans le tableau data. Je veux récupérer la clé et la valeur.
    foreach ($data as $key => $value){
        // J'utilise la function WordPress update_post_meta qui attend 3 paramètres : l'id du post qu'il faut sauvegarder ou mettre à jour, la clé (l'étiquette) qu'on donne à la row (tiroir) dans la base de données, et la valeur qu'on stock dans cette row
        update_post_meta($post_id, $key, $value);
    }
}

