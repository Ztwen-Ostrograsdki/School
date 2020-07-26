<template>
	
	<div class="onetable" style="width:48% ;display: none;">
		<h5>Les infos personelles</h5>
		<table class="table-profil ">
			<tr>
				<td>Nom:</td>
				<td> Pirere </td>
			</tr>
			<tr>
				<td>Prénoms:</td>
				<td>JAHAGA</td>
			</tr>
			<tr>
				<td>Date de Naissance:</td>
				<td>15-25-19</td>
			</tr>
			<tr>
				<td>Sexe:</td>
				<td>M</td>
			</tr>
			<tr>
				<td>Classe:</td>
				<td>3eme</td>
			</tr>
		</table>
		<span>
			<a href=" #" class="btn btn-news my-1 p-1 float-right">Mettre à jour</a>
		</span>
	</div>


</template>

<script>
	export default{

	}

$(()=>{
	$('#pupil-profil .onetable').show('fade', {direction: 'down'}, 4000)
})
</script>