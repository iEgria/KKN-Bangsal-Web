<template>
    <div class="position-fixed" style="bottom: 20px; right: 20px;">
        <router-link :to="to" class="btn btn-lg bg-gradient-success px-4 py-3 shadow">
            <slot />
        </router-link>
    </div>
</template>

<script>
export default {
    name: "OwlFloatingButton",
    props: {
        to: String,
    }
}
</script>