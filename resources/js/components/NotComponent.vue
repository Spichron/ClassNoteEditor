<template>
    <div class="container">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr class="text-center">
                    <th scope="col" class="align-middle">Numara</th>
                    <th scope="col" class="align-middle">Soy İsim</th>
                    <th scope="col" class="align-middle">İsim</th>
                    <th scope="col" class="align-middle">
                        1. Yazılı
                        <li><input class="form-check-input" type="checkbox" v-model="checked_1"></li>   
                    </th>
                    <th scope="col" class="align-middle">
                        2. Yazılı
                        <li><input class="form-check-input" type="checkbox" v-model="checked_2"></li>   
                    </th>
                    <th scope="col" class="align-middle"> 
                        3. Yazılı 
                        <li><input class="form-check-input" type="checkbox" v-model="checked_3"></li> 
                    </th>
                    <th scope="col" class="align-middle">
                        1. Performans
                        <li><input class="form-check-input" type="checkbox" v-model="checked_4"></li> 
                    </th>
                    <th scope="col" class="align-middle">
                        2. Performans
                        <li><input class="form-check-input" type="checkbox" v-model="checked_5"></li> 
                    </th>
                    <th scope="col" class="align-middle">
                        Proje
                        <li><input class="form-check-input" type="checkbox" v-model="checked_6"></li>       
                    </th>
                    <th scope="col" class="align-middle">Ortalama</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center" v-for="not in notlar" :key="not.id">
                    <th scope="row" class="align-middle">{{not.ogrenci_no}} </th>
                    <td class="align-middle">{{not.ogrenci_soyisim}}</td>
                    <td class="align-middle">{{not.ogrenci_isim}}</td>
                    <td class="align-middle"><input type="text" maxlength="3" v-on:keypress="not.yazili_1=updateValue($event, not.yazili_1)" v-on:drop="$event.preventDefault()" v-on:paste="$event.preventDefault()" class="form-control" :readonly="checked_1==false" v-model="not.yazili_1" placeholder="1. Yazılı"></td>
                    <td class="align-middle"><input type="text" maxlength="3" v-on:keypress="not.yazili_2=updateValue($event, not.yazili_2)" v-on:drop="$event.preventDefault()" v-on:paste="$event.preventDefault()" class="form-control" :readonly="checked_2==false" v-model="not.yazili_2" placeholder="2. Yazılı"></td>
                    <td class="align-middle"><input type="text" maxlength="3" v-on:keypress="not.yazili_3=updateValue($event, not.yazili_3)" v-on:drop="$event.preventDefault()" v-on:paste="$event.preventDefault()" class="form-control" :readonly="checked_3==false" v-model="not.yazili_3" placeholder="3. Yazılı"></td>
                    <td class="align-middle"><input type="text" maxlength="3" v-on:keypress="not.performans_1=updateValue($event, not.performans_1)" v-on:drop="$event.preventDefault()" v-on:paste="$event.preventDefault()" class="form-control" :readonly="checked_4==false" v-model="not.performans_1" placeholder="1. Performans"></td>
                    <td class="align-middle"><input type="text" maxlength="3" v-on:keypress="not.performans_2=updateValue($event, not.performans_2)" v-on:drop="$event.preventDefault()" v-on:paste="$event.preventDefault()" class="form-control" :readonly="checked_5==false" v-model="not.performans_2" placeholder="2. Performans"></td>
                    <td class="align-middle"><input type="text" maxlength="3" v-on:keypress="not.proje=updateValue($event, not.proje)" v-on:drop="$event.preventDefault()" v-on:paste="$event.preventDefault()" class="form-control" :readonly="checked_6==false" v-model="not.proje" placeholder="Proje"> </td>
                    <td class="align-middle">{{not.ortalama}}</td>
                </tr>
                <tr>
                    <th scope="row"><button v-on:click="update"  type="button" class="btn btn-outline-dark">Kaydet</button></th>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default 
{
    data() {
        return{
            yazili_1:'',
            yazili_2:'',
            yazili_3:'',
            performans_1:'',
            performans_2:'',
            proje:'',
            ogrenci_isim:'',
            ogrenci_soyisim:'',
            ogrenci_no:'',
            notlar:[],
            ortalama:'',
            checked_1:'',
            checked_2:'',
            checked_3:'',
            checked_4:'',
            checked_5:'',
            checked_6:''
        }
    },
    mounted() { 
        this.index();
    },
    methods:{
        index() {
              axios.get('/notlar')
            .then((response)=>{
                this.notlar = response.data;
                console.log(response);
            })
        },
        
        update() {
            this.notlar.forEach(not => {
                axios.put('/notlar',{
                    yazili_1 : not.yazili_1,
                    yazili_2 : not.yazili_2,
                    yazili_3 : not.yazili_3,
                    performans_1 : not.performans_1,
                    performans_2 : not.performans_2,
                    proje : not.proje,
                    ogrenci_no : not.ogrenci_no
                })
            });
            this.index();
        },

        updateValue(event, value) {
            var updatedValue = '';
            var code = (event.which) ? event.which : event.keyCode;
            if ( (code >= 48 && code <= 57)) {
                if (value != null && value !='') {
                    var greater = Math.max(event.target.selectionStart, event.target.selectionEnd);
                    var lower = Math.min(event.target.selectionStart, event.target.selectionEnd);
                    updatedValue = parseInt( [String(value).slice(0, lower), event.key, String(value).slice(greater)].join('') );
                    if(updatedValue <= 100)
                    {
                        value=updatedValue;
                    }
                }
                else
                {
                    value=event.key;
                }
            }
            event.preventDefault();  
            return value;
        }

    }
}
</script>

