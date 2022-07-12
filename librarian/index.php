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
                        <div class="row">
                            <?php
                            $students=mysqli_query($con,"SELECT * FROM students");
               $total_students = mysqli_num_rows($students);
                            ?>
                    <!--BOX Style 1-->
                    <div class="col-sm-12 col-md-8 col-lg-6">
                        <div class="panel widgetbox wbox-1 bg-darker-1">
                            <a href="students.php">
                                <div class="panel-content">
                                    <h1 class="title color-w"><i class="fa fa-users"></i> <?= $total_students ?> </h1>
                                    <h4 class="subtitle color-lighter-1">Total Students</h4>
                                </div>
                            </a>
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
                    <?php
                            $issue_books=mysqli_query($con,"SELECT * FROM issue_book");
               $total_issue_books = mysqli_num_rows($issue_books);
                            ?>
                    <!--BOX Style 1-->
                   <div class="col-sm-12 col-md-8 col-lg-6">
                        <div class="panel widgetbox wbox-1 bg-darker-1 color-light">
                            <a href="return_book.php">
                                <div class="panel-content">
                                    <h1 class="title color-light-1"> <i class="fa fa-book"></i><?= $total_issue_books ?>  </h1>
                                    <h4 class="subtitle color-lighter-3">Issued Books</h4>
                                </div>
                            </a>
                        </div>
                    </div> 
                </div>
                    </div>
                    
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
 <?php
   require_once 'footer.php';
?>