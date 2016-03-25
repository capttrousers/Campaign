<?php include 'header.php'; ?>
    <section>
        <h2>Admin</h2>
        <h3>Voter List</h3>
        <h4>Edit Voter Information</h4>
        <p>
            This is where you can update the voter's information.
        </p>
        <?php if(isset($edit_voter_error)) {
            echo "<h4 style='color:red;'>$edit_voter_error</h4>"; 
        } ?>
        
        <form action="." method="post">
            <input type="hidden" name="action" value="edit-voter"/>
            <input type="hidden" name="voter_id"
                   value="<?php echo $voter['voter_id'];?>"/>
            
            <label>First Name</label>
            <input type="text" name="first_name" 
                   value="<?php echo $voter['first_name'];?>"/><br>
            
            <label>Last Name</label>
            <input type="text" name="last_name" 
                   value="<?php echo $voter['last_name'];?>"/><br>
                   
            <label>Email</label>
            <input type="text" name="email" 
                   value="<?php echo $voter['email'];?>"/><br>
                   
            <label>Phone</label>
            <input type="text" name="phone" 
                   value="<?php echo $voter['phone'];?>"/><br>
            
            <label>Street Number</label>
            <input type="text" name="street" 
                   value="<?php echo $voter['loc_street'];?>"/><br>
            
            <label>City</label>
            <input type="text" name="city" 
                   value="<?php echo $voter['loc_city'];?>"/><br>
            
            <label>State</label>
            <input type="text" name="state" 
                   value="<?php echo $voter['loc_state'];?>"/><br>
            
            <label>Zip Code</label>
            <input type="text" name="zip" 
                   value="<?php echo $voter['loc_zip'];?>"/><br>
            
            <label>Birthday</label>
            <input type="text" name="birthday" 
                   value="<?php echo $voter['birthday'];?>"/><br>
            
            <label>Registered?</label>
            <select name="registered">
                <?php if($voter['registered'] == 'Yes') : ?>
                <option value=' Yes' selected>Yes</option>
                <option value=' No'>No</option>
                <?php else : ?>
                <option value=' Yes'>Yes</option>
                <option value=' No' selected>No</option>
                <?php endif; ?>                
            </select>
            
            <label>&nbsp;</label>
            <input type="submit" value="Update"/>
        </form>
        <br>
        <form action="." method="post">
            <input type="hidden" name="action" value="edit-voter-form"/>
            <input type="hidden" name="voter_id" 
                   value="<?php echo $voter['voter_id'];?>"/>
            <input type="submit" value="CANCEL EDITS"/>
        </form>
    </section>
<?php include 'footer.php'; ?>