let db_name_div = document.querySelector('.db-name-div');
let table_names_div = document.querySelector('.table-names-div');
let column_no_div = document.querySelector('.column-no-div');
let db_name_span = document.querySelector('.db-name-span');
let db_name_value = document.querySelector("input[name='db_name']");
let no_tables = document.querySelector("input[name='column_no']");
console.log(db_name_div)

console.log(column_no_div)
console.log(table_names_div )


function toColumns() {
	db_name_div.style.display = 'none'
	column_no_div.classList.remove('d-none');
	// console.log(db_name_value.value)

	db_name_span.innerText = db_name_value.value;
	event.preventDefault();
}

function defineColumns() {
	let num = parseInt(no_tables.value);
	console.log(num)
	for (let i = 0;i<Math.round((num/2));++i) {
		let table_row = document.createElement('div');
		table_row.className = 'row';
		for (let j = 0;j<=num;++j) {

			let col_1 = document.createElement('div')
			let col_2 = document.createElement('div')
			col_1.className = 'col-6';
			col_2.className = 'col-6';
			col_1.innerText = 'test';
			col_2.innerText = 'test';
			// let table_label1 = document.createElement('label');
			// table_label1.className = 'd-block'
			// table_label1.innerText = 'Name of Table '+i;
			// let table_label2 = document.createElement('label');
			// table_label1.className = 'd-block'
			// table_label1.innerText = 'Name of Table '+(i+1);
			// col_1.appendChild(table_label1)
			// col_2.appendChild(table_label1)
			// table_label1.className = 'd-block'
			// table_label1.innerText = 'Name of Table '+i;
			
			// let input_name1 = document.createElement('input');
			// col_1.appendChild(input_name1);
			// input_name1.className = 'd-block';

				
			table_row.appendChild(col_1)
			table_row.appendChild(col_2)
			break;
		}
		table_names_div.appendChild(table_row);
	}

	
	column_no_div.style.display = 'none'
	event.preventDefault();

	
}