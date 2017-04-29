<template>
	<footer class="footer">
	  <div class="container">
	  	<div class="columns">
	  		<div class="column is-one-third">
	  			<div class="content has-text-centered">
	  				<a href="/credits"> Credits</a>
	  			</div>
	  		</div>
	  		<div class="column is-one-third">
	  			<div class="content has-text-centered">
	  				<a href="https://github.com/victorcui96/"> 
	  					<i class="fa fa-github"></i>
	  				</a>
	  			</div>
	  		</div>
	  		<div class="column is-one-third">
	  			<div class="column is-one-third">
	  				<div class="content has-text-centered">
	  					<a href="http://cuidesign.net/"> 
	  						Portfolio
	  					</a>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  </div>
	</footer>
</template>

<script>
export default {

  name: 'Footer',

  data () {
    return {

    };
  }
};
</script>

<style lang="css" scoped>
footer {
	/*position:absolute;*/
	right: 0;
    bottom: 0;
    left: 0;
    margin-top: 10%;
    padding: 1rem;
    min-height: 50px;
    width: 100%;
    background-color: #efefef;
    text-align: center;
}
</style>