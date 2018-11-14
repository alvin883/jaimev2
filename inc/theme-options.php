<?php 
/**
 * @package bootstraptheme_options
 */

if(!function_exists('theme_options')){
    function theme_options($id, $fallback = false, $param = false){
        $social_media = array(
            'Facebook URL'  => "https://facebook.com",
            'Instagram URL' => "https://instagram.com",
            'Youtube URL'   => "https://youtube.com",
            'Twitter URL'   => "https://twitter.com",
            'Pinterest URL' => "https://pinterest.com"
        );
        $general_sponsors = array(
            "flex challenge",
            "gorilla wear",
            "onzie flow",
            "brazil wear",
            "lanton sport",
            "orange fit"
        );
        if($id == "general_social"){
            return $social_media;
        }else if($id == "general_sponsors"){
            return $general_sponsors;
        }
        return "couldn't find '" . $id . "' in theme_options";
    }
}

?>