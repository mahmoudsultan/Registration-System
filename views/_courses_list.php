<div class="row">
    <div class="col-sm-12">
        <div class="lead">Available Courses: </div>
        <?php                        
            while($course = mysqli_fetch_assoc($courses)) {
        ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $course["name"]. " - " . $course["instructor_name"]; ?></h4>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $course["credit_hours"]; ?></h6>
                    <p class="card-text"><?php echo $course["description"]; ?></p>
                </div>
            </div>
            <br/>
        <?php
            }
        ?>
    </div>
</div>