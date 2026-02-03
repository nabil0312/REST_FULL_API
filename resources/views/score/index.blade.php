<!DOCTYPE html>
<html>
<head>
    <title>Data Nilai</title>
</head>
<body>

<h2>Data Nilai Siswa</h2>

@if($scores->count())
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Tugas</th>
        <th>UTS</th>
        <th>UAS</th>
    </tr>

    @foreach($scores as $score)
    <tr>
        <td>{{ $score->id ?? $score->_id }}</td>
        <td>{{ $score->nama }}</td>
        <td>{{ $score->tugas }}</td>
        <td>{{ $score->uts }}</td>
        <td>{{ $score->uas }}</td>
    </tr>
    @endforeach
</table>
@else
<p>Data kosong</p>
@endif

</body>
</html>
