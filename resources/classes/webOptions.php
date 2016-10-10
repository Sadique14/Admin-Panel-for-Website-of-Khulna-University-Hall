<?php
    require_once '../resources/library/database.php';
    require_once '../resources/helpers/format.php';
?>
<?php
    class option{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new database();
            $this->fm = new format();
        }
        
        public function getOptions(){
            $query="SELECT * FROM siteoptions WHERE id='1'";
            $result = $this->db->select($query);
            return $result;
        }

        public function updateOptions($data){
            $title = $this->fm->validation($data['title']);
            $hallName = $this->fm->validation($data['name']);
            $address = $this->fm->validation($data['address']);
            $phone = $this->fm->validation($data['phone']);
            $fax = $this->fm->validation($data['fax']);
            $email = $this->fm->validation($data['email']);

            $title = mysqli_real_escape_string($this->db->link, $title);
            $hallName = mysqli_real_escape_string($this->db->link, $hallName);
            $address = mysqli_real_escape_string($this->db->link, $address);
            $phone = mysqli_real_escape_string($this->db->link, $phone);
            $fax = mysqli_real_escape_string($this->db->link, $fax);
            $email = mysqli_real_escape_string($this->db->link, $email);

            $query = "UPDATE siteoptions SET title='$title',hallName='$hallName',address='$address',phone='$phone',fax='$fax',email='$email' WHERE id='1'";
            $result = $this->db->insertUpdateDelete($query);
            if($result)
            {
                $msg = "<span class='success'>Updated successfully</span>";
                return $msg;
            }
            else
            {
                $msg = "<span class='error'>Failed</span>";
                return $msg;
            }
        }

        public function getAllSliders(){
            $query="SELECT * FROM slide";
            $result = $this->db->select($query); 
            return $result;
        }
        public function getAllLogo(){
            $query="SELECT headerImage,logo1,logo2 FROM siteoptions WHERE id='1'";
            $result = $this->db->select($query); 
            $result = mysqli_fetch_assoc($result);
            return $result;
        }
        public function addSlider($file, $slideNumber)
        {
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "../resources/sliders/".$unique_image;
            if(empty($file_name))
            {
                $msg = "<span class='error'>field must not be empty</span>";
                return $msg;
            }
            else if (in_array($file_ext, $permited) === false) {
             echo "<span class='error'>You can upload only:-"
             .implode(', ', $permited)."</span>";
            }
            else
            {
                $query = "SELECT image FROM slide WHERE id='$slideNumber'";
                $result2 = $this->db->select($query);
                $result2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
                if($result2[0]['image']){
                    $uploaded_image = $result2[0]['image'];
                }
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE slide SET image='$uploaded_image' WHERE id=$slideNumber";
                $result = $this->db->insertUpdateDelete($query);
                if($result){   
                    $msg = "<span class='success'>Slider updated successfully</span>";
                    return $msg;
                }
                else{
                    $msg = "<span class='error'>Failed</span>";
                    return $msg;
                }
            }
        }
        public function addLogo($file, $slideNumber)
        {
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "../resources/logo/".$unique_image;
            if(empty($file_name))
            {
                $msg = "<span class='error'>field must not be empty</span>";
                return $msg;
            }
            else if (in_array($file_ext, $permited) === false) {
             echo "<span class='error'>You can upload only:-"
             .implode(', ', $permited)."</span>";
            }
            else
            {
                if($slideNumber=="1"){
                    $query = "SELECT headerImage FROM siteoptions WHERE id='1'";
                    $result2 = $this->db->select($query);
                    $result2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
                    if($result2[0]['headerImage']){
                        $uploaded_image = $result2[0]['headerImage'];
                    }
                }
                else if($slideNumber=="2"){
                    $query = "SELECT logo1 FROM siteoptions WHERE id='1'";
                    $result2 = $this->db->select($query);
                    $result2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
                    if($result2[0]['logo1']){
                        $uploaded_image = $result2[0]['logo1'];
                    }
                }
                else if($slideNumber=="3"){
                    $query = "SELECT logo2 FROM siteoptions WHERE id='1'";
                    $result2 = $this->db->select($query);
                    $result2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
                    if($result2[0]['logo2']){
                        $uploaded_image = $result2[0]['logo2'];
                    }
                }
                move_uploaded_file($file_temp, $uploaded_image);
                if($slideNumber=="1")
                    $query = "UPDATE siteoptions SET headerImage='$uploaded_image' WHERE id='1'";
                else if($slideNumber=="2")
                    $query = "UPDATE siteoptions SET logo1='$uploaded_image' WHERE id='1'";
                else if($slideNumber=="3")
                    $query = "UPDATE siteoptions SET logo2='$uploaded_image' WHERE id='1'";
                $result = $this->db->insertUpdateDelete($query);
                if($result){   
                    $msg = "<span class='success'>Logo updated successfully</span>";
                    return $msg;
                }
                else{
                    $msg = "<span class='error'>Failed</span>";
                    return $msg;
                }
            }
        }
         public function getAboutContact()
        {
            $query = "SELECT aboutUs,contact FROM siteoptions WHERE id='1'";
            $result = $this->db->select($query);
            return $result;
        }
         public function addAboutContact($data)
         {
            $aboutUs = $this->fm->validation($data['aboutUs']);
            $contact = $this->fm->validation($data['contact']);
            $aboutUs = mysqli_real_escape_string($this->db->link, $aboutUs);
            $contact = mysqli_real_escape_string($this->db->link, $contact);

            $query = "UPDATE siteoptions SET aboutUs='$aboutUs',contact='$contact' WHERE id='1'";
            $result = $this->db->insertUpdateDelete($query);
            if($result)
            {
                $msg = "<span class='success'>Updated Successfully</span>";
                return $msg;
            }
            else
            {
                $msg = "<span class='error'>Failed</span>";
                return $msg;
            }
        }
        public function addNotice($data)
        {
            $title = $this->fm->validation($data['title']);
            $detail = $this->fm->validation($data['detail']);
            $title = mysqli_real_escape_string($this->db->link, $title);
            $detail = mysqli_real_escape_string($this->db->link, $detail);

            if(empty($title) || empty($detail)){
                $msg = "<span class='error'>Fields must not be empty.</span>";
                return $msg;
            }
            $query = "SELECT title FROM notices WHERE title='$title'";
            $result = $this->db->select($query);
            if($result){
                $msg = "<span class='error'>Title already exists.</span>";
                return $msg;
            }

            $query = "INSERT INTO notices (title,detail) values('$title','$detail')";
            $result = $this->db->insertUpdateDelete($query);
            if($result)
            {
                $msg = "<span class='success'>Notice Inserted Successfully</span>";
                return $msg;
            }
            else
            {
                $msg = "<span class='error'>Failed.</span>";
                return $msg;
            }
        }
        public function getAlbum(){
            $query="SELECT * FROM album";
            $result = $this->db->select($query); 
            $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
            return $result;
        
        }
        public function addToAlbum($file, $slideNumber)
        {
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['image']['name'];
            $file_size = $file['image']['size'];
            $file_temp = $file['image']['tmp_name'];
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "../resources/album/".$unique_image;
            if(empty($file_name))
            {
                $msg = "<span class='error'>field must not be empty</span>";
                return $msg;
            }
            else if (in_array($file_ext, $permited) === false) {
             echo "<span class='error'>You can upload only:-"
             .implode(', ', $permited)."</span>";
            }
            else
            {
                if($slideNumber=="1"){
                    $query = "SELECT image FROM album WHERE id='1'";
                    $result2 = $this->db->select($query);
                    $result2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
                    if($result2[0]['image']){
                        $uploaded_image = $result2[0]['image'];
                    }
                }
                else if($slideNumber=="2"){
                    $query = "SELECT image FROM album WHERE id='2'";
                    $result2 = $this->db->select($query);
                    $result2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
                    if($result2[0]['image']){
                        $uploaded_image = $result2[0]['image'];
                    }
                }
                else if($slideNumber=="3"){
                    $query = "SELECT image FROM album WHERE id='3'";
                    $result2 = $this->db->select($query);
                    $result2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
                    if($result2[0]['image']){
                        $uploaded_image = $result2[0]['image'];
                    }
                }
                else if($slideNumber=="4"){
                    $query = "SELECT image FROM album WHERE id='4'";
                    $result2 = $this->db->select($query);
                    $result2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
                    if($result2[0]['image']){
                        $uploaded_image = $result2[0]['image'];
                    }
                }
                move_uploaded_file($file_temp, $uploaded_image);
                if($slideNumber=="1")
                    $query = "UPDATE album SET image='$uploaded_image' WHERE id='1'";
                else if($slideNumber=="2")
                    $query = "UPDATE album SET image='$uploaded_image' WHERE id='2'";
                else if($slideNumber=="3")
                    $query = "UPDATE album SET image='$uploaded_image' WHERE id='3'";
                else if($slideNumber=="4")
                    $query = "UPDATE album SET image='$uploaded_image' WHERE id='4'";
                $result = $this->db->insertUpdateDelete($query);
                if($result){   
                    $msg = "<span class='success'>Logo updated successfully</span>";
                    return $msg;
                }
                else{
                    $msg = "<span class='error'>Failed</span>";
                    return $msg;
                }
            }
        }
    }
?>