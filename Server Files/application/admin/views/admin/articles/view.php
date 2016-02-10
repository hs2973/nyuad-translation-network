    <div class="container top">
      <!-- <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url(); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a>  
        </li>
        <li>
          <a href="<?php echo site_url("articles"); ?>">
            <?php echo ucfirst($this->uri->segment(2));?>
          </a> 
        </li>
        <li class="active">
          <?php echo ucfirst($this->uri->segment(3));?>
        </li>
      </ul> -->
      <?php
      if (isset($flash_message))
        {
          if($flash_message){
            $alert_class = "success";
            $alert_text = "Congratulations, your changes were saved successfully.";
          }else{
            $alert_class = "danger";
            $alert_text = "Something went wrong. Please try again.";
          }

          echo '<div class="alert alert-'.$alert_class.'" role="alert">'.$alert_text.'</div>';
        }
      ?>

      <div class="page-header users-header">
        <h2>
          <?php echo $article['title'];?>
          <a id="deleteButton" onclick="deleteArticle(event)" href="<?php echo site_url()."/articles/delete/".$article['id'];?>" class="btn btn-danger" style="float:right;">Delete</a>
          <a  href="<?php echo site_url()."/articles/edit/".$article['id'];?>" class="btn btn-success" style="float:right; margin-right: 10px;">Edit</a>
          <?php if ($article["is_featured"] == 0){ ?>
            <a  href="<?php echo site_url()."/articles/feature/".$article['id'];?>" class="btn btn-primary" style="float:right; margin-right: 10px;">Mark as Featured</a>
          <?php }else{ ?>
            <a  href="<?php echo site_url()."/articles/unfeature/".$article['id'];?>" class="btn btn-danger" style="float:right; margin-right: 10px;">Mark as Unfeatured</a>
          <?php } ?>
          <?php if ($article["is_approved"] == 0){ ?>
            <a  href="<?php echo site_url()."/articles/publish/".$article['id'];?>" class="btn btn-info" style="float:right; margin-right: 10px;">Publish</a>
          <?php }else{ ?>
          <a href="<?php echo site_url()."/articles/unpublish/".$article['id'];?>" class="btn btn-danger" style="float:right; margin-right: 10px;">Unpublish</a>
          <?php }?>

          
        </h2>
        <em>
          By <?php echo $article['author_name']." (".$article['author_email'].")"." | ".$article['date_created'];?> 
          <?php echo $article['parent_id'] != 0 ? "(Translated from <a href='".site_url("articles/view/{$article['parent_id']}")."'>{$article['parent_title']}</a>)": " | ORIGINAL TEXT";?>
        </em>
      </div>

      <div>
      	<?php echo $article['text'];?>
      </div>
    </div>

    <script>
    var deleteArticle = function(e){
      e.preventDefault();

      var r = confirm("Are you sure that you want to delete this article?");
      if (r == true) {
        window.location.assign($('#deleteButton').attr('href'));
      }
    }


    </script>
