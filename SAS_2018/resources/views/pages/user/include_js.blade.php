<!-- Bootstrap core JavaScript -->
<script src="/USERTEMP/vendor/jquery/jquery.min.js"></script>
<script src="/USERTEMP/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="/USERTEMP/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- DatePicker -->
<script src="/ADMINLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="/ADMINLTE/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<!-- Select2 -->
<script src="/ADMINLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- Contact form JavaScript -->
<script src="/USERTEMP/js/jqBootstrapValidation.js"></script>
<script src="/USERTEMP/js/contact_me.js"></script>

<!-- Custom scripts for this template -->
<script src="/USERTEMP/js/agency.min.js"></script>

<script>
    $('#inputDate').datepicker({
        format: 'yyyy-mm-dd',
    });

    $('.timepicker').timepicker();

    $('.select2').select2();
</script>

<script>
    function validateMyForm(){
        var aTime = document.getElementById('inputTime').value;
        var array1 = aTime.split("");
        var newTime;
        if(array1.length == 7){
            if(array1[5]=="A"){
                var h = "0"+array1[0];
                var m = array1[2]+array1[3];
                newTime = h + ":" + m  + ":00";
            }
            if(array1[5]=="P"){
                var h = parseInt(array1[0])+12;
                var m = array1[2]+array1[3];
                newTime = h + ":" + m  + ":00";
            }
        }
        if(array1.length == 8){
            if(array1[6]=="A"){
                var h = parseInt(array1[0]+array1[1]);
                var m;
                if(h == 12){
                    m = array1[3]+array1[4];
                    newTime = "00" + ":" + m + ":00";
                }
                else{
                    m = array1[3]+array1[4];
                    newTime = h + ":" + m + ":00";
                }
            }
            if(array1[6]=="P"){
                var h = parseInt(array1[0]+array1[1]);
                if(h < 12){
                    h = h + 12;
                }
                var m = array1[3]+array1[4];
                newTime = h + ":" + m + ":00";
            }
        }
        document.getElementById('inputTime').value = newTime;
        $('#new-package-modal').modal('show');
        return false;
    }

    function superSubmit(){
        document.getElementById("ismForm").submit();
    }

</script>