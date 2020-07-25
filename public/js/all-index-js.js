$(function(){
    let home_link_profil = $('.admin-profil')
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
	let open_search_admin = $('#search-admin-link')
	let form_search_admin = $('#form-admin-search')
	let close_search_admin = $('#search-admin-close')
    let input_search_admin = $('#form-admin-search input')

	open_search_admin.click(function(){
		$(this).hide('fade')
		form_search_admin.removeClass('d-none')
		form_search_admin.animate({
			width: '95%'
		}, 600)
		input_search_admin.animate({
			width: '70%'
		}, 600)
        close_search_admin.show('fade')
	})

    close_search_admin.click(function(){
        
        $(this).hide('fade')
        form_search_admin.animate({
            width: '0'
        }, 300)
        input_search_admin.animate({
            width: '0'
        }, 300)
        open_search_admin.show('fade')
        form_search_admin.addClass('d-none')
    })

})

$(function(){
    let open_admin_aside = $('#open-admin-aside')
    let admin_wrapper = $('#wrapper-admin')
    let admin_container = $('#admin-principal-container .first-div')

    open_admin_aside.click(function(){
        if(admin_wrapper.css('display') !== 'none'){
            admin_wrapper.toggle('slide', {direction: 'left'})
            admin_container.animate({
                opacity: '1'
            })
        }
        else{
            admin_wrapper.toggle('slide', {direction: 'left'})
            admin_container.animate({
                opacity: '0.5'
            })
        }
        
        
    })
})

//ANIMATION DE PERMUTATION DE ONGLETS USERS ET PARENTS

$(function(){
    let users_tag = $('#users-tag')
    let users_ch = $('#chevron-users')
    let parents_tag = $('#parents-tag')
    let parents_ch = $('#chevron-parents')


    parents_ch.click(function(){

        parents_tag.animate({
            width: '0px',
            opacity: '0'
        })
        parents_tag.hide()
        users_tag.show()
        users_tag.animate({
            width: '100%',
            opacity: '1'
        })
        

    })

    users_ch.click(function(){

        users_tag.animate({
            width: '0px',
            opacity: '0'
        })
        users_tag.hide()
        parents_tag.show()
        parents_tag.animate({
            width: '100%',
            opacity: '1'
        })
        

    })
})

//ANIMATION DE PERMUTATION DE ONGLETS SUP ET SECONDARY

$(function(){
    let sup_tag = $('#sup-tag')
    let sup_ch = $('#chevron-sup')
    let sec_tag = $('#sec-tag')
    let sec_ch = $('#chevron-sec')


    sec_ch.click(function(){

        sec_tag.animate({
            width: '0px',
            opacity: '0'
        })
        sec_tag.hide()
        sup_tag.animate({
            width: '100%',
            opacity: '1'
        },100 , function(){
            sup_tag.show('slide', {direction: 'right'})
        })

    })

    sup_ch.click(function(){

        sup_tag.animate({
            width: '0px',
            opacity: '0'
        })
        sup_tag.hide()
        sec_tag.animate({
            width: '100%',
            opacity: '1'
        },100 , function(){
            sec_tag.show('slide', {direction: 'right'})
        })

    })
})


// $(function(){
//     let input = $('#select-p-level')
//     let all = $('#all-tags')
//     let primary = $('#primary, #teachers')
//     let secondary = $('#secondary')

//     input.on('input', ()=>{
//         if(input.val() !== ""){
//             let val = input.val()
//             if(val == "primary" || val == "teachers"){
//                 all.hide('fade')
//                 secondary.hide('fade')
//                 primary.show('fade')
//             }
//             else if (val == "secondary") {
//                 all.hide('fade')
//                 primary.hide('fade')
//                 secondary.show('fade')
//             }
            
//         }
//         else{
//             all.show('fade')
//             primary.hide('fade')
//             secondary.hide('fade')
//         }
        
//     })
// })

// $("#successDeletePupilModal").modal()