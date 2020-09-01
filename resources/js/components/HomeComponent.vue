<template>
    <div>
        <h1>Composant Home</h1>
        <div class="form-group">
            <label for="inputGitHubUrl">Lien du repo GitHub</label>
            <input type="url" id="inputGitHubUrl" class="form-control" aria-describedby="HelpBlock" v-model="url">
            <small id="HelpBlock" class="form-text text-muted">Veuillez insérer le lien vers le repo GitHub contenant des fichiers PHP à scanner</small>
            <button type="submit" class="btn btn-primary mt-2" @click="checkUrl">Scanner</button>
        </div>
        <table class="table">
            <thead class="thead-dark" v-if="info">
                <tr>
                    <th>Nombre de fichiers : {{info.length}}</th>
                </tr>
            </thead>
            <tbody v-for="i in info" :key="i.id">
                <tr>
                    <td>Nom du fichier : <b>{{i.name}}</b> Chemin : <b>{{i.path}}</b></td>
                </tr>
            </tbody>
        </table>
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
                    params : this.info
                }).then(response => {
                    console.log(response);
                    console.log(response.data[7]);
                    //console.log('test');
                }).catch(error => {
                    console.log(error);
                });
            });
        }
    },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
