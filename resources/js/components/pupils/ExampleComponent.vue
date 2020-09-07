<template>
	<div class="w-100 border m-1 p-2">
		<div class="printer w-75 mx-auto" ref="content">
			<h3 class="btn btn-primary mx-auto p-2">An example to print html to pdf</h3>
			<div class="w-100 m-1 d-flex border">
				<p class="border">
					<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi et quae cum doloremque ratione architecto expedita, voluptatibus sequi placeat blanditiis inventore deserunt ipsa reiciendis aut nam rerum, commodi molestiae minus!</span>
					<span>Excepturi officiis libero incidunt illo. Dolor magni nihil sint consectetur sit beatae, praesentium natus nostrum quas blanditiis vero eum adipisci quisquam nam rerum facere excepturi asperiores sed architecto, tempore hic.</span>
					<span>Quia est reiciendis obcaecati veniam itaque cupiditate eius dicta ipsa nulla debitis, iure consectetur quidem quam? Earum ipsam, suscipit est magni, quam non molestiae nesciunt ut aspernatur perspiciatis vel ex.</span>
					<span>Quo aspernatur, vel vitae facere et omnis, quibusdam eligendi illo voluptatum laboriosam perferendis dolorem cumque praesentium aliquid. Debitis exercitationem dignissimos vitae molestias minus. Quo reprehenderit quas officia tempora veniam cum.</span>
					<span>Hic voluptas voluptatem incidunt assumenda tenetur sequi. Repellendus nulla dolor labore iure perspiciatis et odit totam nam ab rem officia, hic quaerat nemo numquam minima fuga laborum ex excepturi maiores.</span>
				</p>
				<div class="row w-100 mx-auto">
					<div class="col-3 border border-primary">
						Lorem ipsum dolorliquam minima!
					</div>
					<div class="col-3 border border-success mx-1">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa iure porro libero dicta earum sapiente
					</div>
					<div class="col-3 border border-secondary">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa iure porro libero dicta earum sapiente accusantium, reiciendis cumque magni fugit. Ab ipsum temporibus provident ipsa pariatur. Corporis rem aliquam minima!
					</div>
				</div>
			</div>
		</div>
		<button class="btn btn-primary p-2" @click="download">Save to pdf</button>
	</div>
</template>


<script>

	import PDF from "jspdf"
	export default{


		methods: {
			download() {

				const pdf = new PDF()
				const html = this.$refs.content
				pdf.fromHTML(html, 15, 15, {
					width: 150,
					border: 'solid 2px red'
				})

				pdf.save("output.pdf")
			}
		}

	}

</script>