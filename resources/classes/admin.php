<?php               
    require_once '../resources/library/database.php';
    require_once '../resources/helpers/format.php';
?>
<?php
class admin
{
	private $db;
    private $fm;
	function __construct()
	{
		$this->db = new database();
        $this->fm = new format();
	}
	public function updateProfile($data, $oldUsername)
        {
            $adminName = $this->fm->validation($data['adminName']);
            $designation = $this->fm->validation($data['designation']);
            $email = $this->fm->validation($data['email']);

        	$adminName = mysqli_real_escape_string($this->db->link, $adminName);
        	$designation = mysqli_real_escape_string($this->db->link, $designation);
        	$email = mysqli_real_escape_string($this->db->link, $email);
                	session::set("adminName",$adminName);
                    session::set("designation",$designation);
                    session::set("email",$email);
                	$query = "UPDATE admin SET adminName='$adminName',designation='$designation',email='$email' where username='$oldUsername'";
                	$result2 = $this->db->insertUpdateDelete($query);
                    if($result2){   
                        $msg = "<span class='success'>Profile Updated successfully</span>";
                        return $msg;
                    }
                    else{
                        $msg = "<span class='error'>Failed</span>";
                        return $msg;
                    } 
        
        }

        public function changePassword($username,$oldpassword,$password)
        {
            $username = $this->fm->validation($username);
            $adminPassword = $this->fm->validation($password);
            $adminoldPassword = $this->fm->validation($oldpassword);
            
            if(empty($username) || empty($adminPassword) || empty($adminoldPassword)){
                $msg = "<span class='error'>Fields must not be empty</span>";
                return $msg;
            }
            else{
                $query = "select * from admin where username='$username' and password='$adminoldPassword'";
                $result = $this->db->select($query);
                if($result!= false){
                    $query = "UPDATE admin SET password='$adminPassword' WHERE username='$username'";
                    $result = $this->db->insertUpdateDelete($query);
                    if($result == true){
                        $msg = "<span class='success'>Password Change Successfull</span>";
                    }
                    else{
                        $msg = "<span class='error'>Failed</span>";
                    }
                return $msg;
            }
            $msg = "<span class='error'>Old Password not match.</span>";
            return $msg;
        }
    }
}
?>