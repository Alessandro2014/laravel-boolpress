<template>
    <section>
        <h3>I miei post</h3>
        <div class="card mb-3" v-for="post in posts" :key="post.id">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img :src="post.image" :alt="post.title" />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ post.title }}</h5>
                        <p class="card-text">{{ post.content }}</p>
                        <p class="card-text">
                            <small class="text-muted">
                                creato il :{{ formatDate(post.created_at) }}</small
                            >
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from "axios";
export default {
    name: "PostList",
    data() {
        return {
            baseUri: "http://127.0.0.1:8000",
            posts: []
        };
    },
    methods: {
        getPosts() {
            axios
                .get(`${this.baseUri}/api/posts`)
                .then(res => {
                    this.posts = res.data;
                })
                .catch(err => {
                    console.error(err);
                });
        },
        formatDate(date){
            const postDate = new Date(date);
            let day = postDate.getDate();
            let month = postDate.getMonth() +1;
            const year = postDate.getFullYear();
            if (day < 10) day = "0" + day;
            if (month < 10) month = "0" + month;
            return `${day}/${month}/${year}`;
        }
    },
    created() {
        this.getPosts();
    }
};
</script>

<style></style>
