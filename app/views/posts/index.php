<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="container">
    <?php flash('post_Message');?>
    <div class="row">
        <div class="col col-6">
            <h1>Posts:</h1>
        </div>
        <div class="col col-6  ">
            <a href=" <?php echo URLROOT; ?>/posts/Add " class="btn btn-primary pull-right">
               <i class="fa fa-pencil"></i> Add post</a>
        </div>
    </div>
</div>    
<div class="container mt-4">  
    <?php
    foreach($data['posts'] as $val){
        echo post($val);
    } ?>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>