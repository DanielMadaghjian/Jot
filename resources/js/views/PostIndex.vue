
<template >

    <PostList endpoint="/api/posts" />
   
</template>

<script>
    import PostList from '../components/PostList';

    export default {
        name: "PostIndex",

        components: {
            PostList
        }
 
    }

    

</script>

<style scoped>

</style>
