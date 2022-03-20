<?php
session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>Muhamad Nur Yasin Amadudin - POST METHOD</li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="s_conainter">
                <div class="sel1">
                    <table class="data">
                        <tbody>
                        <tr class="t_top">
                            <td class="no">No</td>
                            <td class="nama">Nama</td>
                            <td class="nim">NIM</td>
                            <td class="kelas">Kelas</td>
                            <td class="btn">Action</td>
                        </tr>
                        <?php
                        $counter = 1;
                        $index = array();
                        $query = mysqli_query($kon, 'SELECT * FROM t_mahasiswa ORDER BY NAMA');
                        while ($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                                <td class="no"><?php echo $counter++?></td>
                                <td class="nama"><?php echo $data['NAMA']?></td>
                                <td class="nim"><?php echo $data['NIM']?></td>
                                <td class="kelas"><?php echo $data['KELAS']?></td>
                                <td>
                                    <div class="container" id="fun">
                                        <form action="" method="post">
                                            <input type="text" name="Fvalue"value="<?php echo $data['NIM'] ?>" hidden>
                                            <input type="submit" name="Fdelete" value="Delete" default="<?php echo $data['NIM'] ?>">    
                                        </form> 
                                    </div>
                                </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        <?php
                        //array_push($index, $data['NIM']);
                        if (isset($_POST['Fdelete'])) {
                            $temp = $_POST['Fvalue'];
                            $result = mysqli_query($kon, "DELETE FROM t_mahasiswa WHERE NIM = $temp");
                            echo '<script>alert("Data deleted successfully..\nClick OK to continue");</script><meta http-equiv="refresh" content="0">';
                        }
                        ?>
                    </table>
                </div>
                
                <div class="sel1">
                    <form action="" method="post" name="form1">
                        <table widht="25%" class="in">
                            <tbody>
                                <tr class="t_top" >
                                    <td>Tambah Data</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><input type="text" name="pname"></td>
                                </tr>
                                <tr>
                                    <td>NIM</td>
                                    <td><input type="text" name="pnim"></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td><input type="text" name="pkelas"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="Submit" value="Add"></td>
                                </tr>
                            </tbody>

                            <?php
                            if (isset($_POST['Submit'])) {
                                $pname = $_POST['pname'];
                                $pnim = $_POST['pnim'];
                                $pkelas = $_POST['pkelas'];
                                

                                if (empty($pname) || empty($pnim) || empty($pkelas)) {
                                    if (empty($pname)) {
                                        echo '<font color="red">Nama field is empty.</font><br>';
                                    }
                                    if (empty($pnim)) {
                                        echo '<font color="red">NIM field is empty.</font><br>';
                                    }
                                    if (empty($pkelas)) {
                                        echo '<font color="red">Kelas field is empty.</font><br>';
                                    }

                                    echo '<br><a href="javascript:self.hostory.back();">Go Back</a>';
                                }
                                else 
                                {
                                    $result = mysqli_query($kon, "INSERT INTO t_mahasiswa VALUES ('$pnim','$pname','$pkelas')");
                                    echo '<font color="green">Data added successfully..</font><br>';
                                    echo '<script>alert("Data added successfully..\nClick OK to continue");</script><meta http-equiv="refresh" content="0">';
                                    
                                    
                                    //header("index.php");
                                }
                            }
                            ?>
                        </table>
                    </form>
                </div>

            </div>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>