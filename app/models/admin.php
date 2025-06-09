<?php
class Admin {
    public static function login($username, $password) {
        global $conn;
        
        $username = $conn->real_escape_string($username);
        $password_md5 = md5($password); // Hash password dengan MD5
        
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password_md5'";
        $result = $conn->query($sql);
        
        return $result && $result->num_rows > 0;
    }
}
?> 