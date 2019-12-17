let hide_thanks = document.querySelector('.close-x');
let message_on_top = document.querySelector('.thank-you-text');
let add_db_name = document.querySelector("button[name='add-db-name']");

let add_job_btn = document.querySelector("button[name='add-job']");
let job_title = document.querySelector("input[name='job-title']");

let job_category_div = document.querySelector('.job-category-div');
let job_name = document.querySelector('.job-name')
let job_err = document.querySelector('.job-err')
let db_name_div = document.querySelector('.db-name-div');
let hidden_jobs_container = document.querySelector('.job-types-container');

let job_number = 0;
if (localStorage.length !== 0) {
	job_number = parseInt(localStorage.getItem('job_number'));
}

let all_job_types = [];
console.log(hide_thanks)
console.log(job_title)
console.log(add_db_name)
console.log(job_err)
console.log(hidden_jobs_container)
function adjustPage () {
	hide_thanks.parentElement.style.display = 'block'
	job_category_div.classList.remove('d-none');
	db_name_div.classList.add('d-none');
}
function changeHeaderMessage () {
	message_on_top.innerText = 'Jobs in your organisation';
}

function createJobList () {
	let job_number = 1;
	console.log('Job number:',job_number)
	localStorage.setItem('job_number',job_number);
	localStorage.setItem('job_'+job_number,job_title.value);
}
function updateJobList () {
	job_number = parseInt(localStorage.getItem('job_number'));
	job_number++;
	console.log('Job number:',job_number)
	localStorage.setItem('job_number',job_number);
	localStorage.setItem('job_'+job_number,job_title.value.trim());
}
function check_if_job_exists (job) {
	for (let i = 0;i<localStorage.length;++i) {
		if (job === localStorage.getItem(localStorage.key(i)).toLowerCase()  ) {
			return true;
			break;
		}
	} 
}
function handle_job_err () {
	// body... 
}
function updateJobsList () {
	if (job_title.value !== '' && job_title.value.length > 2) {
		let job = job_title.value.trim().toLowerCase();
		console.log(job_title.value);
		if (!check_if_job_exists(job)) {
			if (localStorage.length !== 0) {
				updateJobList();
			}else {
				createJobList();
			}
			job_name.innerText = ""
			job_err.innerText = '';
			job_err.style.display = 'none'

		}else {
			job_name.innerText = job;
			job_err.innerText = 'has been added before';
			job_err.style.display = 'inline-block'
		}
	}
	job_title.value = '';
}
function getJobsList () {

}
hide_thanks.onclick = () => {
	hide_thanks.parentElement.style.display = 'none'

}
add_db_name.onclick = () => {
	adjustPage();
	changeHeaderMessage();
	
}
add_job_btn.onclick = () => {
	updateJobsList();
}