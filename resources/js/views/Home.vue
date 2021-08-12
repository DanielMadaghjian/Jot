<template >
   <div>  
    <div class = "pl-8 text-3xl font-bold">
        <h1>Why use yourTutor?</h1>
   </div>
       <div class = "flex flex-row" >
        <div class = "text-xl pl-16 pt-6">
                <ul class="list-disc">
                    <li>We find a suitable trusted tutor for you</li>
                    <li>Hassle free grinds solution</li>
                    <li>Receive updates on your childs progress</li>
                    <li>No service fees until March 1st</li>
                    <li>Tutors are validated and vetted prior to lessons</li>
                    <li>Experienced online tutors</li>
                </ul>

        </div> 
        <div class = "w-96 pl-12">
            <img src="https://static3.bigstockphoto.com/0/1/1/large1500/110455502.jpg" alt="cat" />
        </div>
        </div>

        <div class = "pt-12">
            <ContactsList endpoint="/api/contacts" />
        </div>

        <div class="pt-5">
            
            <b-button  v-b-toggle.collapse-1 variant="primary">Rate YourTutor.ie!</b-button>
            <b-collapse id="collapse-1" class="mt-2">
                <b-card>
                
                    <p class="card-text text-center font-bold text-xl">Your opinion matters to us!</p><br/>

                    <Rating label="Rate YourTutor.ie!"/>

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
   
</template>

<script>
    import ContactsList from '../components/ContactsList';
    import Rating from '../components/Rating';

    export default {
        name: "Home",

        components: {
            ContactsList,
            Rating,
        }
 
    }

    

</script>

<style scoped>

</style>