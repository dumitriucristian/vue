<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>

    <div class="container" id="app">
        <p>@{{message}}</p>
        <article class="message">
            <div class="message-header">
                <p>Hello World</p>
                <button class="delete" aria-label="delete"></button>
            </div>
            <div class="message-body">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
            </div>
        </article>
        <message-component title="first title" body="some text"></message-component>
        <message-component title="second title" body="another text"></message-component>
        <message-component title="third title" body="more text"></message-component>
    </div>


    <script>


        Vue.component('message-component' , {

            props: ['title', 'body'],
            template:`
            <article class="message" v-show="isVisible">
            <div class="message-header">
                <p>@{{title}}</p>
                <button class="delete" aria-label="delete" @click="hideModal"></button>
            </div>
            <div class="message-body">
                @{{body}}
            </div>
        </article>`,
            data() {
                return {
                    isVisible: true,
                };
            },
            methods: {
                hideModal(){
                  this.isVisible = false;
                }
            }
        });

        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!'
            }
        })
    </script>
</body>
