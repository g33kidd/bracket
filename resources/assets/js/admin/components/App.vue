<template>
	<admin-header></admin-header>
	<div class="container m-t-2">
		<router-view
			class="animated"
			transition="fade"
			transition-mode="out-in">
		</router-view>
	</div>
</template>