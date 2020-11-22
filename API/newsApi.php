<?PHP
include('../models/news.php');

$news_model = new News();


if(isset($_POST) && !empty($_POST)){

    $news_model ->news_title = $_POST['title'];
    $news_model ->news_details = $_POST['details'];

    if($news_model -> addRow()){
        $feedback['code'] = 1111;
        $feedback['message'] = "Data inserted Successfull";
    }else{
        $feedback['code'] = 0000;
        $feedback['message'] = "Failed";
    }
    
    echo json_encode($feedback);
    // echo $_POST['title'];
    // echo $_POST['details'];
}
else if(isset($_GET['id'])){
    echo json_encode($news_model->getSingelRow($_GET['id']));   
}
else{
    echo json_encode($news_model->getRows());
}


?>