<h3>Provide the Required Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.user.php?action=update">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" value="<?php echo $user->get_user_firstname($id);?>" placeholder="Your name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" value="<?php echo $user->get_user_lastname($id);?>" placeholder="Your last name..">

            <label for="access">Access Level</label>
            <select id="access" name="access">
                <option value="staff" <?php if($user->get_user_access($id) == "Staff"){ echo "selected";};?>>Staff</option>
                <option value="supervisor" <?php if($user->get_user_access($id) == "Supervisor"){ echo "selected";};?>>Supervisor</option>
                <option value="Manager" <?php if($user->get_user_access($id) == "Manager"){ echo "selected";};?>>Manager</option>
            </select>
        </div>
        <div id="form-block-half">
            <label for="status">Account Status</label>
            <select id="status" name="status" disabled>
                <option <?php if($user->get_user_status($id) == "0"){ echo "selected";};?>>Deactivated</option>
                <option <?php if($user->get_user_status($id) == "1"){ echo "selected";};?>>Active</option>
            </select>
            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" disabled value="<?php echo $user->get_user_email($id);?>" placeholder="Your email..">
            
            
            <input type="hidden" id="userid" name="userid" value="<?php echo $id;?>"/>
            <a href="#">Change Email</a> | 
            <a href="#">Change Password</a> | 
            <?php
            if($user->get_user_status($id) == "1"){
              ?>
                
              <?php
            }else{
            ?>
              
            <?php
            }
            ?>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="button-block">
            <input type="submit" value="Update">
        </div>
    </form>
    <form method="POST" action="processes/process.user.php?action=delete" onsubmit="return confirm('Are you sure you want to delete this account?');">
    <input type="hidden" name="userid" value="<?php echo $id; ?>"/>
    <button type="submit" name="action" value="delete">Delete Account</button>
</form>
</div>
