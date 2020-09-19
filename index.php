<?php 
include "config.php";
?>
<!doctype html>
<html>
    <head>
        <title>How to Restrict User Access on the Website with jQuery AJAX</title>
        <link href="style.css" rel="stylesheet" type="text/css">

        <script src="jquery-3.1.1.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function(){

                // Enable/Disable user
                $('.active').click(function(){
                    var id = this.id;
                    var split_id = id.split("_");
                    var username = split_id[1];

                    var activeText = $(this).text();

                    // Get active state
                    var active = 0;
                    if(activeText == "Enable"){
                        active = 1;
                    }else{
                        active = 0;
                    }

                    // AJAX request
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {username: username,active: active,request: 1},
                        success: function(response){
                            $("#"+id).html(response);
                        }
                    });
                });

                // User Login
                $("#but_submit").click(function(){
                    var username = $("#txt_uname").val().trim();
                    var password = $("#txt_pwd").val().trim();

                    if( username != "" && password != "" ){
                        $.ajax({
                            url:'ajaxfile.php',
                            type:'post',
                            data:{username:username,password:password, request: 2},
                            success:function(response){
                                var msg = "";
                                if(response == 1){
                                    window.location = "home.php";
                                }else{
                                    msg = "Invalid username and password!";
                                }
                                $("#message").html(msg);
                            }
                        });
                    }
                });

            });
        </script>
    </head>
    <body>
        
        <div class="container">

            <!-- Login Form -->
            <div id="div_login">
                <h1>Login</h1>
                <div id="message"></div>
                <div>
                    <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
                </div>
                <div>
                    <input type="password" class="textbox" id="txt_pwd" name="txt_pwd" placeholder="Password"/>
                </div>
                <div>
                    <input type="button" value="Submit" name="but_submit" id="but_submit" />
                </div>
            </div>

            All password is <b>12345</b>

            <!-- Users List -->
            <h2 style='margin-top: 50px;'>Users List</h2>
            <table border='1' style='border-collapse: collapse;'>
                <tr>
                    <th>S.no</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>&nbsp;</th>
                </tr>
                <?php
                $fetchUsers = mysqli_query($con,"SELECT * FROM users");
                $sno = 1;
                while($row = mysqli_fetch_assoc($fetchUsers)){
                    $id = $row['id'];
                    $username = $row['username'];
                    $name = $row['name'];
                    $active = $row['active'];

                    $activeText = "";
                    if($active == 0){
                        $activeText = "Enable";
                    }else{
                        $activeText = "Disable";
                    }

                    $enableDisableButton = "<button class='active' id='active_".$username."'>".$activeText."</button>";

                    echo "<tr>";
                    echo "<td>".$sno."</td>";
                    echo "<td>".$username."</td>";
                    echo "<td>".$name."</td>";
                    echo "<td>".$enableDisableButton."</td>";
                    echo "</tr>";

                    $sno ++;
                }
                ?>
            </table>
        </div>
    </body>
</html>

