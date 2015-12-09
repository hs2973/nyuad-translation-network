<div class="container top">

  <div class="page-header users-header">
    <!-- <div class="form-group form-group-lg">
    	<input type="text" name="title" value="<?php echo $article['title'];?> " class="form-control">
    </div> -->
    <h2>
      <?php echo $article['title'];?>
      <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2)."/view/".$article['id'];?>" class="btn btn-success" style="float:right;">View</a>
    </h2>
    

    <em>
      By <?php echo $article['author_name']." (".$article['author_email'].")"." | ".$article['date_created'];?> 
      <?php echo $article['parent_id'] != 0 ? "(Translated from <a href='".site_url("admin/articles/view/{$article['parent_id']}")."'>{$article['parent_title']}</a>)": " | ORIGINAL TEXT";?>
    </em>
  </div>
	
	<script type="text/javascript" src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>

	<form action="<?php echo site_url('admin/articles/save/'.$article['id']);?>" method="post">
		<?php
			if (isset($flash_message))
			{
				if($flash_message){
					$alert_class = "success";
					$alert_text = "Congratulations, the article was saved successfully.";
				}else{
					$alert_class = "danger";
					$alert_text = "Something went wrong. Please try again. Make sure that every field is filled correctly.";
				}

				echo '<div class="alert alert-'.$alert_class.'" role="alert">'.$alert_text.'</div>';
			}
		?>
		<p>
			<textarea id="editor1" name="editor"><?php echo html_escape($article['text']);?></textarea>
			<script type="text/javascript">
				CKEDITOR.replace( 'editor1' );
				CKEDITOR.config.height = '400px';
			</script>
		</p>
		<p>
			<input class="btn btn-primary" type="submit" value="Save" />
		</p>
	</form>
</div>
