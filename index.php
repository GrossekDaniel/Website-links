<?php  include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>Azure - web</title>
</head>

<body>
    <form method="post" action="server.php">
        <section class="main">
            <div class="first-info">
                <input type="text" class="item-url" placeholder="Insert URL" name="link">
                <input type="email" class="item-email" placeholder="Insert Email">
            </div>
            <div class="iframe-box">

            </div>

            <div class="list-box">
            
                <?php $results = mysqli_query($conn, "SELECT * FROM info"); ?>

                <table>
                    <thead>
                        <tr>
                            <th>Link</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr>
                        <td><?php echo $row['link']; ?></td>
                        <td>
                            <a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="msg">
                        <?php 
                            echo $_SESSION['message']; 
                            unset($_SESSION['message']);
                        ?>
                    </div>
                <?php endif ?>
                
            </div>
            <div class="buttons">
                <button class="save" type="submit" name="save">Save</button>
                <button class="send">Send</button>
            </div>

        </section>
    </form>
</body>

</html>
