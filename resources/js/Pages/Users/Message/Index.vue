<template>

    <Head title="Messages | WaisFood"/>

    <RightSideLayout>
        <div class="fs-4 p-3 d-inline-block align-top bg-main" id="right-content">
            <div id="body" class="rounded bg bg-warning">
                <div id="head" class="w-100 rounded p-1 bg bg-secondary">
                    <h3 class="font fw-bold">Messages</h3>
                </div>

                <div id="messages" class="bg bg-secondary mt-3 rounded d-flex justify-content-center">
                    <div id="people" class="bg bg-primary rounded w-25 p-2 mx-1">
                        test
                    </div>
                    <div id="chat" class="bg bg-danger rounded w-75 mx-1 d-flex flex-column align-items-center p-2">
                        <div id="chat-messages" class="bg bg-primary w-100 rounded p-2">
                            messages
                        </div>
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
    import { ref, defineProps} from "vue";

    let chat_content = ref('');

    const form = useForm({
        chat_content: chat_content
    })

    function formSubmit() {
        // alert("succ")
        form.post('messages', {
            preserveScroll: true,
        })
    }

</script>

<style scoped>
    #body {
        height: 95%;
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
        height: 100%;
    }
    #people, #chat-messages {
        height: 100%;
    }
    #right-content {
        height: 98vh;
        min-height: 98vh;
        transition: all 0.5s ease;
        width: 95%;
    }
</style>
