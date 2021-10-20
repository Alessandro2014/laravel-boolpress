<template>
    <div class="container">
        <h1>Benvenuto su Boolpress</h1>

        <div class="row">
            <div class="text center"></div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    name: "App",
    data() {
        return {};
    },
    method: {
        getPosts() {
            axios
                .get(`http://localhost:8000/api/posts`)
                .then(res => {
                    console.log(res);
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
};
</script>
