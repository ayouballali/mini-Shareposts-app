<?php require APPROOT . '/views/includes/header.php'; ?>
<a href="<?php echo URLROOT; ?>/posts/Show/<?php echo $data['id']; ?>" class="btn btn-light "> <i class="fa fa-backward"></i> cancel</a>

    
      <div class="card card-body bg-light mt-5">
        <h2>Modify the Post</h2>
        <p>Please fill out this form </p>
        <form action="<?php echo URLROOT; ?>/posts/Edit/<?php echo $data['id']; ?>" method="post">
          <div class="form-group">
            <label for="name">Title: <sup>*</sup></label>
            <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php  echo $data['title']; ?>">
            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="email">Body: <sup>*</sup></label>
            <textarea 
             type="text" name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" value="<?php  echo $data['body']; ?>"
             ><?php  echo $data['body']; ?> 
            </textarea>
            <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
          </div>
          

          <div class="row">
            <div class="col-2">
              <input type="submit" value="Modify" class="btn btn-success btn-block">
            </div>
            
            
          </div>
        </form>
      </div>
    
</div>    
<?php require APPROOT . '/views/includes/footer.php'; ?>