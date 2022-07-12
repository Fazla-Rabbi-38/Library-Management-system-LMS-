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
                <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-md-4">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Basic Info</h5>
                        </div>
                        <div>
                            <div class="ibox-content no-padding border-left-right text-center">
                                <img alt="image" class="img-thumbnail img-xl" src="uploads/student/Noor-Fazla-Rabbi-2450_1577897144.jpg">
                            </div>
                            <div class="ibox-content profile-content">
                                <h4><strong><?= $student_info['full_name']?></strong></h4>
                                <ul class="list-group clear-list">
                                    <li class="list-group-item fist-item">
                                        <span class="float-right"><i class="fa fa-user"></i></span>
                                        <strong>Name:<?= $student_info['full_name']?></strong>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="float-right"><i class="fa fa-user"></i></span>
                                        <strong><?= $student_info['roll_no']?></strong>
                                    <li class="list-group-item fist-item">
                                        <span class="float-right"><i class="fa fa-envelope"></i></span>
                                        <strong><?= $student_info['email']?></strong>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="float-right"><i class="fa fa-phone-square"></i></span>
                                        <strong><?= $student_info['phone']?></strong>
                                    
                                </ul>
                               
                               
                            </div>
                       </div>
                      </div>
                    </div>
                </div>
            </div>
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                    <h4 class="section-subtitle"><b></b>All Issued Books</h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Author Name</th>
                                        <th>Issue Date</th>
                                    </tr>
                                    </thead>
                                    <tbody> 
                                        <?php
                                        $student_id=$_SESSION['student_id'];
                                        $sql ="SELECT issue_book.issue_date,books.book_name,books.author_name FROM books INNER JOIN issue_book ON issue_book.book_id=books.id WHERE issue_book.student_id=$student_id ";
                                       $result = mysqli_query($con,$sql);
                                        while($row = mysqli_fetch_assoc($result)){?>
                                          <tr>    
                                        <td><?= $row['book_name']?></td>
                                        <td><?= $row['author_name']?> </td>
                                        <td><?= $row['issue_date']?></td>
                                        </tr>
                                            <?php
                                        }?>
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                            $books=mysqli_query($con,"SELECT * FROM books");
               $total_books = mysqli_num_rows($books);
                            ?>
                    <!--BOX Style 1-->
                    <div class="col-sm-12 col-md-8 col-lg-6">
                        <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                            <a href="manage_books.php">
                                <div class="panel-content">
                                    <h1 class="title color-light-1"> <i class="fa fa-book"></i><?= $total_books ?>  </h1>
                                    <h4 class="subtitle ">Books In Library</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
 <?php
   require_once 'footer.php';
?>