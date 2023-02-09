const loader = document.createElement('div')
loader.classList.add('preloader')
loader.innerHTML = `<div class="lds-ring"><div></div><div></div><div></div><div></div></div>`
window.start_loader = function(){
    document.querySelectorAll('.preloader').forEach(el => { el.remove() })
    document.body.appendChild(loader)
}
window.end_loader = function(){
    document.querySelectorAll('.preloader').forEach(el => { el.remove() })
}
window.addEventListener("beforeunload", function(e){
    e.preventDefault()
    start_loader()
})
window.onload = function(e){
    e.preventDefault()
    end_loader()
}
var content_editor;
$(document).ready(function(){


/**
 * Close Form Modal
 */
$('#FormModal').on('hide.bs.modal', function(e){
    var _this = $(this)
    tinymce.remove("#content")
    _this.find('.modal-title').html("")
    _this.find('.modal-body').html("")
    _this.find('.submit-btn').attr("form", "")
})


$('#FormModal').on('shown.bs.modal', function(e){
    var _this = $(this)
    setTimeout(function(){

        tinymce.init({
            selector: '#content'
        });
    })

    
})
/**
 * Add New  Content
 * - opens the  Content form modal
 */
$('#add_new_content').click(function(e){
    e.preventDefault()
    var formModal = $('#FormModal')
    $.ajax({
        url:"modal_contents/manage_content.php",
        error:err => {
            console.error(err)
            alert("An error occurred while fetching the modal  Contents.")
        },
        success: function(resp){
            formModal.find('.modal-title').html("Create New  Content")
            formModal.find('.modal-body').html(resp)
            // formModal.find('.submit-btn').attr("form", "manage_content")
            formModal.modal('show')
            formModal.find('.submit-btn').click(function(evt){
                evt.preventDefault()
                formModal.find("form").submit()
            })
        }
    })
    
})


/**
 * Edit  Content
 */

$('.edit-content').click(function(e){
    e.preventDefault()
    var formModal = $('#FormModal')
    $.ajax({
        url:"modal_contents/manage_content.php",
        method:"POST",
        data:{id:$(this).attr('data-id')},
        error:err => {
            console.error(err)
            alert("An error occurred while fetching the modal  Contents.")
        },
        success: function(resp){
            formModal.find('.modal-title').html("Edit  Content Details")
            formModal.find('.modal-body').html(resp)
            // formModal.find('.submit-btn').attr("form", "manage_content")
            formModal.modal('show')
            formModal.find('.submit-btn').click(function(evt){
                evt.preventDefault()
                formModal.find("form").submit()
            })
        }
    })
    
})



    /**
     * Delete  Content
     */

    $('.delete-content').click(function(e){
        e.preventDefault()
        var id = $(this).attr('data-id')
        if(confirm(`Are you sure to delete this  Content? This action cannot be undone.`) === true){
            start_loader()

            $.ajax({
                url:"ajax-api.php?action=delete_content",
                method:"POST",
                data:{id: id},
                dataType:'json',
                error: err =>{
                    alert("Deleting  Content failed due to an error occurred.")
                    end_loader();
                    console.error(err)
                },
                success: function(resp){
                    if(typeof resp ==="object"){
                        if(resp.status == 'success'){
                            location.reload()
                        }else{
                            if(!!resp.error){
                                alert(resp.error)
                            }else{
                                alert("Deleting  Content failed due to an error occurred.")
                            }
                            end_loader();
                            console.error(resp)
                        }
                    }
                }
            })
        }
    })
})