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
                    <ConversationListLayout :conversation-list="conversationListonLeft" :user_session="user_session">

                    </ConversationListLayout>
                        <!--          actual conversation          -->

                    <div id="chat" class="border-start border-warning border-3 w-75 mx-1 d-flex flex-column align-items-center pe-2">
                        <div id="chat-header" class="w-100 rounded-end d-flex bg bg-warning d-flex align-items-center" v-if="(recipient)">
                            <div id="recipient-image" class="">

                            </div>
                            <div id="people-details" class="mx-2">
                                <p class="mt-2">{{ recipient.firstname + " " + recipient.lastname }}</p>
                            </div>
                        </div>

                        <div id="no-conversation" class="h-100 w-100 d-flex justify-content-center" v-else>
                            <p class="m-auto font-2">Start or view conversation</p>
                        </div>
                        <div id="chat-messages" class="w-100 rounded p-2 mt-1 scrollable overflow-auto d-flex flex-column-reverse pe-5 ps-4">
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
                      <div class="w-100 pt-4">
                        <!--          send message              -->
                        <form @submit.prevent="formSubmit" id="form-message" class="w-100 ms-2 mb-1" v-if="(recipient)">
                          <input type="text" name="chat_content"
                                 v-model="chat_content"
                                 id="chat-content"
                                 placeholder="Send a Message ..."
                                 class="font-2 form-control d-inline-block">
                          <button class="btn btn-primary font-2 d-inline-block" :disabled="form.processing">Send</button>
                        </form>
                      </div>

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
    import { ref, defineProps, onMounted, reactive  } from "vue";
    import Echo from 'laravel-echo'

    let chat_content = ref('')

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
        },
        errors: Object,
        flash: Object,
    })

    // this is for 2 way binding
    let conversation = reactive(props.messagesConversation);
    let recipient = reactive(findRecipient());
    let conversationListonLeft = reactive(arrangeConversationListByLatestMessage(props.conversationList))

    const form = useForm({
        chat_content: chat_content,
        recipient_id: props.recipientId,
    })
    function listen(conversation)
    {
        window.Echo.channel('message')
            .listen('NewMessage', (e) => {
                conversation.unshift(e);
            });
    }
    onMounted( () => {
        listen(conversation)
    })
    function findRecipient()
    {
        const conversationList = props.conversationList;
        for (const conversation of conversationList) {
            if(conversation.recipient_id == props.recipientId)
            {
                return conversation;
            }
        }
    }

    function arrangeConversationListByLatestMessage(unArrangeConversation)
    {
      let arranged = unArrangeConversation.sort(function(a,b){
        // Turn your strings into dates, and then subtract them
        // to get a value that is either negative, positive, or zero.
        return new Date(b.created_at) - new Date(a.created_at);
      });
      return arranged;
    }
    let first_message = props.messagesConversation ? ref(props.messagesConversation[0].id) : ref('');

    async function formSubmit() {
        await form.post('/messages', {
            preserveScroll: true,
            preserveState: false,
        })
        chat_content = ''
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

    #each-message {
        /*border: 1px solid black;*/
    }

    #body {
        height: 100%;
    }

    #time p {
        font-size: 12px;
    }
    #profile-picture img {
        width: 70px;
        height: 70px;
    }

    #chat-messages {
        /*height: 50%;*/
        min-height: 80%;
    }
    #chat-header {
        height: 8%;
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
