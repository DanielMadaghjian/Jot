<template>
    <div>
        <div class = "flex justify-between">
        <a href="#" class = "text-blue-400" @click="$router.back()">
                             Back
                        </a>
        </div>

        <form @submit.prevent="submitForm">
            <InputField name="date" label="Date" :errors="errors"
            placeholder="(MM/DD/YYYY)" @update:field="form.date = $event" :data="form.date"/>
            <InputField name="subject" label="Subject" :errors="errors"
            placeholder="Subject" @update:field="form.subject = $event" :data="form.subject" />
            <InputField name="topic" label="Topic" :errors="errors"
            placeholder="Topic" @update:field="form.topic = $event"  :data="form.topic"/>
             <InputField name="takeaway" label="Key Takeaways" :errors="errors"
            placeholder="Takeaways" @update:field="form.takeaway = $event" :data="form.takeaway" />
            
            
            
            

            <div class="flex justify-end">
                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:transform-none">Cancel</button>
                
                <button class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:transform-none">Save</button>
                
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from '../components/InputField';

    export default {
        name: "PostEdit",

        components: {
            InputField
        },

        mounted() {
            axios.get('/api/posts/' + this.$route.params.id)
                .then(response =>  {
                    this.form = response.data.data;

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
                form: {
                    'date': '',
                    'subject': '',
                    'topic': '',
                    'takeaway': '',
                    
                },

                errors: null,
                loading: true,
            }
        },

        methods: {
            submitForm: function () {
                axios.post('/api/posts', + this.$route.params.id, this.form)
                    .then(response => {
                        this.$router.push(response.data.links.self);
                    })
                    .catch(errors => {
                        
                        this.errors = errors.response.data.errors;
                        
                    });
            }
        }
    }
</script>

<style scoped>

</style>