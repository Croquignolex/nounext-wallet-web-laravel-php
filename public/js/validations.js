$(function () {
    function minMaxValidation(length, min, max, element){ 
        if(length < min || length > max) setErrorIndicator(element); 
        else setSuccessIndicator(element);
    }

    function setSuccessIndicator(element){  
        element.removeClass('is-invalid');
        element.addClass('is-valid');
    }

    function setErrorIndicator(element){ 
        element.removeClass('is-valid');
        element.addClass('is-invalid'); 
    }    

    //-- Change validations
    $('#name').change(function () {
        var element = $(this);
        minMaxValidation(element.val().length, 2, 100, element);
    });
 
    $('#description').change(function () {
        var element = $(this);
        minMaxValidation(element.val().length, 2, 255, element);
    });

    $('#title').change(function () {
        var element = $(this);
        minMaxValidation(element.val().length, 2, 100, element);
    });

    $('#details').change(function () {
        var element = $(this);
        minMaxValidation(element.val().length, 2, 255, element);
    });

    $('#symbol').change(function () {
        var element = $(this);
        minMaxValidation(element.val().length, 1, 5, element);
    });
 
    $('#amount').change(function () {
        var element = $(this);  
        if(!element.val().match(/^[0-9]+$/)) setErrorIndicator(element);
        else setSuccessIndicator(element);
    });

    $('#threshold').change(function () {
        var element = $(this);
        if(!element.val().match(/^[0-9]+$/)) setErrorIndicator(element);
        else setSuccessIndicator(element);
    });

    $('#password').change(function () {
        var element = $(this);
        minMaxValidation(element.val().length, 6, 255, element);
    });

    $('#email').change(function () {
        var element = $(this);
        var value = element.val();
        var match = value.match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/i); 
        if(!match || value.length > 255) setErrorIndicator(element);
        else setSuccessIndicator(element);
    });

    $('#password_confirmation').change(function () {
        var element = $(this); 
        if(element.val() != $('#password').val()) setErrorIndicator(element); 
        else setSuccessIndicator(element);
    });

    //--Keyup validations 
    $('#name').keyup(function () {
        var element = $(this);
        minMaxValidation(element.val().length, 2, 100, element);
    });
 
    $('#description').keyup(function () {
        var element = $(this);
        minMaxValidation(element.val().length, 2, 255, element);
    });

    $('#title').keyup(function () {
        var element = $(this);
        minMaxValidation(element.val().length, 2, 100, element);
    });

    $('#details').keyup(function () {
        var element = $(this);
        minMaxValidation(element.val().length, 2, 255, element);
    });

    $('#symbol').keyup(function () {
        var element = $(this);
        minMaxValidation(element.val().length, 1, 5, element);
    });

    //--Validations
    $('#amount').keyup(function () {
        var element = $(this);  
        if(!element.val().match(/^[0-9]+$/)) setErrorIndicator(element);
        else setSuccessIndicator(element);
    });

    $('#threshold').keyup(function () {
        var element = $(this);
        if(!element.val().match(/^[0-9]+$/)) setErrorIndicator(element);
        else setSuccessIndicator(element);
    });

    $('#password').keyup(function () {
        var element = $(this);
        minMaxValidation(element.val().length, 6, 255, element);
    });

    $('#email').keyup(function () {
        var element = $(this);
        var value = element.val();
        var match = value.match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/i); 
        if(!match || value.length > 255) setErrorIndicator(element);
        else setSuccessIndicator(element);
    });

    $('#password_confirmation').keyup(function () {
        var element = $(this); 
        if(element.val() != $('#password').val()) setErrorIndicator(element); 
        else setSuccessIndicator(element);
    });

    //--Click validations
    $('#register').click(function () {
        var isValid = true;

        var name = $('#name');
        var email = $('#email');
        var password = $('#password');
        var passwordConfirm = $('#password_confirmation');
        var nameLength = name.val().length;
        var emailValue = email.val();
        var emailLength = emailValue.length;
        var passwordLength = password.val().length;
        var emailMatch = emailValue.match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/i);

        if(nameLength < 2 || nameLength > 255) {  
            setErrorIndicator(name);
            isValid = false;
        }
        if(passwordLength < 6 || passwordLength > 255) { 
            setErrorIndicator(password);
            isValid = false;
        }
        if(!emailMatch || emailLength > 255){ 
            setErrorIndicator(email);
            isValid = false;
        }
        if(passwordConfirm.val() != password.val()) { 
            setErrorIndicator(passwordConfirm);
            isValid = false;
        }

        return isValid;
    });

    $('#login').click(function () {
        var isValid = true;

        var email = $('#email');
        var password = $('#password');
        var emailValue = email.val();
        var emailLength = emailValue.length;
        var passwordLength = password.val().length;
        var emailMatch = emailValue.match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/i);

        if(passwordLength < 6 || passwordLength > 255) { 
            setErrorIndicator(password);
            isValid = false;
        }
        if(!emailMatch || emailLength > 255){  
            setErrorIndicator(email);
            isValid = false;
        }

        return isValid;
    });

    $('#sendLink').click(function () {
        var isValid = true;

        var email = $('#email');
        var emailValue = email.val();
        var emailLength = emailValue.length;
        var emailMatch = emailValue.match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/i);

        if(!emailMatch || emailLength > 255){ 
            setErrorIndicator(email);
            isValid = false;
        }

        return isValid;
    }); 

    $('#resetPassword').click(function () {
        var isValid = true;
  
        var password = $('#password');
        var passwordConfirm = $('#password_confirmation');  
        var passwordLength = password.val().length; 

        if(passwordLength < 6 || passwordLength > 255) { 
            setErrorIndicator(password);
            isValid = false;
        } 
        if(passwordConfirm.val() != password.val()) {  
            setErrorIndicator(passwordConfirm);
            isValid = false; 
        }

        return isValid;
    });

    $('#add_account').click(function () { 
        var isValid = true;
 
        var name = $('#name');
        var description = $('#description'); 
        var amount = $('#amount');
        var threshold = $('#threshold');
        var nameLength = name.val().length; 
        var descriptionLength = description.val().length; 

        if(nameLength < 2 || nameLength > 100) {
            setErrorIndicator(name);
            isValid = false; 
        }
        if(descriptionLength < 2 || descriptionLength > 255) { 
            setErrorIndicator(description);
            isValid = false; 
        }
        if(!amount.val().match(/^[0-9]+$/)){
            setErrorIndicator(amount);
            isValid = false; 
        }
        if(!threshold.val().match(/^[0-9]+$/)){
            setErrorIndicator(threshold);
            isValid = false;
        }

        return isValid;
    });

    $('#update_account').click(function () { 
        var isValid = true;
 
        var name = $('#name');
        var description = $('#description'); 
        var amount = $('#amount');
        var threshold = $('#threshold');
        var nameLength = name.val().length; 
        var descriptionLength = description.val().length; 

        if(nameLength < 2 || nameLength > 100) {
            setErrorIndicator(name);
            isValid = false; 
        }
        if(descriptionLength < 2 || descriptionLength > 255) { 
            setErrorIndicator(description);
            isValid = false; 
        }
        if(!amount.val().match(/^[0-9]+$/)){
            setErrorIndicator(amount);
            isValid = false; 
        }
        if(!threshold.val().match(/^[0-9]+$/)){
            setErrorIndicator(threshold);
            isValid = false;
        }

        return isValid;
    });

    $('#add_currency').click(function () {
        var isValid = true;

        var title = $('#title');
        var details = $('#details');
        var symbol = $('#symbol');
        var titleLength = title.val().length;
        var detailsLength = details.val().length;
        var symbolLength = symbol.val().length;

        if(titleLength < 2 || titleLength > 100) {
            setErrorIndicator(title);
            isValid = false;
        }
        if(detailsLength < 2 || detailsLength > 255) {
            setErrorIndicator(details);
            isValid = false;
        }
        if(symbolLength < 2 || symbolLength > 255) {
            setErrorIndicator(symbol);
            isValid = false;
        }

        return isValid;
    });

    $('#update_currency').click(function () {
        var isValid = true;

        var title = $('#title');
        var details = $('#details');
        var symbol = $('#symbol');
        var titleLength = title.val().length;
        var detailsLength = details.val().length;
        var symbolLength = symbol.val().length;

        if(titleLength < 2 || titleLength > 100) {
            setErrorIndicator(title);
            isValid = false;
        }
        if(detailsLength < 2 || detailsLength > 255) {
            setErrorIndicator(details);
            isValid = false;
        }
        if(symbolLength < 2 || symbolLength > 255) {
            setErrorIndicator(symbol);
            isValid = false;
        }

        return isValid;
    });
});

/*
 TODO: reduire le code JS et creant les fonctions
 */