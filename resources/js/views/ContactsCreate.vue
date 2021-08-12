<template>
    <div>
        <form @submit.prevent="submitForm">
            <InputField name="name" label="Contact Name" :errors="errors"
            placeholder="Contact Name" @update:field="form.name = $event" type="textarea" />
            <InputField name="email" label="Contact Email" :errors="errors"
            placeholder="Contact Email" @update:field="form.email = $event" type="textarea" />
            <InputField name="company" label="Company" :errors="errors"
            placeholder="Company" @update:field="form.company = $event" type="textarea" />
            <InputField name="birthday" label="Birthday" :errors="errors"
            placeholder="MM/DD/YYYY" @update:field="form.birthday = $event" type="textarea" />
            <InputField name="subject" label="subject" :errors="errors"
            placeholder="subject" @update:field="form.subject = $event" type="textarea"/>

            <InputField name="location" label="location" :errors="errors"
            placeholder="location" @update:field="form.location = $event" type="textarea"/>
            
            <InputField name="description" label="description" :errors="errors"
            placeholder="description" @update:field="form.description = $event" type="textarea"/>
            <div>
                <label for="image" class="text-blue-500 pt-2 uppercase text-xs font-bold static ">Image</label>

                <input type="file" class="form-control-file" id="image" name="image">
            </div><br/>

            <Availability />

            <div class="flex justify-end">
                
                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:transform-none">Cancel</button>
                <button class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400 transition transform hover:-translate-y-1 motion-reduce:transition-none motion-reduce:transform-none">Add New Tutor</button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from '../components/InputField';
    import Availability from '../components/Availability';


    export default {
        name: "ContactsCreate",

        components: {
            InputField,
            Availability
               
        },

        data: function () {
            return {
                form: {
                    'name': '',
                    'email': '',
                    'company': '',
                    'birthday': '',
                    'subject': '',
                    'location': '',
                    'description': '',
                    'image':'',
                },
                

                errors: null,
            }
        },

        methods: {
            submitForm: function () {
                axios.post('/api/contacts', this.form)
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