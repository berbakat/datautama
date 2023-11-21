@extends('master')

@section('konten')

    <h4> List Transaksi </h4>
	
	
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<div id="appVue">
		<div class="row">
	
			<div class="col-md-3">
				<input type="text" class="form-control" placeholder="Search" v-model="search" v-on:keyup="getData()">
			</div>
		</div>
		<table class="table table-hover">

			<thead>
				<tr>
					<th>Reference_no</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Payment Amount</th>
				</tr>
			</thead>
			<tbody>
				<template v-for="item in data_produk">
					<tr>
						<td>@{{ item.reference_no }}</td>
						<td>@{{ item.price }}</td>
						<td>@{{ item.quantity }}</td>
						<td>@{{ item.payment_amount }}</td>
					</tr>
				</template>
			</tbody>

		</table>
		<div>
			<button v-if="prev_page_url" v-on:click.prevent="gantiHalaman(prev_page_url)" class="btn btn-primary">Prev</button>
			<button v-if="next_page_url" v-on:click.prevent="gantiHalaman(next_page_url)" class="btn btn-primary">Next</button>
		</div>
	
	
	
	</div>
	
	<script>
		
		var appVue = new Vue({
			el: "#appVue",
			data: {
				url: '',
				data_produk: [],
				
				name: null,
				price: null,
				stock: null,
				description: null,
				id_edit: null,
				
				next_page_url: '',
				prev_page_url: '',
				
				search: ''
			},
			mounted() {
				this.url = "{{ url('get_transaksi') }}"
				this.getData();
			},
			methods: {
				getData: function() {
					axios.get(this.url, {
							params: {
								search: this.search
							}
						})
						.then(resp => {
							console.log(resp.data);
							this.data_produk = resp.data.data;
							
							this.next_page_url = resp.data.next_page_url;
							this.prev_page_url = resp.data.prev_page_url;
						})
						.catch(err => {
							alert('error');
							console.log(err);
						})
				},
				gantiHalaman: function(url) {
					this.url = url;
					this.getData();
				}
			}
		})
	</script>
@endsection