$(function(){
 
    let inputs =  document.querySelectorAll('form#formLogin input')

    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('input', function(){
            $(this).removeClass('is-invalid')
            $(this).next().removeClass('invalid-feedback')
            $(this).next().html('')
        
        })
    }

    $('#login-link').click(function(){
        if($('#register-container').css('display') !== 'none'){
            $('#register-container').toggle('fade', function(){
                $('#login-container').toggle('slide', {direction: 'up'})
            })
        }
        else{
            $('#mask').toggle('slide', {direction: 'left'})
            $('#login-container').toggle('slide', {direction: 'up'})
        }
    })

    $('#cancel-login').click(function(){
        $('#mask').toggle('slide', {direction: 'left'})
        $('#login-container').toggle('slide', {direction: 'up'}, function(){
            for (var i = 0; i < inputs.length; i++) {
                $(inputs[i]).val('')
                $(inputs[i]).removeClass('is-invalid')
                $(inputs[i]).next().removeClass('invalid-feedback')
            }
        })
    })

	
})

