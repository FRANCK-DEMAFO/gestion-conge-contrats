<?php
//transformation de DIRECTORY_SEPARATOR en DS pour une utilisation plus simple
if(!defined('DS')){
    define('DS', DIRECTORY_SEPARATOR);
}

//chemin d'acces au dossier 'src'
if(!defined('APP_DIR')){
    define('APP_DIR', 'src');
}

//chemin d'acces au dossier parent 'gestion-conges-contrats' qui sera appele 'ROOT'
if(!defined('ROOT')){
    define('ROOT', DS . 'gestion-conges-contrats' .DS);
}

//chemin relatif au repertoire parent 
if(!defined('APP')){
    define('APP', dirname(__DIR__) . DS);
}

//chemin d'acces au dossier 'vendor' contenu dans ROOT et qui sera appele VENDOR_PATH
if(!defined('VENDOR_PATH')){
    define('VENDOR_PATH', ROOT . 'vendor' . DS);
}

//chemin d'acces au dossier 'bootstrap' contenu dans VENDOR_PATH et qui sera appele BOOTSTRAP_PATH
if(!defined('BOOTSTRAP_PATH')){
    define('BOOTSTRAP_PATH', VENDOR_PATH . 'bootstrap' . DS);
}

//chemin d'acces au dossier 'assets' contenu dans ROOT et qui sera appele ASSETS_PATH
if(!defined('ASSETS_PATH')){
    define('ASSETS_PATH', ROOT . 'assets' . DS);
}

//chemin d'acces au dossier 'js' contenu dans ASSETS_PATH et qui sera appele JS_PATH
if(!defined('JS_PATH')){
    define('JS_PATH', ASSETS_PATH . 'js' . DS);
}

//chemin d'acces au dossier 'css' contenu dans ASSETS_PATH et qui sera appele CSS_PATH
if(!defined('CSS_PATH')){
    define('CSS_PATH', ASSETS_PATH . 'css' . DS);
}

//chemin d'acces au dossier 'images' contenu dans ASSETS_PATH et qui sera appele IMAGES_PATH
if(!defined('IMAGES_PATH')){
    define('IMAGES_PATH', ASSETS_PATH . 'images' . DS);
}

//chemin d'acces au dossier 'bootstrap-icons' contenu dans VENDOR_PATH et qui sera appele ICONS_PATH
if(!defined('ICONS_PATH')){
    define('ICONS_PATH', VENDOR_PATH . 'bootstrap-icons' . DS);
}

//chemin d'acces au dossier 'Controller' contenu dans APP_DIR(dosssier src) et qui sera appele CONTROLLER_PATH
if(!defined('CONTROLLER_PATH')){
    define('CONTROLLER_PATH', APP_DIR . 'Controller'. DS);
}

//chemin d'acces au dossier 'Model' contenu dans APP_DIR(dosssier src) et qui sera appele MODEL_PATH
if(!defined('MODEL_PATH')){
    define('MODEL_PATH', APP_DIR.'Model'. DS);
}

//chemin d'acces au dossier 'View' contenu dans APP_DIR(dosssier src) et qui sera appele VIEW_PATH
if(!defined('VIEW_PATH')){
    define('VIEW_PATH', APP_DIR.'View'. DS);
}

//chemin d'acces au dossier 'includes' contenu dans VIEW_PATH et qui sera appele INCLUDES_PATH
if(!defined('INCLUDES_PATH')){
    define('INCLUDES_PATH', VIEW_PATH.'includes'. DS);
}

//chemin d'acces au dossier 'Database' contenu dans core se trouvant au repertoire racine et qui sera appele DATABASE_PATH
if(!defined('DATABASE_PATH')){
    define('DATABASE_PATH', ROOT. 'core' . DS . 'Database' . DS);
}

//chemin d'acces au dossier 'font' contenu dans VENDOR_PATH se trouvant au repertoire racine et qui sera appele FONT_PATH (pour les icons)
if(!defined('FONT_PATH')){
    define('FONT_PATH', VENDOR_PATH. 'font' . DS);
}
//NB:
// ici le repertoire parent est stocke a la fois dans ROOT 



