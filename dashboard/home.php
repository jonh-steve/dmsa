<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ Thống Quản Lý KTX Sinh Viên</title>
    <link rel="shortcut icon" href="../images/logomeo.png">

    <!-- fonts -->
<!--    <link rel="preconnect" href="https://fonts.googleapis.com">-->
<!--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
<!--    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">-->
<!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"-->
<!--          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">-->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="size-full bg-white">
<!-- slidebar -->
<div class="slidebar">
    <header>
        <span>
            <i class="fas fa-users-cog"></i><br>
        </span>
        ADMIN
    </header>

    <ul>
<!--        <li>-->
<!--            <a href="../Provost/DispProvost.php" style="text-decoration:none"><i class="fas fa-user-tie"></i> Hiệu-->
<!--                Trưởng </a>-->
<!--        </li>-->
        <li>
            <a href="../Hall/DispHall.php" style="text-decoration:none"><i class="fas fa-building"></i> Ký Túc Xá </a>
        </li>
        <li>
            <a href="../Student/DispStudent.php" style="text-decoration:none"><i class="fas fa-book-reader"></i> Sinh
                viên</a>
        </li>
        <li>
            <a href="../Staff/DispStaff.php" style="text-decoration:none"><i class="fas fa-users"></i> Nhân viên</a>
        </li>
        <li>
            <a href="../Floor/DispFloor.php" style="text-decoration:none"><i class="fas fa-building"></i> Tầng</a>
        </li>
        <li>
            <a href="../Room/DispRoom.php" style="text-decoration:none"><i class="fa fa-bed"></i> Phòng</a>
        </li>
        <li>
            <a href="../FacilitiesProblem/DispFP.php" style="text-decoration:none"><i
                        class="fas fa-exclamation-triangle"></i> Vấn đề vật tư</a>
        </li>
        <li>
            <a href="../message/disp.php" style="text-decoration:none"><i class="fas fa-envelope-open"></i> Tin nhắn</a>
        </li>
    </ul>

    <!-- logout button -->
    <div>
        <div class="logout">
            <a href="../index.php">
                <img src="images/logout.png">
            </a>
        </div>
    </div>
</div>

<!-- mainpart -->
<div class="mainpart ">
    <div class="infocard">
        <h1 id="hall">Hệ thống quản lý ký túc xá</h1>

        <a href="../Hall/DispHall.php" rel="" style="text-decoration:none">
            <div class="cardspecific" style="width: 26%;">
                Ký túc xá
                <div class="number">
                    <?php
                    include 'connection.php';
                    $sql = "select count(*) as total from hall";
                    $result = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_assoc($result);
                    echo $data['total'];
                    ?>
                </div>
            </div>
        </a>

        <a href="../Student/DispStudent.php" rel="" style="text-decoration:none">
            <div class="cardspecific" style="width: 26%;">
                Sinh viên
                <div class="number">
                    <?php
                    include 'connection.php';
                    $sql = "select count(*) as total from student";
                    $result = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_assoc($result);
                    echo $data['total'];
                    ?>
                </div>
            </div>
        </a>

        <a href="../Staff/DispStaff.php" rel="" style="text-decoration:none">
            <div class="cardspecific" style="width: 26%;">
                Nhân viên
                <div class="number">
                    <?php
                    include 'connection.php';
                    $sql = "select count(*) as total from staff";
                    $result = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_assoc($result);
                    echo $data['total'];
                    ?>
                </div>
            </div>
        </a>

        <a href="../Floor/DispFloor.php" rel="" style="text-decoration:none">
            <div class="cardspecific" style="width: 18%;">
                Tầng ở KTX
                <div class="number">
                    <?php
                    include 'connection.php';
                    $sql = "select count(*) as total from floor";
                    $result = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_assoc($result);
                    echo $data['total'];
                    ?>
                </div>
            </div>
        </a>

        <a href="../Room/DispRoom.php" rel="" style="text-decoration:none">
            <div class="cardspecific" style="width: 18%;">
                Phòng KTX
                <div class="number">
                    <?php
                    include 'connection.php';
                    $sql = "select count(*) as total from room";
                    $result = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_assoc($result);
                    echo $data['total'];
                    ?>
                </div>
            </div>
        </a>

        <a href="../FacilitiesProblem/DispFP.php" rel="" style="text-decoration:none">
            <div class="cardspecific" style="width: 25%;">
                Vấn đề vật tư
                <div class="number">
                    <?php
                    include 'connection.php';
                    $sql = "select sum(Damaged_Fan_Un) as total from facility_problem";
                    $result = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_assoc($result);
                    echo $data['total'];
                    ?>
                </div>
            </div>
        </a>

        <a href="../message/disp.php" rel="" style="text-decoration:none">
            <div class="cardspecific" style="width: 18%;">
                Tin nhắn
                <div class="number">
                    <?php
                    include 'connection.php';
                    $sql = "select count(*) as total from message_table";
                    $result = mysqli_query($conn, $sql);
                    $data = mysqli_fetch_assoc($result);
                    echo $data['total'];
                    ?>
                </div>
            </div>
        </a>
    </div>
</div>

</body>
</html>