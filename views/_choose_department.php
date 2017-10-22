<p class="lead">
    Please Choose a Department
</p>
<div class="form-group">
    <select class="form-control" id="department">
        <?php                        
            while($result = mysqli_fetch_assoc($departments)) {
                echo "<option>". $result["name"] ." </option>";
            }
        ?>
    </select>
</div>