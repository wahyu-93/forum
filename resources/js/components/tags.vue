<template>
   <div>
        <li class="list-group-item" :class="activeUrl(tag.slug)" v-for="tag in tags">
            <a :href="`/forum/${tag.slug}`" class="text-black" style="text-decoration: none">{{ tag.name }}</a>
        </li>
   </div>
</template>

<script>
    export default {
        data(){
            return {
                tags: [],
                currentUrl : '',
            }
        },

        mounted(){
            axios.get('/forum/tags')
                .then((response) => {
                    this.tags = response.data
                })

        },

        created(){
            this.currentUrl = window.location.pathname
        },

        methods:{
            activeUrl(tag){
                return this.currentUrl == `/forum/${tag}` ? 'active' : ''
            }
        }


    }
</script>
