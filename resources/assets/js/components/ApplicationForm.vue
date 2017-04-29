<template>
	<div class="application-form">
		<div class="field">
			<label class="label">Company</label>
			<p class="control">
				<input class="input is-hovered" type="text" v-model="company">
			</p>
		</div>
		<div class="field">
			<label class="label">Job Title</label>
			<p class="control">
				<input type="text" class="input" v-model="jobTitle">
			</p>
		</div>
		<div class="field">
			<label class="label">Recruiter's Name</label>
			<p class="control">
				<input type="text" class="input" v-model="recruiterName">
			</p>
		</div>
		<div class="field">
			<label for="" class="label"> Recruiter's Email </label>
			<p class="control has-icons-left">
				<input type="text" class="input is-danger" v-model="recruiterEmail">
				 <span class="icon is-small is-left">
			      <i class="fa fa-envelope"></i>
			    </span>
			</p>
		</div>
		<div class="field">
			<label for="" class="label">Glassdoor Rating</label>
			<p class="control">
				<span class="select">
					<select name="" id="" v-model="glassdoorRating">
						<option value="1">1</option>
						<option value="1.5">1.5</option>
						<option value="2.0">2.0</option>
						<option value="2.5">2.5</option>
						<option value="3.0">3.0</option>
						<option value="3.5">3.5</option>
						<option value="4.0">4.0</option>
						<option value="4.5">4.5</option>
						<option value="5.0">5.0</option>
					</select>
				</span>
			</p>
		</div>
		<div class="field">
			<label for="" class="label">Average Salary / Year</label>
			<p class="control">
				<input type="number" class="input" v-model="averageSalary">
			</p>
		</div>
		<div class="field">
			<label class="label">Status</label>
			<p class="control">
				<span class="select">
					<select name="" id="" v-model="status">
						<option value="accepted">Accepted</option>
						<option value="applied">Applied</option>
						<option value="in-progress">In-progress</option>
						<option value="rejected">Rejected</option>
					</select>
				</span>
			</p>
		</div>
		<div class="field">
			<label for="" class="label">Cover Letter</label>
			<p class="control">
				<textarea name="" id="" class="textarea" placeholder="Paste Cover Letter here" v-model="coverLetter">
				
				</textarea>
			</p>
		</div>
		<div class="field">
			<label for="" class="label">Offer Details</label>
			<p class="control">
				<textarea name="" id="" class="textarea" placeholder="Only if you've been accepted!" v-model="offerDetails">
					
				</textarea>
			</p>
			
		</div>
		<!-- Submit Button to create an application -->
		<!-- v-bind directive is used to reactivly update an HTML attribute -->
		<button class="button is-primary is-outlined is-medium" v-on:click="create" :disabled="isLoading">Create!</button>
	</div>
</template>

<script>
export default {

  name: 'ApplicationForm',

  data () {
    return {
    	company: '',
    	jobTitle: '',
    	recruiterName: '',
    	recruiterEmail: '',
    	glassdoorRating: 0,
    	averageSalary: 0,
    	status: '',
    	coverLetter: '',
    	offerDetails: '',
    	isLoading: false
    };
  },

  methods: {
  	create () {
  		console.log('Application form -> created')
  		if (this.loading) {
  	      // Don't submit a 2nd request to database while 1st is already being sent
  		  alert('request is already being made');
  		  return false
  		}
  		this.isLoading = true
  		this.sendRequest()
  	},

  	sendRequest () {
  		axios.post('/applications', {
  			// Save all of the user's request fields into the database
  			company: this.company,
  			job_title: this.jobTitle,
  			recruiter_name: this.recruiterName,
  			recruiter_email: this.recruiterEmail,
  			glassdoor_rating: this.glassdoorRating,
  			average_salary: this.averageSalary,
  			status: this.status,
  			cover_letter: this.coverLetter,
  			offer_details: this.offerDetails
  		})
  		.then((response) => {
  			// This is the callback function called right after the post request is made
  			console.log('ApplicationForm -> successful post request sent')
 			// Reset the form fields to be blank so user can create another application
  			this.reset()
  			this.$emit('created')
  		})
  		.catch((error) => {
  			console.error('Something went wrong with the request')
  			console.log(error)
  			this.$emit('error')
  		});
  	},

  	reset () {
  		// Clear out form input fields
  		this.company = '';
  		this.jobTitle = '';
    	this.recruiterName = '';
    	this.recruiterEmail = '';
    	this.glassdoorRating = 0;
    	this.averageSalary = 0;
    	this.status = '';
    	this.coverLetter = '';
    	this.offerDetails = '';
    	this.isLoading = false;
  	}

  }
};
</script>

<style lang="css" scoped>
	.label {
		color: #000;
		font-size: 110%;
	}
	.control input {

	}

	.control.has-icons-left .input {
    padding-left: 2.25em;
}
</style>
