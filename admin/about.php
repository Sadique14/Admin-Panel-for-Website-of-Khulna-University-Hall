<?php require '../resources/classes/webOptions.php'; ?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    $adLink = new option();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $check = $adLink->addAboutContact($_POST);
    }
    $result = $adLink->getAboutContact();
    $result = mysqli_fetch_assoc($result);
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">			
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>About Us:</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="aboutUs"><?php echo $result['aboutUs']; ?></textarea>
                    </td>
                </tr>
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Contact Information:</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="contact"><?php echo $result['contact']; ?></textarea>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php
                    if(isset($check)){
                        echo $check;
                    }
            ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


