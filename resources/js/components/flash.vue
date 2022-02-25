<template>
    <div class="alert alert-success spacing" role="alert" v-show="show">
        {{ body }}
    </div>
</template>
   
<script>
    export default {
        props: ['message'],
        data() {
            return {
                show : false,
                body : ''
            }
        },
        created() {
            if(this.message) {
                this.flash(this.message)
            }
            window.events.$on('flash',(message) => this.flash(message))
        },
        methods: {
            flash(message) {
                this.show = true
                this.body = message
  
                setTimeout(() => {
                    this.hide()
                },3000)
            },
            hide() {
                this.show = false
            }
        }
    }
</script>
   
<style>
    .spacing {
        position: fixed;
        right: 25px;
        bottom: 25px;
    }
</style>