<?php

/**
 * Overwrite default Wordpress for `Reply` HTML
 */
function replace_reply_link_class($class){
    $link = preg_split("/(')/",preg_split("/(href=')/",$class)[1])[0];
    if(theme_options('comment_box_reply_style') == '0'){
        // standard button
        $class = '<button class="al" data-url="' . $link . '" onclick="gotoURL(this);">Reply <span class="mdi mdi-share-outline" style="margin-left: 8px;"></span></button>';
    }else if(theme_options('comment_box_reply_style') == '1'){
        // mini button
        $class = '<button class="al al-mini" data-url="' . $link . '" onclick="gotoURL(this);">Reply <span class="mdi mdi-share-outline" style="margin-left: 8px;"></span></button>';
    }else if(theme_options('comment_box_reply_style') == '2'){
        // fab
        $class = '<button class="al-fab" data-url="' . $link . '" onclick="gotoURL(this);"><span class="mdi mdi-share-outline"></span></button>';
    }
    // fab
    //$class = '<button class="al-fab" data-url="' . $link . '" onclick="gotoURL(this);"><span class="mdi mdi-share-outline"></span></button>';
    return $class;
}
add_filter('comment_reply_link', 'replace_reply_link_class');


/**
 * Make Material Design Theme for comment box
 */
function mytheme_comment($comment, $args, $depth) {
    
    ?>
        <div class="card<?php 
            /* From codex ->
                    comment_class( $class = '', $comment = null, $post_id = null, $echo = true )
            */
            $commentClass = comment_class( '', null,null,false);

            // Get depth value
            $currentDepth = (int)preg_split('/["]+/',preg_split("/(depth-)/",$commentClass)[1])[0];
            
            // Is Even or Odd ? , return 0 -> Odd : return 1 -> Even
            $currentDepth = $currentDepth % 2;
            echo $currentDepth == 0 ? ' child-gray': '';

        ?>" id="comment-<?php comment_ID(); ?>">
        
            <!--
            <div class="flying-bookmark">
                <button class="al-fab" style="margin-right: 5px;"><span class="mdi mdi-share-outline"></span></button>
            </div>
            -->
    
            <div class="detail">
                <div class="avatar">
                    <span class="mdi mdi-account"></span>
                </div>
                <div class="opacity">
                    By <?php echo get_comment_author_link();?>
                </div>
                <div class="opacity">
                    <?php echo 'on ' . get_comment_date('d F Y'); ?>
                </div>
            </div>
            
            
            <article>
                <p>
                    <?php comment_text();//the_content('',true);echo '...'; ?>
                </p>
            </article>
            <div class="action">
                <?php 
                    $replyLink = get_the_permalink($comment->comment_post_ID) . '?replytocom=' . $comment->comment_ID . '#respond'; 
                ?>
                <?php 
                    comment_reply_link( 
                        array_merge( 
                            $args, 
                            array( 
                                'add_below' => $add_below, 
                                'depth'     => $depth, 
                                'max_depth' => $args['max_depth']
                            )
                        )
                    ); 
                ?>
            </div>
            
    
    
    <?php
    }
    
    ?>