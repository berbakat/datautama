@extends('master')

@section('konten')

    <h4> List Produk </h4>
	
	
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<div id="appVue">
		<div class="row">
	
			<div class="col-md-3">
				<input type="text" class="form-control" placeholder="Search" v-model="search" v-on:keyup="getData()">
			</div>
			<div class="col-md-9" style="text-align: right;">
				<button class="btn btn-lg btn-primary" v-on:click.prevent="tambahData" style="padding:5px 15px">Create</button>
			</div>
		</div>
		<table class="table table-hover">

			<thead>
				<tr>
					<th>Name</th>
					<th>Price</th>
					<th>Stock</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<template v-for="item in data_produk">
					<tr>
						<td>@{{ item.name }}</td>
						<td>@{{ item.price }}</td>
						<td>@{{ item.stock }}</td>
						<td>@{{ item.description }}</td>
						<td>
							<button class="btn btn-xs btn-warning" v-on:click.prevent="editData(item.id)">Edit</button>
							<button class="btn btn-xs btn-danger" v-on:click.prevent="hapusData(item.id)">Hapus</button>
						</td>
					</tr>
				</template>
			</tbody>

		</table>
		<div>
			<button v-if="prev_page_url" v-on:click.prevent="gantiHalaman(prev_page_url)" class="btn btn-primary">Prev</button>
			<button v-if="next_page_url" v-on:click.prevent="gantiHalaman(next_page_url)" class="btn btn-primary">Next</button>
		</div>
	
	
		<div class="modal fade" id="modalTambahData" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">×</button>
						<h4 class="modal-title">Add Produk</h4>
					</div>

					<div class="modal-body">
						<form role="form">
							<div class="box-body">
								<div class="form-group">
									<label for="InputName">Name</label>
									<input v-model="name" type="text" class="form-control" placeholder="Name">
								</div>
								<div class="form-group">
									<label for="InputPrice">Price</label>
									<input v-model="price" type="number" class="form-control" placeholder="Price">
								</div>
								<div class="form-group">
									<label for="InputStock">Stock</label>
									<input v-model="stock" type="number" class="form-control" placeholder="Stock">
								</div>
								<div class="form-group">
									<label for="InputDescription">Description</label>
									<textarea v-model="description" class="form-control" rows="5"></textarea>
								</div>
							</div>
							<!-- /.box-body -->

							<div class="box-footer">
								<button type="submit" class="btn btn-primary" v-on:click="simpanproduk">Submit</button>
							</div>
						</form>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
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
				this.url = "{{ url('get_product') }}"
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
				},
				tambahData: function() {
					$('#modalTambahData').modal('show');
				},
				simpanproduk: function() {
					var form_data = new FormData();
					form_data.append("name", this.name);
					form_data.append("price", this.price);
					form_data.append("stock", this.stock);
					form_data.append("description", this.description);
					form_data.append("id_edit", this.id_edit);
					console.log(form_data);
					var url = "{{ url('saveproduk') }}";

					axios.post(url, form_data)
						.then(resp => { 
							$('#modalTambahData').modal('hide');
							//alert('Success');
							this.name = null;
							this.price = null;
							this.stock = null;
							this.description = null;
							this.id_edit = null;

							this.getData();
						})
						.catch(err => {
							//alert('error');
							console.log(err);
						})

				},
				editData: function(id) {
					this.id_edit = id;

					var url = "{{ url('get_produkById') }}" + '/' + id;

					axios.get(url)
						.then(resp => {
							var produk = resp.data;
							this.name = produk.name;
							this.price = produk.price;
							this.stock = produk.stock;
							this.description = produk.description;

							this.tambahData();
						})
						.catch(err => {
							alert('error');
							console.log(err);
						})
						.finally(() => {

						})
				},
				hapusData: function(id) {
					var url = "{{ url('hapus_produk') }}" + '/' + id;
					axios.get(url)
						.then(resp => {
							console.log(resp);
							this.getData();
						})
						.catch(err => {
							alert('error');
							console.log(err);
						})
						.finally(() => {
						})
				}
			}
		})
	</script>
@endsection