let box_header_text = document.querySelector('.box-header-text');
let record_counter = document.querySelector('.record-counter');
let navbar_toggler = document.querySelector('.navbar-toggler');
let navbar_menu = document.querySelector('#nav-menu_div');
let log_out_form = document.querySelector('.log-out-form');
let display_modal_body = document.querySelector('.display-modal-body');
let header_for_record_page = document.querySelector('#header-record-page');
let confirm_record_tag = document.querySelector('#confirm-record-tag');
// let section_name_tag = document.querySelector('.section_name');
let tHead_row = document.querySelector('.tHead-row');
let edit_record_btn = document.querySelector('.edit-records-btn');
let confirm_btn = document.querySelector('.confirm-btn');
let edit_btns_div = document.querySelector('#edit-ops-div');
let save_changes_btn = document.querySelector('.save-changes-btn');
let display_modal = document.querySelector('#display-modal');
let show_records = document.querySelector('#display-modal-btn');
let modal_close_btn = document.querySelector('.modal-x');
let record_container = document.querySelector('#record-output');
let go_to_jobs_btn = document.querySelector('button[name=go-to-jobs]')
let main_section = document.querySelector('main>section');
let tHead_column_tops = document.querySelector('.tHead-column-tops');
if (main_section.id === 'add-jobs-section') {
	xhr_request = 'job_types_data';
	first_edit = 'edit_job_name';
	second_edit = 'edit_job_type';
	first_edit_field_name = 'job_name';
	second_edit_field_name = 'job_type';
	record_name = 'jobs';
	// section_name_tag.innerText = 'Jobs';
}else if (main_section.id === 'add-depts-section') {
	xhr_request = 'dept_data';
	first_edit = 'edit_dept';
	second_edit = 'edit_HOD';
	first_edit_field_name = 'dept';
	second_edit_field_name = 'head';
	record_name = 'dept'
	// section_name_tag.innerText = 'Departments';

}else if (main_section.id === 'add-files-section') {
	xhr_request = 'file_types_data';
}

function getRecordsNo () {
	let xhr = new XMLHttpRequest;
	xhr.open("POST","http://localhost/lessPaper/extra_pages/apis/lessPaper-api.php",true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("request="+xhr_request);
	xhr.onreadystatechange = () => {
	// logApiCallStatus(xhr,"Less Paper API");
		if (xhr.readyState === 4 && xhr.status === 200) {
			if (xhr.responseText.includes('SQLSTATE')) {
				alert('There was a technical issue\nPlease Try again later');
			}else {
				if (xhr.responseText === "You haven't added any Jobs yet") {
					response = "You haven't added any Jobs yet";
					record_counter.innerText = 0;
				}else {
					response = JSON.parse(xhr.responseText);
					record_counter.innerText = response.length;
				}
			}
		}
	} 
}
getRecordsNo();
function changeModalHeader(situation = 'final-confirm') {
	if (situation === 'final-confirm') {
		header_for_record_page.style.display = 'none';
		confirm_record_tag.style.display = 'inline-block';
		edit_btns_div.classList.remove('mx-auto');
	}
	if (situation === 'show-records') {
		header_for_record_page.style.display = 'inline-block';
		confirm_record_tag.style.display = 'none';
		if (!edit_btns_div.className.includes('mx-auto')) {
			edit_btns_div.classList.add('mx-auto');
		}
	}
}

//This next 2 functions is under construction per my decision to seperate department jobs or not
// changeBoxHeader('jobs','Productions');
function changeBoxHeader (message_type,Record) {
	if (message_type === 'jobs') {
		box_header_text.innerText = 'Jobs in '+ Record;
	}
}
function getEachRecord () {
	let xhr = new XMLHttpRequest;
	xhr.open("POST","http://localhost/lessPaper/extra_pages/apis/lessPaper-api.php",true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("request="+xhr_request);
	xhr.onreadystatechange = () => {
	// logApiCallStatus(xhr,"Less Paper API");
		if (xhr.readyState === 4 && xhr.status === 200) {
			if (xhr.responseText.includes('SQLSTATE')) {
				alert('There was a technical issue\nPlease Try again later');
			}else {
				response = JSON.parse(xhr.responseText);
				let i = 0;
				go_to_jobs_btn.onclick = () => {
					// alert(response[i][1]);
					// changeBoxHeader('jobs',response[i][1]);
					// ++i;
					return false;
				}
				
			}
		}
	}  
}

function updateRecordInfo (index,requestName,field_name,initial_value,new_value,xhttp_response) {
	if (initial_value !== new_value) {
		let confirm_edit = confirm('Are you sure you want to Change ' +initial_value+" to "+new_value);
		if (confirm_edit == true) {
			let i = index;
			let edit_xhr = new XMLHttpRequest;
			edit_xhr.open("POST","http://localhost/lessPaper/extra_pages/apis/lessPaper-api.php",true);
			edit_xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			edit_xhr.send("request="+requestName+"&"+field_name+"="+new_value+"&id="+xhttp_response[i][0]);
			edit_xhr.onreadystatechange = () => {
			// logApiCallStatus(edit_xhr,"Less Paper API");
				if (edit_xhr.readyState === 4 && edit_xhr.status === 200) {
					if (edit_xhr.responseText.includes('SQLSTATE')) {
						alert(edit_xhr.responseText)
						alert('There was a technical issue\nPlease Try again later');
					}else {
						const edit_record_response = edit_xhr.responseText;
						// alert(edit_record_response);
					}
				}
			} 
		}else {
			eachRecord_name_input.value = initial_value;
		}
	}
}
function deleteRecord (index,xhttp_response) {
	let i = index;
	let delete_xhr = new XMLHttpRequest;
	delete_xhr.open("POST","http://localhost/lessPaper/extra_pages/apis/lessPaper-api.php",true);
	delete_xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	delete_xhr.send("request=delete_"+record_name+"&id="+xhttp_response[i][0]);
	delete_xhr.onreadystatechange = () => {
	// logApiCallStatus(delete_xhr,"Less Paper API");
		if (delete_xhr.readyState === 4 && delete_xhr.status === 200) {
			if (delete_xhr.responseText.includes('SQLSTATE')) {
				alert(delete_xhr.responseText)
				alert('There was a technical issue\nPlease Try again later');
			}else {
				const delete_record_response = delete_xhr.responseText;
				// alert(edit_record_response);
			}
		}
	} 
}
function resetRecordTable (index,xhttp_response) {
	let i = index;
	let remaining_rows_arr = [];
	deleted_record_row = document.querySelectorAll('.record-row')[i];
	deleted_record_row.style.display = 'none';
	all_rows = document.querySelectorAll('.record-row');
	for (let j = 0; j<all_rows.length;++j) {
		if (all_rows[j].style.display !== 'none') {
			remaining_rows_arr.push(all_rows[j]);
		}
	}
	console.log(remaining_rows_arr)
	for (let k = 0; k<remaining_rows_arr.length;++k) {
		let record_nums = remaining_rows_arr[k].children[0];
		record_nums.innerText = k+1;
	}
	getRecordsNo();
}
function createRecordNoColumn (index,xhttp_response) {
	let i = index;
	let eachRecord_no = document.createElement('td');
	eachRecord_no.className = 'record-no';
	eachRecord_no.innerText = i+1;
	eachRecord_no.style.fontWeight = 'bold';
	return eachRecord_no;
}
function createRecordFirstColumn (index,xhttp_response,situation = 'displaying') {
	let i = index;
	if (situation === 'displaying') {
		let eachRecord_col_1 = document.createElement('td');
		eachRecord_col_1.innerText = xhttp_response[i][1];
		return eachRecord_col_1;
	}
	if (situation === 'editing') {
		let eachRecord_col_1 = document.createElement('td');
		let eachRecord_col_1_input = document.createElement('input');
		eachRecord_col_1_input.className = 'form-control py-3';
		eachRecord_col_1_input.value = xhttp_response[i][1];
		eachRecord_col_1.appendChild(eachRecord_col_1_input);
		eachRecord_col_1_input.onfocus = () => {
			let initial_value = eachRecord_col_1_input.value;
			eachRecord_col_1_input.onblur = () => {
				let new_value = eachRecord_col_1_input.value;
				updateRecordInfo(i,first_edit,first_edit_field_name,initial_value,new_value,xhttp_response);
			}
		}
		return eachRecord_col_1;
	}
}
function createRecordSecondColumn (index,xhttp_response,situation = 'displaying') {
	let i = index;
	if (situation === 'displaying') {
		let eachRecord_head = document.createElement('td');
		eachRecord_head.innerText = xhttp_response[i][2];
		return eachRecord_head;
	}
	if (situation === 'editing') {
		let eachRecord_col_2 = document.createElement('td');
		if (record_name === 'dept') {
			let eachRecord_col_2_input = document.createElement('input');
			eachRecord_col_2_input.className = 'form-control py-3 ';
			eachRecord_col_2_input.value = xhttp_response[i][2];
			eachRecord_col_2.className = '';
			eachRecord_col_2.appendChild(eachRecord_col_2_input);

			eachRecord_col_2_input.onfocus = () => {
				let initial_value = eachRecord_col_2_input.value;
				eachRecord_col_2_input.onblur = () => {
					let new_value = eachRecord_col_2_input.value;
					updateRecordInfo(i,second_edit,second_edit_field_name,initial_value,new_value,xhttp_response);
				}
			}
			return eachRecord_col_2;
		}
		if  (record_name === 'jobs') {
			let eachRecord_col_2_select = document.createElement('select');
			eachRecord_col_2_select.className = 'form-control py-1';
			eachRecord_col_2_select.style.height = 'auto';
			let eachRecord_option_1 = document.createElement('option');
			let eachRecord_option_2 = document.createElement('option');
			eachRecord_option_1.innerText = 'Office Worker';
			eachRecord_option_2.innerText = 'Non-Office Worker';
			if (xhttp_response[i][2] === 'Office Worker') {
				eachRecord_option_1.selected = true;
			}else {
				eachRecord_option_2.selected = true;
			}
			eachRecord_col_2_select.appendChild(eachRecord_option_1);
			eachRecord_col_2_select.appendChild(eachRecord_option_2);
			eachRecord_col_2.appendChild(eachRecord_col_2_select);
			eachRecord_col_2_select.onfocus = () => {
				let initial_value = eachRecord_col_2_select.value;
				eachRecord_col_2_select.onblur = () => {
					let new_value = eachRecord_col_2_select.value;
					updateRecordInfo(i,second_edit,second_edit_field_name,initial_value,new_value,xhttp_response);
				}
			}
			return eachRecord_col_2;
		}
	}
}
function createRecordDeleteColumn (index,xhttp_response) {
	let i = index;
	let eachRecord_delete = document.createElement('td');
	let eachRecord_delete_btn = document.createElement('span');
	eachRecord_delete_btn.className = 'delete-record';
	eachRecord_delete_btn.innerText = 'X';
	eachRecord_delete.className = 'mx-auto';
	eachRecord_delete.appendChild(eachRecord_delete_btn);
	eachRecord_delete_btn.onclick = () => {
		let confirm_delete = confirm('Are you sure you want to Delete this Record?');
		if (confirm_delete == true) {
			deleteRecord (i,xhttp_response)
			resetRecordTable (i,xhttp_response)
		}
	}
	return eachRecord_delete;
}
function createRecordRows (xhttp_response,situation = 'displaying') {
	if (situation === 'displaying') {
		if (tHead_row.childElementCount > 3) {
			tHead_row.removeChild(document.querySelector('.delete-tableHead'));
		}
		for (let i = 0; i<xhttp_response.length;++i) {
			let eachRecord_row = document.createElement('tr');
			eachRecord_row.appendChild(createRecordNoColumn(i,xhttp_response));
			eachRecord_row.appendChild(createRecordFirstColumn(i,xhttp_response));
			eachRecord_row.appendChild(createRecordSecondColumn(i,xhttp_response));
			record_container.appendChild(eachRecord_row);
		}
	}
	if (situation === 'editing') {
		record_container.innerHTML = '';
	 	let delete_tableHead = document.createElement('th');
	 	delete_tableHead.className ='delete-tableHead';
		delete_tableHead.innerText = 'Delete';
		tHead_row.appendChild(delete_tableHead);
		for (let i = 0; i<xhttp_response.length;++i) {
			let eachRecord_row = document.createElement('tr');
			eachRecord_row.className = 'record-row';
			eachRecord_row.id = xhttp_response[i][0];
			eachRecord_row.appendChild(createRecordNoColumn(i,xhttp_response));
			eachRecord_row.appendChild(createRecordFirstColumn(i,xhttp_response,'editing'));
			eachRecord_row.appendChild(createRecordSecondColumn(i,xhttp_response,'editing'));
			eachRecord_row.appendChild(createRecordDeleteColumn (i,xhttp_response));
			record_container.appendChild(eachRecord_row);
		}
	}
}
function logApiCallStatus(requestedApi,apiName) {
	console.log("Call status for: " + apiName)
	if (requestedApi.readyState === 2) {
		console.log("Headers have been received!: "+ requestedApi.readyState)
	}else if (requestedApi.readyState === 3) {
		console.log("Loading...: "+requestedApi.readyState)
	}else if (requestedApi.readyState === 4 && requestedApi.status === 200) {
		console.log("Done and successfully called this API! "+requestedApi.readyState)
		return true;
	}else {
		console.log("Something went wrong while calling this resource")
		return false;
	}
}
function closeModalBody () {
	display_modal_body.classList.add('d-none');
	edit_record_btn.classList.remove('d-none')
	edit_record_btn.classList.add('d-inline-block');
	save_changes_btn.classList.add('d-none')
	display_modal.classList.remove('modal_down');
	display_modal.classList.add('modal_up');
}
navbar_toggler.onclick = () => {
	if (!navbar_menu.className.includes('show')) {
		log_out_form.classList.add('mx-auto');
	}else {
		setTimeout(function(){log_out_form.classList.remove('mx-auto')}, 350);
	}
}
console.log(document.querySelector('main>section'));
// console.log(document.querySelectorAll('select'));
console.log(confirm_record_tag);
console.log(go_to_jobs_btn);
// console.log(section_name_tag);
function getRecordsTable (request) {
	record_container.innerHTML = '';
	let xhr = new XMLHttpRequest;
	xhr.open("POST","http://localhost/lessPaper/extra_pages/apis/lessPaper-api.php",true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("request="+request);
	xhr.onreadystatechange = () => {
	// logApiCallStatus(xhr,"Less Paper API");
		if (xhr.readyState === 4 && xhr.status === 200) {
			if (xhr.responseText.includes('SQLSTATE')) {
				alert('There was a technical issue\nPlease Try again later');
			}else {
				const response = JSON.parse(xhr.responseText);
				createRecordRows(response);
				edit_record_btn.onclick = () => {
					let edit_confirm = confirm('Are you Sure you want to edit This Data?');
					if (edit_confirm == true) {
						createRecordRows(response,'editing');
					}
					edit_record_btn.classList.remove('d-inline-block');
					edit_record_btn.classList.add('d-none');
					save_changes_btn.classList.remove('d-none');
				}
			}
		}
	} 
}
function showrecordsModal ()  {
	if (display_modal.className.includes('modal_up')) {
		display_modal.classList.remove('modal_up');
	}
	display_modal_body.classList.remove('d-none');
	display_modal.classList.add('modal_down');
}
show_records.onclick = () => {
	if (record_counter.innerText == 0) {
		alert("You Haven't Added any "+record_name+" yet");
		return;
	}
		changeModalHeader('show-records');
		showrecordsModal();
		getRecordsTable (xhr_request);
}
modal_close_btn.onclick = () => {
	closeModalBody();
}
go_to_jobs_btn.onclick = () => {
	if (record_counter.innerText == 0) {
		alert("You Haven't Added any "+record_name+" yet");
		return false;
	}
	changeModalHeader('final-confirm');
	showrecordsModal();
	getRecordsTable (xhr_request);
	return false;	
}
confirm_btn.onclick = ()=> {
	go_to_jobs_btn = true;
}	
