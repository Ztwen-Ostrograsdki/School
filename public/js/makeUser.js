$(function(){

    let inputs =  document.querySelectorAll('form#formRegisterUser input')
    let closeLink = $('#closeCreateUserModal')

    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('input', function(){
            $(this).removeClass('is-invalid')
            $(this).next().removeClass('invalid-feedback')
            $(this).next().html('')
        
        })
    }

    closeLink.click(function(){
        $('#createUserModal').modal('hide')
         for (var i = 0; i < inputs.length; i++) {
            $(inputs[i]).val('')
            $(inputs[i]).removeClass('is-invalid')
            $(inputs[i]).next().removeClass('invalid-feedback')
        }
    })
    
    $('#makeUserLink').click(function() {
        $('#createUserModal').modal();
        if($('#createUserModal').css('display') !== "none"){
            
        }
        else{
            for (var i = 0; i < inputs.length; i++) {
                $(inputs[i]).val('')
                $(inputs[i]).removeClass('is-invalid')
                $(inputs[i]).next().removeClass('invalid-feedback')
            }
        }
    });

    if($('#createUserModal').css('display') !== "none"){
        
    }
    else{
        for (var i = 0; i < inputs.length; i++) {
            $(inputs[i]).val('')
            $(inputs[i]).removeClass('is-invalid')
            $(inputs[i]).next().removeClass('invalid-feedback')
        }
    }
    

    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    $('form#formRegisterUser').submit(function(e){
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
                console.log(data)
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
                    
                }
                else{
                    $('#createUserModal').modal('hide');
                    for (var i = 0; i < inputs.length; i++) {
                        $(inputs[i]).val('')
                        $(inputs[i]).removeClass('is-invalid')
                        $(inputs[i]).next().removeClass('invalid-feedback')
                    }

                    $('#successUserCreateModal').modal()
                    $('#succesModal #succesModalImage').show('slide', {direction: 'up'}, 'slow')
                }
            }
        })
        
    })
})
