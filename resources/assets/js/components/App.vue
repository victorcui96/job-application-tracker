<template>
	<div>
		<div class="all-contacts" v-if="create === false">
			<div class="row">
				<div class="col-md-12">
					<h3 class="center">Here are all of your job applications!</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p v-show="applications.length === 0"> You have not submitted any applications yet!</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<button class="btn btn-info">
						Test Button
					</button>
				</div>
				<div class="col-md-3">
					<div class="btn btn-info" @click="create=true">
						Create New Application
					</div>
				</div>
			</div>
		</div>
		<ApplicationForm v-else> </ApplicationForm>
	</div>
</template>

<script>
import axios from 'axios';
export default {

  name: 'App',

  data () {
    return {
    	applications: [],
    	create: false
    };
  },

  mounted () {
  	console.log('mounted')
  },

  methods: {
  	createApplication () {
  		console.log('redirect')
  		// this.$router.push('/create-application')
  	}
  }
};
</script>

<style lang="css" scoped>
.center {
	text-align: center;
}

</style>