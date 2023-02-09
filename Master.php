<?php

class Master{
    public $conn;
    function __construct(){
        $this->conn = new mysqli("localhost", "root", "", "sample_site_db");
        if(!$this->conn){
            throw new ErrorException("Database Connection failed.");
            exit;
        }
    }

    function save_content(){
        foreach($_POST as $k => $v){
            if(!empty($v) && !is_numeric($v) && !is_null($v))
            $_POST[$k] = $this->conn->real_escape_string(addslashes($v));
        }
        extract($_POST);
        if(empty($id)){
            $sql = "INSERT INTO `posts` (`title`, `content`) VALUES ('{$title}', '{$content}')";
        }else{
            $sql = "UPDATE `posts` set `title` = '{$title}', `content` = '{$content}' where `id` = '{$id}'";
        }
        $save = $this->conn->query($sql);
        if($save){
            $resp['status'] = 'success';
            if(empty($id))
            $_SESSION['message']['success'] = "New Content has been added successfully";
            else
            $_SESSION['message']['success'] = "Content Details has been updated successfully";

        }else{
            $resp['status'] = 'error';
            $resp['error'] = 'Saving data failed. Error: '. $this->conn->error;
        }

        return json_encode($resp);
    }
    function list_contents(){
        $sql = "SELECT * FROM `posts` order by abs(unix_timestamp(`created_at`)) asc ";
        $qry = $this->conn->query($sql);
        return $qry->fetch_all(MYSQLI_ASSOC);
    }
    function get_content_details($id = ""){
        if(!empty($id) && is_numeric($id)){
            $sql = "SELECT * FROM `posts` where `id` = '{$id}'";
            $get = $this->conn->query($sql);
            if($get->num_rows > 0){
                return $get->fetch_assoc();
            }
        }
        return false;
    }

    function get_content(){
        extract($_POST);
        $Content = $this->get_content_details($id);
        if(!$content){
            throw new ErrorException("Invalid Content ID. Given ID = {$id}");
            return;
        }else{
            $content['created_at'] = date("Y-m-d g:i A", strtotime($content['created_at']));
            return json_encode($content);
        }
    }

    function delete_content(){
        extract($_POST);
        if(!isset($id)){
            $resp['status'] = 'error';
            $resp['error'] = "Invalid Content ID";
        }else{
            $sql = "DELETE FROM `posts` where `id` = '{$id}'";
            $delete = $this->conn->query($sql);
            if($delete){
                $resp['status'] = 'success';
                $_SESSION['message']['success'] = "Content Data has been deleted successfully.";
            }else{
                $resp['status'] = 'success';
                $resp['error'] = "Deleting Content Data failed. Error: ". $this->conn->error;
            }
        }
        return json_encode($resp);
    }
    function __destruct(){
        if(isset($this->conn)){
            $this->conn->close();
        }
    }
}