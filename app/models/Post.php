<?php
  class Post {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    // function get les element d'une table
    public function getAllPosts(){
      $this->db->query('select *,
                           users.id as userId,
                           posts.id as postId,
                           users.created_at as user_created_at,
                           posts.created_at as post_created_at
                         from posts
                         INNER JOIN users
                         ON users.id=posts.user_id
                         order by posts.created_at desc'
                        );
       return $this->db->resultAll();
    }
    public function Save($data){
      $this->db->query('INSERT INTO posts (user_id, title, body) VALUES(:id, :title, :body)');
      // Bind values
      $this->db->bind(':id', $_SESSION['user_id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    // get user by id
    public function getUserById($id){
      $this->db->query('SELECT * FROM users WHERE id = :id');
      // Bind value
      $this->db->bind(':id', $id);

      $row = $this->db->single();
      // Check row
      if($this->db->rowCount() > 0){
        return $row;
      } else {
        return false;
      }
    }

    // get post by id
    public function getpostById($id){
      $this->db->query('SELECT * FROM posts WHERE id = :id');
      // Bind value
      $this->db->bind(':id', $id);

      $row = $this->db->single();
      // Check row
      if($this->db->rowCount() > 0){
        return $row;
      } else {
        return false;
      }
    }

    public function Modify($data){
      $this->db->query('UPDATE posts SET   title=:title, body=:body where id=:id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
   
    // delete post
    public function Deletepost($id){
      $this->db->query('DELETE FROM posts where id=:id');
      // Bind values
      $this->db->bind(':id', $id);
      // Execute
      if($this->db->execute()){
        
        return true; 
      } else {
        return false;
      }
  }
}