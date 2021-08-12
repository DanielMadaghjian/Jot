
<template>
    <div class = "bg-gray-100">
        <div class = "pb-8 text-center italic text-xl font-bold ">MyFeedback</div>
        <div v-if="loading">Loading...</div>
        
        <div v-else class = "pb-4 flex flex-col-reverse pl-10 pr-10 ">
            <div v-if="posts.length === 0">
                <p>No Posts yet. </p>
            </div>


            
            <div v-for="(post,idx) in posts" :key="idx" >
                <div class = "pl-32 pt-4 pr-96"> 
                    <div class = "bg-white  flex items-stretch border-double rounded-xl  border-2 border-blue-500 p-4  ">
                    
                        

                        <div class= "w-32 bg-gray-100 pl-4 border-1 border-dashed border-blue-500 rounded-xl">    
                                <p class = "pt-6 text-gray-600 font-bold uppercase text-sm">Date</p>
                                <p class = "pt-2 text-blue-400 font-bold">{{post.data.date}}</p>

                                <p class = "pt-6 text-gray-600 font-bold uppercase text-sm">Subject</p>
                                <p class = "pt-2 text-blue-400 font-bold">{{post.data.subject}}</p>

                                <p class = "pt-6 text-gray-600 font-bold uppercase text-sm">Topic</p>
                                <p class = "pt-2 text-blue-400 pb-4 font-bold">{{post.data.topic}}</p>
                        </div>
                        <div class = " pl-2 bg-green-50 w-96  right-0 border-1 border-dashed border-blue-500 rounded-xl">
                                <p class = "pt-6 text-gray-600 font-bold uppercase text-sm">Key Takeaways</p>
                                <p class = "pt-2 text-blue-400 pb-4 font-bold">{{post.data.takeaway}}</p>
                        </div>
                       
                    </div>
                </div>
               
            </div>

             <div class="pt-5">
            
                    <b-button  v-b-toggle.collapse-1 variant="primary">Rate My Tutor</b-button>
                    <b-collapse id="collapse-1" class="mt-2">
                        <b-card>
                        
                            <p class="card-text text-center font-bold text-xl">Your opinion matters to us!</p><br/>

                            <Rating label="Rate my Tutor!"/>

                        <div class="flex justify-end">
                        
                            <b-button class = "bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:transform-none" v-b-modal.modal-1>Submit</b-button>
                            
                        </div>
                            <b-modal id="modal-1" title="YourTutor">
                                <p class="my-4">Thank you for your review!</p>
                            </b-modal>
                    
                        </b-card>
                    </b-collapse>
            
            </div>
            
            
          
        </div>

    </div>
</template>

<script>
    import Rating from '../components/Rating';

    export default {
        name: "PostList",

        components: {
            Rating
        },

        props: [
            'endpoint',
        ],

        mounted() {
            axios.get(this.endpoint)
            .then(response => {
                this.posts = response.data.data;

                this.loading = false;
            })
            .catch(error => {
                this.loading = false;

                alert("Unable to fetch posts.");
            });
        },

        data: function () {
            return {
                loading:true,
                posts: null,
                
                
            }
        }
    }
</script>

<style scoped>

</style>
