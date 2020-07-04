$(function(){
    let inputs =  document.querySelectorAll('form#formRegister input')
    let helps =  document.querySelectorAll('form#formRegister .help-block')

    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('input', function(){
            $(this).removeClass('is-invalid')
            $(this).next().removeClass('invalid-feedback')
            $(this).next().html('')
        
        })
    }

    $(document).click(function(e){
        console.log(e.target, $('a#register-link')[0])
        if(e.target !== $('a#register-link')[0]){
            if($('#register-modal-dialog').parent().css('display') !== 'none'){
                if(!$(e.target).closest("#register-modal-dialog").length){
                    $('#modal-register-container').hide('slide', {direction: 'down'})
                    for (var i = 0; i < inputs.length; i++) {
                        $(inputs[i]).val('')
                        $(inputs[i]).removeClass('is-invalid')
                    }
                    for (var i = 0; i < helps.length; i++) {
                        $(helps[i]).html('')
                        $(helps[i]).removeClass('invalid-feedback')
                    }
                    
                }
            }
        }
        
        
    })


    if(window.location.pathname == '/register'){
        if($('#login-container').css('display') !== 'none'){
            $('#login-container').toggle('fade', function(){
                $('#modal-register-container').toggle('slide', {direction: 'up'})
            })
        }
        else{
            $('#modal-register-container').toggle('slide', {direction: 'up'})
        }
    }
    

    $('#register-link, #register-link-error').click(function(){
        if($('#login-container').css('display') !== 'none'){
            $('#login-container').toggle('fade', function(){
                $('#modal-register-container').toggle('slide', {direction: 'up'})
            })
        }
        else{
            $('#modal-register-container').toggle('slide', {direction: 'up'})
        }

    })

    $('#cancel-register').click(function(){
        $('#modal-register-container').toggle('slide', {direction: 'down'}, function(){
            for (var i = 0; i < inputs.length; i++) {
                $(inputs[i]).val('')
                $(inputs[i]).removeClass('is-invalid')
            }
            for (var i = 0; i < helps.length; i++) {
                $(helps[i]).html('')
                $(helps[i]).removeClass('invalid-feedback')
            }
        })
    })

	$('form#formRegister').submit(function(e){
		e.preventDefault()
		let that = $(e.currentTarget)
		$('input+small').text('');
        $('input').removeClass('is-invalid');
         
        $.ajax({
            method: $(that).attr('method'),
            url: $(that).attr('action'),
            data: $(that).serialize(),
            dataType: "json",
            success: function(data){
                if (data.error !== undefined) {
                    errors = data.error
                    if(data.error.name !== undefined){
                        let n = $('input[name=name]')
                        let er_n = n.next()
                        n.addClass('is-invalid')
                        er_n.addClass('invalid-feedback')
                        er_n.text(errors.name[0])
                    }
                    if(data.error.email !== undefined){
                        let em = $('input[name=email]')
                        let er_em = em.next()
                        em.addClass('is-invalid')
                        er_em.addClass('invalid-feedback')
                        er_em.text(errors.email[0])
                    }

                    if(data.error.password !== undefined){
                        let pwd = $('input[name=password]')
                        let er_pwd = pwd.next()
                        pwd.addClass('is-invalid')
                        er_pwd.addClass('invalid-feedback')
                        er_pwd.text(errors.password[0])
                    }
                    
                }
                else{

                    $('#modal-register-container').toggle('slide', {direction: 'up'}, function(){
                        for (var i = 0; i < inputs.length; i++) {
                            $(inputs[i]).val('')
                            $(inputs[i]).removeClass('is-invalid')
                        }
                        for (var i = 0; i < helps.length; i++) {
                            $(helps[i]).html('')
                            $(helps[i]).removeClass('invalid-feedback')
                        }
                        $('#login-link').removeClass('disabled')
                        $('#succesModal').modal()
                        $('#succesModal #succesModalImage').show('slide', {direction: 'up'}, 'slow')
                        
                    })
                    
                    
                }
            }
        })
        
	})
})






