<!DOCTYPE html>
<head>


</head>

<body>
   <div id="root">
      <h1 :class="titleClass">Some title</h1>
       <input type="text"  id="input" v-model="newName"/>
       <button id="button" :title="title" @click="addName" :disabled="isDisabled">Add some names</button>

       <ul>
           <li v-for="name in names"> @{{ name }}</li>
       </ul>
       <ul>
           <item v-for="book in books">@{{ name }}</item>

       </ul>
       <books></books>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
   <script>
       Vue.component('book',{
           template: '<li><slot></slot><li>'
       });

       Vue.component('books',{
           template: `<div>
                        <book v-for="book in books">@{{book.title}} published in @{{ book.year }}</book>
                     </div>`,
           data() {
               return {
                   books: [
                       {title: "Some title", year: "2020"},
                       {title: "Another title", year: "2021"},
                   ]
               }
           }
       });
       var app = new Vue({
           el: "#root",
           data: {
               isDisabled: false,
               title: "This is the button title",
               titleClass: "text-bold",
               newName: '',
               message: 'Hello world',
               names: ['ana', 'sandel']
           },
           methods: {
               addName(){
                  this.isDisabled = true;
                  this.names.push(this.newName)
                  this.newName= '';
               }

           },
       })

       document.querySelector('#button').addEventListener( 'click' , () => {
          let name = document.querySelector('#name');
          app.names.push(name.value);
          name.value='';
       });


   </script>

</body>
