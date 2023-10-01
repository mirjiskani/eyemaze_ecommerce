function validateForm() {
    var validCard = 0;
    var valid = false;
    var cardCVC = document.getElementById('cardCVC').value;
    var cardExpMonth = document.getElementById('cardExpMonth').value;
    var cardExpYear = document.getElementById('cardExpYear').value;
    var cardNumber = document.getElementById('cardNumber').value;
    var emailAddress = document.getElementById('emailAddress').value;
    var customerName = document.getElementById('customerName').value;
    var customerAddress = document.getElementById('customerAddress').value;
    var customerCity = document.getElementById('customerCity').value;
    var customerZipcode = document.getElementById('customerZipcode').value;
    var customerCountry = document.getElementById('customerCountry').value;
    var validateName = /^[a-z ,.'-]+$/i;
    var validateEmail = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;
    var validateMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
    var validateYear = /^2017|2018|2019|2020|2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
    var cvv_expression = /^[0-9]{3,3}$/;
    if (cardNumber === '') {
        document.getElementById('errorCardNumber').text('Card Number is not provided');
        document.getElementById('cardNumber').classList.add('require');
        document.getElementById('errorCardNumber').text('Invalid Card Number');
        valid = false;
    } else {
        // cardNumber.validateCreditCard((result) => {
        //     if (result.valid) {
        //         document.getElementById('cardNumber').classList.remove('require');
        //         document.getElementById('errorCardNumber').text('');
        //         validCard = 1;
        //     } else {
        //         document.getElementById('cardNumber').classList.add('require');
        //         document.getElementById('errorCardNumber').text('Invalid Card Number');
        //         validCard = 0;
        //     }
        // })
        validCard = 1;
    }

    if (validCard == 1) {
        console.log("insideValidate")
        if (!validateMonth.test(cardExpMonth)) {
            document.getElementById('cardExpMonth').classList.add('require');
            document.getElementById('errorCardExpMonth').text('Invalid Data');
            valid = false;
        } else {
            document.getElementById('cardExpMonth').classList.remove('require');
            document.getElementById('errorCardExpMonth').text('');
            valid = true;
        }

        if (!validateYear.test(cardExpYear)) {
            document.getElementById('cardExpYear').classList.add('require');
            document.getElementById('errorCardExpYear').error('Invalid Data');
            valid = false;
        } else {
            document.getElementById('cardExpYear').classList.remove('require');
            document.getElementById('errorCardExpYear').error('');
            valid = true;
        }

        if (!cvv_expression.test(cardCVC)) {
            document.getElementById('cardCVC').classList.add('require');
            document.getElementById('errorCardCvc').text('Invalid Data');
            valid = false;
        } else {
            document.getElementById('cardCVC').classList.remove('require');
            document.getElementById('errorCardCvc').text('');
            valid = true;
        }

        if (!validateName.test(customerName)) {
            document.getElementById('customerName').classList.add('require');
            document.getElementById('errorCustomerName').text('Invalid Name');
            valid = false;
        } else {
            document.getElementById('customerName').classList.remove('require');
            document.getElementById('errorCustomerName').text('');
            valid = true;
        }

        if (!validateEmail.test(emailAddress)) {
            document.getElementById('emailAddress').classList.add('require');
            document.getElementById('errorEmailAddress').text('Invalid Email Address');
            valid = false;
        } else {
            document.getElementById('emailAddress').classList.remove('require');
            document.getElementById('errorEmailAddress').text('');
            valid = true;
        }

        if (customerAddress == '') {
            document.getElementById('customerAddress').classList.add('require');
            document.getElementById('errorCustomerAddress').text('Enter Address Detail');
            valid = false;
        } else {
            document.getElementById('customerAddress').classList.remove('require');
            document.getElementById('errorCustomerAddress').text('');
            valid = true;
        }

        if (customerCity == '') {
            document.getElementById('customerCity').classList.add('require');
            document.getElementById('errorCustomerCity').text('Enter City');
            valid = false;
        } else {
            document.getElementById('customerCity').classList.remove('require');
            document.getElementById('errorCustomerCity').text('');
            valid = true;
        }

        if (customerZipcode == '') {
            document.getElementById('customerZipcode').classList.add('require');
            document.getElementById('errorCustomerZipcode').text('Enter Zip code');
            valid = false;
        } else {
            document.getElementById('customerZipcode').classList.remove('require');
            document.getElementById('errorCustomerZipcode').text('');
            valid = true;
        }

        if (customerCountry == '') {
            document.getElementById('customerCountry').classList.add('require');
            document.getElementById('errorCustomerCountry').text('Enter Country Detail');
            valid = false;
        } else {
            document.getElementById('customerCountry').classList.remove('require');
            document.getElementById('errorCustomerCountry').text('');
            valid = true;
        }
    }
    return valid;
}


Stripe.setPublishableKey('pk_test_51Nw3QzEIWDW8VKN7cFVXWGDmwmaj4G5hfXOfItLptOWwAivPXUkIVvdndkRO56hYq92R32p8v366ZZEYaFfHF0nU00EKYAVGZN');

// Callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        // Enable the submit button
        $('#payNow').removeAttr("disabled");
        // Display the errors on the form
        $(".payment-status").html('<p>' + response.error.message + '</p>');
    } else {
        var form$ = $("#payment-form");
        // Get token id
        var token = response.id;
        // Insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        form$.append("<input type='hidden' name='orderPlaced' value='orderPlaced' />");
        
        // Submit form to the server
        form$.get(0).submit();
    }
}

$(document).ready(function () {
    // On form submit
    $("#payNow").on('click', () => {
        // Disable the submit button to prevent repeated clicks
        // if (validateForm() == true) {
        //     return false;
        $('#payNow').prop("disabled", true);
        $('#payNow').off('click');
        $('#payNow').text("Processing...");

        // Create single-use token to charge the user
        Stripe.createToken({
            number: $('#cardNumber').val(),
            exp_month: $('#cardExpMonth').val(),
            exp_year: $('#cardExpYear').val(),
            cvc: $('#cardCVC').val()
        }, stripeResponseHandler);

        // Submit from callback
        return false;
        // }
        //return false
    });
});