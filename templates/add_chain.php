<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>Add new wallet</h3>
		</div>
		<div class="col-md-4">
			<?php if(isset($data['error'])): ?>
			<div class="alert alert-danger" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <?=$data['error']?>
			</div>
			<?php endif; ?>
			<?php if(isset($data['success'])): ?>
			<div class="alert alert-success" role="alert">
			  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
			  <?=$data['success']?>
			</div>
			<?php endif; ?>
			<form action="<?=get_url('add_chain')?>" method="POST">
			  <div class="form-group">
				<label for="chain_type">Wallet type</label>
				<select name="chain_type" class="form-control" id="chain_type" required>
					<option value="BTC">BTC</option>
					<option value="ETH">ETH</option>
				</select>
			  </div>
			  <div class="form-group">
				<label for="chain_addr">Wallet address</label>
				<input type="text" name="chain_addr" class="form-control" id="chain_addr" 
					placeholder="xxxxxxxxxxxxxxxxxxxxxxxxx" required>
			  </div>
			  <button type="submit" class="btn btn-success">Insert to Table</button>
			</form>
		</div>
	</div>
</div>