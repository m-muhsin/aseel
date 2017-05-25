<?php
/**
 * The child's main template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); 

    $edit = true;
	
	if ( $edit ) {
		global $post;

		$post_id = 1;
		$url     = site_url( 'wp-json/acf/v2/post/' ) . $post_id;
		$post    = get_post( $post_id );
		
		setup_postdata( $post );
	} else {
		$url = site_url( 'wp-json/wp/v2/posts' );
	}
?>
    <div class="container">
		<div class="header clearfix">
			<a href="http://github.com/airesvsg/acf-to-rest-api" target="_blank"><h3 class="text-muted">ACF to REST API</h3></a>
		</div>

		<div class="row">
   			<div class="col-lg-12">
				<div class="input-group">
					<span class="input-group-addon">Endpoint</span>
					<input type="text" class="form-control" value="<?php echo esc_url( $url ); ?>" readonly>
				</div>
   			</div>

			<div class="col-lg-12">	           	
				
				<form action="<?php echo esc_url( $url ); ?>" method="<?php echo $edit ? 'PUT' : 'POST'; ?>">

					<!-- text -->
                    <div class="form-group">
                        <label for="acf-text">Text</label>
                        <input type="text" name="fields[ag_text]" value="<?php echo get_field( 'ag_text' ); ?>" class="form-control" id="acf-text">
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>

                    <div class="modal fade" id="modalResponse" tabindex="-1" role="dialog" aria-labelledby="modalResponseLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="modalResponseLabel">Response</h4>
                                </div>
                                <div class="modal-body">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>

<div class="wrap" id="app-container">

<?php get_footer();
