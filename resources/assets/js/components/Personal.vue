<template>
    <table class="table table-hover table-bordered">
        <tbody>
            <tr>
                <th width="10%">ID</th>
                <th width="35%">Nombre</th>
                <th width="35%">Apellido</th>
                <th width="20%">Acciones</th>
            </tr>
            <template v-for="persona in personas">
                <tr>
                    <td>{{ persona.id }}</td>
                    <td>{{ persona.nombre }}</td>
                    <td>{{ persona.apellido }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary"><span class="fa fa-edit"></span></a>
                            <a href="#" class="btn btn-danger"><span class="fa fa-close"></span></a>
                        </div>
                    </td>
                </tr>
            </template>
        </tbody>
    </table>
</template>

<script>

import axios from 'axios'

    export default {
        data(){
            return{
                personas:[],
            }
        },
        created: function() {
            this.getPersonas();
        },
        methods:{
            getPersonas(){
                var url = 'personal/get'
                axios.get(url).then(response => {
                    this.personas = response.data
                });
            }
        }
    }
</script>
