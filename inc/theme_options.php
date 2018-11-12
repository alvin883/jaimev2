<?php 
/**
 * @package bootstraptheme_options
 */

if(!function_exists('theme_options')){
    function theme_options($id, $fallback = false, $param = false){
        global $bootstrap_options;
        if($fallback == false) $fallback = '';
        $output = (isset($bootstrap_options[$id]) && $bootstrap_options[$id] !== '') ? $bootstrap_options[$id] : $fallback;
        if(!empty($bootstrap_options[$id]) && $param){
            $output = $bootstrap_options[$id][$param];
        }
        return $output;
    }
}

?>