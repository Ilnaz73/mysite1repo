<!Doctype html>
<html>
  <head>
    <title>Образовательный портал</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>   
      <table width="100%" border="1">
          <tr>
              <td colspan="2"><?php require_once('templates/top.php'); ?></td>
          </tr>
          <tr>
              <td width="20%"><?php require_once 'templates/left.php'; ?></td>
              <td>
                <?php              
                if(!isset($_GET['id']))
                    require 'templates/startpage.php';
                else{
                    $myId = strip_tags($_GET['id']);
                    switch($myId){
                        case 'page1': require 'templates/page1.php'; break;
                        case 'page2': require 'templates/page2.php'; break;
                        case 'page3': require 'templates/page3.php'; break;
                        case 'page4': require 'templates/page4.php'; break;
                        case 'page5': require 'templates/page5.php'; break;
                        default: 
                            header("Location: " . $_SERVER['PHP_SELF']);
                            exit();
                            break; 
                    }
                }
                ?>
              </td>
          </tr>
          <tr>
              <td colspan="2" align='center'><?php require_once 'templates/footer.php'; ?></td>
          </tr>
      </table>
      
            
  </body>
 </html>
