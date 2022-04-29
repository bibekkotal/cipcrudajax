<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Students</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/0451559bbf.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body style="font-family: 'Rubik', sans-serif;">
	<div class="container-fluid bg-primary vh-100 d-flex align-items-center justify-content-center">
		<div class="card shadow p-4 border-0 w-75">
	
<div id="contentdata">

<?php $this->load->view('main/inc/table'); ?>
</div>



<div class="pt-2 d-flex align-items-center justify-content-between col-md-3">
	<button type="button" data-bs-toggle="modal" data-bs-target="#addStudentModal" class="btn btn-outline-info"><i class="fas fa-user-plus"></i></button>


<!-- Add New Data Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStudentModalLabel">Add New Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form id="addStudent">
		  <div class="mb-3 row">
		   <label for="exampleFormControlName" class="col-sm-2 col-form-label">Name</label>
		    <div class="col-sm-10">
		     <input type="text" class="form-control" id="exampleFormControlName" name="name">
		    </div>
		  </div>

		  <div class="mb-3 row">
		   <label for="exampleFormControlGender" class="col-sm-2 col-form-label">Gender</label>
		    <div class="col-sm-10 align-items-center">
			    <div class="form-check-inline">
	              <label class="form-check-label">
	                  <input type="radio" class="form-check-input" name="gender" value="Male"> Male
	              </label>
	           </div>
	           <div class="form-check-inline">
	               <label class="form-check-label">
	                  <input type="radio" class="form-check-input" name="gender" value="Female"> Female
	                </label>
	            </div>
	            <div class="form-check-inline">
	               <label class="form-check-label">
	                  <input type="radio" class="form-check-input" name="gender" value="other"> Other
	               </label>
	            </div>
		    </div>
		  </div>

		  <div class="mb-3 row">
		   <label for="exampleFormControlStream" class="col-sm-2 col-form-label">Stream</label>
		    <div class="col-sm-10">
		     	<select id="stream" name="stream" class="form-control">
                        <option value="">- Choose Stream -</option>
                        <option value="Computer">Computer</option>
                        <option value="Civil">Civil</option>
                        <option value="Mechanical">Mechanical</option>
                </select>
		    </div>
		  </div>

		  <div class="mb-3 row">
		   <label for="exampleFormControlSubject" class="col-sm-2 col-form-label">Subject</label>
		    <div class="col-sm-10">
		     	    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="subject[]" value="HTML"> HTML
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="subject[]" value="CSS"> CSS
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="subject[]" value="Javascript"> Javascript
                      </label>
                    </div>
		    </div>
		  </div>

		  <div class="mb-3 row">
		   <label for="exampleFormControlImage" class="col-sm-2 col-form-label">Image</label>
		    <div class="col-sm-10">
  				<input class="form-control" type="file" id="proimg" name="proimg">
		    </div>
		  </div>

      </div>
      <div class="modal-footer">
        <button type="button" name="save" class="btn btn-success" onclick="addstudent();"><i class="fas fa-user-plus"></i></button>
      </div>
  </form>
    </div>

  </div>
</div>

<!-- End Add New Data Modal -->

<div class="input-group">

<?php if ($this->session->userdata('auname')!="") {?>
  <input type="text" class="form-control" aria-label="username" aria-describedby="button-addon2" value="<?php echo $this->session->userdata('auname') ?>" disabled>


  <a class="btn btn-outline-danger" href="<?php echo base_url('adminlogout'); ?>" id="a-addon2"><i class="fas fa-sign-out-alt"></i></a>
 <?php }else{ ?>

  <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-dismiss="modal" data-bs-target="#loginStudentModal" ><i class="fas fa-sign-in-alt"></i></button>

<?php } ?>

<!-- Login Modal -->
<div class="modal fade" id="loginStudentModal" tabindex="-1" aria-labelledby="loginStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStudentModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
<form id="studentLoginIns" action="<?php echo base_url('adminlogck'); ?>" method="post">

      	  <div class="mb-3 row">
		   <label for="exampleFormControlUsername" class="col-sm-4 col-form-label">Username</label>
		    <div class="col-sm-8">
		     <input type="text" class="form-control" id="exampleFormControlUsername" name="username">
		    </div>
		  </div>

		  <div class="mb-3 row">
		   <label for="exampleFormControlPassword" class="col-sm-4 col-form-label">Password</label>
		    <div class="col-sm-8">
		     <input type="text" class="form-control" id="exampleFormControlPassword" name="password">
		    </div>
		  </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><i class="fas fa-sign-in-alt"></i></button>
      </div>
</form>
    </div>
  </div>
</div>


</div>


</div>


		</div>
	</div>


<script type="text/javascript">

/// Insert ///////
function addstudent(){
	var frm = $('#addStudent');
var formData = new FormData(frm[0]);
formData.append('proimg', document.getElementById("proimg").files[0]);
	$.ajax({
		url: '<?php echo base_url('insstudent'); ?>',
		type: 'POST',
		data: formData,
		processData: false,
       contentType: false,
		success:function(res){
			$("#addStudentModal").modal('hide');
		$("#contentdata").html(res);
		}
	});
}

/// Update ///////
function updstud(id){
var frm = $('#updateStudent');
var formData = new FormData(frm[0]);
formData.append('proimg',document.getElementById('proimg').files[0]);
	$.ajax({
		url: '<?php echo base_url('uins'); ?>',
		type: 'POST',
		data: formData,
		processData: false,
		contentType:false,
		success:function(res){
			
		$("#contentdata").html(res);
			window.location.reload();
		}
	});

}

/// Delete ///////
function delstud(id){

	if(window.confirm('Are you sure?')){
	
	$.ajax({
		url: '<?php echo base_url(); ?>delete/'+id,
		type: 'GET',
		data: {},
	
		success:function(res){
			
		$("#contentdata").html(res);

		}
	});
}
}
</script>
</body>
</html>
