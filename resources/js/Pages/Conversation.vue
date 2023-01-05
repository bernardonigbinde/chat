<template>
    <div class="flex flex-col rounded-b-lg">
        <div class="bg-gray-200 items-center h-24 py-3 px-5 flex rounded-tl-lg">
            <img class="rounded-full w-12 h-12 rounded-full shadow-lg" v-if="props.contact" :src="props.contact.profile_image" :alt="props.contact.name"/>
            <h1 class="font-semibold ml-2 text-xl" v-text="props.contact ? props.contact.name : 'Select a Contact'"/>
        </div>
        <ChatFeed :contact="props.contact" :messages="props.messages"/>
        <ChatComposer @send="sendMessage"/>
    </div>
</template>

<script setup>
import ChatFeed from "@/Pages/ChatFeed.vue";
import ChatComposer from "@/Pages/ChatComposer.vue";

let props = defineProps({
    contact: Object,
    messages: Array,
})

let sendMessage = (text) => {
    console.log(text)
}
</script>
