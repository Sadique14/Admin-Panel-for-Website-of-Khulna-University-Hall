<?php require '../resources/classes/webOptions.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $access = new option();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $check = $access->addToAlbum($_FILES,$_POST['slide-number']);
    }
    $sl = $access->getAlbum();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Logo</h2>
        <div class="block">               
         <section class="col span-3-of-5 content-body">
                <div class="row slider">
                        <div class="col span-1-of-3 label">
                            <label>Slot 1:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <img src="<?php echo $sl[0]['image']; ?>" height="120px" width="230px">
                        </div>
                    </div>
                <div class="row">
                <div class="row slider">
                        <div class="col span-1-of-3 label">
                            <label>Slot 2:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <img src="<?php echo $sl[1]['image']; ?>" height="120px" width="230px">
                        </div>
                    </div>
                <div class="row">
                <div class="row slider">
                        <div class="col span-1-of-3 label">
                            <label>Slot 3:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <img src="<?php echo $sl[2]['image']; ?>" height="120px" width="230px">
                        </div>
                    </div>
                    <div class="row slider">
                        <div class="col span-1-of-3 label">
                            <label>Slot 4:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <img src="<?php echo $sl[3]['image']; ?>" height="120px" width="230px">
                        </div>
                    </div>
                <div class="row">
                    
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="content-form" enctype="multipart/form-data">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label for="slide-number">Choose Logo type:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="slide-number" id="slide-number">
                                <option value="1">Slot 1</option>
                                <option value="2">Slot 2</option>
                                <option value="3">Slot 3</option>
                                <option value="4">Slot 4</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label>Upload Image:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="file" name="image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label>Title of the Image:</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="text" name="title" placeholder="Enter title...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col span-1-of-3 label">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="submit" name="submit" value="Save">
                        </div>
                    </div>
                </form>
                 <?php
                    if(isset($check)){
                        echo $check;
                    }
                    ?>   
            </div>
       </section>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>