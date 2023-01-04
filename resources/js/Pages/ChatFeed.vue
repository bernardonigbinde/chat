<template>
    <div class="feed">
        <ul v-if="props.contact">
            <li v-for="message in props.messages" :class="`message_${message.to === props.contact.uuid ? 'sent' : 'received'}`" :key="message.uuid"></li>
        </ul>
    </div>
</template>

<script setup>
let props = defineProps({
    messages: Array,
    contact: Object,
})
</script>

<style scoped>

</style>
