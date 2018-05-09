<script>
    export default {
            template: '#topmenulogged',
                    mounted() {
                        $('.modal').modal();
                    },
        data() {
         return{
            showSearch: false
           }
        },
        methods: {
            showSearchFunction: function()
            {
            console.log('click');
                this.showSearch = !this.showSearch;
            }
        }
    }
</script>