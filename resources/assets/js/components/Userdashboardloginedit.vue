<script>
    export default {
        template: '#userdashboardloginedit',
        props: ['showTable', 'showModal'],
                mounted() {
                    $('.modal').modal();
                },
                data() {
                console.log(this.showTable);
                console.log(this.showModal);
                    return{

                    }
                },
        methods: {

        }

                }
</script>