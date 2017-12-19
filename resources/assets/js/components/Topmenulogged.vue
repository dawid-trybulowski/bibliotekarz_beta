<script>
    export default {
            template: '#topmenulogged',
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