<template>
    <div>
        roles
    </div>
</template>

<script>
import { useMenu } from "../../../stores/use-menu.js"
export default {
    setup() {
      
        useMenu().onselectedKeys(["admin-roles"])
    }
}
</script>