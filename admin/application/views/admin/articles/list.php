    <div class="container top">

      <!-- <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a>  
        </li>
        <li class="active">
          <?php echo ucfirst($this->uri->segment(2));?>
        </li>
      </ul> -->

      <div class="page-header users-header">
        <h2>
          <?php echo ucfirst($this->uri->segment(2));?>
          <?php if($featured == 1) echo "| Featured";?>
          <?php if($approved == "false") echo "| New Submissions";?>
          
          <form action="<?php echo current_url()."?".http_build_query($_GET);?>" method="GET" style="float:right;">
            <!-- Hidden input elements for the get string in the url -->
            <input type="hidden" name="featured" value="<?php echo $featured;?>">
            <input type="hidden" name="approved" value="<?php echo $approved;?>">
            <?php
              $js = 'onChange="this.form.submit();"';
              $options = array(
                '' => 'Order by ...',
                'id'  => 'ID',
                'author_name'    => 'Author Name',
                'language'   => 'Language',
                'author_email' => 'Email',
                'date_created' => 'Date Created',
              );

              echo form_dropdown('order', $options, $order, $js);

              $options = array(
                'ASC' => 'ASC',
                'DESC'  => 'DESC',
              );

              echo form_dropdown('orderType', $options, $order_type_selected, $js);
            ?>

            <noscript><input type="submit" value="Submit"></noscript>
          </form>
        </h2>
      </div>
      
      <table class="table table-striped table-condensed">
        <thead>
          <tr>
            <th class="header">#</th>
            <th class="yellow header headerSortDown">Title</th>
            <th class="green header">Author Name</th>
            <th class="red header">Language</th>
            <th class="red header">Email</th>
            <th class="red header">Date Created</th>
            <th class="red header">Type</th>
            <th class="red header">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($articles as $row)
          {
            //var_dump($row);
            echo '<tr>';
            echo '<td>'.$row['id'].'</td>';
            $text = ($row['is_approved'] == 0)?'New':'';
            echo '<td>'.$row['title'].' <span class="label label-info">'.$text.'</span>'.'</td>';
            echo '<td>'.$row['author_name'].'</td>';
            echo '<td>'.$row['language'].'</td>';
            echo '<td>'.$row['author_email'].'</td>';
            echo '<td>'.$row['date_created'].'</td>';
            $text = ($row['parent_id'] == 0)?'Original':'Translation';
            echo '<td>'.$text.'</td>';
            echo '<td class="crud-actions">
              <a href="'.site_url("admin").'/articles/view/'.$row['id'].'" class="btn btn-primary">view</a> 
              <a href="'.site_url("admin").'/articles/edit/'.$row['id'].'" class="btn btn-success">edit</a> 
            </td>';
            echo '</tr>';
          }
          ?>      
        </tbody>
      </table>

      <?php echo $this->pagination->create_links(); ?>
