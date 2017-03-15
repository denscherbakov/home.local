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
    props: ['user', [
                        'sended',
                        'added',
                        'waited'
                    ],
    ],

    data: function() {
        return {
            isSended: '',
            isAdded: '',
            isWaited: '',
        }
    },
    mounted() {
        this.isSended = this.isSend ? true : false;
        this.isAdded = this.isFriend ? true : false;
        this.isWaited = this.isRequest ? true : false;
    },

    computed: {
        isSend() {
            return this.sended;
        },
        isFriend() {
            return this.added;
        },
        isRequest() {
            return this.waited;
        },
    },

    methods: {
        add(user) {
            axios.post('/user/add/'+user)
                .then(response => this.isSended = true)
                .catch(response => console.log(response.data));
        },
        send(article) {
            axios.post('/article/unlike/'+article)
                .then(response => this.isLiked = false)
                .catch(response => console.log(response.data));
        }
    }
}
</script>