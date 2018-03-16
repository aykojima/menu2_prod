<?php include('includes/header.php'); ?>
<?php include('db/lunch-items.php'); ?>
    <!--@to do
    @style - print
     -->
    
       <!--
    <div class="search-box">
            <input type="text" autocomplete="off" placeholder="Search..." />
            <div class="result"></div>       
        </div>
-->
    <a id="print" href="javascript:window.print()">PRINT</a>
    <div id="container">
    <div id="menu">
     <div id='show_result'>
    <div id="gozen" class="lunch_menu">       
        <h1>Weekday Gozen</h1>
        <div class="additionals">
        <p class="name">All gozens include:</p>
        <p><?php echo $gozen_include1['ItemName'];?>, <?php echo $gozen_include2['ItemName'];?>, 
        <?php echo $gozen_include3['ItemName'];?>, <?php echo $gozen_include4['ItemName'];?></p>
        <p><?php echo $gozen_sub['ItemName'];?> <?php echo $gozen_sub['ItemPrice'];?></p>
        <p><?php echo $gozen_add1['ItemName'];?> <?php echo $gozen_add1['ItemPrice'];?></p>
        <p><?php echo $gozen_add2['ItemName'];?> <?php echo $gozen_add2['ItemPrice'];?></p>
        </div>
            <div class="course">
                <ul>
                    <li>
                        <div><p class="name"><?php echo $asa_gozen['ItemName'];?>/ <?php echo $asa_gozen['ItemPrice'];?></p></div>
                        <div class="description"><?php echo $asa_gozen['ItemDescription'];?></div>
                    </li>
                    <li>
                        <div><p class="name"><?php echo $hiru_gozen['ItemName'];?>/ <?php echo $hiru_gozen['ItemPrice'];?></p></div>
                        <div class="description"><?php echo $hiru_gozen['ItemDescription'];?></div>
                    </li>
                    <li>
                        <div><p class="name"><?php echo $nigiri_gozen['ItemName'];?>/ <?php echo $nigiri_gozen['ItemPrice'];?></p></div>
                        <div class="description"><?php echo $nigiri_gozen['ItemDescription'];?></div>
                    </li>
                </ul>
            </div>
            
    </div>


    <div id="combinations" class="courses">
    <h1>Combinations</h1>
    <div class="additionals">
    <p><?php echo $combo_include['ItemName'];?></p>
    <p><?php echo $combo_sub['ItemName'];?>/ <?php echo $combo_sub['ItemPrice'];?></p>
    </div>
    <div class="course">
                <ul>
                    <li>
                        <div><p class="name"><?php echo $combo1['ItemName'];?>/ <?php echo $combo1['ItemPrice'];?></p></div>
                        <div class="description"><?php echo $combo1['ItemDescription'];?></div>
                    </li>
                    <li>
                        <div><p class="name"><?php echo $combo2['ItemName'];?>/ <?php echo $combo2['ItemPrice'];?></p></div>
                        <div class="description"><?php echo $combo2['ItemDescription'];?></div>
                    </li>
                    <li>
                        <div><p class="name"><?php echo $combo3['ItemName'];?>/ <?php echo $combo3['ItemPrice'];?></p></div>
                        <div class="description"><?php echo $combo3['ItemDescription'];?></div>
                    </li>
                    <li>
                        <div><p class="name"><?php echo $combo4['ItemName'];?>/ <?php echo $combo4['ItemPrice'];?></p></div>
                        <div class="description"><?php echo $combo4['ItemDescription'];?></div>
                    </li>
                </ul>
            </div>
    </div>

    <div id="noodle" class="courses">
    <h1>Noodle</h1>
    <div class="course">
                <ul>
                    <li>
                        <div><p class="name"><?php echo $tempura_udon['ItemName'];?>/ <?php echo $tempura_udon['ItemPrice'];?></p></div>
                        <div class="description"><?php echo $tempura_udon['ItemDescription'];?></div>
                    </li>
                    <li>
                        <div><p class="name"><?php echo $tempura_udon_combo['ItemName'];?>/ <?php echo $tempura_udon_combo['ItemPrice'];?></p></div>
                        <div class="description"><?php echo $tempura_udon_combo['ItemDescription'];?></div>
                    </li>
                </ul>
            </div>
    </div>

    <div id="lunch_ippins" class="courses">
    <h1>Lunch Ippins</h1>
    <div class="course">
                <ul>
                    <li>
                        <div><p class="name"><?php echo $lunch_ippin1['ItemName'];?>/ <?php echo $lunch_ippin1['ItemPrice'];?></p></div>    
                    </li>
                    <li>
                         <div><p class="name"><?php echo $lunch_ippin2['ItemName'];?>/ <?php echo $lunch_ippin2['ItemPrice'];?></p></div>    
                    </li>
                    <li>
                         <div><p class="name"><?php echo $lunch_ippin3['ItemName'];?>/ <?php echo $lunch_ippin3['ItemPrice'];?></p></div>    
                    </li>
                    <li>
                         <div><p class="name"><?php echo $lunch_ippin4['ItemName'];?>/ <?php echo $lunch_ippin4['ItemPrice'];?></p></div>    
                    </li>
                </ul>
            </div>
</div>
<div id="tonkatsu" class="courses">
    <h1>Tonkatsu Lunch</h1>
    <h3>(Thursday Only)</h3>
    <div class="additionals">
    <p class="name">All sets come with:</p>
    <p><?php echo $tonkatsu_include['ItemName'];?></p>
    </div>
    <div class="course">
                <ul>
                    <li>
                        <div><p class="name"><?php echo $tonkatsu['ItemName'];?>/ <?php echo $tonkatsu['ItemPrice'];?></p></div>
                    </li>
                    <li>
                         <div><p class="name"><?php echo $hire_katsu['ItemName'];?>/ <?php echo $hire_katsu['ItemPrice'];?></p></div>
                    </li>
                    <li>
                         <div><p class="name"><?php echo $combo_katsu['ItemName'];?>/ <?php echo $combo_katsu['ItemPrice'];?></p></div>
                    </li>
                </ul>
            </div> 
    </div>
    </div>
</div>
</div>
<?php echo"<script src='js/lunch.js'></script>";?>
<?php 
    if(THIS_PAGE == "sushi.php" || THIS_PAGE == "ippin.php"){
        echo"<script src='js/dates.js'></script>";
        }?>
</body>
</html>


