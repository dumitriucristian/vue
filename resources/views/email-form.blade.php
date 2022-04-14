<!DOCTYPE html>
<html>
    <head>

    </head>

<body>
    <h1>Email form</h1>

     <div id="app">
         <p>@{{ message }}</p>
         <login-form></login-form>
     </div>


 <script src = "https://unpkg.com/vue@3"></script>
 <script>
     /**https://www.youtube.com/watch?v=FXpIoQ_rT_c&ab_channel=freeCodeCamp.org
      * app boot
      */
     let app = Vue.createApp({
         data() {
             return {
                 message: 'Hello Vue ssss!'
             }
         }
     });

     /**
      * child component custom-input
      * v-model should be on the child component
      * set computed object to create getter and setters for child inputValue modelValue
      */
     app.component('custom-input',{
        template:
        `<label>
            @{{  label }}
            <input type = "text" v-model="inputValue">
        </label>`,
         //props are imutable can not be changed by the child component
         props: ['label', 'modelValue'],
         computed: {
           inputValue:{
               //get children prop
               get() {
                  return this.modelValue  ;
               },
               //set parent value with event emit
               set(value) {
                   this.$emit('update:modelValue', value);
               }
           }
         },
         data() {
            return {

            }
         }
     });

     app.component('login-form',{
         template:
             `<form v-on:submit.prevent="handleSubmit">
                <custom-input type="email"   v-model="email" v-bind:label="emailLabel" />
                <custom-input type="password" v-model="password"  v-bind:label="passwordLabel" />
                <button>Log in</button>
             </form>`,
         components:['custom-input'],
         data() {
             return {
                 email:"some email",
                 password: "some password",
                 emailLabel: "Email",
                 passwordLabel: "Password"
             }
         },
         methods: {
             handleSubmit() {
                 console.log(this.email, this.password);
             }
         }
     });

     /** child component creation
     *  create a component
     *  declare the component in the parent component array
      */

     /**
      * passing data from the parent component to the child component
      * in the parent set child property to use
      * int the parent use v-bind to bind parrent attribute to the child property
      * in the child component set props array - a list of read only properties that will come from parent
      */

     /**
      * $emit an update event update:modelValue to the this.$emit(eventType, value) for the parent component data
      * listen the event in the parent component
      */


     app.mount('#app');
 </script>
</body>
</html>
