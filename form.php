<div class="wrap">

<div class="icon32" id="icon-edit-pages"></div>

<h2>Text Scroller</h2>

<div id="poststuff" class="metabox-holder has-right-sidebar">

		<div id="post-body">

			<div id="post-body-content" class="form-wrap">

                <form name="post_form" method="post" action="" enctype="multipart/form-data">

				

                <div id="titlediv">

					<div class="form-field">

					<label for="title"><?php _e('Message') ?></label>

						<textarea name="set_msg" id="set_msg" cols="30" rows="3"><?php echo $set_msg;?></textarea>
					</div>

				</div>

                
				

                <div style="margin-top:15px;">
				             

                <input type="submit" name="submit" value="Submit" class="button" />

                <input type="hidden" name="act" value="save" />

                </form>

			</div>

		</div>

	</div>  

</div>