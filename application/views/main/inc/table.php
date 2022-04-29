<?php if ($this->session->flashdata('delete')!="") :?>
<div class="alert alert-danger" role="alert">
  <?php echo $this->session->flashdata('delete'); ?>
</div>
<?php endif; ?>

<?php if ($this->session->flashdata('updated')!="") :?>
<div class="alert alert-success" role="alert">
  <?php echo $this->session->flashdata('updated'); ?>
</div>
<?php endif; ?>


<?php if ($this->session->flashdata('login_error')!="") :?>
<div class="alert alert-danger" role="alert">
  <?php echo $this->session->flashdata('login_error'); ?>
</div>
<?php endif; ?>

<?php if ($this->session->flashdata('login_success')!="") :?>
<div class="alert alert-success" role="alert">
  <?php echo $this->session->flashdata('login_success'); ?>
</div>
<?php endif; ?>

<table class="table table-bordered" id="studentTable">
	<thead>
		<tr>
			<th>Name</th>
			<th>Picture</th>
			<th>Gender</th>
			<th>Trade</th>
			<th>Subject</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($row as $r) { $s=explode(",", $r->student_subject); ?>

		<tr>
			<td><?php echo $r->student_name; ?></td>
			<td><img src="<?php echo base_url(); ?>upload_img/<?php echo $r->student_image; ?>" style="width:80px;"></td>
			<td><?php echo $r->student_gender; ?></td>
			<td><?php echo $r->student_stream; ?></td>
			<td><?php echo $r->student_subject; ?></td>

<?php if ($this->session->userdata('auname')!="") {?>
			<td class="d-flex align-items-center justify-content-evenly">

<!-- Update Modal -->
<div class="modal fade" id="updStudentModal<?php echo $r->student_id; ?>" tabindex="-1" aria-labelledby="updStudentModal<?php echo $r->student_id; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updStudentModalLabel">Update Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      	
<form id="updateStudent">
		<input type="hidden" name="sid" value="<?php echo $r->student_id; ?>">
		  <div class="mb-3 row">
		   <label for="exampleFormControlName" class="col-sm-2 col-form-label">Name</label>
		    <div class="col-sm-10">
		     <input type="text" class="form-control" id="exampleFormControlName" name="name" value="<?php echo $r->student_name; ?>">
		    </div>
		  </div>

		  <div class="mb-3 row">
		   <label for="exampleFormControlGender" class="col-sm-2 col-form-label">Gender</label>
		    <div class="col-sm-10 align-items-center">
			    <div class="form-check-inline">
	              <label class="form-check-label">
	                  <input type="radio" class="form-check-input" name="gender" <?php if($r->student_gender=="Male"){echo "Checked";} ?> value="Male"> Male
	              </label>
	           </div>
	           <div class="form-check-inline">
	               <label class="form-check-label">
	                  <input type="radio" class="form-check-input" name="gender" <?php if($r->student_gender=="Female"){echo "Checked";} ?> value="Female"> Female
	                </label>
	            </div>
	            <div class="form-check-inline">
	               <label class="form-check-label">
	                  <input type="radio" class="form-check-input" name="gender" <?php if($r->student_gender=="other"){echo "Checked";} ?> value="other"> Other
	               </label>
	            </div>
		    </div>
		  </div>

		  <div class="mb-3 row">
		   <label for="exampleFormControlStream" class="col-sm-2 col-form-label">Stream</label>
		    <div class="col-sm-10">
		     	<select id="stream" name="stream" class="form-control">
                   <option <?php if($r->student_stream==""){echo "selected";} ?> value="">- Choose Stream -</option>
                   <option <?php if($r->student_stream=="Computer"){echo "selected";} ?> value="Computer">Computer</option>
                   <option <?php if($r->student_stream=="Civil"){echo "selected";} ?> value="Civil">Civil</option>
                   <option <?php if($r->student_stream=="Mechanical"){echo "selected";} ?> value="Mechanical">Mechanical</option>
                </select>
		    </div>
		  </div>

		  <div class="mb-3 row">
		   <label for="exampleFormControlSubject" class="col-sm-2 col-form-label">Subject</label>
		    <div class="col-sm-10">
		     	    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" <?php if(in_array("HTML",$s)){echo "checked";} ?> name="subject[]" value="HTML"> HTML
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" <?php if(in_array("CSS",$s)){echo "checked";} ?> name="subject[]" value="CSS"> CSS
                      </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" <?php if(in_array("Javascript",$s)){echo "checked";} ?> name="subject[]" value="Javascript"> Javascript
                      </label>
                    </div>
		    </div>
		  </div>

		  <div class="mb-3 row">
		   <label for="exampleFormControlImage" class="col-sm-2 col-form-label">Image</label>
		   	<div class="col-sm-4">
  				<img src="<?php echo base_url(); ?>upload_img/<?php echo $r->student_image; ?>" alt="" style="width: 80px;">
		    </div>
		    <div class="col-sm-6">
  				<input class="form-control" type="file" id="formFile" name="proimg">
		    </div>
		  </div>

      </div>
      <div class="modal-footer">
        <button type="button" onclick="updstud(<?php echo $r->student_id; ?>)" class="btn btn-success"><i class="fas fa-pen-alt"></i></button>
      </div>
  </form>


      </div>
    </div>
  </div>
</div>
				<button class="btn btn-success rounded-pill" type="button" data-bs-toggle="modal" data-dismiss="modal" data-bs-target="#updStudentModal<?php echo $r->student_id; ?>"><i class="fas fa-user-check"></i></button>

				<button class="btn btn-danger rounded-pill" onclick="delstud(<?php echo $r->student_id; ?>);"><i class="fas fa-user-minus"></i></button>
			</td> <?php } else{?>
				<td>Login To Get Access</td>
			<?php } ?>
		</tr>
	<?php } ?>
	</tbody>
</table>
