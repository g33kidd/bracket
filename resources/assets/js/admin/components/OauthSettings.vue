<template>
	<div>
		<div class="m-b-2">
			<personal-access-tokens></personal-access-tokens>
		</div>
		<div class="m-b-2">
			<authorized-clients></authorized-clients>
		</div>
		<div class="m-b-2">
			<passport-clients></passport-clients>
		</div>
	</div>
</template>

<script>
import PersonalAccessTokens from './passport/PersonalAccessTokens.vue';
import PassportClients from './passport/Clients.vue';
import AuthorizedClients from './passport/AuthorizedClients.vue';

export default {
	name: 'OauthSettings',
	components: {
		PersonalAccessTokens,
		PassportClients,
		AuthorizedClients,
	}
}
</script>