<template>
    <div class="row">

        <div class="col-md-8">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 802 713.23">

                <polygon class="mapa" points="0.5 0.73 574.5 0.73 801.5 87.73 801.5 712.73 0.5 712.73 0.5 0.73"/>
                <polygon class="mapa" points="81.5 409.73 120.5 409.73 120.5 328.73 313.5 328.73 313.5 242.73 367.5 242.73 367.5 712.73 81.5 712.73 81.5 409.73"/>

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

                <text x="645" y="460" fill="blue">17</text>
                <rect :class="classActive" x="574.5" y="375.73" width="150" height="167"/>

            </svg>
        </div>
        <div class="col-md-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 235 690">

                <polygon class="mapa" points="0.5 0.5 211.5 0.5 211.5 433.5 54.5 433.5 54.5 605.5 0.5 605.5 0.5 0.5"/>
                <polygon class="mapa" points="0.5 68.67 102.5 68.67 102.5 81.5 211.5 81.5 211.5 0.5 0.5 0.5 0.5 68.67"/>
                <rect :class="classActive" x="60.5" y="68.67" width="16" height="91.83"/>
                <rect :class="classActive" x="0.5" y="68.5" width="60" height="23.83"/>
                <line :class="classActive" x1="76.5" y1="331.5" x2="0.5" y2="331.5"/>
                <rect :class="classActive" x="60.5" y="190.5" width="16" height="141"/>
                <rect :class="classActive" x="0.5" y="131.5" width="36" height="24"/>
                <polygon :class="classActive" points="0.5 168.67 36.5 168.5 36.5 230.5 0.5 230.5 0.5 168.67"/>
                <rect :class="classActive" x="0.5" y="243.33" width="36" height="37.17"/>
                <polygon :class="classActive" points="167.5 392.5 211.5 392.5 211.5 285.5 157.5 285.5 157.5 384.5 167.5 392.5"/>
                <rect :class="classActive" x="157.5" y="256.5" width="54" height="27"/>
                <rect :class="classActive" x="157.5" y="199.5" width="54" height="44"/>
                <rect :class="classActive" x="157.5" y="160.5" width="54" height="32"/>
                <rect :class="classActive" x="166.5" y="114.5" width="37" height="36"/>
                <rect :class="classActive" x="96.5" y="114.5" width="42" height="59"/>
                <rect :class="classActive" x="96.5" y="192.5" width="42" height="74"/>
                <rect :class="classActive" x="0.5" y="293.5" width="36" height="38"/>
                <rect :class="classActive" x="96.5" y="283.5" width="42" height="105"/>
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
