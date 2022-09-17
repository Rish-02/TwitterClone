<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Twitter Clone</title>

</head>
<body>
    <!--mainpage-->
        <div class="navbar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" id="twitter" href="#"><i class="fa-brands fa-twitter"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-sharp fa-solid fa-house"></i>HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-magnifying-glass"></i>Explore</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-bell"></i>Notification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-envelope"></i>Message</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-bookmark"></i>Bookmark</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-list"></i>List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-user"></i>Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-ellipsis"></i>More</a>
                </li>
            </ul>
        </div>



<!--PHP HERE-->
<div class="section1">
<div class="container">
    <?php
    require "vendor/autoload.php";
    use Abraham\TwitterOAuth\TwitterOAuth;

    $consumerkey = "fkYYQb81Oeii8c24HFo9yNBf9";
    $consumersecret = "w2SHXhLwb6vf1KpmYIRzctFZzBPWeAd25WLtSz3adxVKx4fSnp";

    $accesstoken = "1437784896441888770-W3YhwhukXLp7smeXgi6UWqP5THBEOs";
    $accesstokensecret = "efm3MyJw6bPIJdrfe7TGBX19rWydZ5n5odaGhVDI92FYB";

    $connection = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
    $content = $connection->get("account/verify_credentials");

    $statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);

    foreach($statuses as $tweet){
        
        if($tweet->favorite_count >= 2){
        $status = $connection->get("statuses/oembed", ["id" => $tweet->id]);
        echo $status->html;
    }
}
?>
</div>
<div class="right">
<h1><input style="underline"> What's happening</h1>
<div class="card-text-center">
  <div class="card-body">
    <h2 class="card-title">The Times Of India</h2> <h4>@timesofindia</h4>
    <p class="card-text">With passing away of Queen Elizabeth II, twitterati demands Kohinoor's return to India.</p>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>


<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">TRENDING</h3>
        <p class="card-text">#Cheetahs make a return to India after 70 years, here are some interesting facts about them</p>
        <p class="card-text">US media has praised PM #NarendraModi for telling Russian President #VladimirPutin that "today's era is not an era of war" during an unprecedented public criticism of the Kremlin chief over the nearly eight-month-long conflict in #Ukraine.</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">SPORTS</h3>
        <p class="card-text">#DikshaDagar shoots 66 with 5 straight birdies, lies T-12 in France; all 4 Indians make cut 🏌️‍♀️</p>
        <p class="card-text">ndia women's hockey team midfielder #NamitaToppo announces retirement</p>
      </div>
    </div>
  </div>
</div>


</div>
</div>

</body>
</html>

