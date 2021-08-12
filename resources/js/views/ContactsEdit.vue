<template>
    <div>
        <div class = "flex justify-between">
                    <a href="#" class = "text-blue-400" @click="$router.back()">
                        Back
                    </a>
        </div>

        <form @submit.prevent="submitForm">
            <InputField name="name" label="Contact Name" :errors="errors"
            placeholder="Contact Name" @update:field="form.name = $event" :data="form.name" />
            <InputField name="email" label="Contact Email" :errors="errors"
            placeholder="Contact Email" @update:field="form.email = $event" :data="form.email" />
            <InputField name="company" label="Company" :errors="errors"
            placeholder="Company" @update:field="form.company = $event" :data="form.company" />
            <InputField name="birthday" label="Birthday" :errors="errors"
            placeholder="MM/DD/YYYY" @update:field="form.birthday = $event" :data="form.birthday"/>
             <InputField name="subject" label="subject" :errors="errors"
            placeholder="Subject" @update:field="form.subject = $event" :data="form.subject"/>
            <InputField name="location" label="location" :errors="errors"
            placeholder="location" @update:field="form.location = $event" :data="form.location"/>
            <InputField name="description" label="description" :errors="errors"
            placeholder="description" @update:field="form.description = $event" :data="form.description" />
           

            <div class="flex justify-end">
                <button class="py-2 px-4 rounded text-red-700 border mr-5 hover:border-red-700">Cancel</button>
                <button class="bg-blue-500 py-2 px-4 text-white rounded hover:bg-blue-400">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
    import InputField from '../components/InputField';

    export default {
        name: "ContactsCreate",

        components: {
            InputField
        },

        mounted() {
            axios.get('/api/contacts/' + this.$route.params.id)
                .then(response =>  {
                    this.form = response.data.data;

                    this.loading = false;
                })
                .catch(error => {
                    this.loading = false;

                    if(error.response.status === 404) {
                        this.$router.push('/contacts');
                    }
                });
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
                },

                errors: null,
                loading: true,
            }
        },

        methods: {
            submitForm: function () {
                axios.patch('/api/contacts/' + this.$route.params.id, this.form)
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