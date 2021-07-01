<?php
if (isset($_POST['username'])) {
    $UserName = $_POST['username'];

    $response = @file_get_contents( "https://www.instagram.com/$UserName/?__a=1" );

    if ( $response !== false ) {
        $data = json_decode( $response, true );
        if ( $data !== null ) {
            $NameSurname = $data['graphql']['user']['full_name'];
            $Followers  = $data['graphql']['user']['edge_followed_by']['count'];
            $Following  = $data['graphql']['user']['edge_follow']['count'];
            $Biography =  $data['graphql']['user']['biography'];
            echo '<br><center>';
            echo "{$NameSurname} have {$Followers} followers. <br><strong>Following</strong> $Following <br><strong>Biography </strong>$Biography";
            echo '</center>';
        }
    } else {
        echo '<center>';
        echo 'Username not found.';
        echo '</center>';
    }
}

?>
<html>
<center><br><br>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <form method="post">
        <input type="text" placeholder="username" name="username" autocomplete="off"><br><br>
        <button class="btn btn-success" type= "submit">Check Username</button>
    </form>
</center>
</html>
