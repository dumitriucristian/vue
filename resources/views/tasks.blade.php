<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/vue@3"></script>
</head>
    <!--
    add tailwind
    create a button that will add a task
    show a list of task where each item has a toggle button done undone
    -->

<body>
    <div id="app">
        <task-input></task-input>
    </div>
    <script>
       let app =  Vue.createApp({
           data() {
               return {

               }
           },
       });

       app.component('task-panel',{
           template:
               `<li class="grid bg-gray-200 mt-1">
                        <div class="grid grid-cols-4">
                            <span class="col-span-3 bg-blue-200  p-2">@{{task.title}}</span>
                            <span class="col-span-1 text-center self-center uppercase font-bold">@{{task.status}}</span>
                        </div>
                        <div class="flex justify-end bg-gray-300 p-1">
                            <button class="bg-blue-500 text-white px-3 py-1 rounded-md m-1 uppercase font-bold">To Do</button>
                            <button class="bg-green-500 text-white px-3 py-1 rounded-md m-1 uppercase font-bold">Done</button>
                            <button class="bg-red-500 text-white px-3 py-1 rounded-md m-1 uppercase font-bold">Blocked</button>
                        </div>
                    </li>
                     `,
           props: ['task'],
       });

       app.component(
           'task-input',
           {
               template:
                   `<div class=" container grid grid-cols-4 mb-5 border-2 border-gray-600 center  mt-5 mx-auto bg-gray-400 ">
                        <input id="taskInput"  v-model="task" class="bg-white col-span-3 p-3 text-black font-bold" type="text" placeholder="What you will do next" />
                        <button @click="addTask()"  class="text-white font-extrabold uppercase">Add new task</button>
                    </div>
                    <div class="container container mx-auto rounded-top-lg">
                        <div class=" bg-gray-200 border-2 border-gray-600 center column-1 container mx-auto mt-5 mx-auto rounded-top-lg">
                            <h1 class="font-sans text-2xl text-center text-white bg-gray-500  uppercase font-extrabold px-4 py-4">
                                @{{title}}
                            </h1>
                            <ul class="bg-white">
                                 <task-panel v-for="task in tasks" :task="task"/>
                            </ul>
                         </div>
                    </div>`,
                   data() {
                       return {
                           title:"Here is a nice title",
                           task: '',
                           tasks: [],
                       }
                },
               components:['task-panel'],
               methods:{
                   addTask(){
                       task = { title: this.task, status: 'To do' }
                       this.tasks.push(task);
                       this.task='';
                       console.log(this.tasks);
                   }
               }
           },
       );
       app.mount('#app');
    </script>
</body>
</html>
