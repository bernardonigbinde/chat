<template>
    <div class="conversation">
        <ChatFeed :contact="props.contact" :messages="props.messages" />
        <ChatComposer @send="sendMessage" />
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
