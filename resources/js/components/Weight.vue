<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Weight CRUD</div>
                    <div class="panel-body">
                            <div class="form-group">
                                <label>Date (YYYY-MM-DD)</label>
                                <input id="date" type="text"  class="form-control" v-model="date">
                            </div>
                            <div class="form-group">
                                <label>Weight</label>
                                <input id="weight" type="text"  class="form-control" v-model="weight">
                            </div>
                            <div class="form-group">
                                <label>Comment</label>
                                <input id="comment" type="text"  class="form-control" v-model="comment">
                            </div>
                        <button v-if="editableId == 0" class="btn btn-primary" @click="submitForm">Submit</button>
                        <button v-if="editableId > 0" class="btn btn-primary" @click="submitForm">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Weight List:</div>

                    <table class="table">
                        <thead>
                        <tr>

                            <th scope="col">Date</th>
                            <th scope="col">Weight</th>
                            <th scope="col">Comment</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="item in datalist" :key="item.id">

                            <td>{{item.date}}</td>
                            <td>{{item.weight}}</td>
                            <td>{{item.comment}}</td>
                            <td>
                                <button class="btn btn-primary" @click="editRecord(item.id)">Edit</button>
                                <button class="btn btn-primary" @click="deleteRecord(item.id)">Delete</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            date:null,
            weight:null,
            comment:null,
            form: new FormData,
            datalist: {},
            editableId: 0,
        }
    },
    methods:{
        editRecord(id)
        {   
            axios.get('/getdata/'+id).then(response=>{
                let new_data = response.data;
                this.editableId = new_data.data.id;
                this.date = new_data.data.date;
                this.comment = new_data.data.comment;
                this.weight = new_data.data.weight;

            })
                .catch(response=>{
                    //error
                });

        },
        deleteRecord(id)
        {   
            if(!confirm("Are you sure you want to delete?")){
                return;
            }
            axios.get('/deletedata/'+id).then(response=>{
                this.getList();
            })
                .catch(response=>{
                    //error
                });
        },
        submitForm(){
            const self = this;
            this.form = new FormData;
            this.form.append('date',this.date);
            this.form.append('weight',this.weight);
            this.form.append('comment',this.comment);

            if(this.editableId > 0){
                this.form.append('id',this.editableId);
            }

            const config = { headers: { 'Content-Type': 'multipart/form-data' } };

            axios.post('/store',this.form,config).then(response=>{
                //success
                this.editableId = 0;
                this.weight = "";
                this.date = "";
                this.comment = "";

                self.getList();
                console.log(response);
            })
            .catch(response=>{
                //error
            });
        },
        getList(){
            axios.get('/datalist').then(response=>{
                let new_data = response.data;
                this.datalist = new_data.data;
            })
                .catch(response=>{
                    //error
                });
        }
    },
    mounted() {
        console.log('Component mounted.');
        this.getList();
    }
}
</script>
