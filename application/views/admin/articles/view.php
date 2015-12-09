    <div class="container top">
      <!-- <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a>  
        </li>
        <li>
          <a href="<?php echo site_url("admin/articles"); ?>">
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
          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2)."/edit/".$article['id'];?>" class="btn btn-success" style="float:right;">Edit</a>
          <?php if ($article["is_featured"] == 0){ ?>
            <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2)."/feature/".$article['id'];?>" class="btn btn-primary" style="float:right; margin-right: 10px;">Mark as Featured</a>
          <?php }else{ ?>
            <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2)."/unfeature/".$article['id'];?>" class="btn btn-danger" style="float:right; margin-right: 10px;">Mark as Unfeatured</a>
          <?php } ?>
          <?php if ($article["is_approved"] == 0){ ?>
            <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2)."/publish/".$article['id'];?>" class="btn btn-info" style="float:right; margin-right: 10px;">Publish</a>
          <?php }else{ ?>
          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2)."/unpublish/".$article['id'];?>" class="btn btn-danger" style="float:right; margin-right: 10px;">Unpublish</a>
          <?php }?>
        </h2>
        <em>
          By <?php echo $article['author_name']." (".$article['author_email'].")"." | ".$article['date_created'];?> 
          <?php echo $article['parent_id'] != 0 ? "(Translated from <a href='".site_url("admin/articles/view/{$article['parent_id']}")."'>{$article['parent_title']}</a>)": " | ORIGINAL TEXT";?>
        </em>
      </div>

      <div>
      	<?php echo $article['text'];?>
      </div>
    </div>
