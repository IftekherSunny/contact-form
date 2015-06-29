<!DOCTYPE html>
<html>
<head>
	<title>Contact Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id="app" class="well ">

	<h2>Contact Form</h2>

	<div class="alert alert-danger" v-show="errors">
		<li v-repeat="error: errors">{{error}}</li>
	</div>

	<div class="alert alert-success" v-show="success">
		<b>{{ success }}</b>
	</div>

	<form method="post" v-on="submit: onFormSubmit">

		<div class="form-group">
			<label>Email: <span v-show="message.email == '' " class="required">*</span></label>
			<input type="text" v-model="message.email" class="form-control" placeholder="Enter your email address"/>
		</div>

		<div class="form-group">
			<label>Name: <span v-show="message.name == '' " class="required">*</span></label>
			<input type="text" v-model="message.name" class="form-control" placeholder="Enter your name"/>
		</div>

		<div class="form-group">
			<label>Message: <span v-show="message.body == '' " class="required">*</span></label>
			<textarea type="text" v-model="message.body" class="form-control" rows="10" placeholder="Enter your message"></textarea>
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-lg btn-block" v-attr="disabled: waiting">Send<span v-show="waiting">...</span></button>
		</div>
	</form>
</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.4/vue.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/0.1.3/vue-resource.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
