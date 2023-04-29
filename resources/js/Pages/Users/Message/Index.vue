<template>
    <Head title="Messages | WaisFood"/>
    <RightSideLayout>
        <div class="fs-4 ps-3 d-inline-block align-top bg-main" id="right-content">
            <div id="body" class="rounded">
                <div id="head" class="px-3 w-100 rounded p-1 pt-2">
                    <h3 class="font fw-bold">Messages</h3>
                </div>
                        <!--       messages main container         -->
                <div id="messages" class="mt-1 rounded d-flex justify-content-center bg-light-blue pt-4 pb-2">
                    <ConversationListLayout :conversation-list="conversationList" :user_session="user_session">

                    </ConversationListLayout>
                        <!--          actual conversation          -->
                    <div id="chat" class="border-start border-warning border-3 w-75 mx-1 d-flex flex-column align-items-center p-2">
                        <div id="chat-messages" class="w-100 rounded p-2 scrollable overflow-auto d-flex flex-column-reverse pe-5 ps-4">
                            <div id="each-message-container"
                                 class="mt-2 rounded"
                                 v-for="messages in messagesConversation"
                                 :class="{ 'align-self-end shadow-3d-self': messages.user_id == props.user_session.id,
                                   'align-self-start shadow-3d-other' :  messages.user_id != props.user_session.id
                                 }">
                                <div id="each-message" class="bg bg-warning px-3 pt-2 rounded text-break shadow d-flex justify-content-center">
                                    <p class="font-2 fs-6 text-break">{{ messages.content }}</p>
                                </div>
                            </div>
                        </div>
                        <!--          send message              -->
                        <form @submit.prevent="formSubmit" id="form-message" class="w-100 py-2">
                            <input type="text" name="chat_content" v-model="chat_content" id="chat-content" class="font-2 form-control d-inline-block">
                            <button class="btn btn-primary font-2 d-inline-block" :disabled="form.processing">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </RightSideLayout>
</template>

<script setup>
    import RightSideLayout from "@/Pages/Template/RightSideLayout.vue";
    import ConversationListLayout from '../../Template/MessagesLayout.vue';
    import { useForm } from '@inertiajs/vue3'
    import { ref, defineProps, onMounted } from "vue";
    import Echo from 'laravel-echo'

    let chat_content = ref('');

    let props = defineProps({
        conversationList: {
            type: Object,
        },
        messagesConversation: {
            type: Object,
        },
        recipientId: {
            type: Number,
        },
        user_session: {
            type: Object,
        },
        insert_success: {
            type: Boolean,
            default: false
        }
    })

    const form = useForm({
        chat_content: chat_content,
        recipient_id: props.recipientId,
    })

    function listen()
    {
        window.Echo.channel('message')
            .listen('NewMessage', (e) => {
                console.log(e);
            });
    }

    onMounted( () => {
        listen()
    })

    let first_message = props.messagesConversation ? ref(props.messagesConversation[0].id) : ref('');

    function formSubmit() {
        form.post('/messages', {
            preserveScroll: true,
        })
        form.reset()
        form.clearErrors()

    }

</script>
<style scoped>
    .custom-link {
        text-decoration: none;
        color: inherit;
    }

    #each-message-container {
        max-width: 50%;
        height: fit-content;
        /*border: 1px solid black;*/
    }
    .shadow-3d-self {
        box-shadow: 5px 5px rgb(40, 96, 160);
    }
    .shadow-3d-other {
        box-shadow: -5px 5px rgb(40, 96, 160);
    }
    #details {
        font-size: 13px;
    }
    #each-message {
        /*border: 1px solid black;*/
    }
    .bg-darker {
        background-color: #0e7d9e;
    }
    #message-details {
        height: 2vh;
    }
    #body {
        height: 100%;
    }
    #name-message {
        width: 80%;
    }
    #time {
        width: 20%;
    }
    #time p {
        font-size: 12px;
    }
    #profile-picture img {
        width: 70px;
        height: 70px;
    }
    #users-container {
        height: 94%;
    }
    #user1 {
        height: 80px;
    }
    #chat-messages {
        /*height: 50%;*/
        min-height: 80%;
    }
    #chat {
        height: 100%;
    }
    #chat-content {
        width: 94.1%;
    }
    #messages {
        height: 93%;
    }
    #people, #chat-messages {
        height: 100%;
    }
    #people {
        width: 25%;
        min-width: 350px;
    }
    #right-content {
        height: 100vh;
        min-height: 100vh;
        width: 95%;
    }
    @media only screen and (width < 1490px) {
        #time {
            display : none;
        }
        #name-message {
            width: 100%;
        }
    }
</style>
