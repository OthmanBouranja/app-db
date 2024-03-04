<template>
    <div class="container">
        <div class="invoices">
        
        <div class="card__header">
            <div>
                <h2 class="invoice__title">App Data</h2>
            </div>
        </div>

        <div class="table card__content">
            <div class="table--filter">
                <span class="table--filter--collapseBtn ">
                    <i class="fas fa-ellipsis-h"></i>
                </span>
                <div class="table--filter--listWrapper">
                    <ul class="table--filter--list">
                        <li>
                            <p class="table--filter--link table--filter--link--active">
                                All data
                            </p>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Data Country -->

            <p style="text-align: center;font-weight: bold;font-size: 20px;">Data Country</p>
            <div class="table--heading">
                <p>ID</p>
                <p>Name Of Country</p>
              
            </div>

            <div class="table--items" v-for="item in countrys" :key="item.id" v-if="countrys.length > 0">
                <p class="p-cliked" @click="onShowCity(item.id)">#{{item.id}}</p>
                <p>{{ item.name }}</p>
               
            </div>
            <div class="table--items" v-else>
                <p>Data Country Not found</p>
            </div>


            <!-- Data citys -->

            <div v-if="citys.length > 0">
                <p style="text-align: center;font-weight: bold;font-size: 20px; margin-top: 18px;">Data City By Country</p>
                <div class="table--heading">
                    <p>ID</p>
                    <p>Name of citys</p>
                    <p>Id Country</p>
                </div>
                <div class="table--items" v-for="item in citys" :key="item.id" v-if="citys.length > 0">
                    <p class="p-cliked" @click="onShowPepole(item.id)">#{{item.id}}</p>
                    <p>{{ item.name }}</p>
                    <p>{{ item.country_id }}</p>
                </div>
                <div class="table--items" v-else>
                    <p>Data Country Not found</p>
                </div>
            </div>


             <!-- Data People -->

            <div v-if="peoples.length > 0">
                <p style="text-align: center;font-weight: bold;font-size: 20px; margin-top: 18px;">Data People By City</p>
                <div class="table--heading">
                    <p>ID</p>
                    <p>Name of People</p>
                    <p>Id City</p>
                </div>
                <div class="table--items" v-for="item in peoples" :key="item.id" v-if="peoples.length > 0">
                    <p >{{item.id}}</p>
                    <p>{{ item.name }}</p>
                    <p>{{ item.city_id }}</p>
                </div>
                <div class="table--items" v-else>
                    <p>Data People Not found</p>
                </div>
            </div>
        
        


        </div>
        
    </div>
    </div>
</template>


<script setup>

import { onMounted, ref } from 'vue';

import { useRouter } from 'vue-router';

const router = useRouter()

let countrys = ref([])
let citys = ref([])
let peoples = ref([])


onMounted(async () => {
    getInvoices()
})

const getInvoices = async () => {
    let response = await axios.get("/api/get_all_Country");
    console.log('response',response);

    countrys.value = response.data.countrys;
}



const onShowCity = async (id) => {
   // console.log(id);

    console.log(peoples.value,'peoples.value');
    peoples.value = 0;
    let response = await axios.get("/api/get_all_CityByCountry?id="+id);
    console.log(response,"response");
    citys.value = response.data.citys;

}

const onShowPepole = async (id) => {
    console.log(id);

    let response = await axios.get("/api/get_all_PeopleByCity?id="+id);
    console.log(response,"response peoples");
    peoples.value = response.data.peoples;

}



</script>