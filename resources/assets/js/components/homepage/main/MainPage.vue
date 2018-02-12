<template>
    <span>
        {{ message }}
        <br>
        {{ config.message1 }}
        <br>
        {{ config.message2 }}
        <br>
        <button v-on:click="doSomething">함수동작</button>
        <div class="css_test1">
            색깔
        </div>
    </span>
</template>

<style scoped>
.css_test1 {color:red;}
</style>

<script>
export default {
    data() {
        return {
            'message' : '템플릿 테스트'
        }
    },
    props: [
        'config'
    ],
    methods: {
        doSomething : function() {
            
            asyncRequest({
                url: '/homepage/ajax/get_test_ajax',
                data: {
                    message: this.message
                },
                success: (result) => {
                    alert(result.message);
                }
            });
            
        }
    }
}
</script>
