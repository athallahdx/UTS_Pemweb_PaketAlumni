<?php
$totalAlumni = count($alumnus);
$joblessAlumni = 0;
$employedAlumni = 0;

// Chart data for graduation durations
$graduationDurations = array(
	'<4 years' => 0,
	'5 years' => 0,
	'6 years' => 0,
	'7 years' => 0,
);

foreach ($alumnus as $alumni) {
	if (empty($alumni->occupation)) {
		$joblessAlumni++;
	} else {
		$employedAlumni++;
	}

	// Calculate study duration
	$entryYear = (int)$alumni->year_entry;
	$gradYear = (int)$alumni->year_graduation;
	$duration = $gradYear - $entryYear;

	if ($duration < 4) {
		$graduationDurations['<4 years']++;
	} elseif ($duration == 5) {
		$graduationDurations['5 years']++;
	} elseif ($duration == 6) {
		$graduationDurations['6 years']++;
	} elseif ($duration == 7) {
		$graduationDurations['7 years']++;
	}
}
?>


<div class="flex flex-col justify-center items-center">
	<div class="header text-4xl font-semibold text-center text-blue-600 mt-4">
		Dashboard Data Mahasiswa
	</div>

	<div class="summary-cards flex justify-center space-x-4 mt-6">
		<div class="card bg-blue-500 text-white p-4 rounded-md shadow-lg w-1/4">
			<div class="text-xl font-semibold">Total Alumnus</div>
			<div class="text-2xl"><?= $totalAlumni; ?></div>
		</div>

		<div class="card bg-red-500 text-white p-4 rounded-md shadow-lg w-1/4">
			<div class="text-xl font-semibold">Jobless Alumnus</div>
			<div class="text-2xl"><?= $joblessAlumni; ?></div>
		</div>

		<div class="card bg-green-500 text-white p-4 rounded-md shadow-lg w-1/4">
			<div class="text-xl font-semibold">Employed Alumnus</div>
			<div class="text-2xl"><?= $employedAlumni; ?></div>
		</div>
	</div>

	<div class="flex justify-evenly w-full mt-6">
		<div class="graduate-time">
			<canvas id="graduationChart" height="240"></canvas>
		</div>

		<div class="occupation">
			<canvas id="occupationChart" height="240"></canvas>
		</div>
	</div>



	<div class="table-main flex justify-center mt-4 mb-16">
		<div class="flex justify-center w-full ">
			<table id="studentsTable" class="">
				<thead>
				<tr class="bg-gray-200">
					<th class="px-4 py-2 text-left">Student ID</th>
					<th class="px-4 py-2 text-left">Full Name</th>
					<th class="px-4 py-2 text-left">Email</th>
					<th class="px-4 py-2 text-left">Phone Number</th>
					<th class="px-4 py-2 text-left">Department</th>
					<th class="px-4 py-2 text-left">Year Entry</th>
					<th class="px-4 py-2 text-left">Year Graduation</th>
					<th class="px-4 py-2 text-left">Occupation</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($alumnus as $alumni): ?>
					<tr class="border-b hover:bg-gray-100-2">
						<td class="px-4 py-2"><?= $alumni->student_id; ?></td>
						<td class="px-4 py-2"><?= $alumni->full_name; ?></td>
						<td class="px-4 py-2"><?= $alumni->email; ?></td>
						<td class="px-4 py-2"><?= $alumni->phone_number; ?></td>
						<td class="px-4 py-2"><?= $alumni->department_name; ?></td>
						<td class="px-4 py-2"><?= $alumni->year_entry; ?></td>
						<td class="px-4 py-2"><?= $alumni->year_graduation ?></td>
						<td class="px-4 py-2"><?= $alumni->occupation ? $alumni->occupation : 'N/A'?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	$(document).ready(function() {
		$('#studentsTable').DataTable();
	});

		const ctx = document.getElementById('graduationChart').getContext('2d');

		const graduationChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ['<4 years', '5 years', '6 years', '7 years'],
				datasets: [{
					label: 'Tahun Lulusan Alumnus',
					data: [
						<?= $graduationDurations['<4 years']; ?>,
						<?= $graduationDurations['5 years']; ?>,
						<?= $graduationDurations['6 years']; ?>,
						<?= $graduationDurations['7 years']; ?>
					],
					backgroundColor: [
						'#3b82f6', '#10b981', '#f59e0b', '#ef4444'
					],
					borderRadius: 5
				}]
			},
			options: {
				scales: {
					y: {
						beginAtZero: true,
						max: 30,
						ticks: {
							stepSize: 1
						}
					}
				}
			}
		});

		const vtx = document.getElementById('occupationChart').getContext('2d');

		const occupationChart = new Chart(vtx, {
			type: 'bar',
			data: {
				labels: ['Bekerja', 'Belum Bekerja'],
				datasets: [{
					label: 'Data Pekerjaan Alumnus',
					data: [
						<?= $employedAlumni; ?>,
						<?= $joblessAlumni; ?>
					],
					backgroundColor: [
						'#3b82f6', '#10b981'
					],
					borderRadius: 5
				}]
			},
			options: {
				scales: {
					y: {
						beginAtZero: true,
						max: 60,
						ticks: {
							stepSize: 1
						}
					}
				}
			}
		});
</script>
