<template>
    <ul class="navbar-nav">
        <li class="nav-item">
            <router-link to="admin-dashboard" class="nav-link border-radius-md">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <font-awesome-icon icon="home"></font-awesome-icon>
                </div>
                <span class="nav-link-text ms-1">Dashboard</span>
            </router-link>
        </li>
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Master</h6>
        </li>
        <li class="nav-item">
            <router-link to="admin-master-pengguna" class="nav-link border-radius-md">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <font-awesome-icon icon="user"></font-awesome-icon>
                </div>
                <span class="nav-link-text ms-1">Pengguna</span>
            </router-link>
        </li>
    </ul>
</template>