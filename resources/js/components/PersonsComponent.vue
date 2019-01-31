<template>
    <div class="card p-2">
        <div class="d-flex flex-row justify-content-end my-3">

            <div class="d-inline-flex">
                <input type="text" placeholder="Search..." v-model="search" class="form-control ml-2">
                <span class="nowrap font-weight-bold mx-2">Sort By:</span>
                <select class="form-control" v-model="sortByAttr">
                    <option value="first_name">First Name</option>
                    <option value="surname">Surname</option>
                </select>
            </div>

        </div>
        <div class="d-flex flex-row flex-wrap justify-content-between mb-4 persons-data">

            <div class="card mx-3 mt-2 border-success" v-for="(person, index) in sortedPersons">
                <div class="card-header font-weight-bold border-success bg-success text-white">
                   <i class="fas fa-user"></i> {{person.first_name}} {{person.surname}}
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <td class="font-weight-bold">Date of Birth:</td>
                            <td>{{person.date_of_birth}}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Age:</td>
                            <td>{{person.age}} years</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Attributes:</td>
                            <td>
                                <p v-for="attribute in person.attributes"> {{attribute.attribute_name}}: {{attribute.attribute_value}}</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="text-center my-2">
                    <a v-bind:href="`/persons/${person.id}/edit`" class="btn btn-sm width-40 btn-info d-inline-block"><i class="fas fa-pen"></i> Edit</a>
                    <a @click.prevent="deletePerson(person.id, index)" class="btn btn-sm width-40 btn-danger d-inline-block text-white"><i class="fas fa-trash"></i> Delete</a>
                </div>

            </div>

        </div>

    </div>
</template>

<script>
    export default {
        name: "PersonsComponent",
        data(){
            return {
                search:'',
                persons: [],
                sortByAttr:null,
            }
        },
        computed:{
            sortParam: function(){
                if (this.sortByAttr === null || this.sortByAttr===''){
                    return 'id';
                }
                return this.sortByAttr;
            },
            filteredList:function(){
                return this.persons.filter(person=>{
                    return (person.first_name.toLowerCase().includes(this.search.toLowerCase()) ||
                        person.surname.toLowerCase().includes(this.search.toLowerCase()));
                })
            },
            sortedPersons: function () {
                return _.orderBy(this.filteredList, this.sortParam, 'asc')

            }
        },
        methods: {
            loadPersons () {
                axios.get('/persons/data').then(
                    response=>{
                        this.persons = response.data.data;
                        console.log(this.persons)
                    }

                );
            },
            deletePerson(id, index){
                if (confirm("Are you sure you want to do this?")){
                    axios.delete("/persons/"+id).then(
                        this.persons.splice(index, 1)
                    ).catch( function(error){
                            alert("There was an error deleting this attribute!")
                        }
                    ).then();
                }
            },
        },
        mounted() {
            this.loadPersons();
        },
    }
</script>

<style scoped>

</style>