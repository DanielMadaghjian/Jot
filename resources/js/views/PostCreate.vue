<template>
    <div>
         <a href="#" class = " p-2 text-blue-400 font-bold border-2 border-blue-200" @click="$router.back()">
                             Back
                        </a>

        <form @submit.prevent="submitForm">
            <InputField name="date" label="Date" :errors="errors"
            placeholder="(MM/DD/YYYY)" @update:field="form.date = $event" type="textarea" />
            <InputField name="subject" label="Subject" :errors="errors"
            placeholder="Subject" @update:field="form.subject = $event" type="textarea" />
            <InputField name="topic" label="Topic" :errors="errors"
            placeholder="Topic" @update:field="form.topic = $event" type="textarea" />
            
            <InputField name="takeaway" label="Key Takeaways" :errors="errors"
            placeholder="Takeaways" @update:field="form.takeaway = $event" type="textarea" />
            
            

            <div class="flex justify-end">
                
                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:transform-none"><a href="#" class = "text-blue-400" @click="$router.back()">Cancel</a></button>
                
                    <button class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:transform-none">Add New Post</button>
                
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from '../components/InputField';

    export default {
        name: "PostCreate",

        components: {
            InputField
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
            }
        },

        methods: {
            submitForm: function () {
                axios.post('/api/posts', this.form)
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