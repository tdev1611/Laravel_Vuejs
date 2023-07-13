<template>
    <div>
        settings
    </div>
</template>

<script>
import { useMenu } from "../../../stores/use-menu.js"
export default {
    setup() {
        useMenu().onselectedKeys(["admin-settings"])
    }
}
</script>