<!-- Button trigger modal -->
<!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employeeModal"> Launch project_category modal</button-->

<!-- project_category Modal Starts -->

<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="employeeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employeeModalLabel">Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
      <form id="employee_formid">
        @csrf
        <input type="hidden" name="hid_employeeid" id="hid_employeeid" value="0">
        <div class="row">
          <div class="form-group col-md-6">
            <label>Select Designation *</label>
            <select class="form-control" name="employee_designation" id="employee_designation" required>
              <option value="" selected="selected">Select Designation</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label>Select Department *</label>
            <select class="form-control" name="employee_department" id="employee_department" required>
              <option value="" selected="selected">Select Department</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            <label>FirstName *</label>
            <input type="text" name="employee_firstname" class="form-control" id="employee_firstname" value="" placeholder="Enter First Name" required="required">
          </div>
          <div class="form-group col-md-4">
            <label>LastName *</label>
            <input type="text" name="employee_lastname" class="form-control" id="employee_lastname" value="" placeholder="Enter Last Name" required="required">
          </div>
          <div class="form-group col-md-4">
            <label>Email *</label>
            <input type="email" name="employee_email" class="form-control" id="employee_email" value="" placeholder="Enter Email Address" required="required">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-3">
            <label>Mobile</label>
            <input type="text" name="employee_mobile" class="form-control" maxlength="15" minlength="10" id="employee_mobile" value="" placeholder="Enter Mobile Number">
          </div>
          <div class="form-group col-md-3">
            <label>Password <span style="cursor:pointer" class="badge badge-primary float-right GenerateRandomPasswordClass" title="change password">Change</span></label>
            <input type="password" name="employee_password" class="form-control" id="employee_password" value="" placeholder="Enter Password">
          </div>
          <div class="form-group col-md-3">
            <label>Date of Birth *</label>
            <input type="date" name="employee_dob" class="form-control" id="employee_dob" value="" required="required">
          </div>
          <div class="form-group col-md-3">
            <label>Joining Date *</label>
            <input type="date" name="employee_joining_date" class="form-control" id="employee_joining_date" value="" required="required">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            <label>Gender *</label>
            <select class="form-control" name="employee_gender" id="employee_gender" required>
            @foreach(constants('gender') as $key => $value) 
              <option value="{{ $value }}">{{ $key }}</option>
            @endforeach
            </select>
          </div>
          <div class="form-group col-md-4">
            <label>Salary *</label>
            <input type="text" name="employee_salary" class="form-control allownumber" id="employee_salary" placeholder="salary" value="" maxlength="10" required>
          </div>
          <div class="form-group col-md-4">
            <label>Passport Number</label>
            <input type="text" name="employee_passport_number" class="form-control" id="employee_passport_number" value="" maxlength="250">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label>Profile Image [100 x 100] [upto 1MB]</label>
            <input type="file" name="employee_profile" class="form-control" id="employee_profile" accept="image/jpeg,image/jpg,image/gif,image/png,">
          </div>
          <input id="existing_employee_profile" name="existing_employee_profile" value="" type="hidden" />
          <div class="form-group col-md-6">
            <label>Passport Document [upto 5MB]</label>
            <input type="file" name="employee_passport_document" class="form-control" id="employee_passport_document">
          </div>
          <input id="existing_employee_passport_document" name="existing_employee_passport_document" value="" type="hidden" />
        </div>
        <div class="row">
          <div class="form-group col-md-12">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="employee_is_active" id="employee_is_active{{constants('is_active.active')}}" value="{{constants('is_active.active')}}" checked="">
              <label class="form-check-label" for="employee_is_active{{constants('is_active.active')}}"> Active </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="employee_is_active" id="employee_is_active{{constants('is_active.deactive')}}" value="{{constants('is_active.deactive')}}">
              <label class="form-check-label" for="employee_is_active{{constants('is_active.deactive')}}"> DeActive </label>
            </div>
          </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- project_category Modal Ends --> 
<!----Customer Add Snippet------starts------here------> 
<script type="text/javascript" >
$('body').on('submit', '#employee_formid',  function(e){
		e.preventDefault();
		var formData = new FormData(this);
        $("#employeeModal").modal('hide');
		
     	$.ajax({
            url: "{{ route('add-update-employee') }}",
            data :formData,
            type: 'post',
			processData: false,
			contentType: false,
            dataType: 'json',
            success: function (e) {
				showAlert(e); 
				if(typeof t1 !== "undefined"){ t1.draw(); } 
            },
			error: function(jqXHR, textStatus, errorThrown) {
                showSweetAlert('Something Went Wrong!','An error occurred, Please Refresh Page and Try again.', 0); 
            },
        });
  });

  function showEmployeeModal(idx=0){
	  $('#employee_designation,#employee_department').val(null).trigger('change');
	  $('#employee_formid')[0].reset();
	  $('#hid_employeeid').val(idx);
	  

	  if(idx==0){
		  $('#employee_password').prop('disabled', false);
		  $(".GenerateRandomPasswordClass").hide();
		  $('#employeeModalLabel').html('Add Employee');
		  $("#employeeModal").modal('show');
	  }
	  else if(idx>0){
		$('#employeeModalLabel').html('Edit Employee');
		$(".GenerateRandomPasswordClass").show();
		
     $.ajax({
            url: "{{ route('get-edit-employee-data') }}",
            data: {
              _token:'{{ csrf_token() }}',
              id: idx
            },
            type: 'get',
            dataType: 'json',
            success: function (data) {
				if (typeof data !== 'undefined' && data != null) {
				$("#employeeModal").modal('show');
				$('#hid_employeeid').val(data.id);
				$('#employee_firstname').val(data.firstname);	
				$('#employee_lastname').val(data.lastname);
				$('#employee_mobile').val(data.mobile);
				$('#employee_email').val(data.email);
				$('#employee_passport_number').val(data.passport_number);
				$('#employee_password').val(123456789).prop('disabled', true);
				$('#employee_dob').val(data.dob);
				$('#employee_joining_date').val(data.joining_date);
				$('#employee_gender').val(data.gender);
				$('#employee_salary').val(data.salary);
				$('#existing_employee_passport_document').val(data.passport_document);
				$('#existing_employee_profile').val(data.profile);
				$('#employee_designation').html("<option value="+data.designation_id+">"+data.designation.title+"</option>");
				$('#employee_department').html("<option value="+data.department_id+">"+data.department.title+"</option>");
				$('#employee_is_active'+data.is_active).prop('checked', true);
				
				}
            },
			error: function(jqXHR, textStatus, errorThrown) {
               showSweetAlert('Something Went Wrong!','An error occurred, Please Refresh Page and Try again.', 0); 
            },
        });
		}
  }






var employee_designation = $("#employee_designation").select2({
    		placeholder: "Select A Designation ",
    		width:"100%",
                ajax: {
					url: "{{ route('getDesignationInDropdown') }}",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                     data: function (params) {
                        return {
                            searchTerm: params.term ,
							_token:'{{ csrf_token() }}',
							'includeid': 0,
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
 });

 

var employee_department = $("#employee_department").select2({
    		placeholder: "Select A Department ",
    		width:"100%",
                ajax: {
					url: "{{ route('getDepartmentInDropdown') }}",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                     data: function (params) {
                        return {
                            searchTerm: params.term ,
							_token:'{{ csrf_token() }}',
							'includeid': 0,
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
 });


$('body').on('click', '.GenerateRandomPasswordClass', function () {
	 $('#employee_password').val('').prop('disabled', false);
});
</script> 
<!----Customer Add Snippet------ends------here------>