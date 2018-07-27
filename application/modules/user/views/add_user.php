<form role="form bor-rad" enctype="multipart/form-data" action="<?php echo base_url().'user/add_edit'?>" method="post">
  <div class="box-body">
    <div class="row">
          
						<div class="col-md-6">
				          <div class="form-group">
				            <label for="status"> Status</label>
				            <select name="status" id="" class="form-control">
		        			<option value="active" <?php echo (isset($userData->status) && $userData->status == 'active')?'selected':''; ?> >Active</option>
		        			
		        			<option value="deleted" <?php echo (isset($userData->status) && $userData->status == 'deleted')?'selected':''; ?> >Deleted</option>
		        			
				            </select>
				          </div>
				        </div>
					
						<div class="col-md-6">
						  <div class="form-group">
						    <label for="">Full Name</label>
						    <input type="text" name="name" value="<?php echo isset($userData->name)?$userData->name:'';?>" required="required" class="form-control" placeholder="Name">
						  </div>
						</div>
						
						<div class="col-md-6">
						  <div class="form-group">
						    <label for="">User Name</label>
						    <input type="text" name="username" value="<?php echo isset($userData->username)?$userData->username:'';?>"required="required" class="form-control" placeholder="UserName">
						  </div>
						</div>
						
						<div class="col-md-6">
						  <div class="form-group">
						    <label for="">Address</label>
						    <input type="text" name="address" value="<?php echo isset($userData->Address)?$userData->Address:'';?>" required="required" class="form-control" placeholder="Address">
						  </div>
						</div>
					
						<div class="col-md-6">
						  <div class="form-group">
						    <label for="">Email</label>
						    <input type="text" name="email" value="<?php echo isset($userData->email)?$userData->email:'';?>" required="required" class="form-control" placeholder="Email">
						  </div>
						</div>
					
          <div class="col-md-6">
            <div class="form-group">
              <label for="">User Type</label>
              <?php $u_type = isset($userData->user_type)?$userData->user_type:'';
                $user_type = getAllDataByTable('permission');
              ?>
              <select name="user_type" class="form-control" required>  
              <?php foreach($user_type as $option){  $sel='';if(strtolower($option->user_type)==strtolower($u_type)){$sel="selected";}  
                if(strtolower($option->user_type) != 'admin'){
              ?>
                <option  value="<?php echo $option->user_type;?>" <?php echo $sel; ?> ><?php echo ucfirst($option->user_type);?> </option>
     
              <?php } }?>                   
              </select>
            </div> 
          </div>
        <?php if(isset($userData)){ ?>
        <div class="col-md-12">
          <div class="form-group">
          <label for="">Current Password</label>
            <input type="text" style="display: none">
             <input type="Password" name="currentpassword" class="form-control" value="" placeholder="Password">
          </div>
        </div>
        <?php }
        else { ?>
        <div class="col-md-12">
          <div class="form-group">
          <label for="">Password</label>
             <input type="Password" name="password" class="form-control" value="" placeholder="Password" readonly onfocus="this.removeAttribute('readonly')">
          </div>
        </div>
        <?php } if(isset($userData)){ ?>
          <div class="col-md-6">
            <div class="form-group">
            <label for="">Password</label>
               <input type="Password" name="password" class="form-control" value="" placeholder="Password">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <label for="">Confirm Password</label>
               <input type="Password" name="confirmPassword" class="form-control" value="" placeholder="Password">
            </div>
          </div>
          <?php } ?>
          
          <div class="col-md-12"> 
            <div class="form-group imsize">
              <label for="exampleInputFile">Image Upload</label>
              <div class="pic_size" id="image-holder"> 
                <?php if(isset($userData->profile_pic) && file_exists('assets/images/'.$userData->profile_pic)){ 
                  $profile_pic = $userData->profile_pic;
                }else{ 
                  $profile_pic = 'user.png'; 
                } ?> 
                <left> <img class="thumb-image setpropileam" src="<?php echo base_url();?>/assets/images/<?php echo isset($profile_pic)?$profile_pic:'user.png';?>" alt="User profile picture"></left>
              </div> <input type="file" name="profile_pic" id="exampleInputFile">
            </div>
          </div>                
        </div>
        <?php if(!empty($userData->users_id)){?>
        <input type="hidden"  name="users_id" value="<?php echo isset($userData->users_id)?$userData->users_id:'';?>">
        <input type="hidden" name="fileOld" value="<?php echo isset($userData->profile_pic)?$userData->profile_pic:'';?>">
        <div class="box-footer sub-btn-wdt">
          <button type="submit" name="edit" value="edit" class="btn btn-success wdt-bg">Update</button>
        </div>
              <!-- /.box-body -->
        <?php }else{?>
        <div class="box-footer sub-btn-wdt">
          <button type="submit" name="submit" value="add" class="btn btn-success wdt-bg">Add</button>
        </div>
        <?php }?>
      </form>