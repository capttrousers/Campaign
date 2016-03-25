<?php include 'header.php'; ?>
    <section>
        <h2>Admin</h2>
        <h3>Staff List</h3>
        <h4>Edit Staff Information</h4>
        <p>
            This is where you can update the staff's information.
        </p>
        <?php if(isset($edit_staff_error)) {
            echo "<h4 style='color:red;'>$edit_staff_error</h4>"; 
        } ?>
        
        <form action="." method="post">
            <input type="hidden" name="action" value="edit-staff"/>
            <input type="hidden" name="staff_id"
                   value="<?php echo $staff['staff_id'];?>"/>
            
            <label>First Name</label>
            <input type="text" name="first_name" 
                   value="<?php echo $staff['first_name'];?>"/><br>
            
            <label>Last Name</label>
            <input type="text" name="last_name" 
                   value="<?php echo $staff['last_name'];?>"/><br>
                   
            <label>Email</label>
            <input type="text" name="email" 
                   value="<?php echo $staff['email'];?>"/><br>
                   
            <label>Phone</label>
            <input type="text" name="phone" 
                   value="<?php echo $staff['phone'];?>"/><br>
            
            <label>Login</label>
            <input type="text" name="login" 
                   value="<?php echo $staff['login'];?>"/><br>
            
            <label>Password</label>
            <input type="text" name="pw" 
                   value="<?php echo $staff['pw'];?>"/><br>
                       
            <label>&nbsp;</label>
            <input type="submit" value="Update"/>
        </form>
        <br>
        <form action="." method="post">
            <input type="hidden" name="action" value="edit-staff-form"/>
            <input type="hidden" name="staff_id" 
                   value="<?php echo $staff['staff_id'];?>"/>
            <input type="submit" value="CANCEL EDITS"/>
        </form>
    </section>
<?php include 'footer.php'; ?>