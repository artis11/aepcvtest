require('./bootstrap');
window.axios = require('axios');

new Vue({
    el: '#app',
    data: {
        response: null
    },
    methods: {
        onSubmitForm: function (e) {
            e.preventDefault();
            let self = this;
            let action = document.querySelector("#myForm").getAttribute('action');
            let inputTitle = document.querySelector("#input-title").value;
            let inputText = document.querySelector("#input-text").value;
            axios.put(action, {
                title: inputTitle,
                text: inputText
            }).then(function (response) {
                self.response = response
            }).catch(function (response) {
                self.response = response.response;
            });
        }
    }
});
