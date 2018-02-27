$(function () {
    function minMaxValidation(element, min, max){
        var length = element.val().length;
        if(length < min || length > max) setErrorIndicator(element);
        else setSuccessIndicator(element);
    }

    function integerValidation(element){
        if(!element.val().match(/^[0-9]+$/)) setErrorIndicator(element);
        else setSuccessIndicator(element);
    }

    function emailValidation(element){
        var value = element.val();
        var match = value.match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/i);
        if(!match || value.length > 255) setErrorIndicator(element);
        else setSuccessIndicator(element);
    }

    function confirmationValidation(element){
        if(element.val() != $('#password').val()) setErrorIndicator(element);
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
    $('#name').change(function () { minMaxValidation($(this), 2, 100); });
 
    $('#description').change(function () { minMaxValidation($(this), 2, 255); });

    $('#title').change(function () { minMaxValidation($(this), 2, 100); });

    $('#details').change(function () { minMaxValidation($(this), 2, 255); });

    $('#symbol').change(function () { minMaxValidation($(this), 1, 5); });

    $('#password').change(function () { minMaxValidation($(this), 6, 255); });

    $('#amount').change(function () { integerValidation($(this)); });

    $('#threshold').change(function () { integerValidation($(this)); });

    $('#email').change(function () { emailValidation($(this)); });

    $('#password_confirmation').change(function () { confirmationValidation($(this)); });

    //--Keyup validations 
    $('#name').keyup(function () { minMaxValidation($(this), 2, 100); });

    $('#description').keyup(function () { minMaxValidation($(this), 2, 255); });

    $('#title').keyup(function () { minMaxValidation($(this), 2, 100); });

    $('#details').keyup(function () { minMaxValidation($(this), 2, 255); });

    $('#symbol').keyup(function () { minMaxValidation($(this), 1, 5); });

    $('#password').keyup(function () { minMaxValidation($(this), 6, 255); });

    $('#amount').keyup(function () { integerValidation($(this)); });

    $('#threshold').keyup(function () { integerValidation($(this)); });

    $('#email').keyup(function () { emailValidation($(this)); });

    $('#password_confirmation').keyup(function () { confirmationValidation($(this)); });


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