<?php

session_start();
$page_title = "Admin Dashboard";

		
           
            include ('includes/db.php');
             include ('includes/files.php');
                include ('includes/dashboard_header.php');

            // checkLogin();


        $errors = [];

        $flag = ['Top-Selling', 'Trending', 'Recently-Viewed'];


        if(array_key_exists('add', $_POST)){



        if(empty($_POST['title'])){

                $errors ['title'] = "Please enter  book title";

        }       
        if(empty($_POST['author'])){

                $errors ['author'] = "Please enter author";

        }   
        if(empty($_POST['price'])){

                $errors ['price'] = "Please enter price";

        }   
        if(empty($_POST['pub_date'])){

                $errors ['pub_date'] = "Please enter publication date";

        }   
        if(empty($_POST['qty'])){

                $errors ['qty'] = "Please enter quantity";

        }   
        if(empty($_POST['cat_id'])){

                $errors ['cat_id'] = "Please enter category ID";

        }   
        if(empty($errors)){


                $clean = array_map('trim', $_POST);

                addProduct($conn, $clean);

                redirect("view_products.php");

                //header("Location: view_category.php");


        }


    }


?>



<div class="wrapper">
		<div id="stream">
			<form id="register"  action ="add_products.php" method ="POST">
        		<div>

        			<label>Add Product:</label>
                    <div>
                     <?php
                        $info = displayErrors($errors, 'title');
                        echo $info;
                ?>
        			<p> Title* <input type="text" name="title" placeholder="Title"></Label>
                    </div>
                    <div>
                     <?php
                        $info = displayErrors($errors, 'author');
                        echo $info;
                ?>
                   <p> Author* <input type="text" name="author" placeholder="Author"></Label>
                   </div>
                   <div>
                    <?php
                        $info = displayErrors($errors, 'price');
                        echo $info;
                ?>
                   <label> Price* <input type="text" name="price" placeholder="Price"></Label>
                   </div>
                   <div>
                    <?php
                        $info = displayErrors($errors, 'year');
                        echo $info;
                ?>
                   <label> Publication Date* <input type="date" name="year" placeholder="year"></Label>
                   </div>
                   <div>
                   
                    <?php
                        $info = displayErrors($errors, 'cat');
                        echo $info;
                ?>
                   <Label> Category* <input type="text" name="cat" placeholder="Category"></Label>
                   </div>

                        <?php
                        $info = displayErrors($errors, 'flag');
                        echo $info;
                ?>
                   <label>Flag: </label>
                        <select name="flag">
                             <option name=""> Select Flag</option>
                                <?php foreach ($flag as $fl) { ?>
                        <option value="<?php echo $fl; ?>"><?php echo $fl; ?> </option>
                     <?php } ?>
                   </div>

                   <div> 
                        <label> Book Image:</label>
                        <p> Please upload a picture </p>

                        <input type="file" name="image">

                        </div>
                    <input type="submit" name="add" value="Add" >
        		</div>
                
            </form>
  			
		</div>
	</div>



	<?php
				include ('includes/footer.php');


	?>

