<template>
    <div>
            
                 <div class = "flex justify-between ">
                    
                        <a href="#" class = "text-blue-400" @click="$router.back()">
                            Back
                        </a>

                        <div class="relative">
                            <router-link :to="'/posts/' + post.post_id + '/edit'" 
                            class = "px-4 py-2 rounded text-green-500 border border-green-500 text-sm font-bold mr-2">Edit</router-link> 
                            <a href="#" class= "px-4 py-2 border border-red-500 rounded text-sm font-bold text-red-500" @click="modal = ! modal">Delete</a>
                            <div v-if="modal" class = "absolute bg-blue-900 text-white rounded-lg z-20 p-8 w-64 right-0 mt-2 mr-6">
                                <p>Are you sure you want to delete this record?</p>
                                <div class = "flex items-center mt-6 justify-end">
                                    <button class = "text-white pr-4 " @click="modal = ! modal">Cancel</button>
                                    <button class = "px-4 py-2 bg-red-500 rounded text-sm font-bold text-white " @click="destroy">Delete</button>
                                </div>
                            </div>
                            <div v-if = "modal" class = "bg-black opacity-25 absolute right-0 left-0 top-0 bottom-0 z-10" @click="modal = ! modal"></div>
                    </div>
                            
                  
                    
                    </div>
            
                   <div class = "flex flex-row pl-32"> 
                        <div class= " w-64 bg-gray-100 pl-4 border-1 border-dashed border-blue-500 rounded-xl">

                        
                        

                        <p class = "pt-6 text-gray-600 font-bold uppercase text-sm">Date</p>
                        <p class = "pt-2 text-blue-400 font-bold">{{post.date}}</p>

                        <p class = "pt-6 text-gray-600 font-bold uppercase text-sm">Subject</p>
                        <p class = "pt-2 text-blue-400 font-bold">{{post.subject}}</p>

                        <p class = "pt-6 text-gray-600 font-bold uppercase text-sm">Topic</p>
                        <p class = "pt-2 text-blue-400 pb-4 font-bold">{{post.topic}}</p>
                        </div>
                        <div class = " pl-2 bg-green-50 w-6/12 inset-y-0 right-0 border-1 border-dashed border-blue-500 rounded-xl">
                            <p class = "pt-6 text-gray-600 font-bold uppercase text-sm">Key Takeaways</p>
                            <p class = "pt-2 text-blue-400 pb-4 font-bold">{{post.takeaway}}</p>
                        </div>
                    
                    
                    
                </div>
                    
                 
    </div>
</template>

<script>

    export default {
        name: "PostShow",

        

        mounted() {
            axios.get('/api/posts/' + this.$route.params.id)
                .then(response =>  {
                    this.post = response.data.data;

                    this.loading = false;
                })
                .catch(error => {
                    this.loading = false;

                    if(error.response.status === 404) {
                        this.$router.push('/posts');
                    }
                });
        },

        data: function () {
            return {
                loading: true,
                modal: false,
                post: null,
            }
        },

        methods: {
            destroy: function () {
                axios.delete('/api/posts/' + this.$route.params.id)
                .then(response =>  {
                    this.$router.push('/postsTutor');
                })
                .catch(error => {
                    alert('Internal Error. Unable to delete post');
                })
            }
        }

        
    }
</script>

<style scoped>

</style>