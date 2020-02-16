<?php require_once "header.php"; ?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:void(0)">Issue Book</a></li>
                            
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">  
                    <div class="panel">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <form class="form-inline">
                                            <div class="form-group">
                                            
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php
                                                        
                                                        $result = mysqli_query($con, "SELECT * FROM `students`");
                                                        while($row = mysqli_fetch_assoc($result)){ ?>
                                                            
                                                            <option value=""><?= ucwords($row['fname'].' '. $row['lname'] ).' - ( '.$row['roll'] .' )'; ?></option>
                                                        <?php } ?>
                                                    
                                                </select>
                                                
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="search" class="btn btn-primary">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            </div>

<?php  require_once "footer.php"; ?>
