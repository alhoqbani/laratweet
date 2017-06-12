require('./bootstrap');
window.Vue = require('vue');


import FollowingButton from './components/FollowingButton.vue';

const app = new Vue({
    components: {FollowingButton},
    el: '#app'
});
