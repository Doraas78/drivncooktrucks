<script type="text/javascript">
    /******************************************
     *
     * GENERAL VARIABLES
     *
     */

    var test = 0;
    var test1 = 0;
    var test2 = 0;
    var test3 = 0;
    var cart = [];


    /* generate dropdown list cities end */

    const htmlProblemServer = '<span class="font-italic ">Oops ! Un soucis est apparu avec le serveur.<br>Veuillez recommencer</span>'

    const htmlNoEvents = '<span class="font-italic ">Aucun évènement à venir</span>';
    const htmlNoMeals = '<span class="font-italic ">Ce camion ne contient aucun plats disponible</span>';
    const htmlNoIngredients = '<span class="font-italic ">Ce camion ne contient aucun ingrédients disponible</span>';
    const htmlNoMenus = '<span class="font-italic ">Ce camion ne contient aucun menus disponible</span>';
    const htmlNoDrinks = '<span class="font-italic ">Ce camion ne contient aucune boissons disponible</span>';
    const htmlNoTrucks = '<span class="font-italic ">Oops ! Aucun camion n\'est disponible</span>';
    const htmlNoOrdersCustomer = '<span class="font-italic ">Aucune commande </span>';


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


    const messagePasswordChanged = 'Le mot. de passe a été changé ! Vérifiez bien vos mails/spam';

    const alertSuccesPasswordChanged = '<div class="alert alert-success alert-dismissible fade show d-flex justify-content-center alert_custom" role="alert">' +
        '<span><strong>Succèes ! </strong>' + messageDataSave + '</span>' +
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


    const messageError = 'Une erreur est survenue !';
    const alertError = '<div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center alert_custom" role="alert">' +
        '<span><strong>Oops ! </strong>' + messageError + '</span>' +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<span aria-hidden="true">&times;</span>' +
        '</button>' +
        '</div>';

    const messageErrorUserDontExist = 'Cet utilisateur existe pas !';
    const alertErrorUserDontExist = '<div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center alert_custom" role="alert">' +
        '<span><strong>Oops ! </strong>' + messageError + '</span>' +
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

    const messageErrorUserExist = 'Cet utilisateur existe déjà !';
    const alertErrorUserExist = '<div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center alert_custom" role="alert">' +
        '<span><strong>Oops ! </strong>' + messageErrorUserExist + '</span>' +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<span aria-hidden="true">&times;</span>' +
        '</button>' +
        '</div>';

    const messageErrorWrongLogin = 'L\'email ou le mot de passe est incorrect !';
    const alertErrorLogin = '<div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center alert_custom" role="alert">' +
        '<span><strong>Oops ! </strong>' + messageErrorWrongLogin + '</span>' +
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '<span aria-hidden="true">&times;</span>' +
        '</button>' +
        '</div>';

    const loadingButton = '<button class="btn btn-primary" id="loading_button" type="button" disabled>' +
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>' +
        '<span class="sr-only">Loading...</span>' +
        '</button>';

    const formatDateTime = 'YYYY-MM-DDTHH:mm';
    const formatDate = 'YYYY-MM-DD';
    const formatDateFrench = 'DD-MM-YYYY';
    const formatDateTimeFrench = 'YYYY-MM-DD HH:mm';

    /******************************************
     *
     * GENERAL FUNCTIONS
     *
     */

// Return a url
    function url(platform, controller, action) {
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

    function searchKey(nameKey, myArray, valueKey) {
        for (var i = 0; i < myArray.length; i++) {
            if (myArray[i][nameKey] === valueKey) {
                return i;
            }
        }
        return false;
    }

    function changeQuantityItem(myArray, quantity_key, quantity) {
        myArray[quantity_key] = quantity;
    }

    function removeItem(myArray, index, number) {
        myArray.splice(index, number);
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

    moment.locale('fr'); // load date french format

    function escapeRegExp(stringToGoIntoTheRegex) {
        if (stringToGoIntoTheRegex.length > 0) {
            return stringToGoIntoTheRegex.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
        }
    }

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

    jQuery.validator.addMethod("frenchCard", function (value, element) {
        return /^[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}$/.test(value);
    }, "Veuillez choisir un numéro de carte valable");

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

    Handlebars.registerHelper('eq', function(arg1, arg2) {
        return (arg1 == arg2) ? true : false;
    });

    /******************************************
     *
     * MAIN
     *
     */

    /* NAVBAR USER */

    /* SIGN IN PAGE */

    $('#signIn').ready(function () {

        let city_id = 0;

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

        // DATE
        let birthdayDate = $('#birthday_date');

        let min = moment().subtract(130, 'y').format(formatDate);
        let max = moment().subtract(18, 'y').format(formatDate);

// VALIDATION
        $("#signInForm").validate({

            submitHandler: function () {
                signIn();
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

                password: {
                    required: true,
                    good_password_security: true,
                    maxlength: 20
                },

                check_password: {
                    equalTo: "#password"
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

                gender: {
                    required: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },

                birthday_date: {
                    required: true,
                    min: min,
                    max: max,
                    datetime: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },

                agreement: {
                    required: true,
                },
            }
        });

        // SUBMIT FUNCTION
        function signIn() {

            $.post(
                url('auth', 'Auth', 'signIn'),
                {
                    email: escapeHtml($('#signIn #email').val()),
                    password: escapeHtml($('#signIn #password').val()),
                    first_name: escapeHtml($('#signIn #first_name').val()),
                    last_name: escapeHtml($('#signIn #last_name').val()),
                    phone: escapeHtml($('#signIn #phone').val()),
                    gender: escapeHtml($('#signIn #gender').val()),
                    birthday_date: escapeHtml($('#signIn #birthday_date').val()),
                    number: escapeHtml($('#signIn #number').val()),
                    street: escapeHtml($('#signIn #street').val()),
                    type_of_road: escapeHtml($('#signIn #type_of_road').val()),
                    city:city_id,
                    date_creation: moment().format('YYYY-MM-DD HH:MM'),
                    newsletter: $('#newsletter').is(':checked'),
                    country: 'France',
                    picture: null
                },
                'json'
            )
                .fail(function (result, status) {
                    $('#signIn').prepend(alertError)
                })
                .done(function (result, status) {
                    if (result === '-1') {
                        $('#signIn').prepend(alertError)
                    } else if (result === '0') {

                        $('#signIn').prepend(alertErrorUserExist)
                    } else {

                        window.location = url('user', 'Dashboard', 'index');
                    }

                })
        }
    })

    /* CONNECTION PAGE */

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

            $('#connection .btn_connection_form').after(loadingSpan); // load icon
            $('#connection .btn_connection_form').attr('disabled', true)

            $.post(
                url('auth', 'Auth', 'connection'),
                {
                    email: escapeHtml($('#connection #email').val()),
                    password: escapeHtml($('#connection #password').val()),
                },
                'json'
            )
                .fail(function (result, status) {
                })
                .done(function (result, status) {

                    if (result === '0') {
                        $('.btn_spinner_loading').remove();
                        $('#connection').prepend(alertErrorLogin)
                        $('#connection .btn_connection_form').attr('disabled', false)
                    } else {
                        window.location = url('user', 'Dashboard', 'index');
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
    <?php
    if(isset($_SESSION['customer']) && is_array($_SESSION['customer'])){
    ?>

    /* PAGINATION TRUCKS */

    $('#order_truck_list').ready(function() {
        $('#order_truck_list .trucks_table table tbody').prepend(loadingSpan); // load icon

        $.get(
            url('user', 'Orders', 'getTrucksFewInfos'),
            {},
            'json',
        )
            .done(function (result, status) {

                let data = result;


                if (data[0] === 'isNull') {

                    $('#order_truck_list .trucks_table table tbody').html(htmlProblemServer);

                } else if (data.length <= 0) {
                    $('#order_truck_list .trucks_table table tbody').html(htmlNoTrucks);
                } else {

                    $('#template_truck_row').ready(function(){
                        let htmlCompiled = Handlebars.compile($('#template_truck_row').html())

                        $('#order_truck_list .trucks_table table tbody').html(htmlCompiled({
                                data: JSON.parse(data)
                            })
                        );
                    });

                }
            })
            .fail(function (result, state) {

                $('#order_truck_list .trucks_table table tbody').html(htmlProblemServer);
            })
    })


    /* PAGINATION MEAL */
    $('#order_meal_list').ready(function () {
        /* SHOW TABLE MEAL */
        let order_meal_list = $('#order_meal_list');
        $('#order_meal_list .meals_table table tbody').prepend(loadingSpan); // load icon

        $.get(
            url('user', 'Orders', 'getTruckMeals'),
            {
                id: parseInt($('#order_meal_list table').attr('id'))
            },
            'json'
        )
        .fail(function (result, status) {
            order_meal_list.prepend(alertError);
            $('#order_meal_list .btn_spinner_loading').remove();
        })
        .done(function (result, status) {

            let data = JSON.parse(result)

            if (data === 'isNull') {
                $('#order_meal_list .meals_table table tbody').html(htmlProblemServer);

            } else if (data["truck"]['meals'].length <= 0) {
                $('#order_meal_list .meals_table table tbody').html(htmlNoMeals);

            } else {

                let htmlCompiled = Handlebars.compile($('#template_meal_row').html())

                $('#order_meal_list .meals_table table tbody').html(htmlCompiled({
                    data: data['truck']['meals']
                }))


                $('#order_meal_list .add_meal').click(function (e) {

                    let className = e.currentTarget.classList[e.currentTarget.classList.length - 1];
                    let quantity_input = $('#order_meal_list #' + className);
                    let quantity = parseInt(quantity_input.attr('value'));

                    quantity_input.attr('value', quantity + 1);
                    let quantityInput = quantity_input.attr('value');

                    let max = quantity_input.attr('max') > 5 ? 5 : quantity_input.attr('max');
                    if (quantityInput > max) {
                        quantity_input.attr('value', max);
                        quantity_input.next('.messsage_maximum_quantity_achieve').removeClass('d-none')
                    }
                })

                $('#order_meal_list .remove_meal').click(function (e) {

                    let className = e.currentTarget.classList[e.currentTarget.classList.length - 1];
                    let quantity_input = $('#order_meal_list #' + className);
                    let quantity = parseInt(quantity_input.attr('value'));

                    if (!quantity_input.next('.messsage_maximum_quantity_achieve').hasClass('d-none'))
                        quantity_input.next('.messsage_maximum_quantity_achieve').addClass('d-none')

                    quantity_input.attr('value', quantity - 1);

                    let quantityInput = quantity_input.attr('value');

                    let min = 0
                    if (quantityInput < min)
                        quantity_input.attr('value', min);

                })
            }
        })
        /* save cart */
        $('.btn_save_cart_meals').click(function () {

            let btn_save_cart_meals = $('.btn_save_cart_meals');

            $('.quantity_meal_order').each(function () {

                if (this.value !== undefined && this.value >= 0) {

                    let id_franchisee = parseInt($('#order_meal_list tr').attr('class').split('_')[2]);
                    let id_meal = parseInt(this.id.split('_')[this.id.split('_').length - 1]);
                    let quantity_meal = parseInt(this.value);

                    if (quantity_meal >= 0) // if quantity meal equals
                    {
                        /* change quantity */
                        if (searchKey('id_meal', cart, id_meal) === false) {
                            let temp = {"id_meal": id_meal, "id_franchisee": id_franchisee, "quantity_meal": quantity_meal};
                            cart.push(temp);
                        } else {
                            let index = searchKey('id_meal', cart, id_meal);
                            cart[index]['quantity_meal'] = quantity_meal;
                        }
                    }
                }
                if (cart.length > 0) {
                    btn_save_cart_meals.after(loadingSpan);
                    btn_save_cart_meals.attr('disabled', true);

                    $.post(
                        url('user', 'Orders', 'saveCart'),
                        {
                            item: 'meal',
                            cart: cart,
                            id_truck: parseInt($('#order_meal_list .title_truck').attr('id'))
                        },
                        'json'
                    )
                    .fail(function (result, status) {
                        $('#order_meal_list .btn_spinner_loading').remove();
                        btn_save_cart_meals.removeAttr('disabled');
                    })
                    .done(function (result, status) {
                        $('#order_meal_list .btn_spinner_loading').remove();
                        btn_save_cart_meals.removeAttr('disabled');
                    })
                }

            })
        })

        /* switch page to menu âge and save cart in session */
        $('#btn_go_to_menu_page').click(function () {
            window.location = url('user', 'Orders', 'truckMenusView') + '&id=' + $('.title_truck').attr('id')
        })
    })


    /* PAGINATION MENU */
    $('#order_menu_list').ready(function () {

        /* SHOW TABLE MENU */
        let order_menu_list = $('#order_menu_list');
        $('#order_menu_list .menus_table table tbody').prepend(loadingSpan); // load icon

        $.post(
            url('user', 'Orders', 'getTruckMenus'),
            {
                id: parseInt($('#order_menu_list table').attr('id'))
            },
            'json'
        )
        .fail(function (result, status) {

            order_menu_list.prepend(alertError);
            $('#order_menu_list .btn_spinner_loading').remove();
        })
        .done(function (result, status) {

            let data = JSON.parse(result)

            if (data === 'isNull') {

                $('#order_menu_list .menus_table table tbody').html(htmlProblemServer);

            } else if (data['truck']['menus'].length <= 0) {
                $('#order_menu_list .menus_table table tbody').html(htmlNoMenus);

            } else {

                let data = JSON.parse(result)

                let htmlCompiled = Handlebars.compile($('#template_menu_row').html())

                $('#order_menu_list .menus_table table tbody').html(htmlCompiled({
                    data: data['truck']['menus']
                }))

                $('#order_menu_list .add_menu').click(function (e) {

                    let className = e.currentTarget.classList[e.currentTarget.classList.length - 1];
                    let quantity_input = $('#order_menu_list #' + className)
                    let quantity = parseInt(quantity_input.attr('value'));

                    quantity_input.attr('value', quantity + 1);
                    let quantityInput = quantity_input.attr('value');

                    let max = quantity_input.attr('max') > 5 ? 5 : quantity_input.attr('max');
                    if (quantityInput > max) {
                        quantity_input.attr('value', max);
                        quantity_input.next('.messsage_maximum_quantity_achieve').removeClass('d-none')
                    }
                })

                $('#order_menu_list .remove_menu').click(function (e) {
                    let className = e.currentTarget.classList[e.currentTarget.classList.length - 1];
                    let quantity_input = $('#order_menu_list #' + className)
                    let quantity = parseInt(quantity_input.attr('value'));

                    if (!quantity_input.next('.messsage_maximum_quantity_achieve').hasClass('d-none'))
                        quantity_input.next('.messsage_maximum_quantity_achieve').addClass('d-none')

                    quantity_input.attr('value', quantity - 1);

                    let quantityInput = quantity_input.attr('value');

                    let min = 0
                    if (quantityInput < min)
                        quantity_input.attr('value', min);
                })
            }
        })

        $('.btn_save_cart_menus').click(function () {
            $('.quantity_menu_order').each(function () {

                if (this.value !== undefined && this.value >= 0) {

                    let id_franchisee = parseInt($('#order_menu_list tr').attr('class').split('_')[2]);
                    let id_menu = parseInt(this.id.split('_')[this.id.split('_').length - 1]);
                    let quantity_menu = parseInt(this.value);

                    if (quantity_menu >= 0) // if quantity menu equals
                    {
                        /* change quantity */
                        if (searchKey('id_menu', cart, id_menu) === false) {
                            let temp = {"id_menu": id_menu, "id_franchisee": id_franchisee, "quantity_menu": quantity_menu};
                            cart.push(temp);
                        } else {
                            let index = searchKey('id_menu', cart, id_menu);
                            cart[index]['quantity_menu'] = quantity_menu;
                        }
                    }
                }
            })

            if (cart.length > 0) {
                let btn_save_cart_menus = $('#btn_save_cart_menus')

                btn_save_cart_menus.after(loadingSpan);
                btn_save_cart_menus.find('button').attr('disabled', true);

                $.post(
                    url('user', 'Orders', 'saveCart'),
                    {
                        item: 'menu',
                        cart: cart,
                        id_truck: parseInt($('#order_menu_list .title_truck').attr('id'))
                    },
                    'json'
                )
                .fail(function () {
                    $('#order_menu_list .btn_spinner_loading').remove();
                    btn_save_cart_menus.removeAttr('disabled');
                })
                .done(function (result, status) {

                    $('#order_menu_list .btn_spinner_loading').remove();
                    btn_save_cart_menus.removeAttr('disabled');

                 })
            }
        })

        /* switch page to menu âge and save cart in session */
        $('#btn_go_to_ingredient_page').click(function () {
            window.location = url('user', 'Orders', 'truckIngredientsView') + '&id=' + $('.title_truck').attr('id')
        })
    })

    /* PAGINATION INGREDIENT */
    $('#order_ingredient_list').ready(function () {

        /* SHOW TABLE INGREDIENT */
        let order_ingredient_list = $('#order_ingredient_list');
        $('#order_ingredient_list .ingredients_table table tbody').prepend(loadingSpan); // load icon

        $.get(
            url('user', 'Orders', 'getTruckIngredient'),
            {
                id: parseInt($('#order_ingredient_list table').attr('id'))
            },
            'json'
        )
        .fail(function (result, status) {
            order_ingredient_list.prepend(alertError);
            $('#order_ingredient_list .btn_spinner_loading').remove();
        })
        .done(function (result, status) {

            let data = JSON.parse(result)

            if (data === 'isNull') {

                $('#order_ingredient_list .ingredients_table table tbody').html(htmlProblemServer);

            } else if (data['truck']['ingredients'].length <= 0) {
                $('#order_ingredient_list .ingredients_table table tbody').html(htmlNoIngredients);

            } else {

                let htmlCompiled = Handlebars.compile($('#template_ingredient_row').html())

                $('#order_ingredient_list .ingredients_table table tbody').html(htmlCompiled({
                    data: data['truck']['ingredients']
                }))

                $('#order_ingredient_list .add_ingredient').click(function (e) {

                    let className = e.currentTarget.classList[e.currentTarget.classList.length - 1];
                    let quantity_input = $('#order_ingredient_list #' + className)
                    let quantity = parseInt(quantity_input.attr('value'));

                    quantity_input.attr('value', quantity + 1);
                    let quantityInput = quantity_input.attr('value');

                    let max = quantity_input.attr('max') > 5 ? 5 : quantity_input.attr('max');
                    if (quantityInput > max) {
                        quantity_input.attr('value', max);
                        quantity_input.next('.messsage_maximum_quantity_achieve').removeClass('d-none')
                    }
                })

                $('#order_ingredient_list .remove_ingredient').click(function (e) {
                    let className = e.currentTarget.classList[e.currentTarget.classList.length - 1];
                    let quantity_input = $('#order_ingredient_list #' + className)
                    let quantity = parseInt(quantity_input.attr('value'));

                    if (!quantity_input.next('.messsage_maximum_quantity_achieve').hasClass('d-none')) ;
                    quantity_input.next('.messsage_maximum_quantity_achieve').addClass('d-none');

                    quantity_input.attr('value', quantity - 1);


                    let quantityInput = quantity_input.attr('value');

                    let min = 0;
                    if (quantityInput < min)
                        quantity_input.attr('value', min);
                })
            }
        })

        $('.btn_save_cart_ingredients').click(function () {
            $('.quantity_ingredient_order').each(function () {

                if (this.value !== undefined && this.value >= 0) {

                    let id_franchisee = parseInt($('#order_ingredient_list tr').attr('class').split('_')[2]);
                    let id_ingredient = parseInt(this.id.split('_')[this.id.split('_').length - 1]);
                    let quantity_ingredient = parseInt(this.value);

                    if (quantity_ingredient >= 0) // if quantity ingredient equals
                    {
                        /* change quantity */
                        if (searchKey('id_ingredient', cart, id_ingredient) === false) {
                            let temp = {
                                "id_ingredient": id_ingredient,
                                "id_franchisee": id_franchisee,
                                "quantity_ingredient": quantity_ingredient
                            };
                            cart.push(temp);
                        } else {
                            let index = searchKey('id_ingredient', cart, id_ingredient);
                            cart[index]['quantity_ingredient'] = quantity_ingredient;
                        }
                    }
                }
            })

            let btn_save_cart_ingredients = $('#btn_save_cart_ingredients');

            if (cart.length > 0) {
                btn_save_cart_ingredients.after(loadingSpan);
                btn_save_cart_ingredients.attr('disabled', true);

                $.post(
                    url('user', 'Orders', 'saveCart'),
                    {
                        item: 'ingredient',
                        cart: cart,
                        id_truck: parseInt($('#order_ingredient_list .title_truck').attr('id'))
                    },
                    'json'
                )
                .fail(function () {
                    $('#order_ingredient_list .btn_spinner_loading').remove();
                    btn_save_cart_ingredients.removeAttr('disabled');
                })
                .done(function (result, status) {
                    $('#order_ingredient_list .btn_spinner_loading').remove();
                    btn_save_cart_ingredients.removeAttr('disabled');
                })
            }
        })

        /* switch page to drinks page and save cart in session */
        $('#btn_go_to_drink_page').click(function () {
            window.location = url('user', 'Orders', 'truckDrinksView') + '&id=' + $('.title_truck').attr('id')
        })
    })

    /* PAGINATION DRINK */
    $('#order_drink_list').ready(function () {

        let order_drink_list = $('#order_drink_list');
        $('#order_drink_list .drinks_table table tbody').prepend(loadingSpan); // load icon

        $.get(
            url('user', 'Orders', 'getTruckDrinks'),
            {
                id: parseInt($('#order_drink_list table').attr('id'))
            },
            'json'
        )
        .fail(function (result, status) {
            order_drink_list.prepend(alertError);
            $('#order_drink_list .btn_spinner_loading').remove();

        })
        .done(function (result, status) {

                let data = JSON.parse(result)

                if (data === 'isNull') {

                    $('#order_drink_list .drinks_table table tbody').html(htmlProblemServer);

                } else if (data['truck']['drinks'].length <= 0) {
                    $('#order_drink_list .drinks_table table tbody').html(htmlNoDrinks);

                } else {
                    let htmlCompiled = Handlebars.compile($('#template_drink_row').html())

                    $('#order_drink_list .drinks_table table tbody').html(htmlCompiled({
                        data: data['truck']['drinks']
                    }))

                    $('#order_drink_list .add_drink').click(function (e) {

                        let className = e.currentTarget.classList[e.currentTarget.classList.length - 1];
                        let quantity_input = $('#order_drink_list #' + className)
                        let quantity = parseInt(quantity_input.attr('value'));

                        quantity_input.attr('value', quantity + 1);
                        let quantityInput = quantity_input.attr('value');

                        let max = quantity_input.attr('max') > 5 ? 5 : quantity_input.attr('max');
                        if (quantityInput > max) {
                            quantity_input.attr('value', max);
                            quantity_input.next('.messsage_maximum_quantity_achieve').removeClass('d-none')
                        }
                    })

                    $('#order_drink_list .remove_drink').click(function (e) {
                        let className = e.currentTarget.classList[e.currentTarget.classList.length - 1];
                        let quantity_input = $('#order_drink_list #' + className)
                        let quantity = parseInt(quantity_input.attr('value'));

                        if (!quantity_input.next('.messsage_maximum_quantity_achieve').hasClass('d-none'))
                            quantity_input.next('.messsage_maximum_quantity_achieve').addClass('d-none');

                        quantity_input.attr('value', quantity - 1);
                        let quantityInput = quantity_input.attr('value');

                        let min = 0;
                        if (quantityInput < min)
                            quantity_input.attr('value', min);
                    })
                }
            })

        $('.btn_save_cart_drinks').click(function () {
            $('.quantity_drink_order').each(function () {

                if (this.value !== undefined && this.value >= 0) {

                    let id_franchisee = parseInt($('#order_drink_list tr').attr('class').split('_')[2]);
                    let id_drink = parseInt(this.id.split('_')[this.id.split('_').length - 1]);
                    let quantity_drink = parseInt(this.value);

                    if (quantity_drink >= 0) // if quantity drink equals
                    {
                        /* change quantity */
                        if (searchKey('id_drink', cart, id_drink) === false) {
                            let temp = {
                                "id_drink": id_drink,
                                "id_franchisee": id_franchisee,
                                "quantity_drink": quantity_drink
                            };
                            cart.push(temp);
                        } else {
                            let index = searchKey('id_drink', cart, id_drink);
                            cart[index]['quantity_drink'] = quantity_drink;
                        }
                    }
                }
            })

            let btn_save_cart_drinks = $('#btn_save_cart_drinks');

            if (cart.length > 0) {
                btn_save_cart_drinks.after(loadingSpan);
                btn_save_cart_drinks.attr('disabled', true);

                $.post(
                    url('user', 'Orders', 'saveCart'),
                    {
                        item: 'drink',
                        cart: cart,
                        id_truck: parseInt($('#order_drink_list .title_truck').attr('id'))
                    },
                    'json'
                )
                    .fail(function () {
                        $('#order_drink_list .btn_spinner_loading').remove();
                        btn_save_cart_drinks.removeAttr('disabled');
                    })
                    .done(function (result, status) {
                        $('#order_drink_list .btn_spinner_loading').remove();
                        btn_save_cart_drinks.removeAttr('disabled');
                    })
            }
        })

        /* switch page to drinks page and save cart in session */
        $('#btn_go_to_cart_page').click(function () {

            window.location = url('user', 'Cart', 'index')

        })
    })

    /* PROFIL DATA FORM */

    /* password changes */


    /* CART */

    $('#cart').ready(function () {

        console.log(cart);

        $('.container_btn_add_remove_item').ready(function () {

            $('#cart .add_meal,#cart .add_menu, #cart .add_ingredient,#cart .add_drink').click(function (e) {

                let className = e.currentTarget.classList[e.currentTarget.classList.length - 1];
                let quantity_input = $('#cart #' + className);
                let quantity = parseInt(quantity_input.attr('value'));

                quantity_input.attr('value', quantity + 1);
                let quantityInput = quantity_input.attr('value');

                let max = quantity_input.attr('max') > 5 ? 5 : quantity_input.attr('max');
                if (quantityInput > max) {
                    quantity_input.attr('value', max);
                    quantity_input.next('.messsage_maximum_quantity_achieve').removeClass('d-none')
                }
            })

            $(' #cart .remove_meal, #cart .remove_drink,#cart  .remove_ingredient,#cart .remove_menu ').click(function (e) {

                let className = e.currentTarget.classList[e.currentTarget.classList.length - 1];
                let quantity_input = $('#cart #' + className);
                let quantity = parseInt(quantity_input.attr('value'));

                if (!quantity_input.next('.messsage_maximum_quantity_achieve').hasClass('d-none'))
                    quantity_input.next('.messsage_maximum_quantity_achieve').addClass('d-none')

                quantity_input.attr('value', quantity - 1);
                let quantityInput = quantity_input.attr('value');

                let min = 0
                if (quantityInput < min)
                    quantity_input.attr('value', min);

            })

            $('#cart .btn_save_cart').click(function () {

                $('.table_cart_truck').each(function () {

                    let id_franchisee = parseInt(this.id);

                    cart['meal'] = [];
                    cart['menu'] = [];
                    cart['ingredient'] = [];
                    cart['drink'] = [];

                    $('.quantity_meal_order').each(function (e) {

                        if (this.value !== undefined && this.value >= 0) {

                            let id_meal = parseInt(this.id.split('_')[this.id.split('_').length - 1]);
                            let quantity_meal = parseInt(this.value);

                            if (quantity_meal >= 0) // if quantity meal equals
                            {
                                if (searchKey('id_meal', cart, id_meal) === false) {

                                    /* change quantity */
                                    let temp = {
                                        "id_meal": id_meal,
                                        "id_franchisee": id_franchisee,
                                        "quantity_meal": quantity_meal
                                    };
                                    cart['meal'].push(temp);
                                } else {
                                    let index = searchKey('id_meal', cart, id_meal);
                                    cart['meal'][index]['quantity_meal'] = quantity_meal;
                                }
                            }
                        }
                    })

                    $('.quantity_menu_order').each(function (e) {

                        if (this.value !== undefined && this.value >= 0) {

                            let id_menu = parseInt(this.id.split('_')[this.id.split('_').length - 1]);
                            let quantity_menu = parseInt(this.value);

                            if (quantity_menu >= 0) // if quantity menu equals
                            {
                                /* change quantity */
                                if (searchKey('id_menu', cart, id_menu) === false) {

                                    /* change quantity */
                                    let temp = {
                                        "id_menu": id_menu,
                                        "id_franchisee": id_franchisee,
                                        "quantity_menu": quantity_menu
                                    };
                                    cart['menu'].push(temp);
                                } else {
                                    let index = searchKey('id_menu', cart, id_menu);
                                    cart['menu'][index]['quantity_menu'] = quantity_menu;
                                }
                            }
                        }
                    })

                    $('.quantity_ingredient_order').each(function (e) {

                        if (this.value !== undefined && this.value >= 0) {

                            let id_ingredient = parseInt(this.id.split('_')[this.id.split('_').length - 1]);
                            let quantity_ingredient = parseInt(this.value);

                            if (quantity_ingredient >= 0) // if quantity ingredient equals
                            {
                                /* change quantity */
                                if (searchKey('id_ingredient', cart, id_ingredient) === false) {

                                    /* change quantity */
                                    let temp = {
                                        "id_ingredient": id_ingredient,
                                        "id_franchisee": id_franchisee,
                                        "quantity_ingredient": quantity_ingredient
                                    };
                                    cart['ingredient'].push(temp);
                                } else {
                                    let index = searchKey('id_ingredient', cart, id_ingredient);
                                    cart['ingredient'][index]['quantity_ingredient'] = quantity_ingredient;
                                }
                            }
                        }
                    })

                    $('.quantity_drink_order').each(function (e) {

                        if (this.value !== undefined && this.value >= 0) {

                            let id_drink = parseInt(this.id.split('_')[this.id.split('_').length - 1]);
                            let quantity_drink = parseInt(this.value);

                            if (quantity_drink >= 0) // if quantity drink equals
                            {
                                /* change quantity */
                                if (searchKey('id_drink', cart, id_drink) === false) {

                                    /* change quantity */
                                    let temp = {
                                        "id_drink": id_drink,
                                        "id_franchisee": id_franchisee,
                                        "quantity_drink": quantity_drink
                                    };
                                    cart['drink'].push(temp);
                                } else {
                                    let index = searchKey('id_drink', cart, id_drink);
                                    cart['drink'][index]['quantity_drink'] = quantity_drink;
                                }
                            }
                        }
                    })
                })

                let btn_save_cart = $('#cart .btn_save_cart');

                if (cart['menu'].length > 0 || cart['ingredient'].length > 0 || cart['drink'].length > 0 || cart['meal'].length > 0) {


                    btn_save_cart.after(loadingSpan);
                    btn_save_cart.attr('disabled', true);

                    cart = Object.assign({}, cart);
                    console.log(cart)

                    $.post(
                        url('user', 'Orders', 'saveCart'),
                        {
                            item: ['meal', 'menu', 'ingredient', 'drink'],
                            cart: cart,
                            id_truck: parseInt($('#cart .title_truck_th').attr('id'))
                        },
                        'json'
                    )
                    .fail(function (result, status) {
                        $('#here').html(result)

                        $('#cart .btn_spinner_loading').remove();
                        btn_save_cart.removeAttr('disabled');
                    })
                    .done(function (result, status) {

                        $('#here').html(result)

                        $('#cart .btn_spinner_loading').remove();
                        btn_save_cart.removeAttr('disabled');
                        //window.location = url('user', 'Cart', 'index')

                    })
                } else {
                    $('#cart .btn_spinner_loading').remove();
                    btn_save_cart.removeAttr('disabled');
                    //window.location = url('user', 'Cart', 'index')
                }
            })
        })
    })

    $('#formPayementCard').ready(function(){


        $("#formPayementCard").validate({
            submitHandler: function(form) {
                payement_card();
            },

            rules: {
                payement_card: {
                    required: true,
                    frenchCard: true
                },

                name_card: {
                    required: true,
                    frenchLettersAndSpaceAndTiret86AndMinimum2: true
                }
            },


        });

        function payement_card(){

            let btn_payement_form = $('#btn_payement_form');
            btn_payement_form.after(loadingSpan);
            btn_payement_form.attr('disabled', true);

            $.post(
                url('user', 'Orders', 'insertFullOrder'),
                {
                    id_franchisee: parseInt($('table').attr('id')),
                    name: $('#name_card').val(),
                    price: parseFloat($('#totalPriceSpan').text()),
                    tva: parseFloat($('#totalTvaSpan').text()),
                    reduction: 0,
                    description: '',
                },
                'json'
            )
            .fail(function (result) {

                btn_payement_form.removeAttr('disabled');
                $('.btn_spinner_loading').remove();
                $('#payementModal').append(alertError);
            })
            .done(function (result, status) {

                $('#here').html(result);
                if(result === '1')
                {
                    btn_payement_form.removeAttr('disabled');
                    $('.btn_spinner_loading').remove();
                    $('#payementModal').append(alertSuccesDataSave);
                    location.reload();
                } else {
                    btn_payement_form.removeAttr('disabled');
                    $('.btn_spinner_loading').remove();
                    $('#payementModal').append(alertError);
                }
            })
        }
    })

    /* EVENTS */

    $('#event').ready(function () {


        let all_event_container = $('#all_event_container');

        all_event_container.append(loadingSpan);

        $.post(
            url('user', 'Event', 'getAllValidEvent'),
            {},
            'json'
        )
            .fail(function (result, status) {
                all_event_container.prepend(alertError);
                $('.btn_spinner_loading').remove();
            })
            .done(function (result, status) {

                if (result !== 'false') {

                    $('#template_table_event').ready(function() {

                        let htmlCompiled = Handlebars.compile($('#template_table_event').html());
                        all_event_container.append(htmlCompiled({
                                data:  JSON.parse(result),
                            })
                        );

                        $('#table_event').DataTable( {
                            "pageLength": 5,
                            "lengthMenu": [ 5, 10, 15, 20, 25, "Tous" ],
                            "language": {
                                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                            }
                        });
                        $('#event .btn_spinner_loading').remove();
                    })

                } else {
                    $('#event .btn_spinner_loading').remove();
                    all_event_container.html(htmlNoEvents);
                }
            })
    })

    /* PROFIL */

    $('#profil').ready(function () {


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
                url('user', 'Profil', 'changePassword'),
                {
                    password: $('#form_password_section #password').val(),
                    new_password: $('#form_password_section #new_password').val(),
                },
                'json'
            )
                .fail(function (result, status) {
                    $('#profil').prepend(alertError);
                    $('.btn_spinner_loading').remove();
                })
                .done(function (result, status) {

                    if (result == null) {
                        window.location = url('Auth', 'auth', 'logout')
                    } else if (result == 'false') {
                        $('#profil').after(alertErrorWrongPassword);
                        $('#profil .btn_spinner_loading').remove();
                        btn_save_password.attr('disabled', false);
                        $("#form_password_section input[type=password]").val("");

                    } else {
                        $('#profil').prepend(alertSuccesPasswordChanged)
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

            if ($("#profil #form_email_section #new_email").val() == $("#profil #form_email_section #email").val()) {

                $('#profil').after(alertMessageCustomInfo);

            } else {

                let btn_changed_email = $('#form_email_section .btn_save_email');

                btn_changed_email.after(loadingSpan);
                btn_changed_email.attr('disabled', true);

                $.post(
                    url('user', 'Profil', 'changeEmail'),
                    {
                        new_email: $("#profil #form_email_section #new_email").val(),
                    },
                    'json'
                )
                .fail(function (result, status) {

                    $('#profil').prepend(alertError);
                    $('.btn_spinner_loading').remove();
                    btn_changed_email.attr('disabled', false);

                })
                .done(function (result, status) {
                        $("#here").html(result)
                        $('#profil').prepend(alertSuccesDataSave);
                        $('.btn_spinner_loading').remove();
                        btn_changed_email.attr('disabled', false);

                        /*if(result == 'isNull')
                        {
                            window.location = url('Auth', 'auth', 'logout')
                        }else if(result == 'false')
                        {
                             $('#profil').prepend(alertError);

                        } else {
                            $('#profil').prepend(alertSuccesDataSave);

                        }*/
                    })
            }
        }
    })

    /* COMMANDS */

    let commands_container = $('#commands')

    commands_container.ready(function () {

        commands_container.append(loadingSpan);

        $.post(
            url('user', 'Dashboard', 'getFullOrders'),
            {},
            'json'
        )
        .fail(function (result, status) {

            $('#commands .btn_spinner_loading').remove();
            commands_container.append(alertError);
        })
        .done(function (result, status) {


            $('#commands .btn_spinner_loading').remove();

            if(result !== 0) // if no data
            {

                let data = JSON.parse(result);

                let htmlCompiled = Handlebars.compile($('#template_table_all_commands').html());
                commands_container.append(htmlCompiled({
                        data: data,
                    })
                );

                $('#table_commands').DataTable( {
                    "pageLength": 5,
                    "lengthMenu": [ 5, 10, 15, 20],
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                    }
                });


            }else
            {
                commands_container.html(htmlNoOrdersCustomer);
            }
        })

    })

    function addCustomerEvent()
    {
        console.log(this);

        /*$.post(
            idEvent:
        )*/

        return false;
    }

    <?php } ?>


    $('#about').ready(function () {

        // VALIDATION
        $("#contact_form").validate({

            submitHandler: function () {
                sendFormContactUs();
            },

            rules: {

                name: {
                    required: true
                },

                email: {
                    required: true,
                    email: true,
                    normalizer: function (value) {
                        return $.trim(value);
                    }
                },

                subject: {
                    required: true
                },

                message: {
                    required: true
                },
            }
        });

        // SUBMIT FUNCTION
        function sendFormContactUs() {

            $.post(
                url('home', 'Email', 'send'),
                {
                    name: escapeHtml($('#contact_form #name').val()),
                    email: escapeHtml($('#contact_form #email').val()),
                    subject: escapeHtml($('#contact_form #subject').val()),
                    message: escapeHtml($('#contact_form #message').val())
                },
            )
                .fail(function (result, status) {
                })
                .done(function (result, status) {


                    if (result === '1') {
                        //pop up
                        openModalSuccess();


                    } else {
                        //pop up
                        openModalError();
                    }

                })
        }
    });

    //FOOD TRUCK WEBPAGE
    $('#foodtrucks').ready(function f() {

    });

    function openModalSuccess() {
        $('#modal_success_message_send').removeClass('d-none');
        $('#modal_success_message_send').click(function () {
            $('#modal_success_message_send').addClass('d-none');
        });
    }

    function openModalError() {
        $('#modal_error_message_send').removeClass('d-none');
        $('#modal_error_message_send').click(function () {
            $('#modal_error_message_send').addClass('d-none');
        });
    }


</script>