<table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Post ID</th>
                                    <th>Author</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Post Name</th>
                                    <th>Date</th>
                                    <th>Content</th>
                                    <th>Approval Status</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                $query = "SELECT * FROM comments ORDER BY comment_id DESC";
                                $get_comments = mysqli_query($connection,$query);
                                
                                while($row = mysqli_fetch_assoc($get_comments)){
                                    
                                    $comment_id = $row['comment_id'];
                                    $comment_post_id = $row['comment_post_id'];
                                    $comment_author = $row['comment_author'];
                                    $comment_email = $row['comment_email'];
                                    $comment_status = $row['comment_status'];
                                    $comment_date = $row['comment_date'];
                                    $comment_content = substr($row['comment_content'],0,25);
                                    
                                    
                                    echo "<tr>";
                                    echo "<td class='border rounded-0'>$comment_id</td>";
                                    echo "<td class='border rounded-0'>$comment_post_id</td>";
                                    echo "<td class='border rounded-0'>$comment_author</td>";
                                    echo "<td class='border rounded-0'>$comment_email</td>";
                                    echo "<td class='border rounded-0'>$comment_status</td>";
                                    
                                    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                                    $get_comment_post = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($get_comment_post)){
                                        
                                        $post_id = $row['post_id'];
                                        $post_title = $row['post_title'];
                                        
                                        echo "<td class='border rounded-0'><a href='../post.php?post_id=$post_id'>{$post_title}</a></td>";
                                    }
                                    
                                    echo "<td class='border rounded-0'>$comment_date</td>";
                                    echo "<td class='border rounded-0'>$comment_content"."..."."</td>";
                                    
                                    if($comment_status == "Approved"){
                                        echo "<td class='border rounded-0'>Approve / <a href='comment.php?unapprove={$comment_id}'> Unapprove</a></td>";
                                    }
                                    else{
                                        echo "<td class='border rounded-0'><a href='comment.php?approve={$comment_id}'>Approve </a> / Unapprove</td>";
                                    }
                                    echo "<td class='text-center border rounded-0'><a class='btn p-2 mr-2 mb-2' style='color: white;font-weight: bold;background-color: rgb(220,53,69);' data-toggle='modal' data-target='#myModal' data-href='comment.php?delete=$comment_id' href='javascript:void(0)'>Delete </a></td></tr>";    

                                    echo "</tr>";
              
                                }
                                ?>
                                
                                <?php
                                 if(isset($_GET['unapprove'])){
                                    
                                    comment_unapprove();
                                }
                                
                                 if(isset($_GET['approve'])){
                                    
                                    comment_approve();
                                }
                                
                                if(isset($_GET['delete'])){
                                    
                                    comment_delete();
                                }
                                
                                ?> 
                                  </tbody>
                        </table>
