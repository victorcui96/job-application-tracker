<template>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3> {{this.company }} </h3>
		</div>
		<div class="panel-body">
			<p>Job Title: {{this.jobTitle }}</p>
			<p>Recruiter Name: {{this.recruiterName }}</p>
			<p>Recruiter Email: {{this.recruiterEmail }}</p>
			<p>Glassdoor Rating: {{this.glassdoorRating }}</p>
			<p>Average Salary: {{this.averageSalary }}</p>
			<p>Status: {{this.status }}</p>
			<p v-if="this.coverLetter">Cover Letter: {{this.coverLetter }}</p>
			<p v-if="this.offerDetails">Offer Details: {{this.offerDetails }}</p>
			<button class="delete is-medium" @click="remove"></button>
		</div>
	</div>
</template>

<script>
export default {
  props: [
  	'application'
  ],
  name: 'Application',

  data () {
    return {
    	company: this.application.company,
    	jobTitle: this.application.job_title,
    	recruiterName: this.application.recruiter_name,
    	recruiterEmail: this.application.recruiter_email,
    	glassdoorRating: this.application.glassdoor_rating,
    	averageSalary: this.application.average_salary,
    	status: this.application.status,
    	coverLetter: this.application.cover_letter,
    	offerDetails: this.application.offer_details

    };
  },

  methods: {
  	remove () {
  		var confirm = window.confirm("Are you sure you want to delete?");
  		if (confirm) {
  			console.log('Contact -> remove')
  			axios.delete(`/applications/${this.application.id}`)
  				.then((response) => {
  					console.log('Application -> remove sucess');
  					// Tell the parent component that this application has been deleted
  					this.$emit('deleted')

  				})
  				.catch((error) => {
  					// Deletion failed
  					console.log('Application -> remove error')
  					console.log(error)
  				});
  		}
  		
  	}
  }
};
</script>

<style lang="scss" scoped>
.delete {
	background-color: red;
}
</style>