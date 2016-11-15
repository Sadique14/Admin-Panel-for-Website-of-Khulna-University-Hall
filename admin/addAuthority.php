<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../resources/classes/admin.php';?>
<?php
    $ad = new admin();
    if($_SERVER['REQUEST_METHOD']=='POST'){     
        $check = $ad->addNewAuthority($_POST,$_FILES);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add authority</h2>
        <div class="block">               
         <form id="authority_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
            <table class="form">	
                <tr>
                    <td>
                        <label>Name:</label>
                    </td>
                    <td>
                        <input type="text" name="name" placeholder="Enter Name..." class="medium" required />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>Designation</label>
                    </td>
                    <td>
                        <input type="text" name="designation" placeholder="Enter Designation..." class="medium" required />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>Image</label>
                    </td>
                    <td>
                        <img id="uploadPreview" style="width: 380px; height: 200px;" />
                        <div class="imageborder fix">
                            <input id="uploadImage" type="file" name="image" onchange="PreviewImage();" required><br/>
                        </div>
                    </td>
                </tr>
				
				<p class="msg">
                    <?php
                        if(isset($check)){
                            echo $check;
                        }
                    ?>
                </p>
				 <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Add new Authority" onclick="return confirm('are u sure to add')" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>

<?php include 'inc/footer.php';?>