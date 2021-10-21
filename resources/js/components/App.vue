<template>
    <div class="container">
        <h1 class="mt-5">Benvenuto su Boolpress</h1>
        <PostList />
    </div>
</template>

<script>
import PostList from "./Posts/PostList.vue";
export default {
    name: "App",
    data() {
        return {};
    },
    components: {
        PostList
    }
};
</script>
