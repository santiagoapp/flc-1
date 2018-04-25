<template>
    <div class="row">
        <div :class="col">
            <table class="table table-hover table-bordered">
                <tbody>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="35%">Nombre</th>
                        <th width="35%">Email</th>
                        <th width="20%">Acciones</th>
                    </tr>
                    <template v-for="user in users">
                        <tr>
                            <td>{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                <div class="btn-group">
                                    <a v-on:click = "showUser(user.id)" class="btn btn-primary"><span class="fa fa-eye"></span></a>
                                    <a v-on:click = "deleteUser(user.id)" class="btn btn-danger"><span class="fa fa-close"></span></a>
                                </div>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
        <div v-if="isActive" class="col-md-4">
            <form role="form">
                <div class="form-group">
                    <label>Nombre</label>
                    <input v-model="user.id" class="form-control" type="hidden">
                    <input v-model="user.name" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>Correo</label>
                    <input v-model="user.correo" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>Contraseña Anterior</label>
                    <input v-model="user.contraseña_anterior" class="form-control" type="password">
                </div>
                <div class="form-group">
                    <label>Nueva Contraseña</label>
                    <input v-model="user.contraseña_nueva" class="form-control" type="password">
                </div>
                <div class="form-group">
                    <label>Repetir Nueva Contraseña</label>
                    <input v-model="user.contraseña_repetida" class="form-control" type="password">
                </div>
                <div class="btn-group">
                    <a v-on:click = "updateUser()" class="btn btn-primary"><span class="fa fa-plus"></span> Actualizar</a>
                    <a v-on:click = "hideUser()" class="btn btn-danger"><span class="fa fa-close"></span> Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

    import axios from 'axios'
    import toastr from 'toastr'
    import swal from 'sweetalert'

    axios.defaults.headers.common['csrfToken'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

    export default {
        data(){
            return{
                users:[],
                isActive: false,
                col: 'col-md-12',
                user: {
                    'id': '',
                    'name': '',
                    'correo': '',
                    'contraseña_anterior': '',
                    'contraseña_nueva': '',
                    'contraseña_repetida': '',
                },
            }
        },
        created: function() {
            this.getUsers();
        },
        methods:{
            getUsers(){
                var url = 'usuarios/get'
                axios.get(url).then(response => {
                    this.users = response.data
                });
            },
            getUser(id){
                var url = 'usuarios/get/user?id='+id
                axios.get(url).then(response => {
                    this.user.id = response.data.id
                    this.user.name = response.data.name
                    this.user.correo = response.data.email
                    this.user.contraseña_anterior = response.data.password
                });
            },
            showUser(id){
                this.getUser(id);
                this.isActive = true;
                this.col = 'col-md-8';
            },
            hideUser(){
                this.isActive = false;
                this.col = 'col-md-12';
                this.user.name = '';
            },
            updateUser() {
                var url = 'usuarios/update'

                axios.post(url, this.user).then( response=> {
                    
                    if (response.data.mensaje='Usuario actualizado') {
                        this.user = {
                            id: '',
                            name: '',
                            correo: '',
                            contraseña_anterior: '',
                            contraseña_nueva: '',
                            contraseña_repetida: '', 
                        };
                        this.hideUser();
                        toastr.success(response.data.mensaje);
                    }else{
                        toastr.error(response.data.mensaje);
                    }
                    
                });
            },
            deleteUser(id){
                var url = 'usuarios/delete';
                swal({
                    title: "¿Estás seguro?",
                    text: "Una vez eliminado el usuario no se podrá recuperar la información",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        axios.post(url,{
                            id: id
                        }).then(response => {
                            this.getUsers(); 
                            toastr.success(response.data);
                        }).catch(error =>{
                            toastr.error("Ha ocurrido un error");
                        });
                    } else {
                        swal("El usuario no fue eliminado");
                    }
                });
            },
        }
    }
</script>
