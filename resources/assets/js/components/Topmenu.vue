<script>
    export default {
            template: '#topmenu',
            props:['elements'],
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