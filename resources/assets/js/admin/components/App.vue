<template>
	<div>
		<admin-header></admin-header>
		<div class="container m-t-2">
			<router-view
				class="animated"
				transition="fade"
				transition-mode="out-in">
			</router-view>
		</div>
	</div>
</template>

<script>
import AdminHeader from './AdminHeader.vue';

export default {
	name: 'App',
	components: {
		AdminHeader
	}
}
</script>
