<?php
 session_start();
set_time_limit(0);
// header('Content-Type:image/jpeg');

$newwidth="";
$newheight="";
$typeHe="";
$typeWi="";
$res="";
$typeres="";

if(isset($_POST['features']))
{
$newwidth = $_POST['width'];
$newheight = $_POST['height'];
$typeWi = $_POST['typeWi'];
$typeHe = $_POST['typeHe'];
$res = $_POST['res'];
if($typeWi!== $typeHe){
    die("both type should be same");
}else
{
    if($typeHe === "pixels" && $typeWi === "pixels"){
       $nwidth= $newwidth ;
        $nheight=$newwidth;
        $_SESSION["nheight"] =  $nheight;
        $_SESSION["nwidth"] =   $nwidth;
    header('location:features.php');
    }
   else if($typeHe === "inches" && $typeWi === "inches"){
        $nwidth= $newwidth*$res ;
        $nheight=$newwidth*$res;
        $_SESSION["nheight"] =  $nheight;
        $_SESSION["nwidth"] =   $nwidth;
        // header('location:index.php');
    }
  else if($typeHe === "mm" && $typeWi === "mm"){
        $nwidth= $newwidth*($res/25.4);
        $nheight=$newwidth*($res/25.4);
        $_SESSION["nheight"] =  $nheight;
        $_SESSION["nwidth"] =   $nwidth;
        
      
    }else{
        die("Select Image type and size");
    }

}
}

if(isset($_POST['submit'])){
    if (!empty($_FILES['file']['name'][0])) {
    // $select = $_POST['imageType'];
    // if($select == 'passport'){
        $nheight= $_SESSION["nheight"] ;
        $nwidth=   $_SESSION["nwidth"] ;
    // else if($select == 'postcard'){
    //     $nwidth = 1847;
    //     $nheight =1247;
    // }else{
    //     die("Please select image type.");
        
    // }

    $supported_images = array('image/gif', 'image/jpg', 'image/jpeg', 'image/png');
    if (!file_exists(getcwd(). '/uploads')) {
        mkdir(getcwd(). '/uploads', 0777);
    }

    foreach($_FILES['file']['name'] as $key=>$val)
    {
        $file_name = $_FILES['file']['name'][$key];
        $file =$_FILES['file']['tmp_name'][$key];
        list($width,$height)=getimagesize($file);
        $newImage = imagecreatetruecolor($nwidth,$nheight);
        if($_FILES['file']['type'][$key]=='image/png'){
            $source = imagecreatefrompng($file);
        }
        else if($_FILES['file']['type'][$key]=='image/jpeg')
        {
        $source = imagecreatefromjpeg($file);
         }
         else if($_FILES['file']['type'][$key]=='image/gif')
         {
        $source = imagecreatefromgif($file);
       
        }
        imagecopyresized($newImage,$source,0,0,0,0, $nwidth, $nheight, $width, $height);
        //get file extension

        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        //file name without extension

        $filenamewithoutextension = pathinfo($file_name, PATHINFO_FILENAME);

        if (in_array($_FILES['file']['type'][$key], $supported_images)) {
            $filename_to_store = $filenamewithoutextension.'_compress.' .$ext;

            move_uploaded_file($_FILES['file']['tmp_name'][$key], getcwd().'/uploads/'.$filename_to_store);

            try{
                imagejpeg($newImage,getcwd().'/uploads/'.$filename_to_store);
            } catch(Exception $e){
                echo $e->getMessage();
                exit();
            }
            $zip = new ZipArchive();
            $zip_name = getcwd() . "/uploads/upload_" . "images"  . ".zip ";
            // echo $zip_name . "<br>";
            if($zip->open($zip_name, ZIPARCHIVE::CREATE)!==TRUE){
                $error .= "Sorry ZIP creation is not working currently.<br/>";
            }
            
            $imageCount = count($_FILES['file']['name']);
            if($_FILES['file']['name'][$key]==''){
               continue;
            }
            $newname = date('YmdHis', time()) . mt_rand() . '.' . $ext;
            // echo $newname . "<br>";
            // ."<br>";
            $zip->addFromString(pathinfo($filename_to_store, PATHINFO_BASENAME), file_get_contents(getcwd() .'/uploads/' . $filename_to_store));
            // echo "status:" . $zip->status;


            
        }
    }
    $zip->close();
    $success = basename($zip_name); 

 }else{
    $error = '<strong>Error!! </strong> Please select a file.';
 }
}
