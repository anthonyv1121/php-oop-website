<?php
class UserModel extends Model{
  public function register(){
    // Sanitize Post
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $password = md5($post['password']);

    if($post["submit"]){
      if($post['name'] == "" || $post['email'] == "" || $post['password'] == ""){
        Messages::setMsg('Please fill in all fields.', 'error');
        return;
      }
      //Insert in MySQL
      $this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
      $this->bind(':name', $post['name']);
      $this->bind(':email', $post['email']);
      $this->bind(':password', $password);
      $this->execute();

      //Verify
      if($this->lastInsertId()){
        header('Location: ' . ROOT_URL . 'users/login');
      }
    }
    return;
  }
  public function login(){
    // Sanitize Post
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $password = md5($post['password']);

    if($post["submit"]){
      //die('SUBMITTED');
      // Compare Login
      $this->query('SELECT * FROM users WHERE email = :email AND password = :password');
      $this->bind(':email', $post['email']);
      $this->bind(':password', $password);
      $row = $this->single();

      if($row){
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_data'] = array(
            "id"    =>$row['id'],
            "name"  =>$row['name'],
            "email"  =>$row['email']
        );
        echo "Welcome {$_SESSION['user_data'][name]}";

        header('Location: ' . ROOT_URL . 'shares');
      } else{
        Messages::setMsg('Incorrect Login', 'error');
      }
    }
    return;
  }
}
