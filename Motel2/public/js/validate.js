jQuery(document).ready(function($) {
    $('.formValidate').validate({
        rules: {
            name: {
                required: true,
                minlength: 5
            },
            date: 'required',
            address: 'required',
            description: 'required',
            provinces: 'required',
            districts: 'required',
            wards: 'required',
            email: {
                required: true,
                email: true
            },
            password: {
                minlength: 5,
                required: true
            },
            phone: {
                minlength: 10,
                required: true,
                digits: true,
                number: true
            },
            price: {
                required: true,
                digits: true,
                number: true
            },
            acreage: {
                required: true,
                digits: true,
                number: true
            },
            passwordConfirm: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            terms: {
                required: true
            },
            images: {
                required: true,
                extension: "jpg|png|jpeg"
            },
            attribute: {
                required: true,
            },
        }
    });
    $(document).on('blur', "#email", () => {
        const a = $('#email').val();
        fetch(`http://${domainUrl}?c=login&a=APICheck&email=${a}`)
            .then(d => d.json())
            .then(data => {
                if (data.count > 0) {
                    $('#email').after(`<label id="email-error" class="error" for="email">Email already exists</label>`);
                } else {
                    console.log('chua ton tai');
                }
            });
    });
})