export default {
    data () {
        return {
            editing: false
        }
    },

    methods: {
        edit () {
            this.setEditCache();
            this.editing = true;
        },

        cancel () {
            this.restoreFromCache();
            this.editing = false;
        },

        setEditCache () {},
        restoreFromCache () {},

        update () {
            axios.put(this.endpoint, this.payload())
                .catch(({response}) => {
                    this.$toast.error(response.data.message, "Error", { timeout: 3000 });
                })
                .then(({data}) => {
                    this.bodyHtml = data.body_html;
                    // this.$toast.success(data.message, "Success", { timeout: 3000 });
                    alert(data.message);
                    this.editing = false;
                })
        },

        payload () {},

        destroy () {
                if(confirm('Are u sure about this')){
                        this.delete();
            }
        },

        delete () {}
    }
}
