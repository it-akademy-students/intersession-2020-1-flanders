<template>
    <div>
        <h1>Composant Home</h1>
        <div class="form-group">
            <label for="inputGitHubUrl">Lien du repo GitHub</label>
            <input type="url" id="inputGitHubUrl" class="form-control" aria-describedby="HelpBlock" v-model="url">
            <small id="HelpBlock" class="form-text text-muted">Veuillez insérer le lien vers le repo GitHub contenant des fichiers PHP à scanner</small>
            <button type="submit" class="btn btn-primary mt-2" @click="checkUrl">Scanner</button>
        </div>
        <ul class="list-group">
            <li class="list-group-item" v-for="i in info" :key="i.id">
                Nom du fichier : <b>{{i.name}}</b> Chemin : <b>{{i.path}}</b>
            </li>
        </ul>
        <!-- {{info}} -->
    </div>
</template>

<script>
    export default {

    data() {
        return {
            url: '',
            info: null
        }
    },

    methods: {
        checkUrl() {
            let url = this.url;
            let url2 = url.slice(19);
            // let url3 = `https://api.github.com/repos/${url2}`;
            let url3 = `https://api.github.com/search/code?q=.php+in:path+repo:${url2}`;
            console.log(url3);
                axios.get(`${url3}`)
                    .then(response => {
                        this.info = response.data.items;
                        // this.info = response.data.items.map(i => i.name,
                        //                                     i => i.path);
                        axios.get('https://192.168.33.10/getUrl', {
                            info: response.data.items
                        })
            });

            

            // axios.get('https://192.168.33.10/', {
            //     url: this.url
            // })
        }
    },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>