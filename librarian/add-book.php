<?php require_once "header.php";

if(isset($_POST['save_book'])){
    $book_name = $_POST['book_name'];
    $book_author_name = $_POST['book_author_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $available_qty = $_POST['available_qty'];
    $libraian_username = $_SESSION['libraian_username'];


    $image = explode('.',$_FILES['book_image']['name']);
    $image_ext = end($image);
    $image = date('Ymdhis .').$image_ext;
    
    $result = mysqli_query($con,"INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `libraian_username`) 
    VALUES ('$book_name','$image','$book_author_name','$book_purchase_date','$book_price','$book_qty','$available_qty','$libraian_username')");

    if($result){
        move_uploaded_file($_FILES['book_image']['tmp_name'],'../images/books/'.$image);
        $sucess = "Book add sucessfully ";
    }else{
        $error = "Book not add !";
    }
    


}

?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="javascript:void(0)">Add Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-6 col-sm-offset-3">
                        <h4 class="section-subtitle"><b>All add Book </b></h4>

                        <?php 
                            if(isset($sucess)){?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $sucess; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php 
                            }
                        ?>
                        <?php 
                            if(isset($error)){?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php 
                            }
                        ?>
                            <div class="panel">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                                <h5 class="mb-lg">To enjoy add Book!</h5>
                                                <div class="form-group">
                                                    <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="book_name" class="form-control" id="book_name " placeholder="Book Name " required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="book_image" class="col-sm-4 control-label">Book Image </label>
                                                    <div class="col-sm-8">
                                                        <input type="file" name="book_image" class="form-control" id="book_image">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="book_author_name" class="col-sm-4 control-label">Book Author Name </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="book_author_name" class="form-control" id="book_author_name" placeholder="Book author name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="book_purchase_date" class="col-sm-4 control-label">Book Purchase Date</label>
                                                    <div class="col-sm-8">
                                                        <input type="date" name="book_purchase_date" class="form-control" id="book_purchase_date" placeholder="Book purchase date" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="book_price " class="col-sm-4 control-label">Book Price</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="book_price" class="form-control" id="book_price " placeholder="Book price" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="book_qty" class="col-sm-4 control-label">Book Quantity</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="book_qty" class="form-control" id="book_qty" placeholder="Book quantity" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="available_qty" class="col-sm-4 control-label">Available Quantity</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="available_qty" class="form-control" id="available_qty" placeholder="Available quantity" required>
                                                    </div>
                                                </div>
                                               

                                                <div class="form-group">
                                                    <div class="col-sm-offset-4 col-sm-8">
                                                        <button type="submit" name="save_book" class="btn btn-primary"><i class="fa fa-book"></i> Save Book</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            </div>

<?php  require_once "footer.php"; ?>