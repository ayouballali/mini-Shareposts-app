<?php 
function post($post){

    $stm ='<div class="card card-body mb-3">
    <h4 class="card-title">'.$post->title. '</h4>
    <div class=" bg-light p-2 mt-3">
    writen by '.$post->name.'on '.$post->post_created_at.
   ' </div>
    <p class="card-text">'.$post->body.'</p>
   <a href="'.URLROOT.'/posts/Show/'.$post->postId.'" class="btn btn-dark">more</a> 
</div>';
    return $stm;
    
}
 