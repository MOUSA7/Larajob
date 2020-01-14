<template>
    <div>
            <button v-if="show" @click.prevent="unsave()"  class="btn btn-dark" style="width: 100%">UnSave</button>

        <button v-else="show" @click.prevent="save()"  class="btn btn-primary" style="width: 100%">Save</button>



    </div>
</template>

<script>
    export default {
        props:['job_id','favourited'],
        mounted() {
            console.log('Component mounted.');
            this.show = this.jobfavourite ?true :false;
        },
        data(){
            return{
                'show':true
            }
        },
        computed:{
            jobfavourite(){
                return this.favourited
            }
        },
        methods:{
            save(){
                axios.post('/save/'+this.job_id).then(response=>this.show=true).catch(error=>alert('error'))
            },
            unsave(){
                axios.post('/unsave/'+this.job_id).then(response=>this.show=false).catch(error=>alert('error'))
            }
        }
    }
</script>
