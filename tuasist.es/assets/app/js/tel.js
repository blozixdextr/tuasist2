
function telInputGenerator(input, form, error, success) {

    var telInput = $(input),
        errorMsg = $(error),
        validMsg = $(success);
    telInput.intlTelInput({
        utilsScript: "/assets/libs/libphonenumber/utils.js",
        preferredCountries: ['es', 'gb', 'ru']
    });
    telInput.blur(function() {
        if ($.trim(telInput.val())) {
            if (telInput.intlTelInput("isValidNumber")) {
                validMsg.show();
                errorMsg.hide();
            } else {
                telInput.addClass("error");
                errorMsg.show();
                validMsg.hide();
            }
        }
    });
    telInput.keydown(function() {
        telInput.removeClass("error");
        errorMsg.hide();
        validMsg.hide();
    });

    $(form).submit(function(e){
        if (telInput.intlTelInput("isValidNumber")) {
            var number = telInput.intlTelInput("getNumber");
            telInput.intlTelInput("destroy");
            telInput.val(number);
            errorMsg.hide();
            validMsg.hide();
            return true;
        } else {
            e.preventDefault();
            return false;
        }
    });
};