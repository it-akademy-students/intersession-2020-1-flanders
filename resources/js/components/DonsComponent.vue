<template>
    <div class="container">
        <h1>Laravel 5.8 PayPal Integration Tutorial - ItSolutionStuff.com</h1>

        <table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/in/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" border="0" alt="PayPal Logo"></a></td></tr></table>

        <a @click="payment" class="btn btn-success">Pay $100 from Paypal</a>

        <div id="paypal-button-container"></div>
    </div>
</template>

<script>




    export default {


    methods: {
        payment() {
            const script = document.createElement("script");
            script.src ="https://www.paypal.com/sdk/js?client-id=AZl98PmngJ6OhBEscuDrauxYIHb-fHqVzxLzn44TL0kehGIuV1sQcWoknatPgPmXgvpdK1eYZa4_CXEY&currency=EUR";

        }
    },


        mounted() {



            paypal.Buttons({
                style: {
                    shape: 'pill',
                    color: 'blue',
                    layout: 'vertical',
                    label: 'paypal',

                },
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '2.00'
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        alert('Transaction completed by ' + details.payer.name.given_name + '!');
                    });
                }
            }).render('#paypal-button-container');



            console.log('Component mounted.')
        }
    }
</script>