<?php include 'header.php'

?>
        <!-- Page content -->
        <div class="content">
            <p>
                <!--<a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Link with href
                </a>-->
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Post Job
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <form method="POST" action="config.php">
                        <div class="mb-3">
                            <label for="Company Name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="" name="cname">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPosition" class="form-label">Position</label>
                            <input type="text" class="form-control" id="exampleInputPosition" name="pos">
                        </div>
                        <div class="mb-3">
                            <label for="job description" class="form-label">Job Description</label>
                            <textarea id="" cols="30" rows="10" class="form-control"  name="jdesc"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Skills" class="form-label">Skills Required</label>
                            <input type="text" class="form-control" id="skills " name="skills">
                        </div>
                        <div class="mb-3">
                            <label for="CTC" class="form-label">CTC</label>
                            <input type="text" class="form-control" id="CTC" name="CTC">
                        </div>
                        <button type="submit" class="btn btn-primary" name="job">Submit</button>
                    </form>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Position</th>
                        <th scope="col">CTC</th>
                    </tr>
                </thead>
                    <?php
                    $server='localhost';
                    $username='root';
                    $password='aeaspire';
                    $database='jobs';
                    
                    $conn= new mysqli($server,$username,$password,$database);
                    
                    if($conn->connect_error){
                        die("Connection failed: " . $conn->connect_error);
                    
                    }
                    $sql="SELECT `cname`,`position`, `CTC` FROM `jobs`";
                    $result=mysqli_query($conn,$sql);
                    $i=0;
                    if($result->num_rows > 0){
                        while($rows=$result->fetch_assoc()){
                        echo"
                    <tbody>
                    <tr>
                        <td>".++$i."</td>
                        <td>".$rows['cname']."</td>
                        <td>".$rows['position']."</td>
                        <td>".$rows['CTC']."</td>
                    </tr>
                    </tbody>";
                    }}
                    else {
                        echo "";
                    }
                    ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>