<template>
	<div>
		<div class="all-contacts">
			<div class="row">
				<div class="col-md-12" >
					<h2>Welcome to the Job Application Tracker application!</h2>
					<h5>This application helps you keep track of all your job applications! You can keep track of crucial information such as your recruiter's email, the company's glassdoor rating, and the status of your application.</h5>
					<!-- <h3 class="center">Here are all of your job applications!</h3> -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<p v-show="applications.length === 0"> You have not submitted any applications yet!</p>
				</div>
			</div>
			<div class="all-applications" v-show="applications.length > 0">
				<div class="panel-group">
					<Application v-for="(application, index) in applications" :key="index" :application="application" @deleted="remove(index)">
						
					</Application>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<button class="btn btn-info">
						Test Button
					</button>
				</div>
				<div class="col-md-3">
					<div class="btn btn-info" @click="showForm">
						Create New Application
					</div>
				</div>
			</div>
		</div>
		<ApplicationForm v-if="isCreating" @created="fetchApplications"> </ApplicationForm>
		<Footer> </Footer>

	</div>
</template>

<script>
import axios from 'axios';
import ApplicationForm from './ApplicationForm';
import Application from './Application'
import Footer from './Footer'

export default {
  components: {
	ApplicationForm,
	Application,
	Footer
 },
  name: 'App',

  data () {
    return {
    	applications: [],
    	isCreating: false
    };
  },

  mounted () {
  	this.fetchApplications();
  },

  methods: {
  	showForm () {
  		console.log('Show create form')
  		this.isCreating = true
  	},
  	fetchApplications () {
  		console.log('App -> fetch')
  		axios.get('/applications').then((response) => {
  			console.log('App -> fetch success');
  			console.log(response.data);
  			this.applications = response.data;
  		})
  		.catch((response) => {
  			console.log('App -> fetch error');
  			console.log(error);
  		});
  		this.isCreating = false;
  	},

  	remove (index) {
  		// This method is called when the <Application> component emits the 'deleted' event
  		console.log(`App -> remove ID: ${index}`);
  		this.applications.splice(index, 1);

  	}
  }
};
</script>

<style lang="css" scoped>
.center {
	text-align: center;
}

</style>