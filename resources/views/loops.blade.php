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
            <input :type = "type" v-model="inputValue">
        </label>`,
        //props are imutable can not be changed by the child component
        props: ['label', 'modelValue', 'type'],
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
                <custom-input
                      v-for="(input, i) in inputs"
                      :key = "i"
                      :type="input.type"
                      v-model="input.value"
                      :label="input.label"
                />
                <button>Log in</button>
             </form>`,
        components:['custom-input'],
        data() {
            return {
                inputs: [
                    {
                        type: "email",
                        label: "Email",
                        value: ""
                    },
                    {
                        type: "password",
                        label: "Password",
                        value: ""
                    }
                ],
                email:"some email",
                password: "some password",
                emailLabel: "Email",
                passwordLabel: "Password"
            }
        },
        methods: {
            handleSubmit() {
                console.log(this.inputs[0].value, this.inputs[1].value);
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
