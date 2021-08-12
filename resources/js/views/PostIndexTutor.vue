
<template >

    <PostListTutor endpoint="/api/posts" />
   
</template>

<script>
    import PostListTutor from '../components/PostListTutor';

    export default {
        name: "PostIndexTutor",

        components: {
            PostListTutor
        }
 
    }

    

</script>

<style scoped>

</style>
