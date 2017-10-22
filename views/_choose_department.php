<p class="lead">
    Please Choose a Department
</p>
<div class="form-group">
    <select class="form-control" id="department">
        <?php                        
            while($result = mysqli_fetch_assoc($departments)) {
                echo "<option value=". $result["id"] .">". $result["name"] ." </option>";
            }
        ?>
    </select>
</div>
<div class="form-group">
    <?php
        echo '<button class="btn btn-lg btn-primary btn-block" onclick="choose_department('. $_SESSION['usersession'] .')">Submit</button>'
    ?>
</div>