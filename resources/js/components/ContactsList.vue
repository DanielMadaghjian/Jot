<template>
    <div class = "bg-gray-100">
        <div class = "pb-8 text-center italic text-xl font-bold ">Some of the Tutors we can match you with!</div>
        <div v-if="loading">Loading...</div>
        
        <div v-else class = "pb-4 flex flex-row pl-10 pr-10 overflow-y-scroll scrollbar-thin scrollbar-thumb-blue-700 scrollbar-track-blue-300 hover:scrollbar-thumb-green-700">
            <div v-if="contacts.length === 0">
                <p>No Contacts yet. <router-link to="/contacts/create" class = "text-blue-500 font-bold">     Get Started> </router-link></p>
            </div>
            
            <div v-for="(contact,idx) in contacts" :key="idx" >
                <button class = "hover:bg-red-100">
                <router-link :to="'/contacts/' + contact.data.contact_id" class = "bg-white w-64 flex items-center border-double rounded-xl  border-l-2 border-r-2 border-blue-500 p-4  ">
                
                    <UserCircle :name="contact.data.name" />

                    <div class = " pl-2">
                        <p class = "text-blue-400 font-bold">{{ contact.data.name}}</p>
                        <p class = "text-gray-400 font-bold underline">{{ contact.data.company}}</p>
                        <p class = "text-gray-400  italic">{{ contact.data.subject}}</p>
                    </div>
                    
                </router-link>
                </button>
            </div>

            
            
            
            
            
          
        </div>

    </div>
</template>

<script>
   
    import UserCircle from '../components/UserCircle';

    export default {
        name: "ContactsList",

        components: {
            UserCircle,
        },

        props: [
            'endpoint'
        ],

        mounted() {
            axios.get(this.endpoint)
            .then(response => {
                this.contacts = response.data.data;

                this.loading = false;
            })
            .catch(error => {
                this.loading = false;

                alert("Unable to fetch contacts.");
            });
        },

        data: function () {
            return {
                loading:true,
                contacts: null,
            }
        }
    }
</script>

<style scoped>

</style>