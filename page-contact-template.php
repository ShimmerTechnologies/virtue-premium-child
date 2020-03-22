<?php
/*
Template Name: Contact-template
*/
    /**
    * @hooked virtue_page_title - 20
    */
     do_action('kadence_page_title_container');
    ?>
	
        <div id="content" class="container">
       		<div class="row">
         		<div class="main" id="ktmain" role="main">
                <?php if( is_active_sidebar('contactwidget') == true ) { ?>
    				<div class="entry-content alignleft" itemprop="mainContentOfPage" style="max-width:760px;">
    					<?php get_template_part('templates/content', 'page'); ?>
    				</div>
                    <div class="contact-widget alignright">
                        <?php get_sidebar('contactwidget'); ?>                    
                    </div>
                <?php } else { ?>
                    <div class="entry-content" itemprop="mainContentOfPage" >
                        <?php get_template_part('templates/content', 'page'); ?>
                    </div>
                <?php } ?>
    	       </div><!-- /.main -->
            </div>
        </div>

         <div id="contact-section" style="background-image: url('<?php echo get_post_meta($post->ID, 'contact_image', true); ?>')">
                <div class="image-wrapper">
                    <h2><strong><?php echo get_post_meta($post->ID, 'contact_title', true); ?></strong></h2>
                    <p><?php echo get_post_meta($post->ID, 'contact_subtitle', true); ?></p>
                </div>
        </div>
