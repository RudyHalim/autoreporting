<form id="reportform" method="GET">
	<table class="reportform">
		<?php
			foreach ($config['type'] as $typelabel => $typearray) {
				$id_typecode = str_replace(" ", "_", $typearray['reporttype']);
				?>
				<tr>
					<td valign="top">
						<input type="checkbox" name="<?=$id_typecode?>['chk']" id="<?=$id_typecode?>_chk" value="<?=$typearray['reporttype']?>" class="generatelink typecode" />
					</td>
					<td>
						<label for="<?=$id_typecode?>_chk"><?=$typelabel?></label>
						<div>
							<input type="text" name="<?=$id_typecode?>['from']" value="20170105" class="generatelink datetimefrom datepicker" /> to
							<input type="text" name="<?=$id_typecode?>['to']" value="20170105" class="generatelink datetimeto datepicker" />
							<input type="hidden" name="<?=$id_typecode?>['shelltype']" value="<?=$typearray['shelltype']?>" />
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



<?php
	foreach ($config['type'] as $typelabel => $typearray) {
		$id_typecode = str_replace(" ", "_", $typearray['shelltype']);
		$id_typecode = str_replace(".", "", $id_typecode);
		echo "<div id='".$id_typecode."'></div>";
	}
?>