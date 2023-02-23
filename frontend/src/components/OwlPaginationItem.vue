<template>
    <li class="page-item" :class="getClasses(active, disabled)">
        <a class="page-link" href="javascript:;">
            {{ prev || next ? null : label }}
            <font-awesome-icon v-if="prev" icon='angle-left'></font-awesome-icon>
            <font-awesome-icon v-if="first" icon='angle-double-left'></font-awesome-icon>
            <font-awesome-icon v-if="next" icon='angle-right'></font-awesome-icon>
            <font-awesome-icon v-if="last" icon='angle-double-right'></font-awesome-icon>
        </a>
    </li>
</template>

<script>
export default {
    name: "argon-pagination-item",
    props: {
        label: String,
        active: {
            type: Boolean,
            default: false,
        },
        disabled: {
            type: Boolean,
            default: false,
        },
        prev: {
            type: Boolean,
            default: false,
        },
        next: {
            type: Boolean,
            default: false,
        },
        first: {
            type: Boolean,
            default: false,
        },
        last: {
            type: Boolean,
            default: false,
        },
    },
    methods: {
        getClasses: (active, disabled) => {
            let activeValue, disabledValue;

            activeValue = active ? "active" : null;
            disabledValue = disabled ? "disabled" : null;

            return `${activeValue} ${disabledValue}`;
        },
    },
};
</script>
