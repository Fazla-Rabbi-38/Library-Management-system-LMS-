<?php
   require_once 'header.php';
?>
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                    <h4 class="section-subtitle"><b></b>Student's Info</h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Author name</th>
                                        <th>Publication Name</th>
                                        <th>Purchase Date</th>
                                        <th>Book Price</th>
                                        <th>Book Quantity</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody> <?php
                                   $result = mysqli_query($con, " SELECT * FROM books ");
                                   while ($row = mysqli_fetch_assoc($result)) {
                                       ?>
                                       <tr>
                                            <td><?= $row['book_name']?></td>
                                            <td><img style="width: 100px;" src="../images/books/<?= $row['book_image']?>" alt=""></td>
                                            <td><?= $row['author_name']?></td>
                                            <td><?= $row['publication_name']?></td>
                                            <td><?= $row['purchase_date']?></td>
                                            <td><?= $row['book_price']?></td>
                                            <td><?= $row['book_qty']?></td>
                                            <td>
                                                <a href="" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                                <a href="delete.php?bookdelete=<?= base64_encode($row['id'])?>" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete?')"><i class="fa fa-trash-o"></i></a>
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
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
 <?php
   require_once 'footer.php';
?>