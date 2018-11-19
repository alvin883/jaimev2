<div id="popup">
    <div class="content">
        <div class="title">Error</div>
        <div class="message">Message</div>
        <button class="js__popup-close">Close</button>
    </div>
    <div class="block js__popup-close"></div>
</div>

<div id="footer">
        <div class="subscribe">
            <div class="title">Subscribe to my Newsletter and receive latest posts in your Inbox!</div>
            <form action="http://github.us19.list-manage.com/subscribe/post?u=b1551785dcbfc5c952c50bd86&amp;id=f048192049" method="get" name="mc-embedded-subscribe-form" id="subscribe-email">
                <div class="form" id="subscribe">
                    <input type="text" class="name m-2" placeholder="Your Name" name="FNAME" required/>
                    <input type="email" class="email m-2" placeholder="Your Email" name="EMAIL" required/>
                    <button class="btn m-2">
                        <i class="fas fa-check"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="box sponsor">
            <div class="title">SPONSORS</div>
            <div class="content">
            <?php 
                if(theme_options('general_sponsors')){
                    foreach (theme_options('general_sponsors') as $value) {
            ?>
                
                        <button class="btn m-2"><?php echo $value; ?></button>
            <?php
                    }
                }
            ?>
            </div>
        </div>
        <div class="box">
            <div class="title">Get Social</div>
            <div class="content social">
				<?php
                    if(theme_options('general_social') != ''){
						$social_icons = get_social_media_icons();
                        foreach (theme_options('general_social') as $key => $value) {

                            if(array_key_exists($key,$social_icons) && $value != '' && !empty($value)){
								?>
									<a href="<?php echo $value; ?>">
										<button class="btn m-2">
											<span class="btn-fab">
												<i class="fab fa-<?php echo $social_icons[$key]["font"]; ?>"></i>
											</span>
											<?php echo $social_icons[$key]["name"]; ?>
										</button>
									</a>
                                <?php
                            }

                        }
                    }
                ?>
            </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/src/img/jaime-logo.png" alt="Jaime Logo" class="logo"> 
        <div class="wrapper_backtotop">
            <a class="js__to-top-page">Back to top</a>
        </div>
        <div class="copyright">Copyright <?php echo date("Y");?> - Daily Jaime - by HeadLab</div>
    </div>
</body>
</html>