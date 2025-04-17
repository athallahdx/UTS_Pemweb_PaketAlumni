<div class="flex flex-col justify-center items-center">
	<div class="header text-4xl font-semibold text-center text-blue-600 mt-4">
		Kelola Data Mahasiswa
	</div>

	<div class="flex justify-center w-full mt-4">
		<button onclick="showCreateModal()" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded block">
			Add Student
		</button>
	</div>

	<div class="table-main flex justify-center mt-4">
		<div class="flex justify-center w-full">
			<table id="studentsTable" class="">
				<thead>
				<tr class="bg-gray-200">
					<th class="px-4 py-2 text-left">Student ID</th>
					<th class="px-4 py-2 text-left">Full Name</th>
					<th class="px-4 py-2 text-left">Email</th>
					<th class="px-4 py-2 text-left">Phone Number</th>
					<th class="px-4 py-2 text-left">Department</th>
					<th class="px-4 py-2 text-left">Status</th>
					<th class="px-4 py-2 text-left">Year Entry</th>
					<th class="px-4 py-2 text-left">Year Graduation</th>
					<th class="px-4 py-2">Actions</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($students as $student): ?>
					<tr class="border-b hover:bg-gray-100-2">
						<td class="px-4 py-2"><?= $student->student_id; ?></td>
						<td class="px-4 py-2"><?= $student->full_name; ?></td>
						<td class="px-4 py-2"><?= $student->email; ?></td>
						<td class="px-4 py-2"><?= $student->phone_number; ?></td>
						<td class="px-4 py-2"><?= $student->department_name; ?></td>

						<?php
						$bgstyle = match ($student->status) {
							"active" => "bg-green-500",
							"inactive" => "bg-red-500",
							default => "bg-blue-500",
						};
						?>
						<td class="px-4 py-2 capitalize rounded text-white text-center <?= $bgstyle ?>"><?= $student->status; ?></td>

						<td class="px-4 py-2"><?= $student->year_entry; ?></td>
						<td class="px-4 py-2"><?= $student->year_graduation ? $student->year_graduation : 'N/A'; ?></td>
						<td class="px-4 py-2">
							<a href="javascript:void(0);"
							   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
							   onclick="showEditModal(
								   '<?= site_url('mahasiswa/update/' . $student->id); ?>',
								   '<?= $student->student_id; ?>',
								   '<?= $student->full_name; ?>',
								   '<?= $student->email; ?>',
								   '<?= $student->phone_number; ?>',
								   '<?= $student->department_id ?>',
								   '<?= $student->department_name; ?>',
								   '<?= $student->status; ?>',
								   '<?= $student->year_entry; ?>',
								   '<?= $student->year_graduation; ?>')">
								Edit
							</a>


							<a href="javascript:void(0);"
							   class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition ml-2"
							   onclick="showDeleteModal('<?= site_url('mahasiswa/delete/' . $student->id); ?>');">
								Delete
							</a>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div id="createModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
	<div class="bg-white rounded-lg shadow-lg p-6 w-96">
		<h2 class="text-lg font-semibold text-gray-800 mb-4">Create Student</h2>
		<form id="createStudentForm" method="POST" action="<?= site_url('mahasiswa/create') ?>">
			<div class="mb-4">
				<label for="StudentId" class="block text-sm font-medium text-gray-700">Student ID</label>
				<input type="text" id="StudentId" name="student_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
			</div>

			<div class="mb-4">
				<label for="FullName" class="block text-sm font-medium text-gray-700">Full Name</label>
				<input type="text" id="FullName" name="full_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
			</div>

			<div class="mb-4">
				<label for="Email" class="block text-sm font-medium text-gray-700">Email</label>
				<input type="email" id="Email" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
			</div>

			<div class="mb-4">
				<label for="PhoneNumber" class="block text-sm font-medium text-gray-700">Phone Number</label>
				<input type="text" id="PhoneNumber" name="phone_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
			</div>

			<div class="mb-4">
				<label for="DepartmentId" class="block text-sm font-medium text-gray-700">Department</label>
				<select id="DepartmentId" name="department_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
					<?php foreach ($departments as $dept): ?>
						<option value="<?= $dept->id ?>"><?= $dept->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="mb-4">
				<label for="Status" class="block text-sm font-medium text-gray-700">Status</label>
				<select id="Status" name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
					<option value="active">Active</option>
					<option value="inactive">Inactive</option>
					<option value="alumni">Alumni</option>
				</select>
			</div>

			<div class="mb-4">
				<label for="YearEntry" class="block text-sm font-medium text-gray-700">Year Entry</label>
				<input type="date" id="YearEntry" name="year_entry" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
			</div>

			<div class="mb-4">
				<label for="YearGraduation" class="block text-sm font-medium text-gray-700">Year Graduation</label>
				<input type="date" id="YearGraduation" name="year_graduation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
			</div>

			<div class="flex justify-end">
				<button type="button" class="bg-gray-300 text-gray-800 px-4 py-2 rounded mr-2" onclick="closeCreateModal()">Cancel</button>
				<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Create</button>
			</div>
		</form>
	</div>
</div>

<div id="editModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
	<div class="bg-white rounded-lg shadow-lg p-6 w-96">
		<h2 class="text-lg font-semibold text-gray-800 mb-4">Edit Student</h2>
		<form id="editStudentForm" method="POST">
			<div class="mb-4">
				<label for="editStudentId" class="block text-sm font-medium text-gray-700">Student ID</label>
				<input type="text" id="editStudentId" name="student_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
			</div>

			<div class="mb-4">
				<label for="editFullName" class="block text-sm font-medium text-gray-700">Full Name</label>
				<input type="text" id="editFullName" name="full_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
			</div>

			<div class="mb-4">
				<label for="editEmail" class="block text-sm font-medium text-gray-700">Email</label>
				<input type="email" id="editEmail" name="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
			</div>

			<div class="mb-4">
				<label for="editPhoneNumber" class="block text-sm font-medium text-gray-700">Phone Number</label>
				<input type="text" id="editPhoneNumber" name="phone_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
			</div>

			<div class="mb-4">
				<label for="editDepartmentId" class="block text-sm font-medium text-gray-700">Department</label>
				<select id="editDepartmentId" name="department_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
					<?php foreach ($departments as $dept): ?>
						<option value="<?= $dept->id ?>"><?= $dept->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="mb-4">
				<label for="editStatus" class="block text-sm font-medium text-gray-700">Status</label>
				<select id="editStatus" name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
					<option value="active">Active</option>
					<option value="inactive">Inactive</option>
					<option value="alumni">Alumni</option>
				</select>
			</div>

			<div class="mb-4">
				<label for="editYearEntry" class="block text-sm font-medium text-gray-700">Year Entry</label>
				<input type="date" id="editYearEntry" name="year_entry" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
			</div>

			<div class="mb-4">
				<label for="editYearGraduation" class="block text-sm font-medium text-gray-700">Year Graduation</label>
				<input type="date" id="editYearGraduation" name="year_graduation" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
			</div>

			<div class="flex justify-end">
				<button type="button" class="bg-gray-300 text-gray-800 px-4 py-2 rounded mr-2" onclick="hideEditModal()">Cancel</button>
				<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
			</div>
		</form>
	</div>
</div>

<div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
	<div class="bg-white rounded-lg shadow-lg p-6 w-96">
		<h2 class="text-lg font-semibold text-gray-800">Confirm Deletion</h2>
		<p class="text-gray-600 mt-2">Are you sure you want to delete this student?</p>
		<div class="flex justify-end mt-4">
			<button class="bg-gray-300 text-gray-800 px-4 py-2 rounded mr-2" onclick="hideDeleteModal()">Cancel</button>
			<a id="confirmDeleteBtn" href="#" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Delete</a>
		</div>
	</div>
</div>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function() {
		$('#studentsTable').DataTable();
	});

	function showCreateModal() {
		document.getElementById('createModal').classList.remove('hidden');
	}

	function closeCreateModal() {
		document.getElementById('createModal').classList.add('hidden');
	}

	function showDeleteModal(deleteUrl) {
		const modal = document.getElementById('deleteModal');
		const confirmBtn = document.getElementById('confirmDeleteBtn');
		confirmBtn.href = deleteUrl;
		modal.classList.remove('hidden');
	}

	function hideDeleteModal() {
		const modal = document.getElementById('deleteModal');
		modal.classList.add('hidden');
	}

	function showEditModal(editUrl, studentId, fullName, email, phoneNumber, departmentId, departmentName, studentStatus, yearEntry, yearGraduation) {
		document.getElementById('editStudentForm').action = editUrl;
		document.getElementById('editStudentId').value = studentId;
		document.getElementById('editFullName').value = fullName;
		document.getElementById('editEmail').value = email;
		document.getElementById('editPhoneNumber').value = phoneNumber;
		document.getElementById('editDepartmentId').value = departmentId;
		document.getElementById('editStatus').value = studentStatus;
		document.getElementById('editYearEntry').value = yearEntry;
		document.getElementById('editYearGraduation').value = yearGraduation;

		document.getElementById('editModal').classList.remove('hidden');
	}

	function hideEditModal() {
		const modal = document.getElementById('editModal');
		modal.classList.add('hidden');
	}
</script>
