<?php
    include './lib/session.php';
    Session::checkLogin();
    include './lib/database.php';
    include './helper/format.php';
?>

<?php
    class login_process{
        private $db;
        public $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();

        
        }    

        public function check_login($username, $password){
            $username = $this->fm->validation($username);
            $password = $this->fm->validation($password);

            $username = mysqli_real_escape_string($this->db->link, $username);
            $password = mysqli_real_escape_string($this->db->link, $password);

            if(empty($username) || empty($password)){
                $alert = "Username and Password must be not empty!";
                return $alert;
            }else{
                $query = "SELECT * FROM tbl_account WHERE username = '$username'";
                $rs = $this->db->select($query);
                if($rs != false){
                    $value = $rs->fetch_assoc();
                    Session::set('login', true);
                    Session::set('username', $value['username']);
                    Session::set('role', $value['role']);
                    // Session::set('username', $value['username']);
                    header('Location:index.php');


                }else{
                    $alert = "Username and Password does not match!";
                    return $alert;
                }
            }
        }

        public function login_destroy(){

        }

    }
?>