<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $m_name = $_POST["m_name"];
        $m_born = $_POST["m_born"];

        $thaiyear = intval(substr($m_born,0,4)) + 543;
        $thaimonth = "";

        switch(intval(substr($m_born,5,2))){
            case 1 : $thaimonth = "มกราคม"; break;
            case 2 : $thaimonth = "กุมภาพันธ์"; break;
            case 3 : $thaimonth = "มีนาคม"; break;
            case 4 : $thaimonth = "เมษายน"; break;
            case 5 : $thaimonth = "พฤษภาคม"; break;
            case 6 : $thaimonth = "มิถุนายม"; break;
            case 7 : $thaimonth = "กรกฏาคม"; break;
            case 8 : $thaimonth = "สิงหาคม"; break;
            case 9 : $thaimonth = "กันยายน"; break;
            case 10 : $thaimonth = "ตุลาคม"; break;
            case 11 : $thaimonth = "พฤศจิกายน"; break;
            case 12 : $thaimonth = "ธันวาคม"; break;
            
        }

        $m_born = intval(substr($m_born,8,2)) . ' ' . $thaimonth . ' พ.ศ. ' . $thaiyear;

        $m_sex = "";
        if($_POST["m_sex"] == "m"){
            $m_sex = "ชาย";
        }else if($_POST["m_sex"] == "f"){
            $m_sex = "หญิง";
        }else{
            $m_sex = "เพศทางเลือก";
        } 

        $m_education = "";
        if($_POST["m_education"] == "1"){
            $m_education = "ม.ต้น";
        }else if($_POST["m_education"] == "2"){
            $m_education = "ม.ปลาย";
        }else if($_POST["m_education"] == "3"){
            $m_education = "ปริญญาตรี";
        }else if($_POST["m_education"] == "4"){
            $m_education = "ปริญญาโท";
        }else{
            $m_education = "ปริญญาเอก";
        }

        $m_job1 = isset($_POST["m_job1"]) ? $_POST["m_job1"] : "";
        $m_job2 = isset($_POST["m_job2"]) ? $_POST["m_job2"] : "";
        $m_job3 = isset($_POST["m_job3"]) ? $_POST["m_job3"] : "";
        $m_job4 = isset($_POST["m_job4"]) ? $_POST["m_job4"] : "";

        //เปลี่ยนชื่อรูป และเอารูปที่อัพโหลดมาเก็บใน images
        $m_image_newname = uniqid() . '-' . time();// gen ชื่อรูปใหม่เก็บในตัวแปร
        //เอานามสกุลของไฟล์ที่อัปโหลดมาเก็บในตัวแปร
        $m_image_extension = pathinfo($_FILES["m_image"]["name"], PATHINFO_EXTENSION);
        //เอาชื่อที่ gen มา กับนามสกุลมาต่อกันเก็บในตัวแปร
        $m_image = $m_image_newname . '.' . $m_image_extension;
        //เอาไฟล์ที่อัพโหลดมาไปใส่ใน images พร้อมเปลี่ยนชื่อให้มัน
        move_uploaded_file($_FILES["m_image"]["tmp_name"], "./images/" . $m_image);

        $m_resume_newname = uniqid() . '-' . time();
        $m_resume_extension = pathinfo($_FILES["m_resume"]["name"], PATHINFO_EXTENSION);
        $m_resume = $m_resume_newname . '.' . $m_resume_extension;
        move_uploaded_file($_FILES["m_resume"]["tmp_name"], "./resumefile/" . $m_resume);
        
        $m_username = $_POST["m_username"];
        $m_password = $_POST["m_password"];
        $m_status = $_POST["m_status"];
        $m_dateregister = $_POST["m_dateregister"];

    ?>
    <h1>Welcome ยินดีต้อนรับ</h1>
    <hr>
    ชื่อ : <?php echo $m_name; ?>
    <br><br>
    วัน เดือน ปีเกิด : <?php echo $m_born; ?>
    <br><br>
    เพศ : <?php echo $m_sex; ?>
    <br><br>
    การศึกษาสูงสุด : <?php echo $m_education; ?>
    <br><br>
    งานอดิเรก : <?php echo $m_job1 . ' ' . $m_job2 . ' ' . $m_job3 . ' ' . $m_job4; ?>
    <br><br>
    ชื่อผู้ใช้ : <?php echo $m_username; ?>
    <br><br>
    รหัสผ่าน : <?php echo $m_password; ?>
    <br><br>
    วันลงทะเบียน : <?php echo $m_dateregister; ?>
    <br><br>
    สถานะ : <?php echo $m_status; ?>
    <br><br>
    <img src="./images/<?php echo $m_image ?>"  alt="" width="150">

</body>
</html>