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
                                    <a v-on:click = "showUsers(user.name)" class="btn btn-primary"><span class="fa fa-eye"></span></a>
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

                </div>
                <div class="form-group">
                    <a class="btn btn-primary btn-block"><span class="fa fa-plus"></span> Actualizar</a>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

    import axios from 'axios'
    import toastr from 'toastr'
    import swal from 'sweetalert'

    export default {
        data(){
            return{
                users:[],
                isActive: false,
                col: 'col-md-12',
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
            showUsers(name){
                this.isActive = true;
                this.col = 'col-md-8';
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
