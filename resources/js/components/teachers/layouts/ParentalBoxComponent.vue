<template>
	<div class="onetable" style="width:48%">
		<div class="w-100 m-0 p-0">
			<h5>Les infos parentales</h5>
			<table class="table-profil ">

				<tr>
					<td>Père :</td>
					<td>Hubert</td>
				</tr>
				<tr>
					<td>Profession :</td>
					<td>Enseignant</td>
				</tr>
				<tr>
					<td>Mère :</td>
					<td>Germaine</td>
				</tr>
				<tr>
					<td>Profession :</td>
					<td>Enseignant</td>
				</tr>
				<tr>
					<td>Contacts :</td>
					<td>65547585/96857415</td>
				</tr>
				<tr>
					<td>Localité :</td>
					<td>Cotonou</td>
				</tr>
			</table>
			<span>
				<a href="#" class="btn btn-news my-1 p-1 float-right">Mettre à jour</a>
			</span>
		</div>
	</div>
</template>

<script>
	export default{
		props: ['visible', 'pupil'],
	}


</script>