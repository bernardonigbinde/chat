<template>
    <div class="flex flex-col rounded-b-lg max-h-full">
        <div class="bg-gray-400 self-stretch place-content-between h-24 py-3 px-5 flex items-center rounded-tl-lg">
            <div class="flex items-center">
                <img class="rounded-full w-12 h-12 rounded-full shadow-lg" v-if="props.contact" :src="props.contact.profile_image" :alt="props.contact.name"/>
                <h1 class="font-semibold ml-2 text-xl" v-text="props.contact ? props.contact.name : 'Select a Contact'"/>
            </div>
            <div class="text-right">
                <span v-text="props.messages.length"/> Message(s)
            </div>
        </div>
        <div v-if="contact">
            <ChatFeed class="flex-col" :contact="props.contact" :messages="props.messages"/>
            <ChatComposer @send="sendMessage"/>
        </div>
        <div v-else class="h-full w-full bg-gray-200 place-items-center  flex-col flex -space-y-1 pt-48">
            <div class="text-gray-600 font-bold text-2xl">
                No Contact Selected
            </div>
            <div class="text-gray-400 text-lg">
                Select a contact to start a conversation
            </div>
        </div>
    </div>
</template>

<script setup>
import ChatFeed from "@/Pages/ChatFeed.vue";
import ChatComposer from "@/Pages/ChatComposer.vue";

let props = defineProps({
    contact: Object,
    messages: Array,
})

let emits = defineEmits(['send'])

let sendMessage = (message) => {
    emits('send', message);
}

</script>
