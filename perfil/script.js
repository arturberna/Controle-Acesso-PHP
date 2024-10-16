// $(document).ready(function(){
// 	// Activate tooltip
// 	$('[data-toggle="tooltip"]').tooltip();
	
// 	// Select/Deselect checkboxes
// 	var checkbox = $('table tbody input[type="checkbox"]');
// 	$("#selectAll").click(function(){
// 		if(this.checked){
// 			checkbox.each(function(){
// 				this.checked = true;                        
// 			});
// 		} else{
// 			checkbox.each(function(){
// 				this.checked = false;                        
// 			});
// 		} 
// 	});
// 	checkbox.click(function(){
// 		if(!this.checked){
// 			$("#selectAll").prop("checked", false);
// 		}
// 	});
// });

// adiciona tratador de evento para o modal de edição
var exampleModal = document.getElementById('editPerfil')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  console.log(event.relatedTarget);
  console.log(event.relatedTarget.parentElement);
  console.log(event.relatedTarget.parentElement.parentElement);
  var tr = event.relatedTarget.parentElement.parentElement;
  let id = tr.id.split("_");
console.log(id);
  console.log(id[1]);
 
    var modalNameInput = exampleModal.querySelector('#modal-input-name')
	var modalDescInput = exampleModal.querySelector('#modal-input-desc')


    modalNameInput.value = tr.querySelector('#row_name_'+id[1]).innerText;
	modalDescInput.value = tr.querySelector('#row_desc_'+id[1]).innerText;
	showAllowedPages(id[1]);
})
function showAllowedPages(id) {
	if (id == "") {
	  document.getElementById("allowedPages").innerHTML = "";
	  return;
	} else {
	  var xmlhttp = new XMLHttpRequest();
	  xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		  document.getElementById("allowedPages").innerHTML = this.responseText;
		}
	  };
	  xmlhttp.open("GET","./allowed_pages.php?q="+id,true);
	  xmlhttp.send();
	}
  }
// adiciona tratador de evento para o modal de novo perfil
var addModal = document.getElementById('addPerfil')

addModal.addEventListener('show.bs.modal', function (event) {
	
	showAllPages();
})
function showAllPages() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("allPages").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","./all_pages.php",true);
	xmlhttp.send();
	
  }
// adiciona tratador de evento para o modal de novo perfil
var btnAddPerfil = document.getElementById('btnAdd');
btnAddPerfil.addEventListener('click', function (event) {
	var xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("result").innerHTML = this.responseText;
		}
	};
	// prepara parâmetros
	let name = document.getElementById('AddName');
	let desc =document.getElementById('AddDesc');
	let pages = document.getElementById('allPages');
	console.log(pages.childNodes);
	let params = "nome="+name.value+"&descricao="+desc.value;
	xmlhttp.open("GET","./save_perfil.php?"+params,true);
	xmlhttp.send();
})