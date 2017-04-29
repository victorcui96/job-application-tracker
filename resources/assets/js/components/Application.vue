<template>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3> {{this.company }} </h3>
		</div>
		<div class="panel-body" v-if="!editing">
			<p>Job Title: {{this.jobTitle }}</p>
			<p>Recruiter Name: {{this.recruiterName }}</p>
			<p>Recruiter Email: {{this.recruiterEmail }}</p>
			<p>Glassdoor Rating: {{this.glassdoorRating }}</p>
			<p>Average Salary: {{this.averageSalary }}</p>
			<p>Status: {{this.status }}</p>
			<p v-if="this.coverLetter">Cover Letter: {{this.coverLetter }}</p>
			<p v-if="this.offerDetails">Offer Details: {{this.offerDetails }}</p>
			<button class="delete is-medium" @click="remove"></button>
      <a class="edit-icon-container tool" @click="edit">
        <i class="fa fa-pencil-square-o fa-3x" aria-hidden="true" ></i>
      </a>
		</div>
    <!-- Only show this if user wants to edit -->
    <div class="panel-body" v-else>
      <p>
        <input type="text" class="input"v-model="company" placeholder="company">
        <input type="text" v-model="jobTitle" placeholder="">
        <input type="text" v-model="recruiterName">
        <input type="text" v-model="recruiterEmail">
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
              <option value="5.0">5.9</option>
          </select>
        </span>
        <input type="number" v-model="averageSalary">
        <br>
        <br>
        <span class="select">
          <select name="" id="" v-model="status">
            <option value="accepted">Accepted</option>
            <option value="applied">Applied</option>
            <option value="in-progress">In-progress</option>
            <option value="rejected">Rejected</option>
          </select>
        </span>
        <br>
        <textarea name="" id="" class="textarea" placeholder="Paste Cover Letter here" v-model="coverLetter">
          <br>
          <br>
        </textarea>
        <br>
        <br>
        <textarea name="" id="" class="textarea" placeholder="Put in Offer details here" v-model="offerDetails"></textarea>
        <br>
        <button class="button is-medium is-info" @click="save">Save</button>
        <button class="button is-medium is-warning" @click="cancel">Cancel</button>
      </p>
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
    	offerDetails: this.application.offer_details,
      editing: false

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
  		
  	},
    edit () {
      // User wants to make a PUT request
      this.editing = true;
    },

    save () {
      console.log('App ->save')
      axios.put(`/applications/${this.application.id}`, {
        // This will make a put request to my corresponding route, now the this fields are updated to whatever the user typed in 
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
        console.log('Application -> save sucess');
        this.$emit('updated', {
          company: this.company,
          jobTitle: this.jobTitle,
          recruiterName: this.recruiterName,
          recruiterEmail: this.recruiterEmail,
          glassdoorRating: this.glassdoorRating,
          averageSalary: this.averageSalary,
          status: this.status,
          coverLetter: this.coverLetter,
          offerDetails: this.offerDetails
        });
        this.editing = false;
      })
      .catch((error) => {
        console.log('App -> save error')
      });
    },
    cancel () {
      // User wants to cancel his edit
      this.company = this.application.company;
      this.jobTitle = this.application.jobTitle;
      this.recruiterName = this.application.recruiterName;
      this.recruiterEmail = this.application.recruiterEmail;
      this.glassdoorRating = this.application.glassdoorRating;
      this.averageSalary = this.application.averageSalary;
      this.status = this.application.status;
      this.coverLetter = this.application.coverLetter;
      this.offerDetails = this.application.offerDetails;
      this.editing = false;
    }

  },

  

  
};
</script>

<style lang="css" scoped>
input {
  max-width: 130px;
}
.delete {
	background-color: red;
}
.edit-icon-container {
  display: inline;
  padding-left: 10px;
}
</style>