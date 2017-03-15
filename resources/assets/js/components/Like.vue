<template>
    <span>
        <a href="#" v-if="isLiked" @click.prevent="unLike(article)">
            <i class="fa fa-heart"></i>
        </a>
        <a href="#" v-else @click.prevent="like(article)">
            <i class="fa fa-heart-o"></i>
        </a>
    </span>
</template>

<script>
export default {
    props: ['article', 'liked'],
    data: function() {
        return {
            isLiked: '',
        }
    },
    mounted() {
        this.isLiked = this.isLike ? true : false;
    },

    computed: {
        isLike() {
            return this.liked;
        },
    },

    methods: {
        like(article) {
            axios.post('/article/like/'+article)
                .then(response => this.isLiked = true)
                .catch(response => console.log(response.data));
        },
        unLike(article) {
            axios.post('/article/unlike/'+article)
                .then(response => this.isLiked = false)
                .catch(response => console.log(response.data));
        }
    }
}
</script>