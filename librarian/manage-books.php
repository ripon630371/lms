<?php require_once "header.php"; ?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:void(0)">Manage Book</a></li>
                        </ul>
                    </div>
                </div>



                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                            <h4 class="section-subtitle"><b>All Students</b></h4>
                                <div class="panel">
                                    <div class="panel-content">
                                        <div class="table-responsive">
                                            <table id="basic-table" class="table-bordered data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Book Name</th>
                                                    <th>Book Image</th>
                                                    <th>Author Name</th>
                                                    <th>Purchase Date</th>
                                                    <th>Book Price</th>
                                                    <th>Book Quantity</th>
                                                    <th>Availale Quantity</th>
                                                    <th>Libraian Username</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                        $result = mysqli_query($con, "SELECT * FROM `books`");
                                                        while($row = mysqli_fetch_assoc($result)){ ?>
                                                            <tr>
                                                                <td><?= $row['book_name'];?></td>
                                                                <td><img src="../images/books/<?= $row['book_image'];?>" alt="" style="width: 50px;"></td>
                                                                <td><?= $row['book_author_name'];?></td>
                                                                <td><?= $row['book_purchase_date'];?></td>
                                                                <td><?= $row['book_price'];?></td>
                                                                <td><?= $row['book_qty'];?></td>
                                                                <td><?= $row['available_qty'];?></td>
                                                                <td><?= $row['libraian_username'];?></td>
                                                                <td>
                                                                    <a href="javascript:void(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?= $row['id'];?>"><i class="fa fa-eye"></i></a>
                                                                    <a href="javascript:void(0)" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?= $row['id'];?>"><i class="fa fa-pencil"></i></a>
                                                                    <a href="delete.php?bookdelete=<?= base64_encode($row['id']);?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete me!')"><i class="fa fa-trash-o"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php 
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            </div>



            <?php
                $result = mysqli_query($con, "SELECT * FROM `books`");
                while($row = mysqli_fetch_assoc($result)){ 
            ?>                                               
    <!-- Modal -->
        <div class="modal fade" id="book-<?= $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header state modal-info">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Info</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Book Name</th>
                                <td><?= $row['book_name'];?></<td>
                            </tr>
                            <tr>
                                <th>Book Image</th>
                                <td><img src="../images/books/<?= $row['book_image'];?>" alt="" style="width: 50px;"></td>                  
                            </tr>
                            <tr>
                                <th>Author Name</th>
                                <td><?= $row['book_author_name'];?></td>
                            </tr>
                            <tr>
                                <th>Purchase Date</th>
                                <td><?= $row['book_purchase_date'];?></td>
                            </tr>
                            <tr>
                                <th>Book Price</th>
                                <td><?= $row['book_price'];?></td>
                            </tr>
                            <tr>  
                                <th>Book Quantity</th>
                                <td><?= $row['book_qty'];?></td>
                            </tr>
                            <tr>
                                <th>Availale Quantity</th>
                                <td><?= $row['available_qty'];?></td>                
                            </tr>  
                            <tr>
                                <th>Libraian Username</th>
                                <td><?= $row['libraian_username'];?></td>
                            </tr>                   
                                                  
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <?php 
             }
        ?>




<!--update book model here-->
            <?php
                $result = mysqli_query($con, "SELECT * FROM `books`");
                while($row = mysqli_fetch_assoc($result)){ 
                
                $id = $row['id'];

                $book_info = mysqli_query($con, "SELECT * FROM `books` WHERE `id` = '$id'");
                $book_info_row = mysqli_fetch_assoc($book_info);

            ?>                                               
    <!-- Modal -->
        <div class="modal fade" id="book-update-<?= $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header state modal-info">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book Info</h4>
                    </div>
                    <div class="modal-body">
                        <div class="panel">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="book_name" class="form-control" id="book_name " placeholder="Book Name " required value="<?= $book_info_row['book_name'];?>">
                                                </div>
                                            </div>

                                            <!--<div class="form-group">
                                                <label for="book_image" class="col-sm-4 control-label">Book Image </label>
                                                <div class="col-sm-8">
                                                    <input type="file" name="book_image" class="form-control" id="book_image">
                                                </div>
                                            </div>-->

                                            <div class="form-group">
                                                <label for="book_author_name" class="col-sm-4 control-label">Book Author Name </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="book_author_name" class="form-control" id="book_author_name" placeholder="Book author name" required value="<?= $book_info_row['book_author_name'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_purchase_date" class="col-sm-4 control-label">Book Purchase Date</label>
                                                <div class="col-sm-8">
                                                    <input type="date" name="book_purchase_date" class="form-control" id="book_purchase_date" placeholder="Book purchase date" required value="<?= $book_info_row['book_purchase_date'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_price " class="col-sm-4 control-label">Book Price</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="book_price" class="form-control" id="book_price " placeholder="Book price" required value="<?= $book_info_row['book_price'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="book_qty" class="col-sm-4 control-label">Book Quantity</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="book_qty" class="form-control" id="book_qty" placeholder="Book quantity" required value="<?= $book_info_row['book_qty'];?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="available_qty" class="col-sm-4 control-label">Available Quantity</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="available_qty" class="form-control" id="available_qty" placeholder="Available quantity" required value="<?= $book_info_row['available_qty'];?>">
                                                </div>
                                            </div>
                                            

                                            <div class="form-group">
                                                <div class="col-sm-offset-4 col-sm-8">
                                                    <button type="submit" name="update_book" class="btn btn-primary"><i class="fa fa-save"></i> Update Book</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
             }
        ?>
<?php  require_once "footer.php"; ?>