<?php
class AmbientElatedClassAuthorInfoWidget extends AmbientElatedClassWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltdf_author_info_widget',
            esc_html__('Elated Author Info Widget', 'ambient'),
            array( 'description' => esc_html__( 'Add author info element to widget areas', 'ambient'))
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'textfield',
                'name' => 'extra_class',
                'title' => esc_html__('Custom CSS Class', 'ambient')
            ),
            array(
                'type' => 'textfield',
                'name' => 'author_username',
                'title' => esc_html__('Author Username', 'ambient')
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        extract($args);

        $extra_class = '';
        if (!empty($instance['extra_class'])) {
            $extra_class = $instance['extra_class'];
        }
        
        $authorID = 1;
	    if(!empty($instance['author_username'])) {
		    $author = get_user_by( 'login', $instance['author_username']);

		    if ($author) $authorID = $author->ID;
	    }
        ?>

        <div class="widget eltdf-author-info-widget <?php echo esc_html($extra_class); ?>">
            <div class="eltdf-aiw-inner">
	            <a itemprop="url" class="eltdf-aiw-image" href="<?php echo esc_url(get_author_posts_url($authorID)); ?>" target="_self">
					<?php echo ambient_elated_kses_img(get_avatar($authorID, 168)); ?>
		        </a>
		        <h4 class="eltdf-aiw-name vcard author">
			        <a itemprop="url" href="<?php echo esc_url(get_author_posts_url($authorID)); ?>" target="_self">
						<span class="fn">
							<?php
							if(get_the_author_meta('first_name', $authorID) != "" || get_the_author_meta('last_name', $authorID) != "") {
								echo esc_attr(get_the_author_meta('first_name', $authorID)) . " " . esc_attr(get_the_author_meta('last_name', $authorID));
							} else {
								echo esc_attr(get_the_author_meta('display_name', $authorID));
							}
							?>
						</span>
			        </a>
		        </h4>
		        <?php if(is_email(get_the_author_meta('email', $authorID))){ ?>
			        <h6 itemprop="email" class="eltdf-aiw-email"><?php echo sanitize_email(get_the_author_meta('email', $authorID)); ?></h6>
		        <?php } ?>
		        <?php if(get_the_author_meta('description', $authorID) != "") { ?>
			        <p itemprop="description" class="eltdf-aiw-text"><?php echo esc_attr(get_the_author_meta('description', $authorID)); ?></p>
		        <?php } ?>
            </div>
        </div>
    <?php 
    }
}