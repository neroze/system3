<html lang="en">
<title>Attendance System</title>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('css/bootstrap.min.css');?>" rel="stylesheet" media="screen">
     <link rel="stylesheet" href=<?php echo base_url('css/jqPagination.css')?> />
   
<link href="<?php echo base_url('css/bootstrap-responsive.css');?>" rel="stylesheet">
</head>
<body>
    <div class="contain">
<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>
<div class="form-horizontal">

<?php echo form_open("auth/login");?>
<div class="control-group">
 
    <div class="control-label">
 <?php echo lang('login_identity_label', 'identity');?></div>
    <div class="controls">
        <?php echo form_input($identity);?>
    </div>  
</div>
    <div class="control-group">
  
<div class="control-label">  <?php echo lang('login_password_label', 'password');?></div>
  <div class="controls"> <?php echo form_input($password);?>
    </div>
  </div>
<div class="control-group">
  <div class="controls">
      <div class="checkbox">
   
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
           <?php echo lang('login_remember_label', 'remember');?>
 
      </div>
      <button type="submit" class="btn">Log In</button>
  </div>
</div>
<?php echo form_close();?>
<div class="control-group">
  <div class="controls">
<a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
  </div>
</div>    

</div>
    </div>
</body>
</html>