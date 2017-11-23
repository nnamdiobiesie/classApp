<?php

session_start();
$page_title = "Admin Dashboard";
   $flag = ['Top-Selling', 'Trending', 'Recently-Viewed'];
   define('MAX_FILE_SIZE', '2097152');
        $ext = ['image/jpg', 'image/jpeg', 'image/png'];
			
           
            include ('includes/db.php');
             include ('includes/files.php');

             include ('includes/dashboard_header.php');

             checkLogin();

            if($_GET['book_id']) {


                $book_id = $_GET['book_id'];
            }

            $item = getProductById($conn, $book_id);


        $errors = [];


        if(array_key_exists('edit', $_POST)){



                if(empty($_POST['title'])){

                $errors['title'] = "Please enter  book title";
        } 

        if(empty($_POST['author'])){

                $errors['author'] = "Please enter book author";
        }

        if(empty($_POST['price'])){

                $errors ['price'] = "Please enter book price";

        }  

        if(empty($_POST['cat'])){

                $errors ['cat'] = "Please enter book category";

        } 

        if(empty($_POST['year'])){

                $errors ['year'] = "Please enter year of publication";

        }   
 

         if(empty($_POST['flag'])){

                $errors ['flag'] = "Please select a flag";

        }     

         if(empty($_FILES['image']['name'])){

                $errors ['image'] = "Please enter book image";

        }   
        if($_FILES['image']['size'] > MAX_FILE_SIZE){

                $errors ['image'] = "Image size too large";

        }   
        if(!in_array($_FILES['image']['type'], $ext)){

                $errors ['image'] = "Image type not supported";

        }   
        if(empty($errors)){


                    $img = uploadFile($_FILES, 'image', 'uploads/');


                        if($img[0]){

                            $location = $img[1];

                       // echo  "File upload successful";

                    }

                $clean = array_map('trim', $_POST);
                 $clean['id'] = $book_id;
                $clean['dest'] = $location;
               // print_r($clean); exit;

                 updateProduct($conn, $clean);

                redirect("view_products.php");

                //header("Location: view_category.php");
        }


    }


?>






<div class="wrapper">
      <form id="register"  action ="" method ="POST" enctype="multipart/form-data">

              
                    <div>
                     <?php
                        $info = displayErrors($errors, 'title');
                        echo $info;
                ?>
              <label>Title*</label>  
                    <input type="text" name="title"value="<?php echo $item[1]; ?>">
                    </div>

                    <div>
                     <?php
                        $info = displayErrors($errors, 'author');
                        echo $info;
                ?>
                   <label>Author*</label>
                  <input type="text" name="author" value="<?php echo $item[2]; ?>">
                   </div>

                   <div>
                    <?php
                        $info = displayErrors($errors, 'price');
                        echo $info;
                ?>
                   <label> Price* </Label>
                   <input type="text" name="price" value="<?php echo $item[3]; ?>">
                   </div>

                   <div>
                    <?php
                        $info = displayErrors($errors, 'year');
                        echo $info;
                ?>
                   <label> Publication Date*</Label>
                   <input type="text" name="year"  value="<?php echo $item[4]; ?>">
                   </div>

                   <div>
                   
                    <?php
                        $info = displayErrors($errors, 'cat');
                        echo $info;
                ?>
                  
                   <label>Category </label>
                        <select name="cat">
                            <option value> Select Categories </option>
                             
                     <?php
                                $data = fetchCategory($conn);
                                echo $data;

                     ?>

                     </select>
                   </div>


                    <div>
                        <?php
                        $info = displayErrors($errors, 'flag');
                        echo $info;
                ?>
                   <label>Flag: </label>
                        <select name="flag">
                            <option name=""><?php echo $item[6]; ?></option>
                                <?php foreach ($flag as $fl) { ?>
                        <option value="<?php echo $fl; ?>"><?php echo $fl; ?> </option>
                     <?php } ?>
                     </select>
                   </div>

                   <div> 
                   <?php
                                $err = displayErrors($errors, 'image');
                        echo $err;

                     ?>

                        <label> Book Image:</label>

                        <input type="file" name="image" >

                        </div>
                    <input type="submit" name="edit" value="Edit Products" >
                
            </form>
        
    
  </div>





	<?php
				include ('includes/footer.php');


	?>

