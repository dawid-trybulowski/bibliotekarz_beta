<script>
    export default {
        template: '#books',
        props: ['books'],
        mounted() {
            this.setBooks(this.books);
        },
        data() {
            var ratings = document.getElementsByClassName('rating');
            return{
                title: '',
                description: '',
                showDetailsProp: []
            }
        },
        methods: {
            setBooks: function (books) {
                var self = this;
                $.each(books, function (key, value) {
                    Vue.set(self.showDetailsProp, value.id, false);
                });
            },
            showDetailsFunction: function (id) {
                var self = this;
                if (self.showDetailsProp[id])
                {
                    Vue.set(self.showDetailsProp, id, false);
                } else {
                    Vue.set(self.showDetailsProp, id, true);
                }
            }
        }
    }
</script>