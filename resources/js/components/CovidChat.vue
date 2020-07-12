<template>
    <div>
    
    <div class="card">
        <div class="card-header">
            Chat with Doctors
        </div>
        <div class="card-body p-0">
            <div class="bg-light border pb-3" id="messages" style="height: 400px;max-height: 400px;overflow-y: auto">
                <div v-if="!loading">
                    <div  class="w-100" :key="message.id" v-for="message in messages">
                        <div class="card w-25 mt-3" :class="message.by_doctor == 1 ? 'float-right mr-2' : 'float-left ml-2'" >
                            <div class="card-body">
                                <small class="d-block mb-1 text-secondary font-weight-bold">{{ message.by_doctor == 1 ? 'Dr.' + message.sender.name : 'You' }}</small>
                                <p class="mb-0">{{ message.message }}</p>
                            </div>
                        </div> 
                        <div class="clearfix"></div>
                    </div>
                </div>   
                 <div class="text-secondary text-center mt-5" v-else>
                     Loading...
                </div>
            </div>
           
        </div>
        <div class="card-footer">
            <div class="input-group">
                <input type="text" name="message" class="form-control" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage">
                <span class="input-group-btn">
                    <button class="btn btn-primary" :class="sending ? 'btn-disabled' : ''" @click="sendMessage">
                        {{ sending ? 'Sending' : 'Send' }}
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {

        props: ['order'],

        data() {
            return {
                messages: [],
                typing: false,
                newMessage: '',
                user: {},
                users: [],
                sending: false,
                loading: false,
            }
        },

        created() {
            this.fetchMessages();

      

            
          var self = this;
            window.Echo.channel('covid-chat-' + this.order.id) 
                .listen('.new-message', (e) => {
                    console.log(e);
                if(e.message.by_doctor) {
                    // var audio = new Audio('/sounds/new-message.mp3');
                    // audio.play();     
                    // toastr.info('You have a new message from ' + e.message.sender.name);
                    self.messages.push(e.message);
                    $("#messages").stop().animate({ scrollTop: $("#messages")[0].scrollHeight}, 1000);

              }
               
            });
        },

        methods: {
            fetchMessages() {
                this.loading = true;
                axios.get('/covid-messages/' + this.order.id).then(response => {
                    this.loading = false;
                    this.messages = response.data;
                    $("#messages").stop().animate({ scrollTop: $("#messages")[0].scrollHeight}, 1000);
                });
            },

            sendMessage() {
                
                this.sending = true;

                axios.post('/covid-messages/' + this.order.id, {message: this.newMessage}).then(response => {
                    this.messages.push(response.data);
                    this.sending = false
                    $("#messages").stop().animate({ scrollTop: $("#messages")[0].scrollHeight}, 1000);
                });

                // clear input field
                this.newMessage = '';

                

                // persist to database
            }
        }
    }
</script>
