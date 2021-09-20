<?php 
class posts extends Controller{
    public function __construct(){
      if (!isLoggedIn()){
        redirect('users/login');
      }
        $this->postModel = $this->model('Post');
      }
    public function index(){
       $posts= $this->postModel->getAllPosts();
      $data = [
        "posts"=>$posts
      ];
        $this->view('posts/index', $data);
    }
    
    public function Add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data =[
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'title_err' => '',
        'body_err' => '',      
      ];
      if(empty($data['title'])){
        $data['title_err'] = '*Pleae enter title';
        
      }

      // Validate Password
      if(empty($data['body'])){
        $data['body_err'] = '* Please enter body';
      }
      if (empty($data['body_err'])&&empty($data['title_err'])) {
        // post
        if($this->postModel->Save($data)){
          flash('post_Message','post added');
          redirect('posts');
          
        }else{

        }
       
      }else{
       $this->view('posts/form',$data);
      }
    }else {
        // Init data
        
        $data =[    
          'title' => '',
          'body' => '',
          'title_err' => '',
          'body_err' => '',        
        ];
        
        // Load view
        $this->view('posts/form', $data);
      }
    }
    public function Show($id){
        $post=$this->postModel->getpostById($id);
        $user=$this->postModel->getUserById($post->user_id);
      $data=[
        'post'=>$post,
        'user'=> $user
      ];
      $this->view('posts/show',$data);
    }

    public function Edit($id){
      
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data =[
        'id'=>$id,
        'title' => trim($_POST['title']),
        'body' => trim($_POST['body']),
        'title_err' => '',
        'body_err' => ''
      ];
      if(empty($data['title'])){
        $data['title_err'] = '*Pleae enter title';
        
      }

      // Validate Password
      if(empty($data['body'])){
        $data['body_err'] = '* Please enter body';
      }
      if (empty($data['body_err'])&&empty($data['title_err'])) {
        // post
        if($this->postModel->Modify($data)){
          flash('post_Message','post Modifyed');
          redirect('posts/Show/'.$id);
          
        }else{

        }
       
      }else{
       $this->view('posts/edit',$data);
      }
    }else {
        // Init data
        $post=$this->postModel->getpostById($id);
        if ($post->user_id != $_SESSION['user_id']){
          if(isset($_SESSION['user_id'])){
            redirect('posts');
          }else{
          redirect('users/login');}
        }
        $data =[    
          'id'=>$id,
          'title' => $post->title,
          'body' => $post->body,
          'title_err' => '',
          'body_err' => '' 
        ];
      
        // Load view
        $this->view('posts/edit', $data);
      }
    }
    public function Delete($id){
      $post=$this->postModel->getpostById($id);
      if ($post->user_id != $_SESSION['user_id']){
        redirect('posts');}else{
      if($this->postModel->Deletepost($id)){
        flash('post_Message','post deleted');
        redirect('posts/index');
      }else{
        flash('post_Message','post was not deleted','alert alert-danger');
        redirect('posts/Show/'.$id);
      }
    }
    
    
  }  

}