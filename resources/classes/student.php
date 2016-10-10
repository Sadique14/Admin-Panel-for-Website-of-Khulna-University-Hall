<?php
    require_once '../resources/library/database.php';
    require_once '../resources/helpers/format.php';
?>
<?php
    class student{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new database();
            $this->fm = new format();
        }
        
        public function getStudents($type){
            if($type == "Non-Residential"){
                $query = "SELECT * FROM student where studentId not in(SELECT studentId FROM residential)";
            }
            else if($type == "Residential"){
                $query = "SELECT * FROM student where studentId in(SELECT studentId FROM residential)";
            }
            $result = $this->db->select($query);
            if($result){
                $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
            return $result;
        }
        public function getRoomNo($studentId){
            $query="SELECT roomNo FROM residential WHERE studentId='$studentId'";
            $result = $this->db->select($query);
            return $result;
        }

        public function getStudent1ForExchange(){
            $query = "select student.studentId,discipline,year,term,photo from student,residential WHERE residential.request=student.studentId AND acceptRequest is not NULL";
            $result = $this->db->select($query);
            return $result;
        }
        public function getStudent2ForExchange(){
            $query = "select student.studentId,discipline,year,term,photo from student,residential WHERE student.studentId=residential.studentId AND acceptRequest is not NULL";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>