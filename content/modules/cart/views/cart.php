<div class="content-list" style="min-height:300px;padding-top:100px;">
	<div class="grid-container">
		<div class="grid-100 mobile-grid-100">
			<?php echo form_open('cart/update/action'); ?>
			<table class="tabgreen shoppingcart-table post_message">
				<tr class="head">
					<th colspan="5">Keranjang Belanja Anda</th>
				</tr>
				<tr class="subhead">
					<th>Sticker</th>
					<th>Sub Total</th>
					<th>Kuantitas</th>
					<th>Total</th>
					<th>Remove</th>
				</tr>
				<?php $i = 1; ?>
				<?php foreach ($this->cart->contents() as $key => $items): ?>
					<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
					<tr <?php echo ($key % 2 == 0 )? 'class="odd"' : ''; ?> >
					  <td><?php echo $items['name']; ?></td>
					  <td>Rp. <?php echo $this->cart->format_number($items['price']); ?>,-</td>
					  <td>
					  	<?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
					  </td>
					  <td>Rp. <?php echo $this->cart->format_number($items['subtotal']); ?>,-</td>
					<td><input type="checkbox" name="<?php echo $i.'[qty]' ?>" value="0"/></td>
					</tr>
				<?php $i++; ?>
				<?php endforeach; ?>
				<tr>
					<td colspan="3" class="text-right">Total Sebelum Pengiriman</td>
					<td class="fontbold">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?>,-</td>
				</tr>
			</table>
				<input type="submit" value="Ubah belanjaan" class="buttonred"/>
				<input type="button" value="Selesai Berbelanja" class="buttongreen" onclick=" document.location.href='<?php echo site_url('cart/billingshipping') ?>'"/>
			<?php echo form_close() ?>
		</div>		
	</div>		
</div>	