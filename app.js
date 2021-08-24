let app = new Vue({
	el: '#app',
	data: {
		addDocumentModal: false,
		editDocumentModal: false,
		deleteDocumentModal: false,
		documents: [],
		categories: [],
		newDocument: {category: "", document_name: ""},
		selectedDocument: {name: "", id: ""}
	},
	methods:{
		// Get All Documents
		getAllDocuments(){
			axios
			.get("/models/getDocuments.php")
			.then((response) => {
				console.log('response: ', response);
				app.documents = response.data
			})
			.catch((error) => {
				console.log('error: ', error);
			})
		},

		// Get All Categories
		getAllCategories() {
			axios
			.get("/models/getCategories.php")
			.then((response) => {
				console.log('response: ', response);
				app.categories = response.data
			})
			.catch((error) => {
				console.log('error: ', error);
			})
		},

		// Get Documents By Caategory
		getDocumentsByCategory(event) {
			if( event.target.value != 0){
				axios
				.get("/models/getDocuments.php", {
					params: {
						categoryid: event.target.value
					}
				})
				.then( (res) => {
					console.log('res: ', res);
					app.documents = res.data
				})
				.catch((error) => {
					console.log('error: ', error);
				})
			}else{
				axios
				.get("/models/getDocuments.php")
				.then((response) => {
					console.log('response: ', response);
					app.documents = response.data
				})
				.catch((error) => {
					console.log('error: ', error);
				})	
			}
			
		},
	
		// Add Document
		addDocument() {
			console.log(app.newDocument.category)
			console.log(app.newDocument.document_name)
			axios
			.get("/models/addDocument.php", {
				params: {
					categoryid: app.newDocument.category,
					document_name: app.newDocument.document_name,
				}
			})
			.then( (res) => {
				console.log('res: ', res);
				app.getAllDocuments();
				app.addDocumentModal = false
			})
			.catch((error) => {
				console.log('error: ', error);
			})
			
		},

		// Edit Document
		editDocumentByID() {
		  let name 	= app.selectedDocument.name,
		  		id		= app.selectedDocument.id;

			axios
			.get("/models/updateDocument.php", {
				params: {
					document_id: id,
					document_name: name,
				}
			})
			.then( (res) => {
				console.log('res: ', res);
				app.getAllDocuments();
				app.editDocumentModal = false
			})
			.catch((error) => {
				console.log('error: ', error);
			})
		},

		// Delete Document
		deleteDocument() {
			let id = app.selectedDocument.id;

			axios
			.get("/models/deleteDocument.php", {
				params: {
					document_id: id,
				}
			})
			.then( (res) => {
				console.log('res: ', res);
				app.getAllDocuments();
				app.deleteDocumentModal = false
			})
			.catch((error) => {
				console.log('error: ', error);
			})
		},

		// Pass in the document name and ID to edit or delete
		selectDocument(name, id){
			console.log('id: ', id);
			console.log('name: ', name);
			app.selectedDocument.name = name;
			app.selectedDocument.id = id;
		}

	},
	mounted (){
		// Get categories and documents once page is mounted
		this.getAllCategories();
		this.getAllDocuments();
	},
	created(){
		
		
	}
})