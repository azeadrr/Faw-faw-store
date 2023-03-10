<div class="blog_item">
    <div class="blog_img">
        <a href="<?php the_permalink(); ?>">
            <?php echo adswth_blog_post_thumbnail( get_the_ID(), 'medium_large' ); ?>
        </a>
    </div>
    <div class="blog_info">
        <h3 data-mh="blog-title-cat">
            <a href="<?php the_permalink(); ?>" class="blog-post-item__title"><?php the_title(); ?></a>
        </h3>
        <div class="blog_stats" data-mh="blog-stats-cat">
            <span class="blog_date"><?php echo get_the_date(); ?></span>
            <div class="blog_tags"><?php echo get_the_category_list( ', ', 1 ) ?></div>
        </div>
        <div class="blog_desc" data-mh="blog-desc-cat">
            <p><a href="<?php the_permalink(); ?>"><?php echo get_the_excerpt(); ?></a></p>
        </div>
        <div class="blog_readmore">
            <a href="<?php the_permalink(); ?>"><?php _e( 'Read more', 'davinciwoo' ); ?></a>
        </div>
    </div>
</div>