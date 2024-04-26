<?php require("general/header.php");

$menuType = $_POST['pageType'] = 'main';
?>


<div>
    <main>
        <img border="0" alt="Man running on treadmill" src="/DBnW/general/RunningGuy.png" width="auto" height="auto">
        
        <!-- if user is logged in, greet them -->
        <h1 class="main-container">
            Welcome to MiniGym<?php if (isset($_SESSION['user'])) { echo ', '.$_SESSION['user'].'!'; }?> 
        </h1>

        <p>
            We are a community-focused fitness center dedicated to helping you achieve your health and wellness goals.
            Our facility is equipped with state-of-the-art cardio and strength training equipment, as well as a variety of group fitness classes.
            Whether you are a beginner or a seasoned athlete, we have something for everyone.
            <br><br>
            In addition to our top-notch equipment and classes, we also have a team of certified personal trainers available to help you reach your full potential.
            Whether you want to lose weight, build muscle, or just improve your overall fitness, our trainers can create a customized workout plan to help you achieve your goals.
            <br><br>
            But our gym is more than just a place to work out.
            It's a place where you can find support, motivation, and friendship.
            We host regular social events and activities to bring our members together and create a sense of community.
            <br><br>
            We look forward to seeing you at the gym and helping you on your fitness journey!
        </p>


        <div class="main-container">
            <form>
                <!--<input type="button" id="day-pass" name="membership" value="Day Pass">-->
                <div class="membership-option">
                    <a href="#day">day pass £5.50</a>
                </div>
                <div class="membership-option">
                    <a href="#month" class="split">monthly pass £13.50</a>
                </div>
            </form>
        </div>

    </main>
</div>

<?php require("general/footer.php");?>