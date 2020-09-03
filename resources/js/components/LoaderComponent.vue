<template>
    <div class="vld-parent">
        <loading :active.sync="isLoading"
                 :can-cancel="true"
                 :on-cancel="onCancel"
                 :is-full-page="false"></loading>

        <button @click.prevent="doAjax">fetch Data</button>
    </div>
</template>

<script>
    // Import component
    import Loading from 'vue-loading-overlay';
    // Import stylesheet
    import 'vue-loading-overlay/dist/vue-loading.css';

    export default {
        data() {
            return {
                isLoading: false,
            }
        },
        components: {
            Loading
        },
        methods: {
            doAjax() {
                this.isLoading = true;
                // simulate AJAX
                setTimeout(() => {
                    this.isLoading = false
                },5000)
            },
            onCancel() {
                console.log('User cancelled the loader.')
            }
        }
    }
</script>

<style>
    vl {
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
</style>
