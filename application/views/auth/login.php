<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/materialize/css/materialize.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/login.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/animate.css') ?>">
<body>

	<div class="row bg">
		<div class="col s12 animated fadeIn" >
			<div class="row">
				<div class="col s4 offset-s4">
				<div id="forms">
				<h4 class="center"><b>LOGIN</b></h4>
				<?php echo form_open() ?>
				<div class="email" v-show="login == true ">
					<div class="input-field col s12">
			            <input id="email"  type="email" class="validate" v-model="email" name="email">
			            <label for="email" data-error="wrong" data-success="right">Email</label>
			            <span id="verify"><p><?= form_error('email') ?></p></span>
			            
		          </div>
		          <span @click="selanjutnya" class="btn-login  right">Next</span>
          </div>
				<!-- password -->
				<div class="password" v-show="login == false">
				  <div class="input-field col s12">
		          <input id="password" type="password" v-model="password" class="validate" name="password">
		          <label for="password">Password</label>
		          <span id="verify"><p><?= form_error('password') ?></p></span>
		        </div>
		        <button type="submit" name="submit" class="waves-effect waves-light btn right wr">Login</button>
		        <!-- <input type="submit" name="submit" value="login"> -->
				</div>
				<?php echo form_close() ?>
				</div>
				</div>
			</div>
		</div>
		
	</div>


<script src="<?php echo base_url('asset/materialize/js/materialize.min.js') ?>"></script>
<script src="<?php echo base_url('asset/js/JQuery.js') ?>"></script>
<script src="<?php echo base_url('asset/js/vue.min.js') ?>"></script>
<script src="<?php echo base_url('asset/js/alert.js') ?>"></script>
<script type="text/javascript">
	new Vue({
		el : '#forms',
		data : {
			login : true,
			email : '',
			password : ''
		},
		methods : {
			selanjutnya:function(){
				_email = this.email.trim()
				if (_email == '') {
					this.login = true
					informasi()
				}else{
					this.login = false
				}

			}
		}
	});
	function informasi(){
		swal({
			text : 'Data Tidak Boleh Kosong',
			icon : 'error'
		})
	}
</script>
</body>
</html>