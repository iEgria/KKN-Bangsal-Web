<template>
    <div class="card card-body shadow">
        Selamat Datang {{ this.name }} 😸
    </div>
</template>

<script>
export default {
    name: 'Dashboard',
    data() {
        return {
            name: window.localStorage.name
        }
    }
}
</script>