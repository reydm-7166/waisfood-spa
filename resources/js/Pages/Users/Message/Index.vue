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
                    <div id="people" class="rounded px-2 mx-1">
                        <!--           conversation lists             -->
                        <div id="list-head" class="rounded w-100 position-relative">
                            <input type="search" name="search" id="search" class="form-control font-2" placeholder="Search ...">
                        </div>
                        <div id="users-container" class="w-100 mt-2 rounded scrollable overflow-auto p-2">
                            <!--           profile picture side                 -->
                            <div id="user1" class="bg bg-warning rounded w-100 d-flex justify-content-center my-2">
                                <div id="profile-picture" class="w-25 rounded d-flex img-fluid justify-content-center align-items-center">
                                    <img src="https://cdn-icons-png.flaticon.com/512/4725/4725937.png" alt="">
                                </div>
                                <div id="details" class="bg bg-light w-75 rounded d-flex">
                                    <div id="name-message" class="bg bg-danger rounded px-2">
                                        <h5 class="mt-2 font-2 text-dark d-block">Name</h5>
                                        <p class="mt-3 font-2 text-dark d-block fs-6">Sample text preview</p>
                                    </div>
                                    <div id="time" class="rounded ps-1">
                                        <p class="font-2 mt-2">12 PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!--          actual conversation          -->
                    <div id="chat" class="border-start border-warning border-3 w-75 mx-1 d-flex flex-column align-items-center p-2">
                        <div id="chat-messages" class="w-100 rounded p-2 scrollable overflow-auto d-flex flex-column-reverse">
                            <div id="each-message-container"
                                 class="mt-2"
                                 v-for="messages in messagesConversation"
                                 :class="{ 'align-self-end': messages.user_id != props.user_session.id,
                                   'align-self-start' :  messages.user_id == props.user_session.id
                                 }">
                                <div id="each-message" class="bg bg-warning px-3 rounded text-break shadow">
                                    <p class="font-2 fs-6 mt-2 text-break">{{ messages.content }}</p>
                                </div>
                                <div id="message-details px-3"
                                     v-if="messages.id == first_message"
                                     :class="{
                                         'text-end': messages.user_id != props.user_session.id,
                                         'text-start' :  messages.user_id == props.user_session.id
                                     }"
                                    ><p id="details" class="font-2 fw-bold fst-italic mx-1">seen</p>
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
    import RightSideLayout from '../../Template/RightSideLayout.vue';
    import { useForm } from '@inertiajs/vue3'
    import { ref, defineProps, onMounted, computed } from "vue";

    let chat_content = ref('');

    let props = defineProps({
        messagesConversation: {
            type: Object,
        },
        user_session: {
            type: Object,
        }
    })

    const form = useForm({
        chat_content: chat_content
    })

    let first_message = ref(props.messagesConversation[0].id);

    onMounted( () => {

    })
    function formSubmit() {
        form.post('messages', {
            preserveScroll: true,
        })
    }

</script>
<style scoped>
    #each-message-container {
        max-width: 50%;
        height: fit-content;
        /*border: 1px solid black;*/
    }
    #details {
        font-size: 13px;
    }
    #each-message {
        border: 1px solid black;
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
