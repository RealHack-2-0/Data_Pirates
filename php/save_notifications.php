<div class="row">
<div class="col-sm-6">
<h3>Add New Notification:</h3>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table class="table borderless">
<tr>
<td>Message</td>
<td><textarea name="msg" cols="50" rows="4" class="form-control" required></textarea></td>
</tr>
<tr>
<td>Broadcast time</td>
<td><select name="time" class="form-control"><option>Now</option></select> </td>
</tr>
<tr>
<td>Loop (time)</td>
<td><select name="loops" class="form-control">
<?php
for ($i=1; $i<=5 ; $i++) { ?>
<option value="<?php echo $i ?>"><?php echo $i ?></option>
<?php } ?>
</select></td>
</tr>
<tr>
<td>Loop Every (Minute)</td>
<td><select name="loop_every" class="form-control">
<?php
for ($i=1; $i<=60 ; $i++) { ?>
<option value="<?php echo $i ?>"><?php echo $i ?></option>
<?php } ?>
</select> </td>
</tr>
<tr>
<td>For</td>
<td><select name="user" class="form-control">
<?php
$user = $push->listUsers();
foreach ($user as $key) {
?>
<option value="<?php echo $key['username'] ?>"><?php echo $key['username'] ?></option>
<?php } ?>
</select></td>
</tr>
<tr>
<td colspan=1></td>
<td colspan=1></td>
</tr>
<tr>
<td colspan=1></td>
<td><button name="submit" type="submit" class="btn btn-info">Add Message</button></td>
</tr>
</table>
</form>
</div>
</div>