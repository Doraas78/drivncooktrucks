/******************************************
 *
 * GENERAL VARIABLES
 *
 */

const htmlProblemServer = '<span class="font-italic ">Oops ! Un soucis est apparu avec le serveur.<br>Veuillez recommencer</span>'

const htmlNoOrders = '<span class="font-italic ">Aucune commandes à venir</span>';

const htmlNoEvents = '<span class="font-italic ">Aucun évènement à venir</span>';

const loadingSpan = '<div class="spinner-border text-dark btn_spinner_loading" role="status">' +
    '<span class="sr-only">Loading...</span>' +
    '</div>';

const messageDataSave = 'Vos données ont bien été enregistrées';

const alertSuccesDataSave = '<div class="alert alert-success alert-dismissible fade show d-flex justify-content-center alert_custom" role="alert">' +
    '<span><strong>Succèes ! </strong>' + messageDataSave + '</span>' +
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
    '<span aria-hidden="true">&times;</span>' +
    '</button>' +
    '</div>';

const messageNewslettersSend = 'Vos données ont bien été enregistrées';

const alertSuccesNewslettersSend = '<div class="alert alert-success alert-dismissible fade show d-flex justify-content-center alert_custom" role="alert">' +
    '<span><strong>Succèes ! </strong>' + messageNewslettersSend + '</span>' +
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
    '<span aria-hidden="true">&times;</span>' +
    '</button>' +
    '</div>';

const messageErrorWrongPassword = 'Le mot de passe est incorrect';
const alertErrorWrongPassword = '<div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center alert_custom" role="alert">' +
    '<span><strong>Oops ! </strong>' + messageErrorWrongPassword + '</span>' +
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
    '<span aria-hidden="true">&times;</span>' +
    '</button>' +
    '</div>';

const messageError = 'Une erreur est survenue !'

const alertError = '<div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center alert_custom" role="alert">' +
    '<span><strong>Oops ! </strong>' + messageError + '</span>' +
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
    '<span aria-hidden="true">&times;</span>' +
    '</button>' +
    '</div>';

var messageCustom = 'Oops ! Ces données sont les mêmes';

var alertMessageCustomInfo = '<div class="alert alert-info alert-dismissible fade show d-flex justify-content-center alert_custom" role="alert">' +
    '<span>' + messageCustom + '</span>' +
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
    '<span aria-hidden="true">&times;</span>' +
    '</button>' +
    '</div>';


const messagePasswordChanged = 'Le mot. de passe a été changé ! Vérifiez bien vos mails/spam';

const alertSuccesPasswordChanged = '<div class="alert alert-success alert-dismissible fade show d-flex justify-content-center alert_custom" role="alert">' +
    '<span><strong>Succèes ! </strong>' + messageDataSave + '</span>' +
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
    '<span aria-hidden="true">&times;</span>' +
    '</button>' +
    '</div>';

const loadingButton =   '<button class="btn btn-primary" id="loading_button" type="button" disabled>' +
    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
    '<span class="sr-only">Loading...</span>' +
    '</button>';

const formatDate = 'YYYY-MM-DDTHH:mm';
const formatDateTimeFrench = 'YYYY-MM-DD HH:mm';

const messageErrorWrongLogin = 'L\'email ou le mot de passe est incorrect !';
const alertErrorLogin = '<div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center alert_custom" role="alert">' +
    '<span><strong>Oops ! </strong>' + messageErrorWrongLogin + '</span>' +
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
    '<span aria-hidden="true">&times;</span>' +
    '</button>' +
    '</div>';

var global = 0;

/******************************************
 *
 * GENERAL FUNCTIONS
 *
 */

// Return a url
function url(platform, controller, action)
{
    return location.protocol + '//' + location.host + location.pathname + '?p=' + platform + '&c=' + controller + '&a=' + action;
}

// escape HTML characters
function escapeHtml(text) {

    if (typeof text !== 'undefined' && text !== null && text.length > 0) {

        let map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };

        return text.replace(/[&<>"']/g, function (m) {
            return map[m];
        });
    }

    return text;
}


/******************************************
 *
 * VALIDATION DEFAULT SETTINGS
 *
 */

// MESSAGES
jQuery.extend(jQuery.validator.messages, {
    required: "Ce champ doit être renseigné",
    remote: "votre message",
    email: "Veuillez insérer un email valide",
    url: "votre message",
    date: "Veuillez insérer une date valide",
    dateISO: "votre message",
    number: "Veuillez insérer un nombre valide",
    digits: "Ce champ est invalide",
    creditcard: "votre message",
    equalTo: "Veuillez insérer la même valeur",
    accept: "votre message",
    maxlength: jQuery.validator.format("Votre message doit être inférieur à {0} caractéres."),
    minlength: jQuery.validator.format("Votre message doit être supérieur à {0} caractéres."),
    rangelength: jQuery.validator.format("votre message  entre {0} et {1} caractéres."),
    range: jQuery.validator.format("votre message  entre {0} et {1}."),
    max: jQuery.validator.format("Ce champs doit être inférieur ou égal à {0}."),
    min: jQuery.validator.format("Ce champs doit être supérieur ou égal à {0}.")
});

function escapeRegExp(stringToGoIntoTheRegex) {
    if (stringToGoIntoTheRegex.length > 0) {
        return stringToGoIntoTheRegex.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
    }
}

/* VALIDATION METHODS CUSTOM */

$.validator.methods.email = function (value, element) {
    return /^[a-zA-Z][\w-]+@[a-z]+\.[a-z]+$/.test(value);
}


jQuery.validator.addMethod("datetime", function (value) {
    return moment(value, formatDate, true).isValid();
}, "Veuillez mettre une date valide");

jQuery.validator.addMethod("good_password_security", function (value) {
    return /^(?=.*[\d])(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%&*])[\w!@#$%&*]{8,20}$/.test(value);
}, "Le mot de passe doit comporter au moins : 1 caractère majuscules, 1 caractère minuscule, 1 chiffre et 1 caractères spéciale (!@#$%&*) et minimum 8 caractères");

jQuery.validator.addMethod("frenchLettersAndSpaceAndTiret86AndMinimum2", function (value, element) {
    return /^[\w-ÀÂÆÇÉÈÊËÎÏÔŒÙÛÜŸàâæçéèêëîïôœùûüÿ ]{2,}$/i.test(value);
}, "Ce champs n'est pas correct !");

jQuery.validator.addMethod("lettersAndSpaceAndTiret86AndMinimum2", function (value, element) {
    return /^[\w- ]{2,}$/i.test(value);
}, "Ce champs n'est pas correct !");

jQuery.validator.addMethod("lettersAndSpace", function (value, element) {
    return /^[a-zA-Z]{2,}$/i.test(value);
}, "Ce champs n'est pas correct !");

jQuery.validator.addMethod("frenchPhoneNumber", function (value, element) {
    return /^(?:(?:\+|00)33|0)\s*[1-9](?:[\s.-]*\d{2}){4}$/.test(value);
}, "Veuillez insérer un numéro correct");

jQuery.validator.addMethod("requiredValidCity", function (value, element) {
    return $('.choose_city').attr('value') !== undefined && $('.choose_city').attr('value') !== '';
}, "Veuillez choisir une ville valide");

moment.locale('fr'); // load date french format

jQuery.validator.addMethod("datetime", function (value) {
    return moment(value, formatDate, true).isValid();
}, "Veuillez mettre une date valide");


// SETTINGS
jQuery.validator.setDefaults({
    debug: false,
    errorClass: 'invalid-feedback',

    highlight: function (element) {
        $(element)
            .addClass('is-invalid');
    },

    unhighlight: function (element) {
        $(element)
            .removeClass('is-invalid');
    },
});

// DATATABLES SETTINGS

// HANDLEBARS SETTINGS

Handlebars.registerHelper("inc", function(value, options)
{
    return parseInt(value) + 1;
});


/* EVENT PAGE */

$('#events').ready(function () {

    /* pagination event */
    $('#all_events_container').ready(function () {

        let all_events_container = $('#events #all_events_container');
        all_events_container.append(loadingSpan);

        $.post(
            url('franchisee', 'Event', 'getAllValidEvents'),
            {},
            'json',
        )
        .done(function (result, status) {
            $('#events #all_events_container .btn_spinner_loading').remove();

            let data = JSON.parse(result)

            if(data.length <= 0) // if no data
            {
                all_events_container.append(htmlNoEvents);
            }else{

                let htmlCompiled = Handlebars.compile($('#template_table_all_events').html());
                all_events_container.append(htmlCompiled({
                        data: JSON.parse(result),
                    })
                );

                $('#table_all_events').DataTable( {
                    "pageLength": 5,
                    "lengthMenu": [ 5, 10, 15, 20, "Tous" ],
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    }
                });
            }
        })
        .fail(function (result, state) {

            all_events_container.append(htmlProblemServer);
        })

    })

    $('#my_events_container').ready(function () {

        let my_events_container = $('#events #my_events_container');
        my_events_container.append(loadingSpan);

        $.post(
            url('franchisee', 'Event', 'getMyEventsActionAndValid'),
            {

            },
            'json',
        )
            .done(function (result, status) {
                $('#events #my_events_container .btn_spinner_loading').remove();
                let data = JSON.parse(result);


                if(data.length <= 0) // if no data
                {
                    my_events_container.append(htmlNoEvents);

                }else{

                    let htmlCompiled = Handlebars.compile($('#template_table_my_events_container').html());
                    my_events_container.append(htmlCompiled({
                            data: JSON.parse(result),
                        })
                    );

                    $('#table_my_events_container').DataTable( {
                        "pageLength": 5,
                        "lengthMenu": [ 5, 10, 15, 20, "Tous" ],
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                        }
                    });
                }
            })
            .fail(function (result, state) {

                my_events_container.append(htmlProblemServer);
            })


    })

    $('#events_to_validate').ready(function () {

        let my_events_container = $('#events #events_to_validate');
        my_events_container.append(loadingSpan);

        $.post(
            url('franchisee', 'Event', 'getMyEventsActionAndInvalid'),
            {},
            'json',
        )
        .done(function (result, status) {
            $('#events #events_to_validate .btn_spinner_loading').remove();

            let data =JSON.parse(result)

            if(data.length <= 0)
            {
                my_events_container.append(htmlNoEvents);

            }
            else{

                let htmlCompiled = Handlebars.compile($('#template_table_events_to_validate').html());
                my_events_container.append(htmlCompiled({
                        data: JSON.parse(result),
                    })
                );

                $('#table_events_to_validate').DataTable( {
                    "pageLength": 5,
                    "lengthMenu": [ 5, 10, 15, 20, "Tous" ],
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    }
                });
            }
        })
        .fail(function (result, state) {

            my_events_container.append(htmlProblemServer);
        })
    })


    /* add event */

    $('#modal_add_event').on('shown.bs.modal', function () {

        // DATE
        let beginDate = $('#begin_date');
        let endDate = $('#end_date');
        let min = moment().hours('00').minutes('00');
        let max = moment().add(2, 'y');

        beginDate.val(min.format(formatDate));
        endDate.val(moment().hours(moment().hours()).minutes(moment().minutes()).format(formatDate));

        beginDate.attr("min", min.format(formatDate));
        beginDate.attr("max",max.format(formatDate));
        endDate.attr("max",max.format(formatDate));
        endDate.attr("min",moment().format(formatDate));

        // VALIDATION
        $("#form_add_event").validate({
            submitHandler: function() {
                add_event();
            },

            rules: {
                begin_date: {
                    min: min.format(formatDateTimeFrench),
                    max: max.format(formatDateTimeFrench),
                    datetime: true,
                    required: true,
                    normalizer: function( value ) {
                        return $.trim( value );
                    }
                },

                end_date: {
                    min: min.format(formatDateTimeFrench),
                    max: max.format(formatDateTimeFrench),
                    datetime: true,
                    required: true,
                    normalizer: function( value ) {
                        return $.trim( value );
                    }
                },

                name: {
                    required: true,
                    normalizer: function( value ) {
                        return $.trim( value );
                    }
                },

                number_of_guests: {
                    required: true,
                    digits: true,
                    normalizer: function( value ) {
                        return $.trim( value );
                    }
                },

                description: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                }

            }
        });

        // SUBMIT FUNCTION
        function add_event() {

            let button = $('#submit_add_event').replaceWith(loadingButton);

            $.post(
                url('franchisee', 'Event', 'addEvent'),
                {
                    begin_date: escapeHtml($('#modal_add_event #begin_date').val()),
                    end_date: escapeHtml( $('#modal_add_event #end_date').val()),
                    name: escapeHtml($('#modal_add_event #name').val()),
                    number_of_guests: escapeHtml($('#modal_add_event #number_of_guests').val()),
                    celebrity: escapeHtml($('#modal_add_event #celebrity').val()),
                    description: escapeHtml($('#modal_add_event #description').val()),
                    picture: escapeHtml( $('#modal_add_event #picture').val()),
                },
                'json'
            )
            .fail(function(result, status){
                $('#loading_button').replaceWith(button);
                $('#modal_add_event').prepend(alertError);
            })
            .done(function(result, status){

                if(result  !== 'false')
                {
                    $('#loading_button').replaceWith(button);
                    $('#modal_add_event').prepend(alertSuccesDataSave);
                }else{
                    $('#loading_button').replaceWith(button);
                    $('#modal_add_event').prepend(alertError);
                }
            })
        }
    });

})


/* DASHBOARD PAGE */

/* Newsletters */

$('#dashboard').ready(function () {

    $('#newslettersForm').ready(function () {

        let btn_newsletters_send = $('#btn_newsletters_send');

        $("#newslettersForm").validate({

            submitHandler: function () {
                newsSend();
            },

            rules: {
                message: {
                    required: true
                },
                subject: {
                    required: true
                },
            }
        });

        function newsSend(){
            btn_newsletters_send.append(loadingSpan);

            $.post(
               url('franchisee', 'Email', 'newslettersToCustomers'),
               {
                   subject: escapeHtml($('#newslettersForm #subject').val()),
                   message: escapeHtml($('#newslettersForm #message').val())
               },
               'json'
           )
           .fail(function(result, status){
               $('#newslettersForm .btn_spinner_loading').remove();
               $("#newslettersForm").append(alertError);
           })
           .done(function (result, status) {

               if(result === '1')
               {
                   $('#newslettersForm .btn_spinner_loading').remove();
                   $("#newslettersForm").append(alertSuccesNewslettersSend);
               }else{
                   $('#newslettersForm .btn_spinner_loading').remove();
                   $("#newslettersForm").append(alertError);
               }
           })
        }
    })
})

/* MY FOODTRUCK PAGE */

/* navigation */

$('#settings').ready(function () {

    $('#ul_settings a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    })

    /* Commands */

    let commands_container = $("#commands");

    $('#commands').ready(function () {

        commands_container.append(loadingSpan);

        $.post(
            url('franchisee', 'Orders', 'getFullOrders'),
            {},
            ''
        )
        .fail(function (result, status) {
            $('#commands .btn_spinner_loading').remove();
            commands_container.append(alertError);
        })

        .done(function (result, status) {

            $('#commands .btn_spinner_loading').remove();

            let data = JSON.parse(result)

            if(data === 0 && data === 'isNull') // if no data
            {
                commands_container.append(htmlProblemServer);
            }else if(data === 1)
            {
                commands_container.append(htmlNoOrders);
            }
            else{


                let htmlCompiled = Handlebars.compile($('#template_table_all_commands').html());
                commands_container.append(htmlCompiled({
                        data: JSON.parse(result),
                    })
                );

                $('#table_commands').DataTable( {
                    "pageLength": 5,
                    "lengthMenu": [ 5, 10, 15, 20, "Tous" ],
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    }
                });

                $('#settings .container_btn_status').click(function(e){


                    let global = $(this);

                    global.find('.status_btn').val(parseInt(global.find('.status_btn').val()) + 1);
                    let value_btn = parseInt(global.find('.status_btn').val());

                    switch (value_btn) {
                        case 2: // IN PROGRESS
                            global.find('.status_btn').removeClass('btn-danger');
                            global.find('.status_btn').addClass('btn-warning');
                            global.find('.status_btn').text('En cours');
                            break;
                        case 3: // DONE
                            global.find('.status_btn').removeClass('btn-warning');
                            global.find('.status_btn').addClass('btn-secondary');
                            global.find('.status_btn').text('Terminé');
                            break;
                        default:
                            break;
                    }


                })
            }
        })

    })

    $('#my_info').ready(function () {

        /* password changes */

        // VALIDATION
        $("#form_password_section").validate({

            submitHandler: function () {
                changePassword();
            },

            rules: {

                password: {
                    required: true,
                },

                new_password: {
                    required: true,
                    good_password_security: true,
                    maxlength: 20
                },

                check_new_password: {
                    equalTo: "#new_password"
                }
            }
        });

        // SUBMIT FUNCTION
        function changePassword() {

            let btn_save_password = $('#form_password_section .btn_save_password');

            btn_save_password.after(loadingSpan);
            btn_save_password.attr('disabled', true);

            $.post(
                url('franchisee', 'Employee', 'changePassword'),
                {
                    password: $('#form_password_section #password').val(),
                    new_password: $('#form_password_section #new_password').val(),
                },
                'json'
            )
                .fail(function (result, status) {
                    $('#my_info').prepend(alertError);
                    $('.btn_spinner_loading').remove();
                })
                .done(function (result, status) {

                     if (result == 'false') {
                        $('#my_info').prepend(alertErrorWrongPassword);
                        $('#my_info .btn_spinner_loading').remove();
                        btn_save_password.attr('disabled', false);
                        $("#form_password_section input[type=password]").val("");

                    } else {
                        $('#my_info').prepend(alertSuccesPasswordChanged)
                        $('.btn_spinner_loading').remove();
                        btn_save_password.attr('disabled', false);

                        $("#form_password_section input[type=password]").val("");

                    }
                })
        }

        /* email changes */

        // VALIDATION
        $("#form_email_section").validate({

            submitHandler: function () {
                changeEmail();
            },

            rules: {
                new_email: {
                    required: true,
                    email: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                }
            }
        });

        // SUBMIT FUNCTION
        function changeEmail() {


            if ($("#my_info #form_email_section #new_email").val() == $("#my_info #form_email_section #email").val()) {

                $('#my_info').after(alertMessageCustomInfo);

            } else {


                let btn_changed_email = $('#form_email_section .btn_save_email');

                btn_changed_email.after(loadingSpan);
                btn_changed_email.attr('disabled', true);

                $.post(
                    url('franchisee', 'Employee', 'changeEmail'),
                    {
                        new_email: $("#my_info #form_email_section #new_email").val(),
                    },
                    ''
                )
                    .fail(function (result, status) {

                        $('#my_info').prepend(alertError);
                        $('.btn_spinner_loading').remove();
                        btn_changed_email.attr('disabled', false);

                    })
                    .done(function (result, status) {

                        $('#my_info').prepend(alertSuccesDataSave);
                        $('.btn_spinner_loading').remove();
                        btn_changed_email.attr('disabled', false);

                        /*if(result == 'isNull')
                        {
                            window.location = url('Auth', 'auth', 'logout')
                        }else if(result == 'false')
                        {
                             $('#settings').prepend(alertError);

                        } else {
                            $('#settings').prepend(alertSuccesDataSave);

                        }*/
                    })
            }
        }
    })

})


