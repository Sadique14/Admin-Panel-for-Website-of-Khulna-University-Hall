<?php
    require_once '../resources/library/database.php';
    require_once '../resources/helpers/format.php';
?>
<?php

    class application{
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new database();
            $this->fm = new format();
        }
        public function getSignUpForms()
        {
            $query = "SELECT * FROM sign_up_form WHERE adminId is null";
            $result = $this->db->select($query);
            if($result != false){
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
                return $result;
            }
            else
            {
                return false;
            }
        }
        public function getStudentById($studentId){
            $query = "SELECT * FROM student WHERE studentId='$studentId'";
            $result = $this->db->select($query);
            if($result != false){
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
                return $result;
            }
            else
            {
                return false;
            }
        }
        public function getSeatApplicationForms(){
            $query = "SELECT * FROM seat_application_form WHERE approvalDate is null";
            $result = $this->db->select($query);
            if($result != false){
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
                return $result;
            }
            else
            {
                return false;
            }
        }
    }

?>