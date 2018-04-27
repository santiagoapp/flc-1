<template>
    <div class="row">
        <div class="col-md-4">
            <form>
                <div class="box-body">
                    <div class="form-group">
                        <label>Nombre de la zona</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Operarios</label>
                        <select class="form-control" multiple>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Máquinas</label>
                        <select class="form-control" multiple>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancelar</button>
                    <button type="submit" class="btn btn-info pull-right">Actualizar</button>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1165 713.23">

                <line class="mapa" x1="916.5" y1="386.73" x2="1009.5" y2="386.73"/>
                <polygon class="mapa" points="0.5 0.73 574.5 0.73 801.5 87.73 801.5 712.73 0.5 712.73 0.5 0.73"/>
                <polygon class="mapa" points="81.5 409.73 120.5 409.73 120.5 328.73 313.5 328.73 313.5 242.73 367.5 242.73 367.5 712.73 81.5 712.73 81.5 409.73"/>
                <polygon class="mapa" points="917.5 712.73 917.5 0.73 1164.5 0.73 1164.5 509.73 983.5 509.73 983.5 712.73 917.5 712.73"/>

                <rect v-on:click="asd" v-model="permiso1" :class="classActive" x="0.5" y="0.73" width="69" height="60"/>
                <text x="30" y="35" fill="blue">1</text>

                <rect :class="classActive" x="69.5" y="0.73" width="70" height="60"/>
                <text x="100" y="35" fill="blue">2</text>

                <rect :class="classActive" x="139.5" y="0.73" width="69" height="60"/>
                <text x="170" y="35" fill="blue">3</text>

                <rect :class="classActive" x="208.5" y="0.73" width="72" height="60"/>
                <text x="240" y="35" fill="blue">4</text>

                <rect :class="classActive" x="280.5" y="0.73" width="87" height="129"/>
                <text x="320" y="70" fill="blue">5</text>

                <rect :class="classActive" x="367.5" y="0.73" width="82" height="129"/>
                <text x="405" y="70" fill="blue">6</text>

                <rect :class="classActive" x="449.5" y="0.73" width="62" height="129"/>
                <text x="475" y="70" fill="blue">7</text>

                <rect :class="classActive" x="511.5" y="0.73" width="63" height="129"/>
                <text x="540" y="70" fill="blue">8</text>

                <rect :class="classActive" x="0.5" y="60.73" width="69" height="58"/>
                <text x="30" y="95" fill="blue">9</text>

                <rect :class="classActive" x="0.5" y="118.73" width="69" height="99"/>
                <text x="30" y="170" fill="blue">10</text>

                <rect :class="classActive" x="95.5" y="80.73" width="157" height="130"/>
                <text x="170" y="150" fill="blue">11</text>
                
                <polygon :class="classActive" points="574.5 0.73 574.5 319.73 724.5 319.73 724.5 542.73 801.5 542.73 801.5 87.73 574.5 0.73"/>
                <text x="680" y="200" fill="blue">12</text>

                <rect :class="classActive" x="120.5" y="266.73" width="160" height="62"/>
                <text x="195" y="300" fill="blue">13</text>

                <rect :class="classActive" x="367.5" y="242.73" width="61" height="80"/>
                <text x="395" y="290" fill="blue">14</text>

                <rect :class="classActive" x="367.5" y="322.73" width="61" height="95"/>
                <text x="395" y="375" fill="blue">15</text>

                <rect :class="classActive" x="367.5" y="417.73" width="61" height="76"/>
                <text x="395" y="460" fill="blue">16</text>

                <rect :class="classActive" x="574.5" y="375.73" width="150" height="167"/>
                <text x="645" y="460" fill="blue">17</text>

                <polygon :class="classActive" points="917.5 82.73 1040.5 82.73 1040.5 98.73 1164.5 98.73 1164.5 0.73 917.5 0.73 917.5 82.73"/>
                <text x="1030" y="50" fill="blue">18</text>

                <rect :class="classActive" x="917.5" y="82.73" width="72" height="28"/>
                <text x="945" y="102" fill="blue">19</text>

                <rect :class="classActive" x="989.5" y="82.73" width="20" height="108"/>
                <text x="992" y="140" fill="blue">20</text>

                <rect :class="classActive" x="917.5" y="155.73" width="46" height="28"/>
                <text x="933" y="174" fill="blue">21</text>

                <rect :class="classActive" x="917.5" y="198.73" width="46" height="73"/>
                <text x="933" y="240" fill="blue">22</text>

                <rect :class="classActive" x="917.5" y="285.73" width="46" height="46"/>
                <text x="933" y="312" fill="blue">23</text>

                <rect :class="classActive" x="917.5" y="344.73" width="46" height="42"/>
                <text x="933" y="370" fill="blue">24</text>

                <rect :class="classActive" x="989.5" y="224.73" width="20" height="162"/>
                <text x="992" y="310" fill="blue">25</text>

                <rect :class="classActive" x="1031.5" y="136.73" width="48" height="70"/>
                <text x="1048" y="177" fill="blue">26</text>

                <rect :class="classActive" x="1031.5" y="228.73" width="48" height="83"/>
                <text x="1048" y="275" fill="blue">27</text>

                <rect :class="classActive" x="1031.5" y="335.73" width="48" height="119"/>
                <text x="1048" y="400" fill="blue">28</text>

                <rect :class="classActive" x="1113.5" y="136.73" width="42" height="42"/>
                <text x="1127" y="162" fill="blue">29</text>

                <rect :class="classActive" x="1102.5" y="198.73" width="62" height="30"/>
                <text x="1127" y="218" fill="blue">30</text>

                <rect :class="classActive" x="1102.5" y="242.73" width="62" height="43"/>
                <text x="1127" y="270" fill="blue">31</text>

                <rect :class="classActive" x="1102.5" y="300.73" width="62" height="31"/>
                <text x="1127" y="320" fill="blue">32</text>

                <rect :class="classActive" x="1102.5" y="335.73" width="62" height="123"/>
                <text x="1127" y="400" fill="blue">33</text>

            </svg>
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
                zonas:[],
                mapaIsActive: false,
                activoIsActive: null,
                permiso1: '',
            }
        },
        computed: {
            classActive: function () {
                if ( this.mapaIsActive ) 
                {
                    this.activoIsActive = false;
                }
                else{
                    this.activoIsActive = true;
                }
                return {
                    'mapa': this.mapaIsActive, 'activo': this.activoIsActive
                }
            }
        },
        created: function() {
            this.getZonas();
        },
        methods:{
            getZonas(){
                var url = 'mapa/get'
                axios.get(url).then(response => {
                    this.zonas = response.data
                });
            },
            asd(){
                this.mapaIsActive = this.mapaIsActive ? false : true ;
            }
        }
    }
</script>
