
<template>
    <div class = "bg-gray-100">
        <div class = "pb-8 text-center italic text-xl font-bold ">GiveFeedback</div>

        <router-link to="/posts/create" class = "flex flex-row">
            <div class="pl-32 ">
                            <div class=" font-bold   bg-blue-50  flex items-stretch border-double rounded-xl  border-2 border-blue-500 p-4   hover:bg-blue-400 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:transform-none" >Add New Post</div>
            </div>
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="200.000000pt" height="40.000000pt" viewBox="0 0 200.000000 200.000000"
 preserveAspectRatio="xMidYMid meet">
<metadata>
Created by potrace 1.10, written by Peter Selinger 2001-2011
</metadata>
<g transform="translate(0.000000,200.000000) scale(0.100000,-0.100000)"
fill="#000000" stroke="none">
<path d="M1541 1749 l-64 -69 -502 0 c-474 0 -503 -1 -518 -18 -15 -17 -17
-77 -17 -664 0 -612 1 -646 18 -661 17 -15 69 -17 545 -17 464 0 527 2 541 16
14 13 16 58 16 332 0 350 -2 362 -59 362 -59 0 -61 -9 -61 -313 l0 -277 -440
0 -440 0 0 560 0 560 394 0 393 0 -246 -245 -246 -244 -71 -196 c-49 -135 -68
-198 -60 -201 7 -3 97 26 200 63 l187 68 379 380 380 380 -127 127 c-70 71
-130 127 -133 127 -3 -1 -34 -32 -69 -70z m286 -185 c-1 -2 -166 -167 -366
-368 l-364 -364 -165 -61 c-92 -33 -168 -58 -171 -56 -2 3 22 78 54 167 l58
163 248 245 c137 135 249 251 249 257 0 6 -7 19 -16 27 -13 14 -64 16 -401 16
-346 0 -388 -2 -405 -17 -17 -15 -18 -46 -18 -571 0 -503 2 -557 17 -574 15
-17 42 -18 451 -18 391 0 437 2 454 17 17 15 18 37 18 288 0 233 2 274 15 279
8 3 22 3 30 0 13 -5 15 -48 13 -323 l-3 -316 -525 0 -525 0 -3 639 c-2 505 0
641 10 648 7 4 235 8 507 8 l494 -1 66 66 66 65 107 -107 c59 -59 106 -108
105 -109z"/>
<path d="M1268 1343 c-320 -322 -327 -329 -334 -376 -5 -38 -3 -52 11 -67 21
-23 63 -26 108 -6 48 21 657 637 657 664 0 27 -76 112 -99 112 -9 0 -163 -147
-343 -327z m387 257 l40 -40 -320 -319 c-316 -315 -321 -319 -369 -326 l-49
-7 7 49 c6 47 11 52 324 366 174 174 319 317 322 317 3 0 24 -18 45 -40z"/>
</g>
</svg>

            </router-link>
        <div v-if="loading">Loading...</div>
        
        <div v-else class = "pb-4 flex flex-col-reverse ">
            
            
            
            
            <div v-if="posts.length === 0">
                <p>No Posts yet. </p>
            </div>
            
            <div v-for="(post,idx) in posts" :key="idx" >
                <div class = "pl-32 pt-4 pr-64"> 
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

                        <router-link :to="'/posts/' + post.data.post_id" class = "pl-4">
                            <button class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:transform-none">More ></button>
                        </router-link>
                        
                         
                        
                    </div>
                </div>
               
            </div>
            
            
          
        </div>

    </div>
</template>

<script>
    

    export default {
        name: "PostListTutor",

        components: {
            
        },

        props: [
            'endpoint',
            
            'user',
        
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
                modal:false,
                
            }
        }
    }
</script>

<style scoped>

</style>
