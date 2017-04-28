<template>
	<div class="application-form columns">
	<div class="field is-grouped is-horizontal">
		<div class="field-label is-normal">
			<label class="label">Company</label>
			<p class="control">
				<input class="input is-hovered" type="text">
			</p>
		</div>
		<div class="field-label is-normal">
			<label class="label">Job Title</label>
			<p class="control">
				<input type="text" class="input ">
			</p>
		</div>
		<div class="field">
			
		</div>
		</div>
	</div>
		
</template>

<script>
export default {

  name: 'ApplicationForm',

  data () {
    return {

    };
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
</style>
