$( document ).ready(function() {
    $('#current_password').focusout(function(){
        
      // console.log($('#current_password').val()); 
       $.ajax({
           type : 'post',
           url: '/admin/check-password',
           data: ({"_token": $('#current_password').data('csrf'),
                    "current_password": $('#current_password').val()
                }),
            dataType: 'JSON',
           success:function(result){
                if(result.status){
                    $('#checkPassword').removeClass('text-danger');
                    $('#checkPassword').addClass('text-success');
                    $('#checkPassword').text(result.msg);
                }else{
                    $('#checkPassword').removeClass('text-success');
                    $('#checkPassword').addClass('text-danger');
                    $('#checkPassword').html(result.msg);
                }
           },
           error:function(){

           }
       });
    });

    $('#confirm_password').keyup(function(){
        var confirm_password = $('#confirm_password').val();
        var new_password = $('#new_password').val();
        //console.log(new_password);
        if(new_password == confirm_password){
            $('#confirmPassword').removeClass('text-danger');
            $('#confirmPassword').addClass('text-success');
            $('#confirmPassword').text('New password and confirm password matched');    
        }else{
            $('#confirmPassword').removeClass('text-success');
            $('#confirmPassword').addClass('text-danger');
            $('#confirmPassword').html('New password and confirm password must be match');
        }
    });
});