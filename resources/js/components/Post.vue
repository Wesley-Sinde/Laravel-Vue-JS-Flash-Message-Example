template> 
    <div class="container"> 
        <div class="row justify-content-center"> 
  
            <div class="col-md-8"> 
                <div class="card"> 
                    <div class="card-header"> Laravel Vue js Flash Message Example </div> 
    
                    <div class="card-body"> 
                        <form @submit="formStore"> 
                        <strong> Title:</strong> 
                        <input type="text" class="form-control" v-model="title"> 
                        <strong> Description:</strong> 
                        <textarea class="form-control" v-model="description"> </textarea> 
   
                        <button class="btn btn-success"> Submit</button> 
                        </form> 
                        <strong> Output:</strong> 
                        <pre> 
                        {{output}}
                        </pre> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
</template> 
   
<script> 
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
              title: '',
              description: '',
              output: ''
            };
        },
        methods: {
            formStore(e) {
                e.preventDefault();
                let currentObj = this;
                axios.post('/store', {
                    title: this.title,
                    description: this.description
                })
                .then(function (response) {
                    currentObj.output = response.data;
                    flash('Post Created Successfully', 'success');
                })
                .catch(function (error) {
                    currentObj.output = error;
                });
            }
        }
    }
</script> 