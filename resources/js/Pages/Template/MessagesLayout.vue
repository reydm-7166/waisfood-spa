<template>

    <div id="people" class="rounded px-2 mx-1">
        <!--           conversation lists             -->
        <!--                        search              -->
        <div id="list-head" class="bg-darker rounded w-100 position-relative">
            <input type="search" name="search" id="search" class="form-control font-2" placeholder="Search ...">
        </div>
        <!--                       conversation box on left         -->
        <div id="users-container" class="w-100 mt-2 rounded scrollable overflow-auto p-2">
            <!--           profile picture side                 -->
            <div id="user"
                 class="bg-darker rounded w-100 d-flex justify-content-center my-2"
                 v-for="conversation in conversationList">
                <div id="profile-picture" class="w-25 rounded d-flex img-fluid justify-content-center align-items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/4725/4725937.png" alt="">
                </div>
                <div id="details" data-id="" class="bg-darker w-75 rounded d-flex">
                    <div id="name-message" class="rounded px-2">
                        <h5 class="mt-2 font-2 d-block">
                            <Link
                                v-if="conversation.recipient"
                                class="custom-link"
                                :href="route('messages.show', { id: conversation.recipient.unique_id })">
                                {{ `${conversation.recipient.firstname} ${conversation.recipient.lastname} `}}
                            </Link>
                        </h5>
                        <p class="mt-3 font-2 text-dark d-block fs-6 text-truncate">{{ conversation.content }}</p>
                    </div>
                    <div id="time" class="rounded ps-1">
                        <p class="font-2 mt-2">{{ dateConversion(conversation.created_at) }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>
<script setup>
    import { router } from '@inertiajs/vue3'
    import moment from 'moment';
    import {defineProps, onMounted} from "vue";

    let props = defineProps({
        conversationList: {
            type: Object,
        },
        user_session: {
            type: Object,
        },
    });

    const dateConversion = (dateString) => {
        const date = new Date(dateString);
        const options = {
            month: "short",
            day: "numeric",
            hour: "numeric",
        };
        return date.toLocaleString('en-US', options);
    };

</script>

<style scoped>
.custom-link {
    text-decoration: none;
    color: inherit;
}

#details {
    font-size: 13px;
}
.bg-darker {
    background-color: #0e7d9e;
}
#name-message {
    width: 75%;
}
#time {
    width: 25%;
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
#people {
    width: 25%;
    min-width: 350px;
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
