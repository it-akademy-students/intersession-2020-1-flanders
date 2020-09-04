<template>
    <div class="container">

        <div class="content">
            <h1>" Le don vient du coeur, non de la fortune." - Proverbe Kurde</h1>
            <div ref="paypal"></div>

        </div>
    </div>
</template>

<script>




    export default {
        data() {
            return {
                order: {
                    description: "Buy Things",
                    amount: {
                        currency_code: "USD",
                        value: 2
                    }
                }
            };
        },
        mounted: function() {
            const script = document.createElement("script");
            const ClientID = "AU5YkARBCj65SKZubBH7ldetjPMqHypbUdotgt2MMpQoCfE9YJDRsWfPtEqVbdpQwSh78QYwX8EslaCj";
            script.src = `https://www.paypal.com/sdk/js?client-id=${ClientID}`;
            script.addEventListener("load", this.setLoaded);
            document.body.appendChild(script);
        },
        methods: {
            setLoaded: function() {
                window.paypal
                    .Buttons({
                        createOrder: (data, actions) => {
                            return actions.order.create({
                                purchase_units: [this.order]
                            });
                        },
                        onApprove: async (data, actions) => {
                            const order = await actions.order.capture();
                            // ajax request
                        },
                        onError: err => {
                            console.log(err);
                        }
                    })
                    .render(this.$refs.paypal);
            }
        }
    };
</script>

<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }
    .content {
        margin-top: 100px;
        text-align: center;
    }
    
    h1 {
    padding-bottom: 20vh;
    }
</style>


