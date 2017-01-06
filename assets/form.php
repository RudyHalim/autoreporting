<form id="reportform" method="GET">
	<table class="reportform">
		<?php
			foreach ($config['type'] as $typecode => $typelabel) {
				$id_typecode = str_replace(" ", "_", $typecode);
				?>
				<tr>
					<td valign="top">
						<input type="checkbox" name="<?=$id_typecode?>['chk']" id="<?=$id_typecode?>_chk" value="<?=$typecode?>" class="generatelink typecode" />
					</td>
					<td>
						<label for="<?=$id_typecode?>_chk"><?=$typelabel?></label>
						<div>
							<input type="text" name="<?=$id_typecode?>['from']" value="20170103" class="generatelink datetimefrom" /> to
							<input type="text" name="<?=$id_typecode?>['to']" value="20170104" class="generatelink datetimeto" />
						</div>
					</td>
				</tr>
				<?php
			}
		?>
		<tr>
			<td colspan="9">
			<input type="button" value="Submit" name="btnSubmit" id="btnSubmit" />
			</td>
		</tr>
	</table>
</form>