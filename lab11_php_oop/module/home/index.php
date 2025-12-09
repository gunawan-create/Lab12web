<?php
$db = new Database();
$form = new Form("", "Simpan Data");

if ($_POST) {
    $data = [
        'nama' => $_POST['nama'],
        'email' => $_POST['email'],
        'pass' => $_POST['pass'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'agama' => $_POST['agama'],
        'hobi' => implode(",", $_POST['hobi']),
        'alamat' => $_POST['alamat'],
    ];

    $simpan = $db->insert('users', $data);

    if ($simpan) {
        echo "<div style='color:green'>Data berhasil disimpan!</div>";
    } else {
        echo "<div style='color:red'>Gagal menyimpan data.</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Praktikum 11 - OOP</title>
</head>
<body>
<h3>Form Input User (OOP)</h3>
<?php
$form->addField("nama", "Nama Lengkap");
$form->addField("email", "Email");
$form->addField("pass", "Password", "password");
$form->addField("jenis_kelamin", "Jenis Kelamin", "radio", [
    'L' => 'Laki-laki',
    'P' => 'Perempuan'
]);
$form->addField("agama", "Agama", "select", [
    'Islam' => 'Islam',
    'Kristen' => 'Kristen',
    'Katolik' => 'Katolik',
    'Hindu' => 'Hindu',
    'Budha' => 'Budha'
]);
$form->addField("hobi", "Hobi", "checkbox", [
    'Membaca' => 'Membaca',
    'Coding' => 'Coding',
    'Traveling' => 'Traveling'
]);
$form->addField("alamat", "Alamat Lengkap", "textarea");
$form->displayForm();
?>
</body>
</html>