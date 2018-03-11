<?php 
session_start();
include 'konek.php';
        
if(!isset($_SESSION['admin_login'])) 
    header('location:index.php');   
?>
<article>

           <?php
            $change=$_SESSION['admin_id'];
            if(isset($_REQUEST['change_password'])){
            $sql="SELECT * FROM admin WHERE username='$change'";
            $result=mysql_query($sql);
            $rws=  mysql_fetch_array($result);
            $old=  mysql_real_escape_string($_REQUEST['old_password']);
            $new=  mysql_real_escape_string($_REQUEST['new_password']);
            $again=mysql_real_escape_string($_REQUEST['again_password']);
            
            if($rws[3]==$old && $new==$again){
                $sql1="UPDATE admin SET password='$new' WHERE username='$change'";
                mysql_query($sql1) or die(mysql_error());
              echo '<script>alert("anda telah berhasil mengganti password ");';
     echo 'window.location= "home.php?con=1";</script>';
            }
            else{
                
                header('location:home.php?con=1');
            }
            }
            ?>
            <?php
               $cust_id=$_SESSION['admin_id'];
              $sql=mysql_query("select*from admin where username='$cust_id'");
              $rws=mysql_fetch_array($sql);

            ?>


    <h3 style="text-align:center;color:#2E4372;"><u>ubah password</u></h3>

            <form action="" method="POST">
                <table align="center">
                    <tr>
                        <td> masukkan password lama:</td>
                        <td><input type="password" name="old_password" required=""/></td>
                    </tr>
                    <tr>
                        <td>masukkan password baru:</td>
                        <td><input type="password" name="new_password" required=""/></td>
                    </tr>
                    <tr>
                        <td>masukkan password lagi:</td>
                        <td><input type="password" name="again_password" required=""/></td>
                    </tr>
                    </table>
                    
                       <table align="center"><tr>
                        <td><input type="submit" name="change_password" value="Ubah Password" class="addstaff_button" style="background-color:skyblue;" /></td>
                    </tr>
                </table>
            </form>
            
       