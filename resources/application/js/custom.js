import $ from 'jquery';

document.addEventListener("DOMContentLoaded",function(){    

    document.querySelectorAll('.pre-validate-btn').forEach((indexButton) => {
        indexButton.addEventListener('click', preValidateForm);
    });

    document.querySelectorAll('.ajaxJsonForm').forEach((ajForm) => {
        ajForm.addEventListener('reset', removeFieldErrorMsgs);
        ajForm.addEventListener('keypress', (e) => {
            if (e.keyCode === 13) {
               e.preventDefault();
            }
        });
    });

    document.querySelectorAll('.ajaxLinkPost').forEach((ajLink) => {
        ajLink.addEventListener('click', postAjaxLink);
    });


    // =============== JQuery Plugins ======================

    $('#myModal').modal({
        keyboard: false,
        show: false,
        backdrop: 'static'
    });

    $('#confirmationModal').modal({
        keyboard: false,
        show: false,
        backdrop: 'static'
    });

    $('.datatableNet').DataTable();
    $('.datatableNet_noOrdering').DataTable({
        "ordering": false,
    });
    $('.datatableNet_noOrdering_noPaging').DataTable({
        "ordering": false,
        "paging":   false,
    });

    tinymce.init({
        selector: '.basic-html-editor',
        //language: 'es',
        cleanup_on_startup: false,
        trim_span_elements: false,
        verify_html: false,
        cleanup: false,
        convert_urls: false,
        plugins: 'code',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        },
        init_instance_callback : function(editor) {
            editor.save();
        }
    });
    
    $('.select2').select2({
        width: '100%',
        theme: 'classic'
    });

});

const addLoadingMessage = function() {
    $('#myModal').modal('show');
};

const hideLoadingMessage = function() {
    setTimeout(function () {
        $('#myModal').modal('hide');
    }, 200);
};

const preValidateForm = function() {    

    let _form = this.form;
    let form = $(this).closest('form');    

    if (_form && _form.getAttribute('prevalidation')) {

        let formData = new FormData(document.getElementById(_form.getAttribute('id')));
        /*for (let pair of formData.entries()) {
            console.log(pair[0]+ ', ' + pair[1]);
        }*/

        $.ajax({
            url: _form.getAttribute('prevalidation'),
            method: "POST",
            data: formData,
            dataType: "json", 
            processData: false,
            contentType: false,           
            beforeSend: function (xhr) {
                addLoadingMessage();
                removeFieldErrorMsgs();
            }
        })
        .fail(function (errorResponse) {
            console.error(errorResponse);
            const errors = JSON.parse(errorResponse.responseText);

            if (errors['errors']) {
                $.each(errors['errors'], function (index, value) {
                    document.querySelector('#' + index).classList.add('is-invalid');
                    document.querySelector('#' + index + '_help_block').innerHTML = '<strong>' + value + '</strong>';
                });

                addMessage('error', 'Revise la información ingresada y vuelva a intentarlo.');
            } else {
                addMessage('error', 'Ha ocurrido un error. Por favor intente más tarde.');
            }
        })
        .done(function (jsonResponse) {
            console.log(jsonResponse);

            if (jsonResponse.responseType == 'success') {

                let confirmationModalBody = document.querySelector('#confirmationModalBody');
                confirmationModalBody.innerHTML = '';

                if (jsonResponse.messagesList) {

                    confirmationModalBody.innerHTML += '<p>';
                    confirmationModalBody.innerHTML += '<b>Consideraciones:</b>';

                    confirmationModalBody.innerHTML += '<br /><br />';

                    $.each(jsonResponse.messagesList, function (index, value) {
                        confirmationModalBody.innerHTML += ' - '+value+'<br />';
                    });
                    confirmationModalBody.innerHTML +='</p>';
                }

                confirmationModalBody.innerHTML +='<p>';
                confirmationModalBody.innerHTML +='<b>Seguro desea realizar esta acción?</b>';
                confirmationModalBody.innerHTML +='</p>';

                showConfirmationModal(function (confirm) {
                    if (confirm) {
                        addLoadingMessage();
                        form.submit();
                    }
                });
            }
        })
        .always(function () {
            hideLoadingMessage();
        });

    } else if (form) {
        showConfirmationModal(function (confirm) {
            if (confirm) {
                addLoadingMessage();
                form.submit();
            }
        });
    }

};

const showConfirmationModal = function(callback) {

    document.querySelector("#confirmBtnYes").addEventListener("click", () => {
        callback(true);
        $("#confirmationModal").modal('hide');
    });

    document.querySelector("#confirmBtnNo").addEventListener("click", () => {
        callback(false);
        $("#confirmationModal").modal('hide');
    });

    $('#confirmationModal').modal('show');

};

const removeFieldErrorMsgs = function() {
    $(".is-invalid").each(function(){
        $(this).removeClass("is-invalid");
    });
};

const setHtmlContent = function (divId, htmlContent, transitionTime) {
    $('#' + divId).hide();
    $('#' + divId).html(htmlContent);
    $('#' + divId).fadeIn(transitionTime);
};

const postAjaxLink = function() {

    let divId = $(this).attr("parent_div");

    let postData = {
        storagePath : '' + $(this).attr('input_storage_path') + '',
        _token : '' + $("input[name=_token]").val() + ''
    };

    console.log(postData);

    $.ajax({
        url: $(this).attr("href"),
        method: "POST",
        data: postData,
        dataType: "json",
        beforeSend: function( xhr ) {
            addLoadingMessage();
        }
    })
        .fail(function (errorResponse){
            console.error(errorResponse);
            const errors = JSON.parse(errorResponse.responseText);

            if (errors['errors']) {
                $.each(errors['errors'], function(index, value) {
                    $('#'+index).addClass('is-invalid');
                    $('#'+index+'_help_block').html('<strong>' + value + '</strong>').animate( { height: 'show' });
                });

                addMessage('error','Revise la información ingresada y vuelva a intentarlo.');
            }else {
                addMessage('error','Ha ocurrido un error. Por favor intente más tarde.');
            }

        })
        .done(function(jsonResponse) {
            console.log(jsonResponse);
            if (jsonResponse.vista) {
                setHtmlContent('ajax-container', jsonResponse.vista, 200);
                setHtmlContent('ajax-menu-dyn', jsonResponse.menu, 200);
                setHtmlContent('ajax-menu-min-dyn', jsonResponse.menu_min, 200);
            }

            if (jsonResponse.responseType) {
                addMessage(jsonResponse.responseType,jsonResponse.responseMessage);
            }

            $('#'+divId).remove();


        })
        .always(function() {
            setTimeout(function(){ hideLoadingMessage(); }, 200);
        });


    e.preventDefault();
};

const addMessage = function(messageType, messageContent) {

    let message = '';

    if (messageType == 'success') {
        message = '<div class="alert alert-success" role="alert">'+messageContent+'</div>';
    } else if (messageType == 'error') {
        message = '<div class="alert alert-danger" role="alert">'+messageContent+'</div>';
    } else if (messageType == 'info') {
        message = '<div class="alert alert-info" role="alert">'+messageContent+'</div>';
    }

    setHtmlContent('messages_div',
        message,
        200);
};



