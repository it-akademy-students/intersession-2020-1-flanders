<template>
    <div>


        <h1>Analyse des fichiers PHP d'un projet github</h1>
        <div class="form-group">
            <label for="inputGitHubUrl">Lien du repo GitHub</label>
            <input type="url" id="inputGitHubUrl" class="form-control" v-model="url" placeholder="Veuillez insérer le lien vers le repo GitHub contenant des fichiers PHP à scanner" required>
            <label for="inputMail">Email de retour rapport</label>
            <input type="email" id="inputMail" class="form-control" aria-describedby="emailHelp" v-model="mail" required>

            <!-- animated button -->


            <button type="submit" class="btn btn-info mt-2" @click="checkUrl">Scanner</button>

            <transition
                name="custom-classes-transition"
                enter-active-class="animated tada"
                leave-active-class="animated bounceOutRight"
            >
                <img 
                v-if='show'
                    :src='image'
                    class="m-3"
                > 
            </transition>

            
            <transition name='fade'>
            </transition>
            <div class="vld-parent">
                <loading :active.sync="isLoading"
                         :is-full-page="false"></loading>
                <button type="submit" class="btn btn-info mt-2" @click="checkUrl" @click.prevent="doAjax">Scanner</button>
            </div>
        </div>




        <table class="table table-hover">
            <thead class="thead-dark" v-if="info">
                <tr>
                    <th>Nombre de fichiers : {{info.length}}</th>
                </tr>
            </thead>
            <tbody v-for="i in info" :key="i.id">
                <tr class="bg-white">
                    <td>Nom du fichier : <b>{{i.name}}</b> Chemin : <b>{{i.path}}</b></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import Loading from 'vue-loading-overlay';
    // Import stylesheet
    import 'vue-loading-overlay/dist/vue-loading.css';
    export default {

    data() {
        return {
<<<<<<< HEAD
            url: null,
            mail: null,
=======
            isLoading: false,
            url: '',
            mail: '',
>>>>>>> Dev
            info: null,
            show: true,

        }
    },
    components: {
        Loading
    },
    methods: {
        checkUrl() {
            this.show = false;
            let url = this.url;
            let tabExtension = url.slice(19).split('.');
            if(tabExtension[tabExtension.length-1] == "git"){
                tabExtension = tabExtension.slice(0, -1);
            }
            let url2 = tabExtension.join('.');
            let url3 = `https://api.github.com/search/code?q=.php+in:path+repo:${url2}`;
            console.log(url3);
            axios.get(`${url3}`)
            .then(response => {
                console.log(response);
                this.info = response.data.items;
                axios.post('/processFiles',
                {
                    params : this.info,
                    mail : this.mail
                }).then(response => {
                    console.log(response);
                    console.log(response.data[7]);
                    //console.log('test');
                }).catch(error => {
                    console.log(error);
                });
            });
        },
        doAjax() {
            this.isLoading = true;
            // simulate AJAX
            setTimeout(() => {
                this.isLoading = false
            },5000)
        },

    },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
<<<<<<< HEAD

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}

</style>
=======
    .vld-parent {
        height: 20vh;
        margin: 0;
    }
</style>
>>>>>>> Dev
