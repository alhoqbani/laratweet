<template>
    <div class="pull-right btn btn-success">
        <button @click="submit">
            {{ text }}
        </button>
    </div>
</template>

<script>
    export default {
        props: ['isFollowing', 'user'],
        data: function () {
            return {
                "status": this.isFollowing,
                "username": this.user
            }
        },
        methods: {
            unfollow: function () {
                const vm = this;
                axios.get(`/${this.username}/unfollows`).then(response => {
                    console.log(response.data);
                    this.status = false;
                })
            },

            follow: function () {
                const vm = this;
                axios.get(`/${this.username}/follows`).then(response => {
                    console.log(response.data);
                    this.status = true;
                })
            },
            submit: function () {
                if (this.status) {
                    this.unfollow();
                } else {
                    this.follow();
                }
            }
        },
        computed: {
            text() {
                return this.status ? 'UnFollow' : 'Follow';
            }
        }
    }
</script>

<style scoped>
    .btn-success {
        color: black;
    }
</style>
