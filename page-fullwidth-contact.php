<?php
/*
Template Name: Fullwidth w/contact
*/
    /**
    * @hooked virtue_page_title - 20
    */
     do_action('kadence_page_title_container');
    ?>
	
        <div id="content" class="container">
       		<div class="row">
         		<div class="main" id="ktmain" role="main">
                <?php if( has_post_thumbnail() ) { ?>
    				<div class="entry-content alignleft" itemprop="mainContentOfPage" style="max-width:760px;">
    					<?php get_template_part('templates/content', 'page'); ?>
    				</div>

                    <div class="featured-image alignleft">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php } else { ?>
                    <div class="entry-content alignleft" itemprop="mainContentOfPage" >
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
                    <a href="<?php echo get_page_link(40); ?>" title="contact us">CONTACT US</a>
                </div>
        </div>