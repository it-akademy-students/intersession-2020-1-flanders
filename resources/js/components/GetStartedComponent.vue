<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-white bg-dark mb-3">
                    <div class="card-header"><h4>Fonctionnement</h4></div>
                    <div class="card-body">
                        <p class="card-text">Ce site permet d'éxécuter des outils d'analyse sur un projet. Il suffit de renseigner le lien du projet github ainsi qu'un email dans la section "Analyse du code PHP" et les rapports d'analyse vous seront envoyés.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
