<?php
$db=mysqli_connect("localhost", "root", "", "perpusweb");


$nama = $_POST['nama'];

if ($nama == 0) {
    ?>
    <script type="text/javascript">
        alert("Ma'af! Nama tidak boleh kosong.");
    </script>
    <?php
} else {

    
    $user = mysqli_query($db,"SELECT * FROM user WHERE usernama =".$nama);
    $data_user = mysqli_fetch_array($user);

    if($data_user['username'] == $nama) {
    ?>
        <span class="text text-success"><i class="glyphicon glyphicon-ok"></i></span>
    <?php
    } else {
    ?>
        <span class='text text-danger'><i class='glyphicon glyphicon-remove'></i></span>
    <?php
    }

}
?>