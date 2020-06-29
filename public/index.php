

<!doctype html>

<html>

    <head>

        <title>Covid Chest Xray Images</title>

        <link href='simplelightbox-master/dist/simplelightbox.min.css' rel='stylesheet' type='text/css'>

        <script src='jquery-3.0.0.js' type='text/javascript'></script> 

        <script type="text/javascript" src="simplelightbox-master/dist/simple-lightbox.js"></script>

        

        <link href='style.css' rel='stylesheet' type='text/css'>

    </head>

    <body>

        <div class='container'>

            <div class="gallery">

              

            <?php 

            // Image extensions

            $image_extensions = array("png","jpg","jpeg","gif","JPG","PNG");



            // Target directory

            $dir = 'covid_branch/covid-chestxray-dataset-master/images/';
            
            if (is_dir($dir)){

                

                if ($dh = opendir($dir)){

                    $count = 1;



                    // Read files

                    while (($file = readdir($dh)) !== false){



                        if($file != '' && $file != '.' && $file != '..'){

                            

                            // Thumbnail image path

                            $thumbnail_path = "covid_branch/thumbnail/".$file;



                            // Image path

                            $image_path = "covid_branch/covid-chestxray-dataset-master/images/".$file;

                            

                            $thumbnail_ext = pathinfo($thumbnail_path, PATHINFO_EXTENSION);

                            $image_ext = pathinfo($image_path, PATHINFO_EXTENSION);



                            // Check its not folder and it is image file

                            if(!is_dir($image_path) && 

                                in_array($thumbnail_ext,$image_extensions) && 

                                in_array($image_ext,$image_extensions)){

                                ?>



                                <!-- Image -->

                                <li><div><div class='gallery'><a href="<?php echo $image_path; ?>">

                                    <img src="<?php echo $thumbnail_path; ?>" width=150 height=150 alt="" title=""/>

                                </a><div><?php list($width, $height, $type, $attr) = getimagesize("/var/www/html/covid_branch/covid-chestxray-dataset-master/images/".$file);echo $width."x".$height."<br>" ;echo $image_ext; ?></div></div></div></li>



                                <!-- --- -->

                                <?php



                                // Break

                                if( $count%10 == 0){

                                ?>

                                    <div class="clear"></div>

                                <?php    

                                }

                                $count++;

                            }

                        }

                            

                    }

                    closedir($dh);

                }

            }

            ?>

            </div>

        </div>





        <!-- Script -->

        <script type='text/javascript'>

        $(document).ready(function(){



            // Intialize gallery

            var gallery = $('.gallery a').simpleLightbox();

        });

        </script>

    </body>

</html>
