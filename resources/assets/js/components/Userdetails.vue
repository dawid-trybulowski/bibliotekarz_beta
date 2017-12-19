<script>
    export default {
        template: '#userdetails',
                data() {
                    return{
                        showDetailsProp: []
                    }
                },
        methods: {
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