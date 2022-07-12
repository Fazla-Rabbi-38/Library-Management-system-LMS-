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
                            <li><a href="javascript:avoid(0)">Return Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                    <h4 class="section-subtitle"><b></b>Return Book</h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        
                                        <th>Full Name</th>
                                        
                                        <th>Roll No</th>
                                        <th>phone</th>
                                        <th>Book Name</th>
                                        <th>Issue date</th>
                                        <th>Return Book</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody> <?php
                                   $result = mysqli_query($con, " SELECT issue_book.id,issue_book.issue_date,students.full_name,students.roll_no,students.phone,books.book_name,issue_book.book_id FROM issue_book inner join students on students.id = issue_book.student_id inner join books on books.id = issue_book.book_id  where issue_book.return_date = '' ");
                                   while ($row = mysqli_fetch_assoc($result)) {
                                       ?>
                                       <tr>
                                            <td><?= $row['full_name']?></td>
                                           
                                            <td><?= $row['roll_no']?></td>
                                            
                                            <td><?= $row['phone']?></td>
                                            <td><?= $row['book_name']?></td>
                                            <td><?= $row['issue_date']?></td>
                                            <td><a href="return_book.php?id=<?=$row['id']?>&bookid=<?=$row['book_id']?>">Return Book</a></td>

                                            
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
            
    <?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $bookid = $_GET['bookid'];
        $date = date('d-m-y');
        $result = mysqli_query($con,"UPDATE issue_book SET return_date='$date' WHERE id = '$id';");
    }
    
    mysqli_query($con,"UPDATE books SET book_qty=book_qty+1 WHERE id ='$bookid'");
    
    ?>    
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
 <?php
   require_once 'footer.php';
?>