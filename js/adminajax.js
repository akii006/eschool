function alog(){
    var alemail = $("#alemail").val();
    var alpassword = $("#alpassword").val();
    
    $.ajax({
        url: 'admin/admin.php',
        method: 'POST',
        data: {
            alemail: alemail,
            alpassword: alpassword,
        },
        success: function (data) {
            console.log(data)
            if (data == 0) {
                $('#alms').html('<span class="alert alert-danger">Invalid emailid and password</span>');
            }
            else if(data == 1){
                $('#alms').html('<div class="spinner-border text-success" role="status"></div>' );
                setTimeout(() => {
                    window.location.href = "admin/admin_dashbord.php";
                }, 500);
            }
        },
    });
}