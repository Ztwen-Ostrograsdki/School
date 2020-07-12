
$(function(){
    let closeLink = $('#closeNewTeacherTeacherRegisterModal')

    let inputs =  document.querySelectorAll('form#formRegisterNewTeacher input')
    let selects =  document.querySelectorAll('form#formRegisterNewTeacher select')

    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('input', function(){
            $(this).removeClass('is-invalid')
            $(this).next().removeClass('invalid-feedback')
            $(this).next().html('')
        
        })
    }

    for (var i = 0; i < selects.length; i++) {
        selects[i].addEventListener('input', function(){
            $(this).removeClass('is-invalid')
            $(this).next().removeClass('invalid-feedback')
            $(this).next().html('')
        
        })
    }

    closeLink.click(function(){
    	$('#newTeacherModal').modal('hide')
    })

    $('#addNewTeacher').click(function() {
        $('#newTeacherModal').modal()
    });
    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    $('form#formRegisterNewTeacher').submit(function(e){
		e.preventDefault()
		let that = $(e.currentTarget)
		if($('form#formRegisterNewTeacher select[name=level]').val() == ""){
			$('form#formRegisterNewTeacher select[name=level]').addClass('is-invalid')
			let er_lev = $('form#formRegisterNewTeacher select[name=level]').next()
			er_lev.addClass('invalid-feedback')
			er_lev.text('Ce champ est réquis')
		}
		else{

			let that = $(e.currentTarget)
			$('input+small').removeClass('invalid-feedback')
			$('select+small').removeClass('invalid-feedback')
			$('input+small').text('')
			$('select+small').text('')
	        $('input').removeClass('is-invalid')
	        $('select').removeClass('is-invalid')
	         
	        $.ajax({
	            method: $(that).attr('method'),
	            url: $(that).attr('action'),
	            data: $(that).serialize(),
	            dataType: "json",
	            success: function(data){
	            	
	                if (data.error !== undefined) {
	                    errors = data.error
	                    if(data.error.name !== undefined){
	                        let n = $('form#formRegisterNewTeacher input[name=name]')
	                        let er_n = n.next()
	                        n.addClass('is-invalid')
	                        er_n.addClass('invalid-feedback')
	                        er_n.text(errors.name[0])
	                    }
	                    if(data.error.email !== undefined){
	                        let em = $('form#formRegisterNewTeacher input[name=email]')
	                        let er_em = em.next()
	                        em.addClass('is-invalid')
	                        er_em.addClass('invalid-feedback')
	                        er_em.text(errors.email[0])
	                    }

	                    if(data.error.contact !== undefined){
	                        let cont = $('form#formRegisterNewTeacher input[name=contact]')
	                        let er_cont = cont.next()
	                        cont.addClass('is-invalid')
	                        er_cont.addClass('invalid-feedback')
	                        er_cont.text(errors.contact[0])
	                    }
	                    if(data.error.residence !== undefined){
	                        let res = $('form#formRegisterNewTeacher input[name=residence]')
	                        let er_res = res.next()
	                        res.addClass('is-invalid')
	                        er_res.addClass('invalid-feedback')
	                        er_res.text(errors.residence[0])
	                    }
	                    if(data.error.classe !== undefined){
	                        let cl = $('form#formRegisterNewTeacher select[name=classe]')
	                        let er_cl = cl.next()
	                        cl.addClass('is-invalid')
	                        er_cl.addClass('invalid-feedback')
	                        er_cl.text(errors.classe[0])
	                    }
	                    if(data.error.sexe !== undefined){
	                        let sex = $('form#formRegisterNewTeacher select[name=sexe]')
	                        let er_sex = sex.next()
	                        sex.addClass('is-invalid')
	                        er_sex.addClass('invalid-feedback')
	                        er_sex.text(errors.sexe[0])
	                    }
	                    if(data.error.level !== undefined){
	                        let lev = $('form#formRegisterNewTeacher select[name=level]')
	                        let er_lev = lev.next()
	                        lev.addClass('is-invalid')
	                        er_lev.addClass('invalid-feedback')
	                        er_lev.text(errors.level[0])
	                    }
	                    if(data.error.birth !== undefined){
	                        let b = $('form#formRegisterNewTeacher input[name=birth]')
	                        let er_b = b.next()
	                        b.addClass('is-invalid')
	                        er_b.addClass('invalid-feedback')
	                        er_b.text(errors.birth[0])

	                    }
	                    if(data.error.month !== undefined){
	                        let mon = $('form#formRegisterNewTeacher select[name=month]')
	                        let er_mon = mon.next()
	                        mon.addClass('is-invalid')
	                        er_mon.addClass('invalid-feedback')
	                        er_mon.text(errors.month[0])
	                    }
	                    if(data.error.year !== undefined){
	                        let yr = $('form#formRegisterNewTeacher select[name=year]')
	                        let er_yr = yr.next()
	                        yr.addClass('is-invalid')
	                        er_yr.addClass('invalid-feedback')
	                        er_yr.text(errors.year[0])
	                    }
	                    if(data.error.subject_id !== undefined){
	                        let sub = $('form#formRegisterNewTeacher select[name=subject_id]')
	                        let er_sub = sub.next()
	                        sub.addClass('is-invalid')
	                        er_sub.addClass('invalid-feedback')
	                        er_sub.text(errors.subject_id[0])
	                    }
	                }
	                else{

	                    $('#newTeacherModal').modal('hide');
	                    for (var i = 0; i < inputs.length; i++) {
	                        $(inputs[i]).val('')
	                        $(inputs[i]).removeClass('is-invalid')
	                        $(inputs[i]).next().removeClass('invalid-feedback')
	                    }

	                    for (var i = 0; i < selects.length; i++) {
	                        $(selects[i]).val('')
	                        $(selects[i]).removeClass('is-invalid')
	                        $(selects[i]).next().removeClass('invalid-feedback')
	                    }

	                    $('#succesModalNewTeacherRegistred').modal()
						$('#succesModal #succesModalImageAdmin').show('slide', {direction: 'up'}, 'slow')
		            }
		                
	            }
	        })

		}	
        
	})
})

