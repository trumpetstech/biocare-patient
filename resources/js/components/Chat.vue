<template>
    <div>
    <div class="card mb-2">
        <div class="card-body py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="font-weight-bold mb-1 mt-2">Dr. {{ appointment.doctor.name }}</h4>    
                    <p class="mb-2"><i class="fe-map-pin mr-2"></i>  {{ appointment.doctor.city }}</p>
                </div>

            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Chat with Dr. {{ appointment.doctor.name }}
        </div>
        <div class="card-body p-0">
            <div class="bg-white border pb-3" id="messages" style="height: 400px;max-height: 400px;overflow-y: auto">
                <div v-if="messages.length > 0">
                    <div  class="w-100" :key="message.id" v-for="message in messages">
                        <div class="card w-25 mt-3" :class="message.by_doctor == 1 ? 'float-right mr-2' : 'float-left ml-2'" >
                            <div class="card-body">
                                <small class="d-block mb-1 text-secondary font-weight-bold" v-if="message.by_doctor == 1">{{ appointment.doctor.name }}</small>
                                <small class="d-block mb-1 text-secondary font-weight-bold" v-else>You</small>
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

        props: ['appointment'],

        data() {
            return {
                messages: [],
                typing: false,
                newMessage: '',
                user: {},
                users: [],
                sending: false
            }
        },

        created() {
            this.fetchMessages();

      

            
          var self = this;
            window.Echo.channel('chat-' + this.appointment.id) 
                .listen('.new-message', (e) => {
                    console.log(e.message.sender_id);
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
                axios.get('/messages/' + this.appointment.id).then(response => {
                    this.messages = response.data;
                    $("#messages").stop().animate({ scrollTop: $("#messages")[0].scrollHeight}, 1000);
                });
            },

            sendMessage() {
                
                this.sending = true;

                axios.post('/messages/' + this.appointment.id, {message: this.newMessage}).then(response => {
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
