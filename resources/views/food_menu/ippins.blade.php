<?php include('includes/header.php'); ?>
    
    <!-- 
        *
        *
        * search box 
        *
        *
        *
        *
        -->
    <div class="search-box">
            <input type="text" autocomplete="off" placeholder="Search..." />
            <div class="result"></div>       
        </div>
    
        <!-- 
        *
        *
        * menu
        *
        *
        *
        *
        -->
    <div id="container">
        <p class="notes"><img id="fish-vertical" src='images/fish.jpg' alt='fish' style=width:15px;>
            sustainable "best" or "good alternative" seafood 
            *raw or undercooked meats, poultry, seafodd, shellfish or eggs 
            may increase your risk of foodborne illness</p>
        <div id="menu">
            <h2 id="dates"></h2>
            <div class="date">
                <input type="button" id="left" value=" < " onclick="changeDate('left')"/>
            </div>
            <div class="date">
                <input type="button" id="right" value=" > " onclick="changeDate('right')"/> 
            </div>
        
            <h1 id="ippin">Ippins</h1>
            <div id='show_result_ippin'>
                <div id="appetizer"></div>
                <div id="tempura"></div>
                <div id="fish_dish"></div>
                <div id="meat_dish"></div>
            </div>
            <div class="gratuity">
                <p>We would like to inform our guests that in place of gratuity a 20% service charge is included in the total (excludes take out).
                    100% of these funds are distributed to the staff in form of wages, benefits and revenue share.
                    Additional gratuity is not expected.
                </p>
            </div>
        </div>
<?php include('includes/footer.php'); ?>


