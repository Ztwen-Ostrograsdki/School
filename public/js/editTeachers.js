$('.onTag').removeClass('onTag')
$(function(){

	$('tr.onTag').removeClass('onTag')
	$.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    $('.openEditPersonalTeacherModal').click(function(){
    	$('.onTag').removeClass('onTag')
    	let tr = $(this).parent().prev().parent().parent().addClass('onTag')
    	let form = $(this).parent();
    	$('form.formEditGetData').submit(function(e){
			e.preventDefault()
			let that = $(e.currentTarget)
			$.ajax({
	            method: "GET",
	            url: $(that).attr('action'),
	            data: $(that).serialize(),
	            dataType: "json",
	            success: function(data){
	            	console.log(data.teacher, data.role, data.classe)
	            	if(data.teacher !== undefined){
	            		let d = data.teacher

	            		let teacher_id = $('form#formEditPersonalTeacher input[name=teacher_id]')
	            		let name = $('form#formEditPersonalTeacher input[name=name]')
	            		let email = $('form#formEditPersonalTeacher input[name=email]')
	            		let birth = $('form#formEditPersonalTeacher input[name=birth]')
	            		let contact = $('form#formEditPersonalTeacher input[name=contact]')
	            		let residence = $('form#formEditPersonalTeacher input[name=residence]')
	            		let subject = $('form#formEditPersonalTeacher select[name=subject_id]')
	            		let classe = $('form#formEditPersonalTeacher select[name=classe]')
	            		let role = $('form#formEditPersonalTeacher select[name=role]')
	            		let sexe = $('form#formEditPersonalTeacher select[name=sexe]')
	            		let month = $('form#formEditPersonalTeacher select[name=month]')
	            		let year = $('form#formEditPersonalTeacher select[name=year]')

	            		if(d.level == 'secondary'){
	            			classe.val(null)
	            			classe.parent().css({
	            				display: 'none'
	            			})
	            			subject.parent().css({
	            				width: '60%',
	            				display: 'block'
	            			})
	            			subject.val(d.subject_id)
	            		}
	            		else if (d.level == 'primary') {
	            			subject.val(null)
	            			subject.parent().css({
	            				display: 'none'
	            			})
	            			classe.parent().css({
	            				display: 'block',
	            				width: '60%'
	            			})
	            			classe.val(data.classe)
	            		}

	            		teacher_id.val(d.id)
	            		name.val(d.name)
	            		email.val(d.email)
	            		birth.val(d.birth)
	            		contact.val(d.contact)
	            		residence.val(d.residence)
		            	role.val(data.role)
		            	month.val(d.month)
		            	year.val(d.year)
		            	sexe.val(d.sexe)

	            	}

	            }
	        })
		})
    })

    let closeLink = $('#closeEditPersonalTeacherModal')

    let inputs =  document.querySelectorAll('form#formEditPersonalTeacher input')
    let selects =  document.querySelectorAll('form#formEditPersonalTeacher select')

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
    	$('#editPersonalTeacherModal').modal('hide')
    	$('.onTag').removeClass('onTag')
    })

    $('.openEditPersonalTeacherModal').click(function() {
        $('#editPersonalTeacherModal').modal()
    });

    $('form#formEditPersonalTeacher').submit(function(e){
		e.preventDefault()
		event.stopPropagation()
		let that = $(e.currentTarget)
		let id = $('form#formEditPersonalTeacher input[name=teacher_id]').val()
		$('input+small').removeClass('invalid-feedback')
		$('select+small').removeClass('invalid-feedback')
		$('input+small').text('')
		$('select+small').text('')
        $('input').removeClass('is-invalid')
        $('select').removeClass('is-invalid')
         
        $.ajax({
            method: $(that).attr('method'),
            url: "teachersm/upate&teachers&personal&data/id="+id+"/u="+true,
            data: $(that).serialize(),
            dataType: "json",
            success: function(data){
            	console.log(data.req)
                if (data.error !== undefined) {
                    errors = data.error
                    if(data.error.name !== undefined){
                        let n = $('form#formEditPersonalTeacher input[name=name]')
                        let er_n = n.next()
                        n.addClass('is-invalid')
                        er_n.addClass('invalid-feedback')
                        er_n.text(errors.name[0])
                    }
                    if(data.error.email !== undefined){
                        let em = $('form#formEditPersonalTeacher input[name=email]')
                        let er_em = em.next()
                        em.addClass('is-invalid')
                        er_em.addClass('invalid-feedback')
                        er_em.text(errors.email[0])
                    }

                    if(data.error.contact !== undefined){
                        let cont = $('form#formEditPersonalTeacher input[name=contact]')
                        let er_cont = cont.next()
                        cont.addClass('is-invalid')
                        er_cont.addClass('invalid-feedback')
                        er_cont.text(errors.contact[0])
                    }
                    if(data.error.residence !== undefined){
                        let res = $('form#formEditPersonalTeacher input[name=residence]')
                        let er_res = res.next()
                        res.addClass('is-invalid')
                        er_res.addClass('invalid-feedback')
                        er_res.text(errors.residence[0])
                    }
                    if(data.error.classe !== undefined){
                        let cl = $('form#formEditPersonalTeacher select[name=classe]')
                        let er_cl = cl.next()
                        cl.addClass('is-invalid')
                        er_cl.addClass('invalid-feedback')
                        er_cl.text(errors.classe[0])
                    }
                    if(data.error.sexe !== undefined){
                        let sex = $('form#formEditPersonalTeacher select[name=sexe]')
                        let er_sex = sex.next()
                        sex.addClass('is-invalid')
                        er_sex.addClass('invalid-feedback')
                        er_sex.text(errors.sexe[0])
                    }
                    if(data.error.birth !== undefined){
                        let b = $('form#formEditPersonalTeacher input[name=birth]')
                        let er_b = b.next()
                        b.addClass('is-invalid')
                        er_b.addClass('invalid-feedback')
                        er_b.text(errors.birth[0])

                    }
                    if(data.error.month !== undefined){
                        let mon = $('form#formEditPersonalTeacher select[name=month]')
                        let er_mon = mon.next()
                        mon.addClass('is-invalid')
                        er_mon.addClass('invalid-feedback')
                        er_mon.text(errors.month[0])
                    }
                    if(data.error.year !== undefined){
                        let yr = $('form#formEditPersonalTeacher select[name=year]')
                        let er_yr = yr.next()
                        yr.addClass('is-invalid')
                        er_yr.addClass('invalid-feedback')
                        er_yr.text(errors.year[0])
                    }
                    if(data.error.subject_id !== undefined){
                        let sub = $('form#formEditPersonalTeacher select[name=subject_id]')
                        let er_sub = sub.next()
                        sub.addClass('is-invalid')
                        er_sub.addClass('invalid-feedback')
                        er_sub.text(errors.subject_id[0])
                    }
                }
                else{
                	$('.onTag .td-name a').text(data.success.name)
                	$('.onTag .td-email').text(data.success.email)
                	$('.onTag .td-contact').text(data.success.contact)
                	$('.onTag .td-residence').text(data.success.residence)
                	$('.onTag .td-year').text(data.success.month+' '+data.success.year)
                	if(data.success.level == "secondary"){
                		$('.onTag .td-subject').text(data.subject)
                	}

                	$('.onTag').removeClass('onTag')
                	


                    $('#editPersonalTeacherModal').modal('hide');
                    for (var i = 0; i < inputs.length; i++) {
                        $(inputs[i]).removeClass('is-invalid')
                        $(inputs[i]).next().removeClass('invalid-feedback')
                    }

                    for (var i = 0; i < selects.length; i++) {
                        $(selects[i]).removeClass('is-invalid')
                        $(selects[i]).next().removeClass('invalid-feedback')
                    }


                    $('#succesModalEditTeacher').modal()
					$('#succesModalEditTeacher #succesModalImageAdmin').show('slide', {direction: 'up'}, 'slow')
	            }
	                
            }
        })
        
	})
})

