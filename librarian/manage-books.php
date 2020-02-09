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
                                                                    <a href="javascript:void(0)" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                                    <a href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
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
<?php  require_once "footer.php"; ?>