<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Venture Development Test Code</title>
	<link rel="stylesheet" href="app.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>

<body>
	<div id="app">
		<div class="container-fluid header">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="text-center pt-2 pb-2 header_text">Venture Developments Code Test</h1>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row mt-5">
				<div class="col-lg-3">
					<h3>Categories</h3>
					<select name="category" id="category" class="mt-1" @change="getDocumentsByCategory">
						<option value="0">All</option>
						<option v-for="category in categories" :value="category.id">{{category.category}}</option>
					</select>
				</div>
				<div class="col-lg-9">
					<button class="btn green_btn float-end" @click="addDocumentModal=true;">
						<i class="fas fa-file-export"></i>
						<span>Add New Document</span>
					</button>
				</div>
			</div>
			<hr>

			<!-- Displaying Categories and Documents Records -->
			<div class="row mt-5">
				<div class="col-lg-12">
					<table class="table table-bordered table-stripped">
						<thead>
							<tr class="text-center dark_purple text-light">
								<th>Documents</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="document in documents">
								<td class="text-center">
									{{document.name}}
								</td>
								<td class="text-center text-success">
									<i class=" far fa-edit"
										@click="editDocumentModal=true; selectDocument(document.name, document.id);"></i>
								</td>
								<td class=" text-center text-danger">
									<i class="far fa-trash-alt"
										@click="deleteDocumentModal=true; selectDocument(document.name, document.id);"></i>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>


		<!-- Add New Document -->
		<div id="modals_overlay" v-if="addDocumentModal" v-cloak>
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5>Add New Document</h5>
						<i class="fas fa-times" @click="addDocumentModal=false"></i>
					</div>
					<div class="modal-body mt-4">
						<form action="" method="post" v-on:submit.prevent="addDocument">
							<div class="row mb-3">
								<div class="col-lg-12">
									<label for="category">Choose a Category:</label><br />

									<select v-model="newDocument.category" name="category" id="category" class="mt-1">
										<option v-for="category in categories" :value="category.id">
											{{category.category}}</option>
									</select>
								</div>

							</div>
							<div class="mb-3 row">
								<div class="col-lg-12">
									<label for="document_name" class="form-label">Document Name:</label>
									<input type="text" class="form-control" name="document_name" v-model="newDocument.document_name">
								</div>
							</div>

							<div class="row">
								<div class="col-lg-12">
									<button class="btn green_btn float-end">
										Add New Document
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Edit Document -->
		<div id="modals_overlay" v-if="editDocumentModal" v-cloak>
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5>Edit Document</h5>
						<i class="fas fa-times" @click="editDocumentModal=false"></i>
					</div>
					<div class="modal-body mt-4">
						<form action="" method="post" v-on:submit.prevent="editDocumentByID">
							<div class="mb-3 row">
								<div class="col-lg-12">
									<label for="category" class="form-label">Document Name:</label>
									<input type="text" class="form-control" id="category" v-model="selectedDocument.name">
								</div>

							</div>
							<div class="row">
								<div class="col-lg-12">
									<button class="btn green_btn float-end">
										Update Document
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Delete Document -->
		<div id="modals_overlay" v-if="deleteDocumentModal" v-cloak>
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5>Delete Document</h5>
						<i class="fas fa-times" @click="deleteDocumentModal=false"></i>
					</div>
					<div class="modal-body mt-3">
						<h5>Are you sure you want to delete this document?</h5>
						<h6>You are deleting {{selectedDocument.name}}</h6>
						<hr>
						<button class="btn space btn-danger float-end" @click="deleteDocument()">Yes</button>
						<button class="btn space btn-success float-end" @click="deleteDocumentModal=false">No</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
<script src="https://kit.fontawesome.com/fa495ee4ba.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
	integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.css" />

<script src="app.js"></script>

</html>