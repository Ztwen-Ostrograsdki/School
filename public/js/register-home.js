
$(function(){

    let inputs =  document.querySelectorAll('form#formRegister input')

    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('input', function(){
            $(this).removeClass('is-invalid')
            $(this).next().removeClass('invalid-feedback')
            $(this).next().html('')
        
        })
    }
    
    $('#register-link-home, #register-link-home-sm').click(function() {
        $('#myModal').modal();
        if($('#myModal').css('display') !== "none"){
            
        }
        else{
            for (var i = 0; i < inputs.length; i++) {
                $(inputs[i]).val('')
                $(inputs[i]).removeClass('is-invalid')
                $(inputs[i]).next().removeClass('invalid-feedback')
            }
        }
    });


    if(window.location.pathname == '/register'){
        if($('#login-container').css('display') !== 'none'){
            $('#login-container').toggle('fade', function(){
                $('#register-container').toggle('slide', {direction: 'up'})
            })
        }
        else{
            $('#mask').toggle('slide', {direction: 'left'})
            $('#register-container-home').toggle('slide', {direction: 'up'})
        }
    }
    
    $('#cancel-register').click(function(){
        $('#mask').toggle('slide', {direction: 'left'})
        $('#register-container-home').toggle('slide', {direction: 'up'}, function(){
            for (var i = 0; i < inputs.length; i++) {
                $(inputs[i]).val('')
                $(inputs[i]).removeClass('is-invalid')
                $(inputs[i]).next().removeClass('invalid-feedback')
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
                    $('#myModal').modal('hide');
                    for (var i = 0; i < inputs.length; i++) {
                        $(inputs[i]).val('')
                        $(inputs[i]).removeClass('is-invalid')
                        $(inputs[i]).next().removeClass('invalid-feedback')
                    }

                    $('#succesModal').modal()
                    $('#succesModal #succesModalImage').show('slide', {direction: 'up'}, 'slow')
                }
            }
        })
        
	})
})


$(function(){
    let home_link_profil = $('a.home-link-profil, a.home-link-profil-sm')
    let profil_modal = $('.profil-modal')
    let home = $('#container-contents-home')



    home_link_profil.click(function(){

        if(profil_modal.css('display') !== 'none'){
            home.css({
                'opacity' : '1'
            })
            $(this).parent().parent().css({
                'opacity' : '1'
            })
        }
        else{
            home.css({
                'opacity' : '0.3'
            })
            $(this).parent().parent().css({
                'opacity' : '0.6'
            })
        }
        
        profil_modal.toggle('size', {direction: 'right'})
    })

    $(document).dblclick(function(e){
        if(e.target !== home_link_profil[0]){
            if(profil_modal.css('display') !== 'none'){
                if(!$(e.target).closest(".profil-modal").length){
                    profil_modal.hide('drop', {direction: 'right'}, function(){
                        home_link_profil.parent().parent().css({
                            'opacity' : '1'
                        })
                        home.css({
                            'opacity' : '1'
                        })
                    })
                }
                
            }
            
        }
    })



})

$(function(){

    let btn = $('#modal-home-nav-btn')
    let btn_i = $('#modal-home-nav-btn i')
    let btn_img = $('#modal-home-nav-btn img')
    let modal = $('.modal-home-nav')
    let school_shaker = $('#link-home-school-name')
    let home = $('#container-contents-home')


    school_shaker.hover(function(){
        $(this).toggle('puff', 'slow', {direction: 'right'})
    })
    
    btn.click(function(){
        if(modal.css('display') !== 'none'){
            home.css({
                'opacity' : '1'
            })
        }
        else{
            home.css({
                'opacity' : '0.3'
            })
        }
        btn_img.toggle('size')
        btn_i.toggle('slide', {direction: 'left'})
        modal.toggle('drop', {direction: 'left'})

        
    })

    
    $(document).dblclick(function(e){
        if(e.target !== btn[0]){
            if(modal.css('display') !== 'none'){
                if(!$(e.target).closest(".modal-home-nav").length){
                    btn_i.hide('size', {direction: 'up'})
                    btn_img.show('fade')
                    modal.hide('drop', {direction: 'left'}, function(){
                        home.css({
                            'opacity' : '1'
                        })

                    })
                }
                
            }
            
        }
    })
})

$(function() {   
    let menu_ul = $('.menu > li > ul')
    let menu_a  = $('.menu > li > a')

    menu_ul.hide()

    menu_a.click(function(e) {
        // e.preventDefault();
        if(!$(this).hasClass('activeLink')) {
            menu_a.removeClass('activeLink')
            menu_ul.filter(':visible').slideUp('normal')
            $(this).addClass('activeLink').next().stop(true, true).slideDown('normal')
        } 
        else {
            $(this).removeClass('activeLink')
            $(this).next().stop(true, true).slideUp('normal')
        }
    })

})

$(function(){

    let modal_profil_small_screen = $('.login-profil.profil-modal')
    let initial_width = $(window).width()
    let now_width

    let resizeTimer = false

    if(initial_width < 960){
        modal_profil_small_screen.css({
            top: '20px'
        })
    }
    

    $(window).resize(function(e){

        if(!resizeTimer){
            $(window).trigger('resizestart')
        }

        clearTimeout(resizeTimer)
        resizeTimer = setTimeout(function(){
            resizeTimer = false

            $(window).trigger('resizeend')
        }, 200)

        if(initial_width <  $(window).width()){
            if($(window).width() <= 960){
                modal_profil_small_screen.animate({
                    top: '20px'
                })
            }
            else if ($(window).width() >= 960) {
                modal_profil_small_screen.animate({
                    top: '100px'
                })
            }
            
            // console.log("augmentation de la largeur")
        }
        else{
            if($(window).width() <= 960){
                modal_profil_small_screen.animate({
                    top: '20px'
                })
            }
            else if ($(window).width() >= 960) {
                modal_profil_small_screen.animate({
                    top: '100px'
                })
            }
            // console.log("diminution de la taille")
        }
        
        
    }).on('resizeend', function(){
        initial_width = $(window).width()
        
    }).on('resizestart', function(){
        
    })



})

