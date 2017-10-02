<?php
require APP."vendor/autoload.php";
use ST\Minify\Minifier;
use MatthiasMullie\Minify;

add_action('wp_footer', 'Minify');
function Minify(){
    $sourcePath = SCSS.'bootstrap-grid.css';
    $minifier = new Minify\CSS($sourcePath);
    echo $minifier->minify(ASSETS.'css/master.min.css');
}
//add_action('wp_footer', 'LetsMinify');
function LetsMinify(){
    $dri = SCSS;
    $driuri = ASSETSU;
    $dript = ASSETS;
$vars = array( 
    'encode' => false, 
    'timer' => false, 
    'gzip' => false, 
    'closure' => fasle, 
    'remove_comments' => false, 
    'force_rebuild' => false, //USE THIS SPARINGLY!
    'hashed_filenames' => fasle, 
);
$minified = new Minifier( $vars );
$bootstrap = $driuri.'/bootstrap-grid.scss';
    $bootstrap = $driuri.'/_reboot.scss';
$exclude_styles = array(
       SCSSU.'/_card.scss', 
       SCSSU.'/_reboot.scss'
    );
    
    
   $mfi = $minified->merge( ASSETS.'css/master.min.css', SCSSU, css, $exclude_styles );
    echo ASSETSU.'css/master.min.css';
    ?>
    <link rel="stylesheet" href="<?php echo $driuri; ?>" />
    <?php
}




// Load Template
//include_once(st_class.'template.php');