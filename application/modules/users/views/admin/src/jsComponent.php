<!-- FOR DATATABLE -- START -->
<script src="<?php echo base_url();?>assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>

<!-- FOR FORM VALIDATION -->
<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/pages/scripts/form-validation.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<!-- AJAX FORM SUBMIT PLUGIN -->
<script src="http://malsup.github.com/jquery.form.js"></script> 

<script>


    $("#membersForm").validate({
        errorClass: "error-lavel",
    });
    
    $(document).ajaxStart( function() {  
        $("img#memberLoader").removeClass("display-hide"); 
    }).ajaxStop ( function(){ 
        setTimeout(function () {
            $("img#memberLoader").addClass("display-hide");
            $("html, body").animate({scrollTop: 0});
        }, 2000);       
    });

    function appendData(div,msg){
        $('div#'+div).css({ display: "block" });
        $('div#'+div).text(msg)
    }

    $(document).ready(function() { 
        $('#membersForm').ajaxForm({             
            success: function (data){
                var jData = JSON.parse(data);
                if(!jData.type) {    
                    appendData('errorMsg',jData.msg);
                } else {
                    appendData('successMsg',jData.msg);
                    $('#membersForm').resetForm();
                }                
            }
        });
    }); 

    
</script> 