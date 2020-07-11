/******************************************
 *
 * GENERAL VARIABLES
 *
 */

const htmlProblemServer = '<span class="font-italic ">Oops ! Un soucis est apparu avec le serveur.<br>Veuillez recommencer</span>'

const htmlNoEvents = '<span class="font-italic ">Aucun évènement à venir</span>';

const htmlNoTrucks ='<span class="font-italic ">Aucun camions existant</span>';


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

const messageError = 'Une erreur est survenue !'

const alertError = '<div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center alert_custom" role="alert">' +
                        '<span><strong>Oops ! </strong>' + messageError + '</span>' +
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

jQuery.validator.addMethod("good_password_security", function (value) {
    return /^(?=.*[\d])(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%&*])[\w!@#$%&*]{8,20}$/.test(value);
}, "Le mot de passe doit comporter au moins : 1 caractère majuscules, 1 caractère minuscule, 1 chiffre et 1 caractères spéciale (!@#$%&*) et minimum 8 caractères");


jQuery.validator.addMethod("datetime", function (value) {
    return moment(value, formatDate, true).isValid();
}, "Veuillez mettre une date valide");

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

jQuery.validator.addMethod("onDatalist", function (value, element) {
    let hiddenVal = parseInt($(element).siblings('input.hiddenVal').val());
    return !!(hiddenVal);
}, "Veuillez selectionner une valeur correct");


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

jQuery.validator.addClassRules(
    "validateOnDatalist",
    { onDatalist: true }
);

// HANDLEBARS SETTINGS

Handlebars.registerHelper("inc", function(value, options)
{
    return parseInt(value) + 1;
});

/******************************************
 *
 * MAIN
 *
 */


/* PROFIL PAGE */

$('#profil').ready(function () {

    let city_id = parseInt($('#cityInputHidden').val());

    /* select the id of the city chosen */
    $('input[list]').change(function(e) {

        let cityInputHidden = $('#cityInputHidden');

        let selectedOption = $("#citiesList option[data-value='" + escapeHtml($(this).val()) + "']");
        let selectedCity = parseInt(selectedOption.attr('data-id'));

        if (selectedCity) {
            cityInputHidden.val(selectedCity);
        } else {
            cityInputHidden.val('');
        }
        city_id = cityInputHidden.val();
    });

    $("#container_infos_user").validate({
        submitHandler: function() {
            changesInfosEmployee();
        },

        rules: {

            email: {
                required: true,
                email: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
                maxlength: 80
            },

            number: {
                required: true,
                number: true,
                normalizer: function (value) {
                    return $.trim(value);
                }
            },

            type_of_road: {
                required: true,
                lettersAndSpace: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
                maxlength: 30
            },

            street: {
                required: true,
                lettersAndSpaceAndTiret86AndMinimum2: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
                maxlength: 255
            },

            city: {
                required: true,
            },

            first_name: {
                required: true,
                frenchLettersAndSpaceAndTiret86AndMinimum2: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
                maxlength: 80
            },

            last_name: {
                required: true,
                frenchLettersAndSpaceAndTiret86AndMinimum2: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
                maxlength: 80
            },

            phone: {
                required: true,
                frenchPhoneNumber: true,
                normalizer: function (value) {
                    return $.trim(value);
                }
            },
        }
    });

    function changesInfosEmployee() {
        let idAddressArray = $("div[id^='id_address_']").attr('id') // search id begin with this string
        idAddressArray =  idAddressArray.split('_');
        let idAddress = idAddressArray[idAddressArray.length - 1] // get the id in the last index of array

        let submit_infos_user = $('#container_infos_user #submit_infos_user');
        submit_infos_user.after(loadingSpan); // load icon
        submit_infos_user.attr('disabled', true)

        $.post(
            url('admin', 'Profil', 'updateEmployeeFewInfos'),
            {
                first_name : escapeHtml($('#first_name').val()),
                last_name : escapeHtml($('#last_name').val()),
                email : escapeHtml($('#email').val()),
                number : escapeHtml($('#number').val()),
                type_of_road : escapeHtml($('#type_of_road').val()),
                street : escapeHtml($('#street').val()),
                city: escapeHtml(city_id),
                id_address: escapeHtml(idAddress),
                phone : escapeHtml($('#phone').val()),
            },
            'json'
        )
            .fail(function (result, status) {
                $('#here').html(result)

            })
            .done(function (result, status) {
               if(result !== "false")
               {
                   $(' #container_infos_user .btn_spinner_loading').remove();
                   $('#container_infos_user').prepend(alertSuccesDataSave);
                   submit_infos_user.removeAttr('disabled');
               }
                else{
                   $(' #container_infos_user .btn_spinner_loading').remove();
                   $('#container_infos_user').prepend(alertError);
                   submit_infos_user.removeAttr('disabled');
               }

            })

        /*$(' #container_infos_user .btn_spinner_loading').remove();
        $('#container_infos_user').prepend(alertError);
        submit_infos_user.removeAttr('disabled');*/

    }

    $("#form_container_password").validate({
        submitHandler: function() {
            changesPasswordEmployee();
        },

        rules: {

            password: {
                required: true,
                maxlength: 80
            },

            new_password: {
                required: true,
                good_password_security: true,
                maxlength: 80
            },

            check_new_password: {
                equalTo: "#new_password"
            }
        }
    });


    function changesPasswordEmployee()
    {

        let submit_password_btn = $('#form_container_password #submit_password_btn');
        submit_password_btn.after(loadingSpan); // load icon
        submit_password_btn.attr('disabled', true)

        $.post(
            url('admin', 'Profil', 'changePassword'),
            {
                password: $('#password').val(),
                new_password: $('#new_password').val()
            },
            'json'
        )
        .done(function (result, status) {

            if(result !== 'false')
            {
                $(' #form_container_password .btn_spinner_loading').remove();
                $('#form_container_password').prepend(alertSuccesDataSave);
                submit_password_btn.removeAttr('disabled');
            }else {
                $(' #form_container_password .btn_spinner_loading').remove();
                $('#form_container_password').prepend(alertError);
                submit_password_btn.removeAttr('disabled');
            }
        })
        .fail(function (result, status) {
            $(' #form_container_password .btn_spinner_loading').remove();
            $('#form_container_password').prepend(alertError);
            submit_password_btn.removeAttr('disabled');
        })
    }

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

                $('#loading_button').replaceWith(button);
                $('#modal_add_event').prepend(alertSuccesDataSave);
        })
    }
});



/* EVENTS */

$('#events').ready(function () {

    /* pagination event */
    $('#all_events_container_id').ready(function () {

        let all_events_container = $('#events #all_events_container_id');
        all_events_container.append(loadingSpan);

        $.post(
            url('admin', 'Event', 'getAllValidEvents'),
            {},
            'json',
        )
        .done(function (result, status) {
            $('#events #all_events_container_id .btn_spinner_loading').remove();

            let data = JSON.parse(result)

            if(data.length <= 0) // if no data
            {
                all_events_container.append(htmlNoEvents);

            }else{

                let htmlCompiled = Handlebars.compile($('#template_all_events_table').html());
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


    $('#events_to_validate').ready(function () {

        let my_events_container = $('#events #events_to_validate');
        my_events_container.append(loadingSpan);

        $.post(
            url('franchisee', 'Event', 'getAllInvalidEvents'),
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

                    let htmlCompiled = Handlebars.compile($('#template_all_invalid_events_table').html());
                    my_events_container.append(htmlCompiled({
                            data: JSON.parse(result),
                        })
                    );

                    $('#invalid_events_table').DataTable( {
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


                if(result !== 'false')
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


/* CONNECTION PAGE FORM VALIDATION */

$('#connection').ready(function () {

// VALIDATION
    $("#connectionForm").validate({

        submitHandler: function () {
            connection();
        },

        rules: {
            email: {
                required: true,
                email: true,
                normalizer: function (value) {
                    return $.trim(value);
                }
            },

            password: {
                required: true,
            },
        }
    });

    // SUBMIT FUNCTION
    function connection() {

        let btn_connection_form = $('#connection .btn_connection_form');

        btn_connection_form.after(loadingSpan); // load icon
        btn_connection_form.attr('disabled', true)

        $.post(
            url('auth', 'Auth', 'login'),
            {
                email: escapeHtml($('#connection #email').val()),
                password: escapeHtml($('#connection #password').val()),
            },
            'json'
        )
        .fail(function (result, status) {
        })
        .done(function (result, status) {

            $('#connection .btn_spinner_loading').remove();
            btn_connection_form.attr('disabled', false)

            console.log(result)

            if (result === '0') { // if login wrong
                $('.btn_spinner_loading').remove();
                $('#connection').prepend(alertErrorLogin);
                btn_connection_form.removeAttr('disabled');

            } else if(result === '1') { // if login right and user is admin

                btn_connection_form.removeAttr('disabled');
                window.location = url('admin', 'Home', 'index');

            } else if(result === '2'){ // if login right and user is franchisee

                window.location = url('franchisee', 'Home', 'index');

                btn_connection_form.removeAttr('disabled');
            }
        })
    }

    $("#forgetPasswordForm").validate({

        submitHandler: function () {

            forgetPassword();
        },

        rules: {

            email: {
                required: true,
                email: true,
                normalizer: function (value) {
                    return $.trim(value);
                }
            },
        }
    });

    // SUBMIT FUNCTION
    function forgetPassword() {

        let btn_forgot_password_send = $('#forgetPasswordForm .btn_forgot_password_send');

        btn_forgot_password_send.after(loadingSpan);
        btn_forgot_password_send.attr('disabled', true);

        $.post(
            url('auth', 'Auth', 'forgetPassword'),
            {
                email: escapeHtml($('#forgetPasswordForm .email').val()),
            },
            'json'
        )
            .fail(function (result, status) {
                $('#connection').prepend(alertError);
                $('.btn_spinner_loading').remove();
                btn_forgot_password_send.attr('disabled', false);

            })
            .done(function (result, status) {


                if (result === 'null') {
                    $('#connection').prepend(alertErrorUserDontExist)
                    $('.btn_spinner_loading').remove();
                    btn_forgot_password_send.attr('disabled', false);
                } else if (result === 'false') {
                    $('#connection').prepend(alertError);
                    $('.btn_spinner_loading').remove();
                    btn_forgot_password_send.attr('disabled', false);
                } else {

                    $('#connection').prepend(alertSuccesPasswordChanged)
                    $('.btn_spinner_loading').remove();
                    btn_forgot_password_send.attr('disabled', false);
                }
            })
    }
})

/* TRUCK PAGE */

$('#trucksManagement').ready(function () {

    /* pagination event */
    $('#container_table_trucks').ready(function () {


        let container_table_trucks = $('#trucksManagement #container_table_trucks');
        container_table_trucks.append(loadingSpan);

        $.post(
            url('admin', 'Truck', 'getTrucksFull'),
            {},
            'json',
        )
        .done(function (result, status) {


            $('#trucksManagement #container_table_trucks .btn_spinner_loading').remove();

            if(result !== 'isNull')
            {

                let htmlCompiled = Handlebars.compile($('#template_truck_row').html());
                container_table_trucks.html(htmlCompiled({
                        data:  JSON.parse(result),
                    })
                );

                $('#table_all_trucks').DataTable( {
                    "pageLength": 10,
                    "lengthMenu": [ 10, 20, 30, 40, 50, "Tous" ],
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    }
                });
            }else {
                container_table_trucks.html(htmlNoTrucks)
            }
        })
        .fail(function (result, state) {

            container_table_trucks.append(htmlProblemServer);
        })
    })
})

/* FRANCHISEE MANAGEMENT TABLE */

$('#franchiseesManagement').ready(function () {

    let table_franchisee = $('#table_franchisee');

    table_franchisee.ready(function () {

        $('#table_franchisee tbody').append(loadingSpan)

        $.post(
            url('admin', 'Franchisee', 'getAllFranchisee'),
            {},
            'json',
        )
        .done(function (result, status) {


            let htmlCompiled = Handlebars.compile($('#template_franchisee_row').html());
            $('#franchiseesManagement #table_franchisee tbody').html(htmlCompiled({
                    data: JSON.parse(result)
                })
            );

            $('#table_franchisee').DataTable( {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                }
            });

            $('#table_franchisee .btn_spinner_loading').remove();

        })
        .fail(function (result, state) {

            $('#franchiseesManagement #table_franchisee tbody').html(htmlProblemServer);
        })
    })
})

/* Event for adding an event */
$('#modal_add_event').on('shown.bs.modal', function ()
{
console.log('djnf')
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

            location: {
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
            url('admin', 'Event', 'addEvent'),
            {
                begin_date: escapeHtml($('#modal_add_event #begin_date').val()),
                end_date: escapeHtml( $('#modal_add_event #end_date').val()),
                name: escapeHtml($('#modal_add_event #name').val()),
                number_of_guests: escapeHtml($('#modal_add_event #number_of_guests').val()),
                location: escapeHtml($('#modal_add_event #location').val()),
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

            $('#loading_button').replaceWith(button);
            $('#modal_add_event').prepend(alertSuccesDataSave);
        })
    }
});

/* Event for showing details of an event */
$('#modal_details_event').on('shown.bs.modal', function (e) {
});

let city_id = 0;


$('#franchiseeDetails').ready(function () {

    city_id = parseInt($('#cityInputHidden').val());

    /* select the id of the city chosen */
    $('input[list]').change(function(e) {

        let cityInputHidden = $('#cityInputHidden');

        let selectedOption = $("#citiesList option[data-value='" + escapeHtml($(this).val()) + "']");
        let selectedCity = parseInt(selectedOption.attr('data-id'));


        if (selectedCity) {
            cityInputHidden.val(selectedCity);
        } else {
            cityInputHidden.val('');
        }
        city_id = cityInputHidden.val();
    });

    $("#formTruckFranchisee").validate({

        submitHandler: function () {
            changeAddress();
        },

        rules: {

            type_of_road: {
                required: true,
                lettersAndSpace: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
                maxlength: 30
            },

            street: {
                required: true,
                lettersAndSpaceAndTiret86AndMinimum2: true,
                normalizer: function (value) {
                    return $.trim(value);
                },
                maxlength: 255
            },

            number: {
                required: true,
                number: true,
                normalizer: function (value) {
                    return $.trim(value);
                }
            },

            city: {
                required: true,
            },
        }

    });

    function changeAddress() {

        let idAddressArray = $("div[id^='id_address_']").attr('id') // search id begin with this string
        idAddressArray =  idAddressArray.split('_');
        let idAddress = idAddressArray[idAddressArray.length - 1] // get the id in the last index of array

        let btnFormTruckFranchisee = $("#btnFormTruckFranchisee");
        btnFormTruckFranchisee.append(loadingSpan);
        btnFormTruckFranchisee.attr('disabled', true);

        $.post(
            url('admin', 'Franchisee', 'changeAddressTruckFranchisee'),
            {
                type_of_road: escapeHtml($('#formTruckFranchisee #type_of_road').val()),
                street: escapeHtml($('#formTruckFranchisee #street').val()),
                number: escapeHtml($('#formTruckFranchisee #number').val()),
                city: city_id,
                id_address: idAddress
            },
            'json'
        )
        .fail(function (result, status) {
            $("#formTruckFranchisee .btn_spinner_loading").remove();
            btnFormTruckFranchisee.append(alertError);
            btnFormTruckFranchisee.removeAttr('disabled');

        })
        .done(function (result, status) {

            if(result === '1')
            {
                $("#formTruckFranchisee .btn_spinner_loading").remove();
                btnFormTruckFranchisee.append(alertSuccesDataSave);
                btnFormTruckFranchisee.removeAttr('disabled');


            }else if(result === '0')
            {
                $("#formTruckFranchisee .btn_spinner_loading").remove();
                btnFormTruckFranchisee.append(alertError);
                btnFormTruckFranchisee.removeAttr('disabled');
            }

        })
    }



})

function generatePDF() {

    // Choose the element that our invoice is rendered in.
    const element = document.getElementById("pdf");
    // Choose the element and save the PDF for our user.
    html2pdf()
        .from(element)
        .save();
}
