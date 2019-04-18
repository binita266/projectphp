window.onload = function () {
    var formHandle = document.forms.contact_form;
    formHandle.onsubmit = processForm;

    function processForm() {
        var fname_value = document.getElementById("fname");
        var lname_value = document.getElementById("lname");
        var phone_value = document.getElementById("phone");
        var city_value = document.getElementById("city");
        var message_value = document.getElementById("message");

        //==========Thanks message===========
        var thanks_msg = document.getElementById("thanks_msg");
        var customerName = document.getElementById("customerName");
        customerName.innerHTML = fname_value.value + " " + lname_value.value;

        //=======Validation=======
        if (fname_value.value === "" || fname_value.value === null) {
            fname_value.style.borderColor = "red";
            fname_value.focus();
            return false; // stope the script from going further
        }else{
            fname_value.style.borderColor = "black";
        }
        if (lname_value.value === "" || lname_value.value === null) {
            lname_value.style.borderColor = "red";
            lname_value.focus();
            return false; // stope the script from going further
        }else{
            lname_value.style.borderColor = "black";
        }
        /* Source link: https://stackoverflow.com/questions/4338267/validate-phone-number-with-javascript */
        var phoneValid = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/;
        /* Valid formats:
            (123) 456-7890
            (123)456-7890
            123-456-7890
            123.456.7890
            1234567890
            +31636363634
            075-63546725*/
        if (!phoneValid.test(phone_value.value)) {
            phone_value.style.borderColor = "red";
            phone_value.focus();
            return false;
        }else{
            phone_value.style.borderColor = "black";
        }

        if (message_value.value === "" || message_value.value === null) {
            message_value.style.borderColor = "red";
            message_value.focus();
            return false; // stope the script from going further
        }else{
            message_value.style.borderColor = "black";
        }

        // Hide form and display thanks message.
        thanks_msg.style.display = "block";
        formHandle.style.display = "none";
        return false;
    }
}
