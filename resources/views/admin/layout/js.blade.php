
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script type="text/javascript">
    window.processingHTML_Datatable = '<span class="spinner-border spinner-border-reverse align-self-center loader-lg text-success"></span>';
</script>
<!-- jQuery -->
<script src="{{ asset('admin_assets/assets/js/jquery-3.5.1.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('admin_assets/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('admin_assets/assets/js/bootstrap.min.js') }}"></script>

<!-- Feather Icon JS -->
<script src="{{ asset('admin_assets/assets/js/feather.min.js') }}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('admin_assets/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('admin_assets/assets/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
<script src="{{ asset('admin_assets/assets/plugins/sweetalerts/custom-sweetalert.js')}}"></script>



<script src="{{ asset('admin_assets/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/assets/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('admin_assets/assets/js/select2.min.js')}}"></script>
<script src="{{ asset('admin_assets/assets/js/moment.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{ asset('admin_assets/assets/js/script.js') }}"></script>
<script src="{{ asset('admin_assets/assets/js/bootstrap-datepicker.min.js')}}"></script> 


<!-- END GLOBAL MANDATORY SCRIPTS -->

<!----Add here global Js ----start----->
<script type="text/javascript" >
const toast = swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000,
					padding: '2em'
  			});
			
function showToastAlert(text1='Error', alerttype='error'){
		toast({
				type: alerttype,
				title: text1,
				padding: '2em',
	});
}
function showSweetAlert(text1='Completed',text2='Successfully Done', alerttype='1'){
		if(0==alerttype){  alerttype ="error";  } else if(1==alerttype) { alerttype ="success";  } else { alerttype ="question";  }
		swal(text1,text2,alerttype);
}

function isEmail(emailidgiven='') {
	 var regexemail = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(emailidgiven==''){  return true; }
	else
	{
  		return regexemail.test(emailidgiven);
	}
}

function showAlertInToast(res){
		if(res.success==1){
			showToastAlert(res.msg, alerttype='success');
		}
		else
		{
			showToastAlert(res.msg, alerttype='error');
		}
}

function showAlert(res){
		if(res.success==1){
			showSweetAlert("Completed",res.msg, res.success); 
		}
		else
		{
			showSweetAlert("Wrong",res.msg, res.success); 
		}
}

$(function () {
$(".allownumber").keypress(function (e) {
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) { return false;}
});
});
		
</script>

