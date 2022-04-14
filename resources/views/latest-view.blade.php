<!DOCTYPE html>
<html>
    <head>


    </head>
    <body>
        <style>
            .box{
                width:35px;
                height:35px;
                background-color: blue;
            }
            .box-two{
                width:35px;
                height:35px;
                background-color: red;}
            .box-three{
                width:35px;
                height:35px;
                background-color: green;
            }
            [v-cloak] {
            display:none;
            }
        </style>


        <div id="app" v-cloak>
            <h1>@{{greeting}}</h1>
            <input v-model="greeting" @keyup.enter="hello(greeting + 'some text')">
            <button v-on:click="boxOne = !boxOne">Show blue box</button>
            <button v-on:click="boxTwo = true">Show red box</button>
            <button v-on:click="toggleGreen"> green box</button>
            <div class="box" v-if="boxOne"></div>
            <div class="box-two" v-else-if="boxTwo"></div>
            <div class="box-three" v-if="boxThree"></div>


        </div>



        <script src="https://unpkg.com/vue@3"></script>
        <script>
            let app = Vue.createApp({
                data: function() {
                    return {
                        greeting: 'Hello baby',
                        boxOne: false,
                        boxTwo: false,
                        boxThree: true,
                    }
                },
                methods: {
                    toggleGreen(){
                        this.boxThree = !this.boxThree;
                        console.log(this.boxThree);
                    },
                    hello(text){
                        console.log(text);
                    }
                }
            });
            app.mount("#app");
        </script>
    </body>
</html>
