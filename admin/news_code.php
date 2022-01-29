<?php include("security.php"); ?>
<?php include("config/dbcon.php"); ?>
<?php include("includes/thaidate.php"); ?>

<?php
if (isset($_POST['news_save'])) {
    $head = $_POST['head'];
    $detail = $_POST['detail'];
    $namepic = $_FILES["hotnew_image"]['name'];
    $namedoc = $_FILES['hotnew_doc']['name'];
    if (file_exists("upload/hotnew_images/" . $_FILES["hotnew_image"]["name"])) {
        $store = $_FILES["hotnew_image"]["name"];
        $_SESSION['status'] = "กรุณาเพิ่มรูปภาพ'.$store.' ";
        echo "กรุณาเพิ่มรูปภาพ";
        header('Location: news1.php');
    } else {
        $design = "ผู้ดูแลระบบ-วท.ตราด";
        $hotcount = 0;
        $query = "INSERT INTO hotnews(head,detail,date,namepic,namedoc,hotcount,design) 
            VALUES('$head','$detail','$date','$namepic','$namedoc','$hotcount','$design')";
        $result = mysqli_query($con, $query);

        if ($result) {
            move_uploaded_file($_FILES["hotnew_image"]["tmp_name"], "upload/hotnew_images/" . $_FILES["hotnew_image"]["name"]);
            move_uploaded_file($_FILES["hotnew_doc"]["tmp_name"], "upload/hotnew_docs/" . $_FILES["hotnew_doc"]["name"]);
            $_SESSION['success'] = "เพิ่มข่าวสารเรียบร้อยแล้ว";
            echo "เพิ่มข่าวสารเรียบร้อยแล้ว";
            header('Location: news1.php');
        } else {
            $_SESSION['success'] = "เพิ่มข่าวสารยังไม่เรียบร้อยแล้ว";
            echo "เพิ่มข่าวสารยังไม่เรียบร้อยแล้ว";
            header('Location: news1.php');
        }
    }
}
?>