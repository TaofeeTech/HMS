<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
</head>

<body>

    {{-- <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
        <div class="row" style="margin-bottom:40px;">
            <div class="col-md-8 col-md-offset-2">
                <p>
                    <div>
                        Lagos Eyo Print Tee Shirt
                        ₦ 2,950
                    </div>
                </p> --}}
    {{-- <input type="hidden" name="email" value="otemuyiwa@gmail.com">
                <input type="hidden" name="orderID" value="345">
                <input type="hidden" name="amount" value="800">
                <input type="hidden" name="quantity" value="3">
                <input type="hidden" name="currency" value="NGN">
                <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" >
                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">

                <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}

    {{-- <p>
                    <button class="btn btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                        <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
                    </button>
                </p>
            </div>
        </div>
    </form> --}}

    {{-- Paystack  --}}

    {{-- <form id="paymentForm">
        <div class="form-group" hidden>
            <label for="email">Email Address</label>
            <input type="email" id="email-address" value="dennis@gmail.com" required />
        </div>
        <div class="form-group" hidden>
            <label for="amount">Amount</label>
            <input type="tel" id="amount" value="239" required />
        </div>
        <div class="form-group" hidden>
            <label for="fullName">Full name</label>
            <input type="text" id="fullName" value="Dennis Silas" />
        </div>
        <div class="form-submit">
            <button type="submit" class="btn btn-primary px-8 py-2 lh-238"
                onclick="payWithPaystack()">
                Pay Now</button>
        </div>
    </form> --}}


    {{-- Paystack  --}}
    {{-- <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(e) {
            e.preventDefault();

            let handler = PaystackPop.setup({
                key: 'pk_test_02a9b7d5e4678004b3b767ece2869fa2558c9614', // Replace with your public key
                email: document.getElementById("email-address").value,
                fullname: document.getElementById("fullName").value,
                amount: document.getElementById("amount").value * 100,
                // ref: '' + Math.floor((Math.random() * 1000000000) + 1),
                onClose: function() {
                    alert('Window closed.');
                },
                callback: function(response) {
                    window.location =
                        "{{ route('callback') }}";
                }

            });

            handler.openIframe();
        }
    </script>  --}}

    {{-- <script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
        e.preventDefault();

        let handler = PaystackPop.setup({
            key: 'pk_test_02a9b7d5e4678004b3b767ece2869fa2558c9614', // Replace with your public key
            email: document.getElementById("email-address").value,
            fullname: document.getElementById("fullName").value,
            amount: document.getElementById("amount").value * 100, // Paystack works with kobo, so multiply by 100
            ref: '' + Math.floor((Math.random() * 1000000000) + 1), // Generate a pseudo-unique reference. Can also be generated from backend.
            onClose: function() {
                alert('Transaction was not completed, window closed.');
            },

            callback: function(response) {
                // Redirect to your backend with the transaction reference
                window.location.href = "{{ route('callback') }}?reference=" + response.reference;
            }
        });

        handler.openIframe();
    }
</script> --}}


    <form>
        <input id="email" name="user_email" value="">
        <input id="price" name="amount" value="">
        {{-- <input  name="cartid" value=""> --}}
        <button name="pay_now" type="button" id="pay-now" title="Pay now">Pay now</button>
    </form>

    <script src="https://js.paystack.co/v2/inline.js"></script>
     // try {
            //     const response = await fetch("{{ route('pay_save') }}", {
            //         method: 'POST',
            //         headers: {
            //             'Content-Type': 'application/json',
            //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //         },
            //         body: JSON.stringify({
            //             email: email,
            //             price: price
            //         })
            //     });

            //     const data = await response.json();
            //     console.log(data);
            //     console.log(data.data.access_code);
            //     let access_code = data.data.access_code
            //     const popup = new PaystackPop();
            //     popup.resumeTransaction(access_code);
            //     window.location.href = "{{ route('callback') }}?reference=" + data.data.reference;
            // } catch (error) {
            //     console.error('Error initializing transaction:', error);
            //     alert('An error occurred. Please try again.');
            // }
    <script>
        async function pay() {

            const email = document.getElementById('email').value;
            const price = document.getElementById('price').value;

            if (!email || !price) {
                alert("Please enter both email and amount.");
                return;
            }
            
            try {
                const response = await fetch("{{ route('pay_save') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        email: email,
                        price: price
                    })
                });

                const data = await response.json();
                if (data.status) {
                    // Redirect the user to Paystack payment page
                    window.location.href = data.authorization_url;
                } else {
                    console.error('Payment initialization failed');
                }
            } catch (error) {
                console.error('Error:', error);
            }


        }

        const btn = document.getElementById("pay-now");

        btn.addEventListener('click', pay)
    </script>




</body>

</html>
