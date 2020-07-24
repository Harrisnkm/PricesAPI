<template>
    <div class="mx-auto text-center h-screen">
        <h1 class="text-4xl mb-10"> Prices API</h1>
        <form ref="pricesApiForm" class="w-5/6 mx-auto" @submit.prevent="getResults()">
            <div class="flex">
                <label class="font-semibold"> Set Search Parameters:</label>
                <div>
                    <label class="font-semibold"> Set Search Mode:</label>
                    <select name="searchMode" id="searchMode" @change="setSearchMode($event)">
                        <option value="provider">Provider</option>
                        <option value="patient">Patient</option>
                    </select>
                </div>
                <div>
                    <label class="font-semibold"> Zip Code:</label>
                    <input type="text" name="zip" v-model="apiForm.zip">
                </div>
            </div>



            <div class="flex">
            <label class="font-semibold"> Set the Price Table Parameters:</label>

                <div class="p-5 m-5">
                    <label class="font-semibold">Entity:</label>
                    <select v-model="apiForm.entity" name="entity" class="border-solid">
                        <option value="hospital">Hospital</option>
                        <option value="practice">Practice</option>
                    </select>
                    </div>
                <div class="p-5 m-5">
                    <label class="font-semibold">Reimbursement:</label>
                    <select v-model="apiForm.reimbursement" name="reimbursement">
                        <option value="commercial">Commercial</option>
                        <option value="medicaid">Medicaid</option>
                        <option value="medicare">Medicaid</option>
                    </select>
                    </div>
            </div>


            <div class="flex">
                <label class="font-semibold"> Set Search Parameters:</label>
                <div class="p-5 m-5">
                    <label class="font-semibold"> Select Hospital:</label>
                        <select v-model="apiForm.hospital" class="border-solid" name="hospital">
                            <option v-for="hospital in apioptions.hospitals"  :value="hospital.id">{{hospital.organization_name}}</option>
                        </select>
                    </div>

                <div class="p-5 m-5">
                    <label class="font-semibold" > Select Insurance:</label>
                    <select v-model="apiForm.insurance" class="border-solid" name="insurance">
                        <option v-for="insurance in apioptions.insurances"  :value="insurance.id">{{insurance.organization_name}}</option>
                    </select>
                </div>

                <div class="p-5 m-5">
                    <label class="font-semibold"> Select Procedure Code:</label>
                    <select v-model="apiForm.procedureCode" class="border-solid" name="procedureCode" >
                        <option v-for="procedureCode in apioptions.procedureCodes" :value="procedureCode.id">{{procedureCode.cpt_description}}</option>
                    </select>
                </div>
            </div>


            <input type="hidden" :value="csrf" name="_token">
            <button class="bg-blue-100 p-5" type="submit"> Submit</button>
        </form>

        <div v-if="pricesResult">
            {{pricesResult}}
        </div>


    </div>
</template>

<script>
    export default {
        name: "PricesApi",
        props: {
            apioptions: Object,
            csrf: String,
            qresults: Object
        },
        data(){
            return{
                apiForm: {
                    entity: '',
                    reimbursement: '',
                    hospital: '',
                    insurance: '',
                    procedureCode: '',
                    searchMode: 'provider',
                    zip: ''
                },
                pricesResult: {},

            }

        },
        methods: {
           getResults: async function(){
               let pricesData = await axios({
                  method: 'POST',
                  url: this.apiForm.searchMode,
                  responseType: 'json',
                  data: this.apiForm
              })
               console.log(pricesData.data);
               this.pricesResult = pricesData.data;
               console.log(this.pricesResult);

            },
            setSearchMode: function(searchModeParameter){
                this.apiForm.searchMode = searchModeParameter.target.value
            }
        }
    }
</script>

<style lang="sass" scoped>

</style>
