<div class="wrap">
    <div id="icon-options-general" class="icon32"></div>
	<h1><?php esc_attr_e('Script Tracking', 'WpAdminStyle'); ?></h1>
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
        	<!-- main content -->
			<div id="post-body-content">

                <div class="meta-box-sortables ui-sortable">

                    <div class="postbox">

                    <h2><span><?php esc_attr_e('Add Tracking Script To Every Page', 'WpAdminStyle'); ?></span></h2>

                        <div class="inside">
                            <form method="post" action="">
                                <p>
                                    <label for="google-analytics">
                                        <strong><?php esc_attr_e('Google Analytics Code'); ?></strong>
                                    </label>
                                    <input name="google-analytics" type="text" value="<?php echo $google;?>" class="large-text" />
                                </p>
                                <p>
                                    <label for="facebook">
                                        <strong><?php esc_attr_e('Facebook Pixel'); ?></strong>
                                    </label>
                                    <input name="facebook" type="text" value="<?php echo $facebook;?>" class="large-text" />
                                </p>
                                <p>
                                    <label for="inspectlet">
                                        <strong><?php esc_attr_e('Inspectlet'); ?></strong>
                                    </label>
                                    <input name="inspectlet" type="text" value="<?php echo $inspectlet;?>" class="large-text" />
                                </p>
                                <?php wp_nonce_field('script_tracking_submit', 'script_tracking_generate_nonce');?>
                                <input type="submit" name="submit_form" class="button" value="Save" id="save_script_tracking">
                            </form>
                        </div>
                        <!-- .inside -->

                    </div>
                    <!-- .postbox -->

                </div>
                <!-- .meta-box-sortables .ui-sortable -->

            </div>

        </div><!--.metabox-holder-->

    </div>



</div>

