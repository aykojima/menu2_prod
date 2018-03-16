<?php include('includes/header.php'); ?>
<?php include('db/course-items.php'); ?>

    <a id="print" href="javascript:window.print()">PRINT</a>
    <div id="container">
    <div id="menu">
    <h1 id="ippin">Course Meals</h1>
     <div id='show_result_course'>


    <div id="two" class="courses">
       
        <h2><?php echo $two_courses['Course'];?></h2>
        <div class="additionals">
        <p class="name"><?php echo $two_courses['AdditionalOne'];?></p>
        <p class="name"><?php echo $two_courses['AdditionalTwo'];?></p>
        </div>
            <div class="course">
                <ul>
                    <li>
                        <div><p class="name"><?php echo $two_courses['EntreeFirst'];?></p><p class="price"><?php echo $two_courses['EntreeFirstPrice'];?></p></div>
                        <div class="description"><?php echo $two_courses['EntreeFirstDescription'];?></div>
                    </li>
                    <li>
                        <div><p class="name"><?php echo $two_courses['EntreeSecond'];?></p><p class="price"><?php echo $two_courses['EntreeSecondPrice'];?></p></div>
                        <div class="description"><?php echo $two_courses['EntreeSecondDescription'];?></div>
                    </li>
                    <li>
                        <div><p class="name"><?php echo $two_courses['EntreeThird'];?></p><p class="price"><?php echo $two_courses['EntreeThirdPrice'];?></p></div>
                        <div class="description"><?php echo $two_courses['EntreeThirdDescription'];?></div>
                    </li>
                </ul>
            </div>
            
    </div>


    <div id="three" class="courses">
    <h2><?php echo $three_courses['Course'];?></h2><p class="price"><?php echo $three_courses['CoursePrice'];?></p>
    <div class="additionals">
    <p class="name"><?php echo $three_courses['AdditionalOne'];?></p><p class="price"><?php echo $three_courses['AdditionalOnePrice'];?></p>
    <p class="name"><?php echo $three_courses['AdditionalTwo'];?></p><p class="price"><?php echo $three_courses['AdditionalTwoPrice'];?></p>
    </div>
    <div class="course">
                <ul>
                    <li>
                        <p>choice of: </p>
                            <ul>
                                <li><?php echo $three_courses['AppetizerFirst'];?>,</li>
                                <li><?php echo $three_courses['AppetizerSecond'];?>, or</li>
                                <li><?php echo $three_courses['AppetizerThird'];?></li>
                            </ul>  
                    </li>
                    <li>
                        <p>choice of: </p>
                            <ul>
                                <li><?php echo $three_courses['EntreeFirst'];?>, or</li>
                                <li><?php echo $three_courses['EntreeSecond'];?></li>
                            </ul>  
                    </li>
                    <li>
                        <p>choice of: </p>
                            <ul>
                                <li><?php echo $three_courses['DessertFirst'];?>,</li>
                                <li><?php echo $three_courses['DessertSecond'];?>, or</li>
                                <li><?php echo $three_courses['DessertThird'];?></li>
                            </ul>  
                    </li>
                </ul>
            </div>
    </div>

    <div id="five" class="courses">
    <h2><?php echo $five_courses['Course'];?></h2><p class="price"><?php echo $five_courses['CoursePrice'];?></p>
    <div class="additionals">
    <p class="name"><?php echo $five_courses['AdditionalOne'];?></p><p class="price"><?php echo $five_courses['AdditionalOnePrice'];?></p>
    <p class="name"><?php echo $five_courses['AdditionalTwo'];?></p><p class="price"><?php echo $five_courses['AdditionalTwoPrice'];?></p>
    </div>
    <div class="course">
                <ul>
                    <li>
                        <p>choice of: </p>
                            <ul>
                                <li><?php echo $five_courses['AppetizerFirst'];?>,</li>
                                <li><?php echo $five_courses['AppetizerSecond'];?>, or</li>
                                <li><?php echo $five_courses['AppetizerThird'];?></li>
                            </ul>  
                    </li>
                    <li class="need_margin"><?php echo $five_courses['EntreeFirst'];?></li>
                    <li class="need_margin"><?php echo $five_courses['EntreeSecond'];?></li>
                    <li class="need_margin"><?php echo $five_courses['EntreeThird'];?></li>
                    <li>
                        <p>choice of: </p>
                            <ul>
                                <li><?php echo $five_courses['DessertFirst'];?>,</li>
                                <li><?php echo $five_courses['DessertSecond'];?>, or</li>
                                <li><?php echo $five_courses['DessertThird'];?></li>
                            </ul>  
                    </li>
                </ul>
            </div>
    </div>

    <div id="six" class="courses">
    <h2><?php echo $six_courses['Course'];?></h2><p class="price"><?php echo $six_courses['CoursePrice'];?></p>
    <div class="additionals">
    <p class="name"><?php echo $six_courses['AdditionalOne'];?></p><p class="price"><?php echo $six_courses['AdditionalOnePrice'];?></p>
    <p class="name"><?php echo $six_courses['AdditionalTwo'];?></p><p class="price"><?php echo $six_courses['AdditionalTwoPrice'];?></p>
    </div>
    <div class="course">
                <ul>
                    <li>
                        <p>choice of: </p>
                            <ul>
                                <li><?php echo $six_courses['AppetizerFirst'];?>,</li>
                                <li><?php echo $six_courses['AppetizerSecond'];?>, or</li>
                                <li><?php echo $six_courses['AppetizerThird'];?></li>
                            </ul>  
                    </li>
                    <li class="need_margin"><?php echo $six_courses['EntreeFirst'];?></li>
                    <li class="need_margin"><?php echo $six_courses['EntreeSecond'];?></li>
                    <li class="need_margin"><?php echo $six_courses['EntreeThird'];?></li>
                    <li class="need_margin"><?php echo $six_courses['EntreeFourth'];?></li>
                    <li>
                        <p>choice of: </p>
                            <ul>
                                <li><?php echo $six_courses['DessertFirst'];?>,</li>
                                <li><?php echo $six_courses['DessertSecond'];?>, or</li>
                                <li><?php echo $six_courses['DessertThird'];?></li>
                            </ul>  
                    </li>
                </ul>
            </div>
</div>

    <h1><?php echo $omakase['Course'];?></h1>
    <div id="omakase" class="courses">
        <div class="additionals">
    <p>Featuring local and seasonal ingredients in an authentic yet creative Japanese preparation.</p>
    </div>
    <h3 class="name"><?php echo $omakase['EntreeFirst'];?></h3><h3 class="price"><?php echo $omakase['EntreeFirstPrice'];?></h3>
    <h3 class="name"><?php echo $omakase['EntreeSecond'];?></h3><h3 class="price"><?php echo $omakase['EntreeSecondPrice'];?></h3>
    <h3 class="name"><?php echo $omakase['EntreeThird'];?></h3><h3 class="price"><?php echo $omakase['EntreeThirdPrice'];?></h3>
    <div class="additionals">
    <p class="name"><?php echo $omakase['AdditionalTwo'];?></p><p class="price"><?php echo $omakase['AdditionalTwoPrice'];?></p>
    </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>


