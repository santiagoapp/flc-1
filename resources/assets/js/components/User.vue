<template>
    <div class="row">
        <div :class="botonNuevoUsuario">
            <div class="btn-group pull-left" style="padding: 0 0 10px 0">
                <a class="btn btn-success" data-toggle="modal" data-target="#modal-info"><span class="fa fa-plus"></span> Nuevo Usuario</a>
            </div>
        </div>
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
                <div class="form-group">
                    <label>Rol</label>
                    <select v-model="user.rol" class="form-control">
                        <template v-for="rol in roles">
                            <option>{{ rol.name }}</option>
                        </template>
                    </select>
                </div>
                <div class="btn-group">
                    <a v-on:click = "updateUser()" class="btn btn-primary"><span class="fa fa-plus"></span> Actualizar</a>
                    <a v-on:click = "hideUser()" class="btn btn-danger"><span class="fa fa-close"></span> Cancelar</a>
                </div>
            </form>
        </div>
        <div class="modal modal-default fade" id="modal-info">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Formulario de registro de usuarios</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Nombre</label>
                                    <div class="col-sm-9">
                                        <input v-model="newUser.name" type="email" class="form-control" placeholder="Nombre Completo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Correo</label>
                                    <div class="col-sm-9">
                                        <input v-model="newUser.email" type="email" class="form-control" placeholder="Correo electrónico">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Contraseña</label>
                                    <div class="col-sm-9">
                                        <input v-model="newUser.password" type="password" class="form-control" placeholder="Contraseña">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Confirmación Contraseña</label>
                                    <div class="col-sm-9">
                                        <input v-model="newUser.password_confirmation" type="password" class="form-control" placeholder="Contraseña">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Rol</label>
                                    <div class="col-sm-9">
                                        <select v-model="newUser.rol" class="form-control">
                                            <template v-for="rol in roles">
                                                <option>{{ rol.name }}</option>
                                            </template>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Cerrar</button>
                        <button v-on:click = "addUser()" type="button" class="btn btn-primary btn-flat">Agregar</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
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
                roles:[],
                isActive: false,
                col: 'col-md-12',
                botonNuevoUsuario: 'col-md-12',
                user: {
                    'id': '',
                    'name': '',
                    'correo': '',
                    'contraseña_anterior': '',
                    'contraseña_nueva': '',
                    'contraseña_repetida': '',
                    'rol': '',
                },
                newUser: {
                    'name': '',
                    'email': '',
                    'password': '',
                    'password_confirmation': '',
                    'rol': '',
                },
            }
        },
        created: function() {
            this.getUsers();
            this.getRoles();
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
                    this.user.rol = response.data.roles[0].name
                });
            },
            getRoles(){
                var url = 'roles/get'
                axios.get(url).then(response => {
                    this.roles = response.data
                });
            },
            showUser(id){
                this.getUser(id);
                this.isActive = true;
                this.col = 'col-md-8';
                this.botonNuevoUsuario = 'hidden';
            },
            hideUser(){
                this.isActive = false;
                this.col = 'col-md-12';
                this.botonNuevoUsuario = 'col-md-12';
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
                            rol: '', 
                        };
                        this.hideUser();
                        toastr.success(response.data.mensaje);
                    }else{
                        toastr.error(response.data.mensaje);
                    }
                    
                });
            },
            addUser() {
                var url = 'usuarios/add'

                axios.post(url, this.newUser).then( response=> {
                    
                    if (response.data.mensaje='Usuario guardado') {
                        this.getUsers();
                        this.newUser = {
                            name: '',
                            email: '',
                            password: '',
                            password_confirmation: '',
                            rol: '',
                        };
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
