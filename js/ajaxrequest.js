$(document).ready(function(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    $("#semil").on("keypress blur",function(){
        var semail = $('#semail').val();
        $.ajax({
            url: 'student/addstudent.php',
            method: 'post',
            data: {
                semail: semail,
            },
            success: function (data) {
                console.log(data)
                if (data !== 0) {
                    $('#status2').html('<span style="color:red">Email is already used!</span>');
                    $('#status2').focus();
                    $("#ssign").attr("disabled",true);
                }
                else if(data == 0 && reg.test(semail)){
                    $("#ssign").attr("disabled",false);
                }
            },
        });
    })
})


function addStu() {
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var sname = $("#sname").val();
    var semail = $("#semail").val();
    var spassword = $("#spassword").val();

    if (sname.trim() == "") {
        $('#status1').html('<span style="color:red">Please enter name!</span>');
        $('#status1').focus();
        return false;
    }
    else if (semail.trim() == "") {
        $('#status2').html('<span style="color:red">Please enter email!</span>');
        $('#status2').focus();
        return false;
    }
    else if (semail.trim() != "" && !reg.test(semail)) {
        $('#status2').html('<span style="color:red">Please enter valid email!</span>');
        $('#status2').focus();
        return false;
    }
    else if (spassword.trim() == "") {
        $('#status3').html('<span style="color:red">Please enter password!</span>');
        $('#status3').focus();
        return false;
    }
    else {
        $.ajax({
            url: 'student/addstudent.php',
            method: 'POST',
            data: {
                sname: sname,
                semail: semail,
                spassword: spassword,
            },
            success: function (data) {
                if (data == 1) {
                    console.log("ihi");
                    $('#sms').html('<span class="alert alert-success">Registration Successful</span>');
                    $("#s").trigger("reset");
                    $("#status1").html(" ");
                    $("#status2").html(" ");
                    $("#status3").html(" ");
                }
                else if (data == 0) {
                    $('#sms').html('<span class="alert alert-danger">Registration Failed</span>');
                }
            },
        });
    }
}


function checklog(){
    var slemail = $("#slemail").val();
    var slpassword = $("#slpassword").val();
    
    $.ajax({
        url: 'student/addstudent.php',
        method: 'POST',
        data: {
            slemail: slemail,
            slpassword: slpassword,
        },
        success: function (data) {
            if (data == 0) {
                $('#slms').html('<span class="alert alert-danger">Invalid emailid and password</span>');
            }
            else if(data == 1){
                $('#slms').html('<div class="spinner-border text-success" role="status"></div>' );
                setTimeout(() => {
                    window.location.href = "index.php";
                }, 500);
            }
        },
    });
}

