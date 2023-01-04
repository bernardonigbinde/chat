<template>
    <div class="contact-list">
        <ul>
            <li v-for="contact in props.contacts" :key="contact.uuid">
                <div class="avatar">
                    <img :src="contact.profile_image" class="rounded-full" :alt="contact.name" />
                </div>
                <div class="contact">
                    <p class="name" v-text="contact.name" />
                    <p class="email" v-text="contact.email" />
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup>
let props = defineProps({
    contacts: Array,
})
</script>
